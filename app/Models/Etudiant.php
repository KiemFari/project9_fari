<?php

namespace App\Models;
use App\Models\Etudiant;
use App\Models\Tuteur;
use App\Models\Images;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Etudiant extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'classe',
        'image',
    ];

    public function image()
    {
        return $this->hasOne(Image::class);
    }
    public function tuteur()
    {
        return $this->belongsTo(Tuteur::class);
    }
}
