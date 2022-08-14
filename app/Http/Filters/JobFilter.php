<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Schema;

class JobFilter extends Filter
{

    public function title(string $value = null): Builder
    {
        return $this->builder->where('title', 'like', "%$value%");
    }

    public function company(string $value = null): Builder
    {
        return $this->builder->where('company', 'like', "%$value%");
    }

    public function location(string $value = null): Builder
    {
        return $this->builder->where('location', 'like', "%$value%");

    }
}
