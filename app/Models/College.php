<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class College extends Model
{
    // Nom exact de la table dans la base MySQL
    protected $table = 'colleges';

    // Colonnes autorisées pour le mass-assignment
    protected $fillable = [
        'code',
        'nom',
        'adr_ligne_1',
        'adr_ligne_2',
        'adr_lieu',
        'adr_code_postal',
        'adr_ville',
        'adr_region',
        'commentaire',
        'code_pays',
    ];

    /**
     * Récupère la liste des collèges depuis la base de données.
     *
     * @param bool $asArray Si true retourne un tableau simple, sinon une Collection Eloquent.
     * @return \Illuminate\Database\Eloquent\Collection|array
     */
    public static function getAllColleges(bool $asArray = false)
    {
        $colleges = self::orderBy('nom')->get();
        return $asArray ? $colleges->toArray() : $colleges;
    }

    // Timestamps automatiques (created_at et updated_at)
    public $timestamps = true;
}
