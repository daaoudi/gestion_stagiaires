<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stagiaire extends Model
{
    use HasFactory;
    protected $fillable=["id","nom","prenom","cin","etablissement","filiere",
    
    "telephone","date_naissance","encadrent_id","stage_id"];
    public function encadrent(){
        return $this->belongsTo(Encadrent::class);

    }
    public function stage(){
        return $this->belongsTo(Stage::class);
    }

    public function absences(){
        return $this->hasMany(Absence::class);
    }
}
