<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Encadrent extends Model
{
    use HasFactory;
    protected $fillable=["id","nom","prenom","filiere"];
    public function stagiaires(){
        return $this->hasMany(Stagiaire::class);
    }

}
