<?php

namespace App\Http\Controllers\Filters\V1;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;

abstract class QueryFilter
{
    protected Builder $builder;
    protected Request $request;
    protected array $sortable = [];

    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function apply(Builder $builder)
    {
        $this->builder = $builder;

        foreach ($this->request->all() as $key => $value) {
            if (method_exists($this, $key)) {
                $this->$key($value);
            }
        }

        return $this->builder;
    }

    protected function sort($value)
    {
        $sortAttributes = explode(',', $value);
        foreach ($sortAttributes as $sortAttribute) {
            $direction = 'asc';

            if (str_starts_with($sortAttribute, '-')) {
                $direction = 'desc';
                $sortAttribute = substr($sortAttribute, 1);
            }

            if (!in_array($sortAttribute, $this->sortable)) {
                continue;
            }

            $this->builder->orderBy($sortAttribute, $direction);
        }
    }
}
