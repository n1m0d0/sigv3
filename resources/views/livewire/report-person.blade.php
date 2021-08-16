<div>
    <div class="overflow-x-auto">
        <table class="table">
            <thead>
                <tr class="bg-gray-700 dark:bg-dark-1 text-white">
                    <th class="whitespace-nowrap">#</th>
                    <th class="whitespace-nowrap">Combre Completo</th>
                    <th class="whitespace-nowrap">CI</th>
                    <th class="whitespace-nowrap">Genero</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($people as $person)
                <tr>
                    <td class="border-b dark:border-dark-5"></td>
                    <td class="border-b dark:border-dark-5">Angelina</td>
                    <td class="border-b dark:border-dark-5">Jolie</td>
                    <td class="border-b dark:border-dark-5">@angelinajolie</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
