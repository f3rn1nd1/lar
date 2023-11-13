<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Experience;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;


    protected $primaryKey = 'rut'; // Especifica 'rut' como clave primaria.
    public $incrementing = false; // El 'rut' no es autoincremental.
    protected $keyType = 'int'; // El tipo de la clave primaria es 
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'rut', 'nombre', 'apellido_paterno', 'apellido_materno', 'email', 'password','score', 'role',

    ];

    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            if(empty($user->role)){
                $user->role = 'personal';
            }
            if(empty($user->score)){
                $user->score = 0;
            }
        });
    }
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function experiences()
    {
       
        return $this->hasMany(Experience::class, 'user_rut', 'rut');
    }
    public function skills()
    {
        return $this->hasMany(Skill::class, 'user_rut', 'rut');
    }
    public function studies()
    {
        return $this->hasMany(Study::class, 'user_rut', 'rut');
    }
}
