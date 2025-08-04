<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $table = 'stock';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'typestock',
       'date',
       'materiel',
       'nom_employer',
       'quantite',
       'stock',
       'categorie'
    ];
}
