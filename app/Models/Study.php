<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Study
 *
 * @property $id
 * @property $user_rut
 * @property $Universidad
 * @property $Titulo
 * @property $f_inicio
 * @property $f_fin
 * @property $created_at
 * @property $updated_at
 *
 * @property User $user
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Study extends Model
{
    
    static $rules = [
		'user_rut' => 'required',
		'Universidad' => 'required',
		'Titulo' => 'required',
		'f_inicio' => 'required',
		'f_fin' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['user_rut','Universidad','Titulo','f_inicio','f_fin'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Models\User', 'rut', 'user_rut');
    }
    

}
