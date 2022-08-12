<?php

namespace App\Models;

use App\QueryBuilders\Banners\BannerQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Query\Builder as QueryBuilder;

class Banner extends Model
{
    use HasFactory;

    /**
     * The attributes that aren't mass assignable.
     *
     * @var array<string>|bool
     */
    protected $guarded = [];

    /**
     * Create a new Eloquent query builder for the model.
     *
     * @param  QueryBuilder  $query
     * @return BannerQueryBuilder
     */
    public function newEloquentBuilder($query): BannerQueryBuilder
    {
        return new BannerQueryBuilder($query);
    }

    /**
     * Get the user for the banner.
     *
     * @return BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
