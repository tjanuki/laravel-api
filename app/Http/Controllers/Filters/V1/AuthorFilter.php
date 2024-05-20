<?php

namespace App\Http\Controllers\Filters\V1;

class AuthorFilter extends QueryFilter
{
    public function id($value)
    {
        return $this->builder->whereIn('id', explode(',', $value));
    }

    public function include($value)
    {
        $this->builder->with($value);
    }
}
