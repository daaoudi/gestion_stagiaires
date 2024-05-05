<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stage extends Model
{
    use HasFactory;
    protected $fillable=["id","sujet","date_debut","date_fin","type"];
    public function stagiaires(){
        return $this->hasMany(Stagiaire::class);
    }
}
