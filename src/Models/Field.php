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

    function setImplAttribute($value)
    {
        $this->attributes['impl'] = is_object($value)
            ? get_class($value)
            : $value;
    }
}
