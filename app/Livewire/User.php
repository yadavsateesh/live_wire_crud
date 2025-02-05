<?php

namespace App\Livewire;

use Livewire\Component;

class User extends Component
{
	public $name = ['sateesh','yadav','suraj'];
	
    public function render()
    {
        return view('livewire.user');
    }
}
