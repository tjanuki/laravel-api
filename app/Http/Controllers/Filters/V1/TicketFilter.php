<?php

namespace App\Http\Controllers\Filters\V1;

class TicketFilter extends QueryFilter
{
    protected array $sortable = ['id', 'title', 'status', 'created_at'];

    public function include($value)
    {
        $this->builder->with($value);
    }

    public function status($value)
    {
        return $this->builder->where('status', $value);
    }
}
