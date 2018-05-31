<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Auth;

class Presbiterios extends Model
{
    use SoftDeletes;

    /**
     * @var array
     */
    protected $guarded = [
        'id', 'created_at', 'deleted_at', 'updated_at',
    ];

    public function usuario()
    {
        return $this->belongsTo("App\User","user_id","id");
    }

    public function sinodo()
    {
        return $this->belongsTo("App\Sinodos", "id_sinodo", "id");
    }

    public function scopeSinodos($query)
    {
        return $query->where('user_id', Auth::user()->id);
    }
}
