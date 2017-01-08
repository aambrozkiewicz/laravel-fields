<?php

namespace aambrozkiewicz\Fields\Value;

class PlainValue
{
    function get($value)
    {
        return $value;
    }

    function set($value)
    {
        return strlen($value) ? $value : null;
    }
}