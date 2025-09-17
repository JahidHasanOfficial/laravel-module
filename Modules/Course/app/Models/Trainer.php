<?php

namespace Modules\Course\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $table = 'trainers';

    // Mass assignment protection
    protected $fillable = [
        'name',
        'email',
        'phone',
        'expertise',
    ];
}
