<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ability extends Model
{
    use HasFactory;

    public function people()
    {
        return $this->belongsToMany(Person::class);
    }

    public function vacancies()
    {
        return $this->belongsToMany(Vacancy::class);
    }
}
