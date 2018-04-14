<?php

namespace App;

use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Hash;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nome', 'email', 'cpf', 'observacoes', 'password', 'status', 'perfil', 'nivel', 'presbitero_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at',
    ];

    /**
     * @var string
     */
    protected $table = 'usuarios';

    /**
     * --------------------------------------------------------
     * Mutators
     * --------------------------------------------------------
     */

    /**
     *
     * @return void
     */
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * --------------------------------------------------------
     * Relacionamentos
     * --------------------------------------------------------
     */

    /**
     *
     * @return HasMany
     */
    /*public function todos()
    {
        return $this->hasMany('App\Todo');
    }*/
}
