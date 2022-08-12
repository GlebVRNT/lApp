<?php

namespace App\QueryBuilders\Banners;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

class BannerQueryBuilder extends Builder
{
    public function __construct(QueryBuilder $query)
    {
        parent::__construct($query);
    }

    /**
     * Returns banners filtered by name.
     *
     * @param  array  $filters
     * @return BannerQueryBuilder
     */
    public function filterByName(array $filters): self
    {
        return $this->when(
            $filters['search'] ?? null,
            fn (Builder $query, string $search) => $query->where('name', 'like', $search.'%')
        );
    }
}
