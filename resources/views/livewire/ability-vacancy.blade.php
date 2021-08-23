<div>
    <div class="box py-8 px-6">
        @include('layout.partials.errors')
        @include('layout.partials.flashMessage')
        <h1 class="text-xl text-gray-900">Escoge las habilidades</h1>
        <form wire:submit.prevent='addAbility' class="intro-y grid grid-cols-12 gap-2 items-center">
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Vacancia</label>
                <select wire:model="vacancia" class="form-select">
                    <option value="">Seleccione un opcion</option>
                    @foreach ($vacancies as $vacancy)
                        <option value="{{ $vacancy->id }}">{{ $vacancy->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-span-12 sm:col-span-3">
                <label class="form-label">Habilidad</label>
                <!--<select wire:model="habilidad" class="form-select">
                    <option value="">Seleccione un opcion</option>
                    @foreach ($abilities as $ability)
                        <option value="{{ $ability->id }}">{{ $ability->nombre }}</option>
                    @endforeach
                </select>
            -->
                <input  type="text" class="form-control"
                    placeholder="Ingresa tus habilidades">
            </div>
            <div class="col-span-12 sm:col-span-3 pt-6">
                <button type="submit" class="btn btn-secondary">Guardar</button>
            </div>
        </form>
    </div>

    <div class="box py-8 px-6 mt-3">
        <div class="overflow-x-auto pt-4">
            <table class="table">
                <thead>
                    <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                        <th class="whitespace-nowrap">#</th>
                        <th class="whitespace-nowrap">Nombre</th>
                        <th class="whitespace-nowrap">Habilidad</th>
                        <th class="whitespace-nowrap">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($abilitiesVacancy as $abilityVacancy)
                        @if ($abilityVacancy->vacancy->estado == 'ACTIVO')
                            <tr>
                                <td class="border-b dark:border-dark-5">{{ $abilityVacancy->id }}</td>
                                <td class="border-b dark:border-dark-5">{{ $abilityVacancy->vacancy->nombre }}</td>
                                <td class="border-b dark:border-dark-5">
                                    {{ $abilityVacancy->ability->nombre }}
                                </td>
                                <td class="border-b dark:border-dark-5">

                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

</div>
