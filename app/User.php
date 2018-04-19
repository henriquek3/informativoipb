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
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
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

    /**
     * --------------------------------------------------------
     * Relacionamentos
     * --------------------------------------------------------
     */

    /**
     *
     * @return HasMany
     */
    public function sinodos()
    {
        return $this->hasMany('App\Sinodos');
    }

    /**
     *
     * @return HasMany
     */
    public function presbiterios()
    {
        return $this->hasMany('App\Presbiterios');
    }

    /**
     *
     * @return HasMany
     */
    public function igrejas()
    {
        return $this->hasMany('App\Igrejas');
    }

    /**
     *
     * @return HasMany
     */
    public function presbiteros()
    {
        return $this->hasMany('App\Presbiteros');
    }

    /**
     *
     * @return HasMany
     */
    public function plePresbiterios()
    {
        return $this->hasMany('App\PlePresbiterios');
    }

    /**
     *
     * @return HasMany
     */
    public function pleSinodos()
    {
        return $this->hasMany('App\PleSinodos');
    }

    /**
     *
     * @return HasMany
     */
    public function relConselhos()
    {
        return $this->hasMany('App\RelConselhos');
    }

    /**
     *
     * @return HasMany
     */
    public function relEstatisticas()
    {
        return $this->hasMany('App\RelEstatisticas');
    }

    /**
     *
     * @return HasMany
     */
    public function relMinistros()
    {
        return $this->hasMany('App\RelMinistros');
    }
}
