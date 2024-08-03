<?php

namespace App\Livewire\Job;

use Livewire\Component;

class Show extends Component
{
    public function render()
    {
        return view('livewire.job.show')
        ->layout('layouts.app'); 
    }
}
