<?php

namespace App\Http\Controllers\Filters\V1;

class TicketFilter extends QueryFilter
{
    public function include($value)
    {
        $this->builder->with($value);
    }

    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}
