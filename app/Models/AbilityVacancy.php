<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AbilityVacancy extends Model
{
    use HasFactory;

    protected $table = "ability_vacancy";

    public function ability(){
        return $this->belongsTo(Ability::class);
    }

    public function vacancy(){
        return $this->belongsTo(Vacancy::class);
    }
}
