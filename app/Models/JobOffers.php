<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class JobOffer
 *
 * @property $id
 * @property $user_rut
 * @property $puesto
 * @property $requirements_json
 * @property $empresa
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property User $recruiter
 * @property User $choosen_one
 * 
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class JobOffers extends Model
{
    
    public static $rules = [
        'user_rut' => 'required|integer',  // Asegúrate de que el tipo de dato sea correcto
        'puesto' => 'required|string|max:255',
        'empresa' => 'required|string|max:255',
        'descripcion' => 'required|string|max:255',
        'choosen_one' => 'nullable|integer', // Si es un ID, por ejemplo
        // Reglas para los campos dentro del JSON
        'skills.*' => 'string|max:255', // Cada habilidad debe ser una cadena
        'studies.*' => 'string|max:255', // Cada estudio debe ser una cadena
        'experience.*' => 'string|max:255', // Cada experiencia debe ser una cadena
        'age' => 'nullable|integer', // Edad, si es relevante
        'sex' => 'nullable|string|max:255', // Sexo, si es relevante
    ];


    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_rut', 'puesto', 'requirements_json', 'empresa', 'descripcion', 'choosen_one','requirements_json',];

    protected $casts = [
        'requirements_json' => 'array'
    ];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'rut', 'user_rut');
    }


    

}
