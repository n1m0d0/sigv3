<?php

namespace App\Http\Livewire;

use App\Models\Ability;
use App\Models\AbilityPerson as AP;
use Livewire\Component;

class AbilityPerson extends Component
{
    public $person_id;
    public $habilidad;

    public function mount()
    {
        $this->person_id = auth()->user()->person->id;
    }

    public function render()
    {
        $abilities = Ability::all();
        $abilitiesPerson = AP::where('person_id', $this->person_id)->get();
        return view('livewire.ability-person', compact('abilities', 'abilitiesPerson'));
    }

    public function addAbility()
    {
        $this->validate([
            'habilidad' => 'required'
        ]);

        $abilitiesPerson =  new AP();
        $abilitiesPerson->person_id = $this->person_id;
        $abilitiesPerson->ability_id = $this->habilidad;
        $abilitiesPerson->estado = "ACTIVO";
        $abilitiesPerson->save();

        $this->clearAbility();
    }

    public function clearAbility()
    {
        $this->reset(['habilidad']);           
    }
}
