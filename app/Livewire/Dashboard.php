<?php

namespace App\Livewire;

use Livewire\Component;

class Dashboard extends Component
{
    public $currentView = 'message';

    public function changeView($view)
    {
        $this->currentView = $view;
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}