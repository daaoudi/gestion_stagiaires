<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Admin extends Model
{
    use HasFactory;
    use Authenticatable;
    protected $fillable=["id","nom","prenom","email","password"];

}
