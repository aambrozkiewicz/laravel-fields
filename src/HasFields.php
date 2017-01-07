<?php

namespace aambrozkiewicz\Fields;

use aambrozkiewicz\Fields\Models\Field;
use aambrozkiewicz\Fields\Models\FieldValue;

trait HasFields
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

        if ($field) {
            return $field->field->impl->get($field->value);
        }
    }

    /**
     * @param array $fields Key being Field ID and value
     */
    function saveValues(array $fields)
    {
        collect($fields)->filter()->each(function($value, $id) {
            $field = Field::findOrFail($id);

            $this->values()->updateOrCreate([
                'field_id' => $field->getKey(),
                'fieldable_id' => $this->getKey()
            ], [
                'value' => !strlen($value)
                    ? null
                    : $field->impl->set($value)
            ]);
        });
    }

    static function fields()
    {
        return Field::where('fieldable_type', static::class)->get();
    }

    static function saveFields(array $fields)
    {
        collect($fields)->each(function($field) {
            if (!is_object($field)) {
                $field = new Field($field);
            }

            $field-save();
        });
    }
}
