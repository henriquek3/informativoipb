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
        'password',
        'email',
        'cpf',
        'status',
        'nivel',
        'perfil',
        'observacoes',
        'user_id',
        'id_sinodo',
        'id_presbiterio',
        'id_igreja',
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
     * Altera a tabela de conexão
     *
     * @var string
     */
    //protected $table = 'usuarios';

    /**
     * Get the PeriodicExam's type.
     *
     * @return string
     */
    public function getUsuarioStatusAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Ativo';
                break;
            case 1:
                return 'Inativo';
                break;
            default:
                return 'Indefinido';
        }
    }

    /**
     * @return string
     */
    public function getUsuarioNivelAttribute()
    {
        switch ($this->status) {
            case 0:
                return 'Comum';
                break;
            case 1:
                return 'Superior';
                break;
            default:
                return 'Indefinido';
        }
    }

    /**
     * @return string
     */
    public function getUsuarioPerfilAttribute()
    {
        switch ($this->perfil) {
            case 0:
                return 'Sec. Igreja';
                break;
            case 1:
                return 'Sec. Presbitério';
                break;
            case 2:
                return 'Sec. Presbitério';
                break;
            case 3:
                return 'Sec. Sínodo';
                break;
            case 4:
                return 'Sec. Supremo';
                break;
            case 5:
                return 'Supervisão Geral';
                break;
            default:
                return 'Indefinido';
        }
    }

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

    public function usuario()
    {
        return $this->belongsTo(\App\User::class, 'user_id', 'id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function presbitero()
    {
        return $this->belongsTo(\App\Presbiteros::class, 'id_presbitero');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function sinodos()
    {
        return $this->hasMany('App\Sinodos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presbiterios()
    {
        return $this->hasMany('App\Presbiterios');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function igrejas()
    {
        return $this->hasMany('App\Igrejas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function congregacoes()
    {
        return $this->hasMany('App\IgrejasCongregacoes');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function presbiteros()
    {
        return $this->hasMany('App\Presbiteros');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function plePresbiterios()
    {
        return $this->hasMany('App\PlePresbiterios');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pleSinodos()
    {
        return $this->hasMany('App\PleSinodos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relConselhos()
    {
        return $this->hasMany('App\RelConselhos');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relEstatisticas()
    {
        return $this->hasMany('App\RelEstatisticas');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function relMinistros()
    {
        return $this->hasMany('App\RelMinistros');
    }

    public function pastor()
    {
        return Presbiteros::where('id_igreja', '=', $this->id)
            ->where('pastor_titular', '=', '1')->first();
    }
}
