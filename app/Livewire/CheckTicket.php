<?php

namespace App\Livewire;

use App\Mail\AdminApproved;
use App\Mail\RequestCreated;
use App\Mail\RequestRejected;
use App\Models\Leaving;
use App\Models\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;
use LivewireUI\Modal\ModalComponent;

class CheckTicket extends ModalComponent
{
    public $tid;
    public ?string $note = null;
    public $isProcessing = false;

    public function render()
    {
        $ticket = Leaving::findOrFail($this->tid);
        return view('livewire.check-ticket',
            [
                'ticket' => $ticket,
            ]);
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function approve() {
        $userKey = 'submit_lock_' . request()->ip(); // nếu có login thì dùng auth()->id()

        if (Cache::has($userKey)) {
            $this->addError('submit', 'Vui lòng đợi vài giây trước khi thử lại.');
            return;
        }

        // Đặt khóa trong 5 giây
        Cache::put($userKey, true, now()->addSeconds(5));


        if ($this->isProcessing) {
            return true;
        } else {
            $this->isProcessing = true;
        }


        $ticket = Leaving::findOrFail($this->tid);

        $authorized = $ticket->department->users()
            ->where('user_id', Auth::id())
            ->wherePivot('level', $ticket->current_manager)
            ->exists();

        if (!$authorized) {
            // Co nguoi xu ly roi
//            $this->addError('unauthorized', 'Bạn không có quyền duyệt đơn này.');
            $this->isProcessing = false;
            return redirect()->route('dashboard');
        }

        Log::create([
            'leaving_id' => $this->tid,
            'user_id' => Auth::id(),
            'action' => 'approved',
            'notes' => $this->note,
        ]);

        if ($ticket->current_manager == $ticket->department->max_level) {
            // trùm cuối đã duyệt
            $ticket->status = 'approved';
            $ticket->save();

            // gửi mail xác nhận đã duyệt
            if ($ticket->email) {
                Mail::to($ticket->email)->send(new AdminApproved($ticket));
            }
        } else {
            // chuyển cấp
            $ticket->status = 'processing';
            $ticket->current_manager += 1;
            $ticket->save();

            foreach ($ticket->department->users as $user) {
                if (!$user->isActive()) {
                    continue;
                }

                if ($user->pivot->level == $ticket->current_manager) {
                    Mail::to($user->email)->send(new RequestCreated($ticket));
                }
            }

            if ($ticket->email) {
                Mail::to($ticket->email)->send(new AdminApproved($ticket));
            }

        }

        $this->isProcessing = false;
        return redirect()->route('dashboard');
    }

    public function deny() {
        if ($this->isProcessing) {
            return true;
        } else {
            $this->isProcessing = true;
        }

        $ticket = Leaving::findOrFail($this->tid);
        $ticket->status = 'rejected';
        $ticket->save();

        Log::create([
            'leaving_id' => $this->tid,
            'user_id' => Auth::id(),
            'action' => 'rejected',
            'notes' => $this->note,
        ]);

        if ($ticket->email) {
            Mail::to($ticket->email)->send(new RequestRejected($ticket));
        }

        $this->isProcessing = false;
        return redirect()->route('dashboard');
    }

}
