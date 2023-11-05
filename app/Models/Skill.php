<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Skill
 *
 * @property $id
 * @property $user_rut
 * @property $tipo_habilidad
 * @property $nivel_habilidad
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Skill extends Model
{
    
    static $rules = [
		'user_rut' => 'required',
		'tipo_habilidad' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_rut','tipo_habilidad','nivel_habilidad'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'rut', 'user_rut');
    }
    

}
