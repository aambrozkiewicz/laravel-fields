<?php

namespace aambrozkiewicz\Fields;

use Illuminate\Support\Collection;

class EloquentFieldRepository implements FieldRepository
{
    private $fieldModel;

    function __construct($fieldModel)
    {
        $this->fieldModel = $fieldModel;
    }

    function for(string $className) : Collection
    {
        return ($this->fieldModel)::where('fieldable_type', $className)->get();
    }
}
