<?php

namespace App\Http\Livewire;

use App\Models\Ability;
use App\Models\AbilityVacancy as AV;
use App\Models\Vacancy;
use Livewire\Component;

class AbilityVacancy extends Component
{
    public $vacancia;
    public $habilidad;
    public $prueba;

    public function render()
    {
        $vacancies = Vacancy::where('estado', "ACTIVO")->get();
        $abilities = Ability::all();
        $abilitiesVacancy = Av::orderBy('vacancy_id', 'DESC')->get();
        return view('livewire.ability-vacancy', compact('vacancies', 'abilities', 'abilitiesVacancy'));
    }

    public function addAbility()
    {
        $this->validate([
            'vacancia' => 'required',
            'habilidad' => 'required'
        ]);

        $abilitiesVacancy =  new AV();
        $abilitiesVacancy->vacancy_id = $this->vacancia;
        $abilitiesVacancy->ability_id = $this->habilidad;
        //$abilitiesVacancy->estado = "ACTIVO";
        $abilitiesVacancy->save();

        $this->clearAbility();
    }

    public function clearAbility()
    {
        $this->reset(['habilidad']);           
    }
}
