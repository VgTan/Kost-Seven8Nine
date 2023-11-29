<?php

namespace App\Livewire;

use App\Models\BranchRoom;
use App\Models\Room;
use Livewire\Component;

class FindRoom extends Component
{
    public $search;

    public function updatingSearch()
    {
        $this->resetPage();
        $this->redirect('/');
    }
    public function render()
    {
        $room = BranchRoom::where('room_type', 'like', '%' . $this->search . '%')
        ->orWhere('branch_name', 'like', '%' . $this->search . '%');
        return view('livewire.find-room', compact('room'));
    }
}