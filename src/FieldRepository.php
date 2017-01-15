<?php

namespace aambrozkiewicz\Fields;

use Illuminate\Support\Collection;

interface FieldRepository
{
    function for(string $className) : Collection;
}
