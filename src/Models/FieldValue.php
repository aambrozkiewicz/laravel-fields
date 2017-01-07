<?php

namespace aambrozkiewicz\Fields\Models;

use Illuminate\Database\Eloquent\Model;

class FieldValue extends Model
{
    protected $fillable = ['field_id', 'value'];

    function field()
    {
        return $this->belongsTo(Field::class);
    }
}
