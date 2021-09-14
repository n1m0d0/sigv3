<?php

namespace App\Exports;

use App\Models\Person;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;

class PeopleExport implements FromView
{
    use Exportable;
    private $peopleQuery;

    public function __construct($peopleQuery)
    {
        $this->peopleQuery = $peopleQuery;
    }


    public function view(): View
    {
        return view('exports.person', [
            'people' => $this->peopleQuery
        ]);
    }
    
}
