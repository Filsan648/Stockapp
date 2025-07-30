<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materiel extends Model
{
    use HasFactory;
    protected $table = 'materiel';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'materiel',
       'quantite',
       'image',
       'categorie'


    ];
}
