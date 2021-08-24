<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payroll extends Model
{
    use HasFactory;

    public function person(){
        return $this->belongsTo(Person::class);
    }
    
    public function vacancy()
    {
        return $this->belongsTo(Vacancy::class);
    }
}
