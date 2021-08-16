<?php

namespace App\Http\Livewire;

use App\Models\CareerPerson;
use App\Models\Person;
use App\Models\Vacancy;
use Livewire\Component;
use Illuminate\Database\Eloquent\Builder;

class ListVacancy extends Component
{
    public $vacancies;
    public $ventana = 1;
    public $vacancia;
    public $data;
    public $people;

    public function render()
    {
        return view('livewire.list-vacancy');
    }

    public function searchPeople($id)
    {
        $this->vacancia = Vacancy::find($id);
        $this->ventana = 2;
        /*$this->people = Person::whereHas('careers', function ($query) {
            $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Profecional');
        })->get();*/
        if ($this->vacancia->grado_academico == 'Profesional') {
            //$this->careers = CareerPerson::where('career_id', $this->vacancia->career_id)->where('grado_academico', '!=', 'Egresado')->where('grado_academico', '!=', 'Bachillerato')->where('grado_academico', '!=', 'Técnico')->get();
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', '!=', 'Egresado')->where('grado_academico', '!=', 'Bachillerato')->where('grado_academico', '!=', 'Técnico');
            })->get();
        }
        if ($this->vacancia->grado_academico == 'Egresado') {
            //$this->careers = CareerPerson::where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Egresado')->get();
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Egresado');
            })->get();
        }
        if ($this->vacancia->grado_academico == 'Técnico') {
            //$this->careers = CareerPerson::where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Técnico')->get();
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Técnico');
            })->get();
        }
        if ($this->vacancia->grado_academico == 'Bachillerato') {
            //$this->careers = CareerPerson::where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Bachillerato')->get();
            $this->people = Person::whereHas('careers', function ($query) {
                $query->where('career_id', $this->vacancia->career_id)->where('grado_academico', 'Bachillerato');
            })->get();
        }
    }
}
