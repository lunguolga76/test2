<?php

namespace App\Models;

use App\Http\Filters\Filter;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Laravel\Scout\Searchable;


class Job extends Model
{
    use HasFactory, Searchable;


    protected $fillable = ['title','company','location', 'description'];

    public function scopeFilter(Builder $builder, Filter $filter): \Illuminate\Database\Eloquent\Builder
    {
        return $filter->apply($builder);
    }

}
