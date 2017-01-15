<?php

namespace aambrozkiewicz\Fields\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    protected $fillable = ['fieldable_type', 'name', 'impl', 'view'];

    public $timestamps = false;

    function getImplAttribute($value)
    {
        return app($value);
    }
}
