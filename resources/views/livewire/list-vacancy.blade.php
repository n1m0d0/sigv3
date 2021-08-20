<div>
    @if ($ventana == 1)
        <div class="box py-8 px-6">
            <h1 class="text-xl text-gray-900">Lista de Vacancias Pendientes</h1>
            <div class="overflow-x-auto mt-6">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Entidad economica</th>
                            <th class="whitespace-nowrap">Denominación del cargo</th>
                            <th class="whitespace-nowrap">Personal requerido</th>
                            <th class="whitespace-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($vacancies as $vacancy)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $vacancy->id }}</td>
                                <td class="border-b dark:border-dark-5 text-gray-700 uppercase">
                                    {{ $vacancy->institution->nombre_comercial }}
                                    <br>
                                    <span class="text-gray-600">
                                        {{ $vacancy->institution->razon_social }}
                                    </span>
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $vacancy->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $vacancy->cantidad }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <a wire:click='searchPeople({{ $vacancy->id }})'
                                        class="flex items-center mr-3 cursor-pointer">
                                        <x-feathericon-file-text class="w-4 h-4 mr-1" /> Generar Lista
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
    @if ($ventana == 2)
        <div class="box grid grid-cols-12 gap-4 items-center py-8 px-6">
            <h1 class="col-span-12 text-xl font-medium leading-none mt-3 text-center">
                {{ $vacancia->institution->nombre_comercial }}</h1>
            <h1 class="col-span-12 text-xl font-medium leading-none mt-3 text-center">
                {{ $vacancia->institution->razon_social }}</h1>
            <div class="col-span-12 md:col-span-3 mt-8">
                <h1 class="text-lg font-medium leading-none mt-3 text-center">Sucursal</h1>
                <br>
                <h1 class="font-medium leading-none mt-3">{{ $vacancia->branch->department->nombre }}</h1>
                <br>
                <h1 class="font-medium leading-none">{{ $vacancia->branch->direccion }}</h1>
            </div>
            <div class="col-span-12 md:col-span-3 mt-8">
                <h1 class="text-lg font-medium leading-none mt-3 text-center">Denominacion del cargo</h1>
                <br>
                <h1 class="font-medium leading-none mt-3">{{ $vacancia->nombre }}</h1>
                <br>
                <h1 class="font-medium leading-none">{{ $vacancia->descripcion }}</h1>
            </div>
            <div class="col-span-12 md:col-span-3 mt-8">
                <h1 class="text-lg font-medium leading-none mt-3 text-center">Perfil</h1>
                <br>
                <h1 class="font-medium leading-none mt-3">{{ $vacancia->grado_academico }}</h1>
                <br>
                <br>
            </div>
            <div class="col-span-12 md:col-span-3 mt-8">
                <h1 class="text-lg font-medium leading-none mt-3 text-center">Area de formacion</h1>
                <br>
                <h1 class="font-medium leading-none mt-3">{{ $vacancia->career->nombre }}</h1>
                <br>
                <br>
            </div>
        </div>

        <div class="box gird gird-cols-12 flex gap-4 items-center mt-2 py-4 px-6">
            <div class="col-span-12 sm:col-span-3">
            </div>
            <div class="col-span-12 sm:col-span-3">
            </div>
            <div class="col-span-12 sm:col-span-3">
            </div>
            <div class="col-span-12 sm:col-span-3">
            </div>
        </div>

        <div class="box mt-2 py-8 px-6">
            <h1 class="text-lg font-medium leading-none mt-3 text-center">Posibles Beneficiarios</h1>
            <div class="overflow-x-auto mt-6">
                <table class="table">
                    <thead>
                        <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                            <th class="whitespace-nowrap">#</th>
                            <th class="whitespace-nowrap">Nombre Completo</th>
                            <th class="whitespace-nowrap">Departamento</th>
                            <th class="whitespace-nowrap">Genero</th>
                            <th class="whitespace-nowrap">Es Padre/Madre/Ambos</th>
                            <th class="whitespace-nowrap">Formacion</th>
                            <th class="whitespace-nowrap">Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($people as $person)
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $person->id }}</td>
                                <td class="border-b dark:border-dark-5 text-gray-700 uppercase">
                                    {{ $person->nombres }} {{ $person->paterno }} {{ $person->materno }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $person->department->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    @if ($person->genero == 'M')
                                        Femenino
                                    @else
                                        Masculino
                                    @endif
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    @if ($person->hijos == 1)
                                        Si
                                    @else
                                        No
                                    @endif
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <ul>
                                        @foreach ($person->careers as $career)
                                            <li>
                                                {{ $career->nombre }}
                                            </li>
                                        @endforeach
                                    </ul>
                                </td>
                                <td class="border-b dark:border-dark-5">
                                    <a href="" class="flex items-center mr-3 cursor-pointer">
                                        <x-feathericon-plus-circle class="w-4 h-4 mr-1" /> Agregar
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
