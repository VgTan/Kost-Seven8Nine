<?php

namespace App\Livewire;

use Livewire\Component;

class UserForm extends Component
{
    public $name;
    public function render()
    {
        return view('livewire.user-form');
    }
}
