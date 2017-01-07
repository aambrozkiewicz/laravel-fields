<?php

namespace aambrozkiewicz\Fields\Models;

use Illuminate\Database\Eloquent\Model;

class Field extends Model
{
    public $timestamps = false;

    function getImplAttribute($value)
    {
        return app($value);
    }

    function setImplAttribute($value)
    {
        $this->attributes['impl'] = get_class($value);
    }
}
