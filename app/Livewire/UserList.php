<?php

namespace App\Livewire;

use Livewire\Component;

class UserList extends Component
{
	public $user;
	
	function mount($user){
		$this->user=$user;
	}
    public function render()
    {
        return view('livewire.user-list');
    }
}
