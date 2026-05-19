<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Concours extends Model
{
    // On indique le vrai nom de la table
    protected $table = 'concours';

    // On liste les champs modifiables
    protected $fillable = [
        'nom',
        'date_debut',
        'date_fin',
        'actif',
        'en_cours',
        'equipe_min',
        'equipe_max',
        'commentaire'
    ];

    // Si tu n'as pas les colonnes standard created_at / updated_at en timestamps automatiques de Laravel :
    // public $timestamps = false; 
}