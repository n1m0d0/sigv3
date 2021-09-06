<div class="box py-10 px-8 sm:py-20 mt-5">
    <h2 class="text-lg uppercase text-gray-700 py-4 text-center">{{ $institution->razon_social }}</h2>
    @include('layout.partials.errors')
    @include('layout.partials.flashMessage')
    <h2 class="text-lg uppercase text-gray-900 py-4 text-left">Datos: </h2>
    <form wire:submit.prevent='updateInstitution' enctype="multipart/form-data"
        class="grid grid-cols-12 gap-2 items-center">
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">NIT</label>
            <input wire:model='archivoNit' type="file" class="form-control">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Gran Actividad</label>
            <input wire:model='rubro' type="text" class="form-control" placeholder="Según el NIT">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Actividad Principal</label>
            <input wire:model='actividad' type="text" class="form-control"
                placeholder="Según el NIT">
        </div>
        <div class="col-span-12 sm:col-span-3 pt-6">
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>
    <h2 class="text-lg uppercase text-gray-900 py-4 text-left">Representante Legal: </h2>
    <form wire:submit.prevent='updateLegalRepresentative' enctype="multipart/form-data"
        class="grid grid-cols-12 gap-2 items-center">
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Nombres</label>
            <input wire:model='nombreRepresentante' type="text" class="form-control" placeholder="Jose Luis">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Apellido Paterno</label>
            <input wire:model='paternoRepresentante' type="text" class="form-control" placeholder="Delgado">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Apellido Materno</label>
            <input wire:model='maternoRepresentante' type="text" class="form-control" placeholder="Mamani">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Teléfono / Celular</label>
            <input wire:model='telefonoRepresentante' type="text" class="form-control" placeholder="2212584">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Correo</label>
            <input wire:model='emailRepresentante' type="text" class="form-control" placeholder="micorreo@gmail.com">
        </div>
        <div class="col-span-12 sm:col-span-3 pt-6">
            <button type="submit" class="btn btn-secondary">Guardar</button>
        </div>
    </form>

    <h2 class="text-lg uppercase text-gray-900 py-4 text-left mt-4">Registro de Casa Matriz y Sucursales: </h2>
    <form wire:submit.prevent='addBranch' class="grid grid-cols-12 gap-2 items-center">
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Tipo</label>
            <select wire:model="tipo" class="form-select">
                <option value="">Seleccione un opcion</option>
                <option value="Casa Matriz">Casa Matriz</option>
                <option value="Sucursal">Sucursal</option>
            </select>
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
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Dirección</label>
            <input wire:model='direccion' type="text" class="form-control" placeholder="Av. Miraflores">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Teléfono / Celular</label>
            <input wire:model='telefono' type="text" class="form-control" placeholder="2212584">
        </div>
        <div class="col-span-12 sm:col-span-3 pt-6">
            <button type="submit" class="btn btn-secondary">Añadir</button>
        </div>
    </form>

    <div class="overflow-x-auto pt-4">
        <table class="table">
            <thead>
                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Tipo</th>
                    <th class="whitespace-nowrap">Departamento</th>
                    <th class="whitespace-nowrap">Dirección</th>
                    <th class="whitespace-nowrap">Teléfono / Celular</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($branchs as $branch)
                    <tr>
                        <td class="border-b dark:border-dark-5">{{ $branch->id }}</td>
                        <td class="border-b dark:border-dark-5">{{ $branch->tipo }}</td>
                        <td class="border-b dark:border-dark-5">{{ $branch->department->nombre }}</td>
                        <td class="border-b dark:border-dark-5">{{ $branch->direccion }}</td>
                        <td class="border-b dark:border-dark-5">{{ $branch->telefono }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $branchs->links() }}
    </div>

    <h2 class="text-lg uppercase text-gray-900 py-4 text-left mt-4">Registro de Contactos: </h2>
    <form wire:submit.prevent='addCoordinator' class="grid grid-cols-12 gap-2 items-center">
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Nombres</label>
            <input wire:model='nombresEnlace' type="text" class="form-control" placeholder="Jose Luis">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Apellido Paterno</label>
            <input wire:model='paternoEnlace' type="text" class="form-control" placeholder="Delgado">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Apellido Materno</label>
            <input wire:model='maternoEnlace' type="text" class="form-control" placeholder="Mamani">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Teléfono / Celular</label>
            <input wire:model='telefonoEnlace' type="text" class="form-control" placeholder="2212584">
        </div>
        <div class="col-span-12 sm:col-span-3">
            <label class="form-label">Correo</label>
            <input wire:model='correoEnlace' type="text" class="form-control" placeholder="micorreo@gmail.com">
        </div>
        <div class="col-span-12 sm:col-span-3 pt-6">
            <button type="submit" class="btn btn-secondary">Añadir</button>
        </div>
    </form>

    <div class="overflow-x-auto pt-4">
        <table class="table">
            <thead>
                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Nombre Completo</th>
                    <th class="whitespace-nowrap">Teléfono / Celular</th>
                    <th class="whitespace-nowrap">Correo</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($coordinators as $coordinator)
                    <tr>
                        <td class="border-b dark:border-dark-5">{{ $coordinator->id }}</td>
                        <td class="border-b dark:border-dark-5">{{ $coordinator->nombres }}
                            {{ $coordinator->paterno }} {{ $coordinator->materno }}</td>
                        <td class="border-b dark:border-dark-5">{{ $coordinator->telefono }}</td>
                        <td class="border-b dark:border-dark-5">{{ $coordinator->email }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        {{ $coordinators->links() }}
    </div>

    <a class="btn btn-outline-primary py-3 px-4 xl:w-80 mt-3 xl:mt-2 align-left"
                            href="{{ route('page.dashboard') }}">Finalizar</a>
</div>
