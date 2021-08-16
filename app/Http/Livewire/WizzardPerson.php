<?php

namespace App\Http\Livewire;

use App\Models\Career;
use App\Models\CareerPerson;
use App\Models\Contact;
use App\Models\Decendant;
use App\Models\Department;
use App\Models\Experience;
use App\Models\Person;
use App\Models\PersonProblem;
use App\Models\Problem;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;

class WizzardPerson extends Component
{

    use WithFileUploads;
    use WithPagination;

    //variables iniciales
    public $person;
    public $person_id;
    public $step;

    //varaibales de persona
    public $ci;
    public $expedido;
    public $genero;
    public $edad;
    public $nacimiento;
    public $departamento;
    public $direccion;
    public $estadoCivil;
    public $hijos;
    public $discapacidad;
    public $tipoDiscapacidad;
    public $archivod;
    public $telefonoPersona;

    //variables hijos
    public $nombreHijo;
    public $nacimientoHijo;
    public $archivoHijo;

    //variables dificultad
    public $problema;
    public $detalle;

    //variables de contacto;
    public $nombreContacto;
    public $paternoContacto;
    public $maternoContacto;
    public $telefonoContacto;

    //variables de formacion profesional
    public $carrera;
    public $institutionFormacion;
    public $gradoFormacion;
    public $egresoFormacion;
    public $archivoFormacion;

    //variables de experiencia laboral
    public $institutionLaboral;
    public $cargoLaboral;
    public $experienciaLaboral;
    public $archivoLaboral;

    //variables de referencia laboral
    public $institutionReferencia;
    public $nombreReferencia;
    public $paternoReferencia;
    public $maternoReferencia;
    public $telefonoReferencia;

    public function render()
    {


        $departments = Department::all();
        $problems = Problem::all();
        $decendants = Decendant::where('person_id', $this->person_id)->get();
        $difficulties = PersonProblem::where('person_id', $this->person_id)->get();
        $personContacts = Contact::where('person_id', $this->person_id)->where('institution', null)->get();
        $careers = Career::all();
        $studies = CareerPerson::where('person_id', $this->person_id)->get();
        $experiences = Experience::where('person_id', $this->person_id)->get();
        $contacts = Contact::where('person_id', $this->person_id)->where('institution', '!=', null)->get();
        return view('livewire.wizzard-person', compact('departments', 'problems', 'decendants', 'difficulties', 'personContacts', 'careers', 'studies', 'experiences', 'contacts'));
    }

    //steps 
    public function step1()
    {
        $this->step = 1;
    }

    public function step2()
    {
        $this->step = 2;
    }

    public function step3()
    {
        $this->step = 3;
    }

    public function step4()
    {
        $this->step = 4;
    }

    public function step5()
    {
        $this->step = 5;
    }

    public function mount()
    {
        $this->ci = $this->person->ci;
        $this->expedido = $this->person->expedido;
        $this->genero = $this->person->genero;
        $this->edad = $this->person->edad;
        $this->nacimiento = $this->person->nacimiento;
        $this->departamento = $this->person->department_id;
        $this->direccion = $this->person->direccion;
        $this->estadoCivil = $this->person->estado_civil;
        $this->hijos = $this->person->hijos;
        $this->discapacidad = $this->person->discapacidad;
        $this->tipoDiscapacidad = $this->person->tipo_discapacidad;
        $this->telefonoPersona = $this->person->telefono;
        //$this->archivod = $this->person->archivod;
    }

    public function saveHijo()
    {
        $this->validate([
            'nombreHijo' => 'required',
            'nacimientoHijo' => 'required|date',
            'archivoHijo' => 'required|image|max:5120'
        ]);
        $decendant = new Decendant();
        $decendant->person_id = $this->person_id;
        $decendant->nombre = $this->nombreHijo;
        $decendant->nacimiento = $this->nacimientoHijo;
        $decendant->certificado = $this->archivoHijo->store('public');
        $decendant->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultHijo();
    }

    public function defaultHijo()
    {
        $this->nombreHijo = "";
        $this->nacimientoHijo = "";
        $this->archivoHijo = null;
    }

    public function saveDifficulty()
    {
        $this->validate([
            'problema' => 'required',
            'detalle' => 'required'
        ]);
        $difficulty = new PersonProblem();
        $difficulty->person_id = $this->person_id;
        $difficulty->problem_id = $this->problema;
        $difficulty->detalle = $this->detalle;
        $difficulty->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultDifficulty();
    }

    public function defaultDifficulty()
    {
        $this->problema = "";
        $this->detalle = "";
    }

    public function updatePerson()
    {
        $this->validate([
            'ci' => 'required',
            'expedido' => 'required',
            'genero' => 'required',
            'edad' => 'required|numeric',
            'nacimiento' => 'required|date',
            'departamento' => 'required',
            'direccion' => 'required',
            'hijos' => 'required',
            'estadoCivil' => 'required',
            'telefonoPersona' => 'required|numeric'
        ]);

        $person = Person::find($this->person_id);
        $person->ci = $this->ci;
        $person->expedido = $this->expedido;
        $person->genero = $this->genero;
        $person->edad = $this->edad;
        $person->nacimiento = $this->nacimiento;
        $person->department_id = $this->departamento;
        $person->direccion = $this->direccion;
        $person->hijos = $this->hijos;
        $person->estado_civil = $this->estadoCivil;
        $person->telefono = $this->telefonoPersona;
        $person->step = 2;
        $person->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->step2();
    }

    public function updateDiscapacidad()
    {
        if ($this->discapacidad) {
            $this->validate([
                'tipoDiscapacidad' => 'required',
                'archivod' => 'required|image|max:5120'
            ]);
            $person = Person::find($this->person_id);
            $person->discapacidad = $this->discapacidad;
            $person->tipo_discapacidad = $this->tipoDiscapacidad;
            $person->certificado_discapacidad = $this->archivod->store('public');
            $person->save();
        } else {
            $this->validate([
                'discapacidad' => 'required',
            ]);
            $person = Person::find($this->person_id);
            $person->discapacidad = $this->discapacidad;
            $person->save();
        }

        session()->flash('message', 'Los datos se guardaron correctamente.');
    }

    public function contactoPersonal()
    {
        $this->validate([
            'nombreContacto' => 'required',
            'paternoContacto' => 'required',
            'maternoContacto' => 'required',
            'telefonoContacto' => 'required|numeric'
        ]);

        $contact = new Contact();
        $contact->person_id = $this->person_id;
        $contact->nombre = $this->nombreContacto;
        $contact->paterno = $this->paternoContacto;
        $contact->materno = $this->maternoContacto;
        $contact->telefono = $this->telefonoContacto;
        $contact->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultContactoPersonal();
    }

    public function defaultContactoPersonal()
    {
        $this->nombreContacto = "";
        $this->paternoContacto = "";
        $this->maternoContacto = "";
        $this->telefonoContacto = "";
    }

    public function updateStep3()
    {
        if ($this->discapacidad) {
            $this->validate([
                'tipoDiscapacidad' => 'required',
                'archivod' => 'required|image|max:5120'
            ]);
        } else {
            $this->validate([
                'discapacidad' => 'required',
            ]);
        }

        $person = Person::find($this->person_id);
        $person->discapacidad = $this->discapacidad;
        $person->step = 3;
        $person->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->step3();
    }

    public function formacion()
    {
        $this->validate([
            'carrera' => 'required',
            'institutionFormacion' => 'required',
            'gradoFormacion' => 'required',
            'egresoFormacion' => 'required',
            'archivoFormacion' => 'required|image|max:5120'
        ]);

        $study = new CareerPerson();
        $study->person_id = $this->person_id;
        $study->career_id = $this->carrera;
        $study->institution = $this->institutionFormacion;
        $study->grado_academico = $this->gradoFormacion;
        $study->egreso = $this->egresoFormacion;
        $study->certificado = $this->archivoFormacion->store('public');
        $study->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->defaultFormacion();
    }

    public function defaultFormacion()
    {
        $this->career_id = "";
        $this->institutionFormacion = "";
        $this->gradoFormacion = "";
        $this->egresoFormacion = "";
        $this->archivoFormacion = "";
    }

    public function updateStep4()
    {
        $person = Person::find($this->person_id);
        $person->step = 4;
        $person->save();

        $this->step4();
    }

    public function experiencia()
    {
        $this->validate([
            'institutionLaboral' => 'required',
            'cargoLaboral' => 'required',
            'experienciaLaboral' => 'required|numeric',
            'archivoLaboral' => 'required|image|max:5120'
        ]);

        $experience = new Experience();
        $experience->person_id = $this->person_id;
        $experience->institution = $this->institutionLaboral;
        $experience->cargo = $this->cargoLaboral;
        $experience->experiencia = $this->experienciaLaboral;
        $experience->certificado = $this->archivoLaboral->store('pubic');
        $experience->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->clearExperiencia();
    }

    public function clearExperiencia()
    {
        $this->institutionLaboral = "";
        $this->cargoLaboral = "";
        $this->experienciaLaboral = "";
        $this->archivoLaboral = "";
    }

    public function updateStep5()
    {
        $person = Person::find($this->person_id);
        $person->step = 5;
        $person->save();

        $this->step5();
    }

    public function referencia()
    {
        $this->validate([
            'institutionReferencia' => 'required',
            'nombreReferencia' => 'required',
            'paternoReferencia' => 'required',
            'maternoReferencia' => 'required',
            'telefonoReferencia' => 'required|numeric'
        ]);

        $contact = new Contact();
        $contact->person_id = $this->person_id;
        $contact->institution = $this->institutionReferencia;
        $contact->nombre = $this->nombreReferencia;
        $contact->paterno = $this->paternoReferencia;
        $contact->materno = $this->maternoReferencia;
        $contact->telefono = $this->telefonoReferencia;
        $contact->save();

        session()->flash('message', 'Los datos se guardaron correctamente.');

        $this->clearReferencia();
    }

    public function clearReferencia()
    {
        $this->institutionReferencia = "";
        $this->nombreReferencia = "";
        $this->paternoReferencia = "";
        $this->maternoReferencia = "";
        $this->telefonoReferencia = "";
    }
}
