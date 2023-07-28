<?php

namespace News\QueryBuilder;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

abstract class QueryBuilder
{
    public Builder $model;
    abstract public function getAll(): Collection;
}