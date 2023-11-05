<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Experience
 *
 * @property $id
 * @property $user_rut
 * @property $empresa
 * @property $puesto
 * @property $f_inicio
 * @property $f_fin
 * @property $nivel_experiencia
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Experience extends Model
{
    
    static $rules = [
		'user_rut' => 'required',
		'empresa' => 'required',
		'puesto' => 'required',
		'f_inicio' => 'required',
		'f_fin' => 'required',
		'nivel_experiencia' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_rut','empresa','puesto','f_inicio','f_fin','nivel_experiencia'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'rut', 'user_rut');
    }
    

}
