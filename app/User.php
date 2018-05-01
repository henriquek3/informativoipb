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
        'nome',
        'email',
        'cpf',
        'status',
        'nivel',
        'perfil',
        'observacoes',
        'user_id',
        'id_presbitero',
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
     * Altera a tabela de conexão
     * @var string
     */
    //protected $table = 'usuarios';

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

    public function sinodos()
    {
        return $this->hasMany('App\Sinodos');
    }

    public function presbiterios()
    {
        return $this->hasMany('App\Presbiterios');
    }

    public function igrejas()
    {
        return $this->hasMany('App\Igrejas');
    }

    public function congregacoes()
    {
        return $this->hasMany('App\IgrejasCongregacoes');
    }

    public function presbiteros()
    {
        return $this->hasMany('App\Presbiteros');
    }

    public function plePresbiterios()
    {
        return $this->hasMany('App\PlePresbiterios');
    }

    public function pleSinodos()
    {
        return $this->hasMany('App\PleSinodos');
    }

    public function relConselhos()
    {
        return $this->hasMany('App\RelConselhos');
    }

    public function relEstatisticas()
    {
        return $this->hasMany('App\RelEstatisticas');
    }

    public function relMinistros()
    {
        return $this->hasMany('App\RelMinistros');
    }
}
