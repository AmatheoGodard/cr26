<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pays extends Model
{
    // 1. Indiquer la table exacte de ton SQL
    protected $table = 'pays';

    // 2. Dire à Laravel que la clé primaire n'est pas "id" mais "code"
    protected $primaryKey = 'code';

    // 3. Dire que cette clé n'est pas un entier qui s'incrémente tout seul
    public $incrementing = false;
    protected $keyType = 'string';

    // 4. IMPORTANT : Autoriser l'écriture dans ces colonnes
    protected $fillable = [
        'code',
        'nom',
        'commentaire',
    ];

    // 5. Désactiver les timestamps automatiques si tu n'as pas created_at/updated_at dans ton SQL
    public $timestamps = false;
}