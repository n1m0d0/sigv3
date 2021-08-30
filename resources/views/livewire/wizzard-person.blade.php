<div>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    @if ($step == 1)
        <div class="box py-10 sm:py-20 mt-5">
            <div class="flex justify-center">
                <button type="button" class="w-10 h-10 rounded-full btn btn-primary mx-2">1</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">2</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">3</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">4</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">5</button>
            </div>
            <div class="px-5 mt-10">
                <div class="font-medium text-center text-lg">Completa datos personales</div>
            </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                <div class="font-medium text-base">Datos complementarios</div>
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">CI</label>
                        <input wire:model="ci" type="text" class="form-control" placeholder="1234567">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Expedido</label>
                        <select wire:model="expedido" class="form-select">
                            <option value="">Seleccione un opcion</option>
                            <option>CH</option>
                            <option>LP</option>
                            <option>CB</option>
                            <option>OR</option>
                            <option>PT</option>
                            <option>TJ</option>
                            <option>SC</option>
                            <option>BE</option>
                            <option>PD</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label>Genero</label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="form-check mr-2">
                                <input wire:model="genero" class="form-check-input" type="radio" name="masculino"
                                    value="H">
                                <label class="form-check-label">Masculino</label>
                            </div>
                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                <input wire:model="genero" class="form-check-input" type="radio" name="femenino"
                                    value="M">
                                <label class="form-check-label">Femenino</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Edad</label>
                        <input wire:model="edad" type="text" class="form-control" placeholder="22">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Fecha de Nacimiento</label>
                        <input wire:model="nacimiento" class="form-control block mx-auto" type="date">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Departamento</label>
                        <select wire:model="departamento" class="form-select">
                            <option value="">Seleccione un opcion</option>
                            @foreach ($departments as $department)
                                <option value="{{ $department->id }}">{{ $department->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label class="form-label">Direccion</label>
                        <input wire:model="direccion" type="text" class="form-control" placeholder="Av. central">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Estado Civil</label>
                        <select wire:model='estadoCivil' class="form-select">
                            <option value="">Seleccione un opcion</option>
                            <option>Soltero</option>
                            <option>Casado</option>
                            <option>Viudo</option>
                            <option>Divorciado</option>
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label>Es Madre/Padre/Ambos</label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="form-check mr-2">
                                <input wire:model='hijos' class="form-check-input" type="radio" name="genero_Si"
                                    value="1">
                                <label class="form-check-label">Si</label>
                            </div>
                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                <input wire:model='hijos' class="form-check-input" type="radio" name="genero_No"
                                    value="0">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Telefono</label>
                        <input wire:model="telefonoPersona" type="text" class="form-control" placeholder="2212563">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                    </div>
                    @if ($hijos == 1)
                        <div class="grid grid-cols-12 gap-4 items-center col-span-12 sm:col-span-12">
                            <div class="col-span-12 sm:col-span-3">
                                <label class="form-label">Nombre del hijo(a)</label>
                                <input wire:model="nombreHijo" type="text" class="form-control" placeholder="jose">
                            </div>
                            <div class="col-span-12 sm:col-span-3">
                                <label class="form-label">Fecha de Nacimiento</label>
                                <input wire:model="nacimientoHijo" class="form-control block mx-auto" type="date">
                            </div>
                            <div class="col-span-12 sm:col-span-3">
                                <label class="form-label">Certificado</label>
                                <input wire:model='archivoHijo' type="file" class="form-control" placeholder="22">
                            </div>
                            <div class="col-span-12 sm:col-span-3 pt-6">
                                <button wire:click='saveHijo' class="btn btn-secondary">Añadir</button>
                            </div>
                            <div class="col-span-12 overflow-x-auto pt-4">
                                <table class="table col-span-12 sm:col-span-12">
                                    <thead>
                                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                            <th class="whitespace-nowrap">#</th>
                                            <th class="whitespace-nowrap">Nombre hijo(a)</th>
                                            <th class="whitespace-nowrap">Fecha de Nacimiento</th>
                                            <th class="whitespace-nowrap">Certificado</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($decendants as $decendant)
                                            <tr>
                                                <td class="border-b dark:border-dark-5">{{ $decendant->id }}</td>
                                                <td class="border-b dark:border-dark-5">{{ $decendant->nombre }}</td>
                                                <td class="border-b dark:border-dark-5">{{ $decendant->nacimiento }}
                                                </td>
                                                <td class="border-b dark:border-dark-5">
                                                    <x-feathericon-check-circle class="w-4 h-4" />
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    @endif
                    <div class="col-span-12 sm:col-span-4">
                        <label class="form-label">Dificultad para conseguir
                            trabajo</label>
                        <select wire:model="problema" class="form-select">
                            <option value="">Seleccione un opcion</option>
                            @foreach ($problems as $problem)
                                <option value="{{ $problem->id }}">{{ $problem->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-span-12 sm:col-span-4">
                        <label class="form-label">Detalle</label>
                        <input wire:model='detalle' type="text" class="form-control"
                            placeholder="Detalle de la dificultad">
                    </div>
                    <div class="col-span-12 sm:col-span-4 pt-6">
                        <button wire:click='saveDifficulty' class="btn btn-secondary">Añadir</button>
                    </div>
                    <div class="col-span-12 overflow-x-auto pt-4">
                        <table class="table col-span-12 sm:col-span-12">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Dificultad</th>
                                    <th class="whitespace-nowrap">Detalle</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($difficulties as $difficulty)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{ $difficulty->id }}</td>
                                        <td class="border-b dark:border-dark-5">{{ $difficulty->problem->nombre }}
                                        </td>
                                        <td class="border-b dark:border-dark-5">{{ $difficulty->detalle }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-12 sm:col-span-6">
                        <label>Presenta alguna Discapacidad</label>
                        <div class="flex flex-col sm:flex-row mt-2">
                            <div class="form-check mr-2">
                                <input wire:model='discapacidad' class="form-check-input" type="radio"
                                    name="discapacidadSi" value="1">
                                <label class="form-check-label">Si</label>
                            </div>
                            <div class="form-check mr-2 mt-2 sm:mt-0">
                                <input wire:model='discapacidad' class="form-check-input" type="radio"
                                    name="discapacidadNo" value="0">
                                <label class="form-check-label">No</label>
                            </div>
                        </div>
                    </div>
                    @if ($discapacidad)
                        <form class="col-span-12 gap-2 sm:col-span-12 flex items-center"
                            wire:submit.prevent="updateDiscapacidad" enctype="multipart/form-data">
                            <div class="col-span-12 sm:col-span-3">
                                <label for="input-wizard-3" class="form-label">Cual?</label>
                                <select wire:model="tipoDiscapacidad" class="form-select">
                                    <option value="">Seleccione un opcion</option>
                                    <option>Físico</option>
                                    <option>Motora</option>
                                    <option>Intelectual</option>
                                    <option>Auditiva</option>
                                    <option>Visual</option>
                                    <option>Mental/psíquica</option>
                                    <option>Múltiple</option>
                                </select>
                            </div>
                            <div class="col-span-12 sm:col-span-3">
                                <label for="input-wizard-3" class="form-label">Adjuntar</label>
                                <input wire:model='archivod' type="file" class="form-control" placeholder="22">
                            </div>
                            <div class="col-span-12 sm:col-span-3 pt-6">
                                <button type="submit" class="btn btn-secondary">Guardar</button>
                            </div>
                        </form>
                    @endif
                    <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button wire:click="updatePerson" class="btn btn-primary w-24 ml-2">Next</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($step == 2)
        <div class="box py-10 sm:py-20 mt-5">
            <div class="flex justify-center">
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">1</button>
                <button type="button" class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2">2</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">3</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">4</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">5</button>
            </div>
            <div class="px-5 mt-10">
                <div class="font-medium text-center text-lg">Datos de Referencia Personal</div>
            </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    
                    <div class="font-medium text-justify text-lg col-span-12 sm:col-span-12">Persona de Contacto</div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Nombres</label>
                        <input wire:model='nombreContacto' type="text" class="form-control" placeholder="Jorge">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Apellido Paterno</label>
                        <input wire:model='paternoContacto' type="text" class="form-control" placeholder="Perez">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Apellido Materno</label>
                        <input wire:model='maternoContacto' type="text" class="form-control" placeholder="Perez">
                    </div>
                    <div class="col-span-12 sm:col-span-3">
                        <label class="form-label">Telefono</label>
                        <input wire:model='telefonoContacto' type="text" class="form-control" placeholder="73087144">
                    </div>
                    <div class="col-span-12 sm:col-span-3 pt-6">
                        <button wire:click='contactoPersonal' class="btn btn-secondary">Añadir</button>
                    </div>
                    <div class="col-span-12 overflow-x-auto pt-4">
                        <table class="table col-span-12 sm:col-span-12">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Nombre Completo</th>
                                    <th class="whitespace-nowrap">Telefono</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($personContacts as $personContact)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{ $personContact->id }}</td>
                                        <td class="border-b dark:border-dark-5">{{ $personContact->nombre }}
                                            {{ $personContact->paterno }} {{ $personContact->materno }}</td>
                                        <td class="border-b dark:border-dark-5">{{ $personContact->telefono }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button type="button" wire:click="step1" class="btn btn-secondary w-24">Previous</button>
                        <button type="button" wire:click="updateStep3" class="btn btn-primary w-24 ml-2">Next</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($step == 3)
        <form wire:submit.prevent="formacion" enctype="multipart/form-data">
            <div class="box py-10 sm:py-20 mt-5">
                <div class="flex justify-center">
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">1</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">2</button>
                    <button type="button" class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2">3</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">4</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">5</button>
                </div>
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">Formacion Profesional</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Institución</label>
                            <input wire:model='institutionFormacion' type="text" class="form-control"
                                placeholder="Univalle">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Carrera</label>
                            <select wire:model="carrera" class="form-select">
                                <option value="">Seleccione un opcion</option>
                                @foreach ($careers as $career)
                                    <option value="{{ $career->id }}">{{ $career->nombre }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Grado Académico</label>
                            <select wire:model='gradoFormacion' class="form-select">
                                <option value="">Seleccione un opcion</option>
                                <option>Bachillerato</option>
                                <option>Egresado</option>
                                <option>Licenciatura</option>
                                <option>Técnico</option>
                                <option>Diplomado</option>
                                <option>Maestría</option>
                                <option>Doctorado</option>
                                <option>Especialidad</option>
                            </select>
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Fecha de Titulación / Egreso</label>
                            <input wire:model='egresoFormacion' class="form-control block mx-auto" type="date">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Titulo / Certificado Académico</label>
                            <input wire:model='archivoFormacion' type="file" class="form-control">
                        </div>
                        <div class="col-span-12 sm:col-span-3 pt-6">
                            <button type="submit" class="btn btn-secondary">Añadir</button>
                        </div>
                        <div class="col-span-12 overflow-x-auto pt-4">
                            <table class="table col-span-12 sm:col-span-12">
                                <thead>
                                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                        <th class="whitespace-nowrap">#</th>
                                        <th class="whitespace-nowrap">Institución Educativa</th>
                                        <th class="whitespace-nowrap">Carrera</th>
                                        <th class="whitespace-nowrap">Grado Académico</th>
                                        <th class="whitespace-nowrap">Fecha de Egreso</th>
                                        <th class="whitespace-nowrap">Titulo / Certificado Académico</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($studies as $study)
                                        <tr>
                                            <td class="border-b dark:border-dark-5">{{ $study->id }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $study->career->nombre }}</td>
                                            <td class="border-b dark:border-dark-5">
                                                {{ $study->institution }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $study->grado_academico }}
                                            </td>
                                            <td class="border-b dark:border-dark-5">{{ $study->egreso }}</td>
                                            <td class="border-b dark:border-dark-5">
                                                <x-feathericon-check-circle class="w-4 h-4" />
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button type="button" wire:click='step2' class="btn btn-secondary w-24">Previous</button>
                            <button type="button" wire:click='updateStep4'
                                class="btn btn-primary w-24 ml-2">Next</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
    @if ($step == 4)
        <div class="box py-10 sm:py-20 mt-5">
            <div class="flex justify-center">
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">1</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">2</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">3</button>
                <button type="button" class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2">4</button>
                <button type="button"
                    class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">5</button>
            </div>
            <div class="px-5 mt-10">
                <div class="font-medium text-center text-lg">Experiencia Laboral</div>
            </div>
            <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                    <form class="col-span-12 grid grid-cols-12 gap-2 sm:col-span-12 flex items-center"
                        wire:submit.prevent="experiencia" enctype="multipart/form-data">
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Institución</label>
                            <input wire:model='institutionLaboral' type="text" class="form-control" placeholder="EPSAS">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Cargo</label>
                            <input wire:model='cargoLaboral' type="text" class="form-control" placeholder="Analista">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Años de Experiencia</label>
                            <input wire:model='experienciaLaboral' type="text" class="form-control" placeholder="Numero entero ejemplo 6">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Certificado de trabajo</label>
                            <input wire:model='archivoLaboral' type="file" class="form-control" placeholder="22">
                        </div>
                        <div class="col-span-12 sm:col-span-3 pt-6">
                            <button type="submit" class="btn btn-secondary">Añadir</button>
                        </div>
                    </form>
                    <div class="col-span-12 overflow-x-auto pt-4">
                        <table class="table col-span-12 sm:col-span-12">
                            <thead>
                                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                    <th class="whitespace-nowrap">#</th>
                                    <th class="whitespace-nowrap">Institución</th>
                                    <th class="whitespace-nowrap">Cargo</th>
                                    <th class="whitespace-nowrap">Años de Experiencia</th>
                                    <th class="whitespace-nowrap">certificado</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($experiences as $experience)
                                    <tr>
                                        <td class="border-b dark:border-dark-5">{{ $experience->id }}</td>
                                        <td class="border-b dark:border-dark-5">
                                            {{ $experience->institution }}</td>
                                        <td class="border-b dark:border-dark-5">{{ $experience->cargo }}</td>
                                        <td class="border-b dark:border-dark-5">{{ $experience->experiencia }}</td>
                                        <td class="border-b dark:border-dark-5">
                                            <x-feathericon-check-circle class="w-4 h-4" />
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
                        <button wire:click='step3' class="btn btn-secondary w-24">Previous</button>
                        <button wire:click="updateStep5" class="btn btn-primary w-24 ml-2">Next</button>
                    </div>
                </div>
            </div>
        </div>
    @endif
    @if ($step == 5)
        <form wire:submit.prevent="submit">
            <div class="box py-10 sm:py-20 mt-5">
                <div class="flex justify-center">
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">1</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">2</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">3</button>
                    <button type="button"
                        class="w-10 h-10 rounded-full btn bg-gray-200 dark:bg-dark-1 text-gray-600 mx-2">4</button>
                    <button type="button" class="intro-y w-10 h-10 rounded-full btn btn-primary mx-2">5</button>
                </div>
                <div class="px-5 mt-10">
                    <div class="font-medium text-center text-lg">Datos de Referencia Laboral</div>
                </div>
                <div class="px-5 sm:px-20 mt-10 pt-10 border-t border-gray-200 dark:border-dark-5">
                    <div class="grid grid-cols-12 gap-4 gap-y-5 mt-5">
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Institución</label>
                            <input wire:model='institutionReferencia' type="text" class="form-control"
                                placeholder="EPSAS">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Nombres</label>
                            <input wire:model='nombreReferencia' type="text" class="form-control" placeholder="Jorge">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Apellido Paterno</label>
                            <input wire:model='paternoReferencia' type="text" class="form-control" placeholder="Vargas">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Apellido Materno</label>
                            <input wire:model='maternoReferencia' type="text" class="form-control" placeholder="Pozo">
                        </div>
                        <div class="col-span-12 sm:col-span-3">
                            <label class="form-label">Teléfono</label>
                            <input wire:model='telefonoReferencia' type="text" class="form-control"
                                placeholder="2214589">
                        </div>
                        <div class="col-span-12 sm:col-span-1 pt-6">
                            <a wire:click='referencia' class="btn btn-secondary">Añadir</a>
                        </div>
                        <div class="col-span-12 overflow-x-auto pt-4">
                            <table class="table col-span-12 sm:col-span-12">
                                <thead>
                                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                                        <th class="whitespace-nowrap">#</th>
                                        <th class="whitespace-nowrap">Institucion</th>
                                        <th class="whitespace-nowrap">Nombres</th>
                                        <th class="whitespace-nowrap">Apellido Paterno</th>
                                        <th class="whitespace-nowrap">Apellido Materno</th>
                                        <th class="whitespace-nowrap">Teléfono</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($contacts as $contact)
                                        <tr>
                                            <td class="border-b dark:border-dark-5">{{ $contact->id }}</td>
                                            <td class="border-b dark:border-dark-5">
                                                {{ $contact->institution }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $contact->nombre }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $contact->paterno }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $contact->materno }}</td>
                                            <td class="border-b dark:border-dark-5">{{ $contact->telefono }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-span-12 flex items-center justify-center sm:justify-end mt-5">
                            <button type="button" wire:click="step4" class="btn btn-secondary w-24">Previous</button>
                            <a href="{{ route('page.dashboard') }}" class="btn btn-primary w-24 ml-2">Finalizar</a>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    @endif
</div>
