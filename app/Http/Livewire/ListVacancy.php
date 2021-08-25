<?php

namespace App\Http\Livewire;

use App\Models\CareerPerson;
use App\Models\Department;
use App\Models\Payroll;
use App\Models\Person;
use App\Models\Vacancy;
use Livewire\Component;

class ListVacancy extends Component
{
    public $vacancies;
    public $vacancia_id;
    public $ventana = 1;
    public $vacancia;
    public $data;
    public $people;
    public $departamento;
    public $person_id;
    public $ver;
    public $listacorta;

    public function render()
    {
        if ($this->vacancia_id != null) {
            $this->vacancia = Vacancy::find($this->vacancia_id);
            $this->ventana = 2;
            /*$this->people = Person::whereHas('careers', function ($query) {
            $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Profecional');
        })->get();*/
            if ($this->vacancia->grado_academico == 'Profesional') {
                $this->people = Person::whereHas('careers', function ($query) {
                    $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', '!=', 'Egresado')->where('grado_academico', '!=', 'Bachillerato')->where('grado_academico', '!=', 'Técnico');
                })->where('department_id', $this->vacancia->branch->department_id)->where('estado', '!=', 'SELECCIONADO')->where('estado', '!=', 'BENEFICIADO')->get();
            }
            if ($this->vacancia->grado_academico == 'Egresado') {
                $this->people = Person::whereHas('careers', function ($query) {
                    $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Egresado');
                })->where('department_id', $this->vacancia->branch->department_id)->where('estado', '!=', 'SELECCIONADO')->where('estado', '!=', 'BENEFICIADO')->get();
            }
            if ($this->vacancia->grado_academico == 'Técnico') {
                $this->people = Person::whereHas('careers', function ($query) {
                    $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Técnico');
                })->where('department_id', $this->vacancia->branch->department_id)->where('estado', '!=', 'SELECCIONADO')->where('estado', '!=', 'BENEFICIADO')->get();
            }
            if ($this->vacancia->grado_academico == 'Bachillerato') {
                $this->people = Person::whereHas('careers', function ($query) {
                    $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Bachillerato');
                })->where('department_id', $this->vacancia->branch->department_id)->where('estado', '!=', 'SELECCIONADO')->where('estado', '!=', 'BENEFICIADO')->get();
            }
        }
        if($this->ver != null){
            $this->ventana = 3;
            $this->listacorta = Payroll::where('vacancy_id', $this->ver)->get();
        }
        return view('livewire.list-vacancy');
    }

    public function addPayroll($person_id)
    {

        $verificar = Payroll::where('vacancy_id', $this->vacancia->id)->where('estado', "ACTIVO")->count();
        if ($verificar < 3) {
            $payroll = new Payroll();
            $payroll->person_id = $person_id;
            $payroll->vacancy_id = $this->vacancia->id;
            $payroll->save();

            $person = Person::find($person_id);
            $person->estado = "SELECCIONADO";
            $person->save();
            session()->flash('message', 'Los datos se guardaron correctamente.');
        } else {
            session()->flash('alert', 'La lista ya tiene 3 personas asignadas.');
        }
    }

    public function removePayroll($payroll_id){
        $payroll = Payroll::find($payroll_id);
        $payroll->estado = "INACTIVO";
        $payroll->save();
        $person = Person::find($payroll->person_id);
        $person->estado = "REGISTRADO";
        $person->save();
        session()->flash('alert', 'El usuario a sido retirado de la lista');
    }
}
