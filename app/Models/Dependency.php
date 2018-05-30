<?php

namespace Zoutapps\Laravel\ProjectSetup\Models;

use Illuminate\Database\Eloquent\Model;

class Dependency extends Model
{
    protected $table = 'dependencies';

    protected $fillable = [
        'name',
        'dev',
        'group'
    ];
}