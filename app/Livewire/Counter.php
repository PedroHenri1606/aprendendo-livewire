<?php

namespace App\Livewire;

use Livewire\Component;

class Counter extends Component
{

    public $counter = 0;

    public function render()
    {
        return view('livewire.counter');
    }

    public function increment(){
        return $this->counter++;
    }

    public function decrement(){
        return $this->counter--;
    }
}
