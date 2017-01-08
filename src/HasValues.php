<?php

namespace aambrozkiewicz\Fields;

use aambrozkiewicz\Fields\Models\Field;
use aambrozkiewicz\Fields\Models\FieldValue;

trait HasValues
{
    function values()
    {
        return $this->hasMany(FieldValue::class, 'fieldable_id');
    }

    function value(string $name)
    {
        $field = $this->values->first(function($value) use ($name) {
            return $value->field->name == $name;
        });

        return $field->value ?? null;
    }

    /**
     * @param array $fields Key being Field ID and value
     */
    function saveValues(array $fields)
    {
        collect($fields)->filter()->each(function($value, $id) {
            $this->values()->updateOrCreate([
                'field_id' => $id,
                'fieldable_id' => $this->getKey()
            ], [
                'value' => $value
            ]);
        });
    }
}
