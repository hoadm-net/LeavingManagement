<?php

namespace App\Livewire;

use App\Models\HNote;
use App\Models\Leaving;
use App\Models\Log;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class HrNote extends ModalComponent
{
    public $tid;
    public int $year;
    public int $total_days;
    public int $used_days;
    public int $remaining_days;

    public ?string $note = null;
    public $isProcessing = false;

    protected $rules = [
        'year' => 'required|integer',
        'total_days' => 'required|integer|min:0',
        'used_days' => 'required|integer|min:0',
        'remaining_days' => 'required|integer|min:0',
    ];

    public function mount() {
        $this->year = Carbon::now()->year;
        $this->total_days = 0;
        $this->used_days = 0;
        $this->remaining_days = 0;
    }

    public function render()
    {
        $ticket = Leaving::findOrFail($this->tid);

        return view('livewire.hr-note',
            [
                'ticket' => $ticket,
            ]
        );
    }

    public static function modalMaxWidth(): string
    {
        return '5xl';
    }

    public function save() {
        if ($this->isProcessing) {
            return true;
        } else {
            $this->isProcessing = true;
        }

        $this->validate();
        $ticket = Leaving::findOrFail($this->tid);
        HNote::create([
            'leaving_id' => $this->tid,
            'user_id' => Auth::id(),
            'year' => $this->year,
            'total_days' => $this->total_days,
            'used_days' => $this->used_days,
            'remaining_days' => $this->remaining_days,
            'notes' => $this->note,
        ]);

        $this->isProcessing = false;
        return redirect()->route('view-ticket', $ticket);
    }

    public function cancel() {
        $this->closeModal();
    }
}
