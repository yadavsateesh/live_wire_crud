<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{
	public $msg="hello sateesh ji";
	
	public $name ="Intial name";
	
	public $counter;
	
    public function render()
    {
        return view('livewire.counter');
    }
	
	public function update($name){
		$this->msg=$name;
	}
	
	public function mount(){
		$this->name="Hello user";
	}
	
	public function hydrate(){
		$this->counter++;
	}
	
	
}
