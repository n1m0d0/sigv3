<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ReportPerson extends Component
{
    public $people;
    public function render()
    {
        return view('livewire.report-person');
    }
}
