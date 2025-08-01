<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commande extends Model
{
    use HasFactory;
    protected $table = 'commande';
    protected $primaryKey = 'id';
    public $timestamps = true;

    protected $fillable = [
       'expediteur',
       'recepteur',
       'date',
       'NommItem',
       'Description',
       'status'

    ];
}
