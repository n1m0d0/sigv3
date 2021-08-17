<?php

namespace App\Http\Livewire;

use App\Models\CareerPerson;
use App\Models\Department;
use App\Models\Person;
use App\Models\Vacancy;
use Livewire\Component;

class ListVacancy extends Component
{
    public $vacancies;
    public $ventana = 1;
    public $vacancia;
    public $data;
    public $people;
    public $departamento;

    public function render()
    {
        $departments = Department::all();
        return view('livewire.list-vacancy', compact('departments'));
    }

    public function searchPeople($id)
    {
        $this->vacancia = Vacancy::find($id);
        $this->ventana = 2;
        /*$this->people = Person::whereHas('careers', function ($query) {
            $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Profecional');
        })->get();*/
        if ($this->vacancia->grado_academico == 'Profesional') {
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', '!=', 'Egresado')->where('grado_academico', '!=', 'Bachillerato')->where('grado_academico', '!=', 'Técnico');
            })->where('department_id', $this->vacancia->branch->department_id)->get();
        }
        if ($this->vacancia->grado_academico == 'Egresado') {
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Egresado');
            })->where('department_id', $this->vacancia->branch->department_id)->get();
        }
        if ($this->vacancia->grado_academico == 'Técnico') {
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Técnico');
            })->where('department_id', $this->vacancia->branch->department_id)->get();
        }
        if ($this->vacancia->grado_academico == 'Bachillerato') {
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Bachillerato');
            })->where('department_id', $this->vacancia->branch->department_id)->get();
        }
    }
}
