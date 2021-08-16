<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Person;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Mail;

class RegisterPersonController extends Controller
{
    public function person()
    {
        $person = Person::find(auth()->user()->person_id);
        return view('pages.dataPerson', compact("person"));
    }

    public function register()
    {
        return view('pages.registerPerson');
    }

    public function store(Request $request)
    {
        $rules = [
            'nombres' => 'required',
            'paterno' => 'required',
            'materno' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'captcha' => 'required|captcha'
        ];

        $request->validate($rules);

        DB::beginTransaction();

        try {
            $person = new Person();
            $person->nombres = $request->nombres;
            $person->paterno = $request->paterno;
            $person->materno = $request->materno;
            $person->save();

            $user = new User();
            $user->person_id = $person->id;
            $user->email = $request->email;
            $user->password = bcrypt($request->password);
            $user->codigo = Str::uuid()->toString();
            $user->save();

            $user->assignRole('persona');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->intended('/')->with("alert", "El correo ya esta en uso");
        }

        DB::commit();
        
        /*$subject = "Prueba";
        $for = $request->email;
        Mail::send('layout.email',$request->all(), function($msj) use($subject,$for){
            $msj->from("registro.pge@planificacion.gob.bo","SIGv2");
            $msj->subject($subject);
            $msj->to($for);
        });*/

        return redirect()->intended('/')->with("message", "Registrado correctamente");
    }
}
