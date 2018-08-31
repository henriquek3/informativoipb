<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ImportRelPlePresbiterio extends Model
{
    use SoftDeletes;
    protected $table = 'reunioes_presbiterios_relatorios';
}
