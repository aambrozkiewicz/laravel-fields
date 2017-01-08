<?php

namespace aambrozkiewicz\Fields;

class EloquentFieldRepository implements FieldRepository
{
    private $fieldModel;

    function __construct($fieldModel)
    {
        $this->fieldModel = $fieldModel;
    }

    function for(string $className)
    {
        return ($this->fieldModel)::where('fieldable_type', $className)->get();
    }
}
