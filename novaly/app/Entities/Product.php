<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;

class Product extends Entity
{
    public $appends = [
        'savings',
        'unit_price',
    ];

    /**
     * Gets the average rating for this product
     *
     * @return double|null
     */
    public function getAvgRatingAttribute()
    {
        return $this->hasReviews() ? number_format($this->reviews->sum('rating') / $this->reviews->count(), 1) : null;
    }

    /**
     * Buyer price after discount is applied
     *
     * @return double
     */
    public function getUnitPriceAttribute()
    {
        return number_format($this->list_price - $this->savings, 2);
    }

    /**
     * Amount saved from discount
     *
     * @return double
     */
    public function getSavingsAttribute()
    {
        return number_format($this->list_price * $this->discount / 100, 2);
    }

    /**
     * Is there a discount on this product
     *
     * @return bool
     */
    public function hasDiscount()
    {
        return $this->discount > 0;
    }

    /**
     * Has this product been reviewed
     *
     * @return bool
     */
    public function hasReviews()
    {
        return count($this->reviews);
    }

    /**
     * Relation: The category for this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function productCategory()
    {
        return $this->belongsTo(ProductCategory::class);
    }

    /**
     * Relation: The reviews for this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    /**
     * Query Scope: Only include active products
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive(Builder $query)
    {
        return $query->where('active', 1);
    }

    /**
     * Query Scope: Only include prodcuts from the specified categories
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $categories
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeCategories(Builder $query, $categories)
    {
        if (isset($categories)) {
            return $query->whereIn('product_category_id', (array) $categories);
        }

        return $query;
    }

    /**
     * Query Scope: Only include products whose id, name, or description, includes the search text
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  mixed  $value
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeSearch(Builder $query, $value)
    {
        if (isset($value)) {
            return $query->where('id', $value)
                         ->orWhere('name', 'LIKE', '%' . $value . '%')
                         ->orWhere('description', 'LIKE', '%' . $value . '%');
        }

        return $query;
    }

    /**
     * Relation: The user that uploaded this product
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
