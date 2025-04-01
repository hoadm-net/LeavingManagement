<?php

namespace App\Livewire;

use App\Models\Leaving;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class ApproveTickets extends Component
{
    use WithPagination;

    public function render()
    {
        $user = Auth::user();

        $tickets = Leaving::whereHas('department', function ($query) use ($user) {
            $query->whereIn('id', $user->departments->pluck('id')); // Phòng ban user quản lý
        })->whereIn('current_manager', $user->departments->pluck('pivot.level')) // Cấp quản lý
        ->whereIn('status', ['pending', 'processing'])
            ->paginate(10);

        return view('livewire.approve-tickets', [
            'tickets' => $tickets
        ]);
    }
}
