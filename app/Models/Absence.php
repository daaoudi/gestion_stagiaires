<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absence extends Model
{
    use HasFactory;
    protected $fillable=["id","stagiaire_id","justification","date_debut","date_fin"];
    public function stagiaire(){
        return $this->belongsTo(Stagiaire::class);
}
}
