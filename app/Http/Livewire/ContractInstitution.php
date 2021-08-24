<?php

namespace App\Http\Livewire;

use App\Models\Contract;
use App\Models\Payroll;
use App\Models\Vacancy;
use Livewire\Component;

class ContractInstitution extends Component
{
    public $ventana = 1;
    public $vacancia_id;
    public $payrolls;
    public $payroll_id;
    public $contrato;
    public $codigo;

    public function render()
    {
        if ($this->vacancia_id != null) {
            $this->ventana = 2;
            $this->payrolls = Payroll::where('vacancy_id', $this->vacancia_id)->where('estado', "ACTIVO")->get();
        }
        $vacancies = Vacancy::where('estado', "ACTIVO")->get();
        return view('livewire.contract-institution', compact('vacancies'));
    }

    public function addContract()
    {
        $payrolls = Payroll::find($this->payroll_id);
        $contract = new Contract();
    }
}
