<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employer extends Model
{
    use HasFactory;
    protected $table = 'employer';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'name',
       'fonction',
       'Departement',
       'Responsable',
       'categorie'

    ];
}
