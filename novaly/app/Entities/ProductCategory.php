<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;

class ProductCategory extends Entity
{
    /** @var int */
    const GENERAL_ID = 1;

    /**
     * Relation: Categories that have this as there parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function allChildCategories()
    {
        return $this->childCategories()->with(['allChildCategories']);
    }

    /**
     * Relation: Categories that have this as there parent
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function childCategories()
    {
        return $this->hasMany(ProductCategory::class, 'parent_category_id', 'id');
    }

    /**
     * Relation: The Parent Category
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function parentCategory()
    {
        return $this->belongsTo(ProductCategory::class, 'parent_category_id', 'id');
    }

    /**
     * Query Scope: Only include top level categories
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTopCategories(Builder $query)
    {
        return $query->whereNull('parent_category_id');
    }

    /**
     * Get the complete product category tree
     *
     * @return \Illuminate\Support\Collection
     */
    public static function categoryTree()
    {
        return static::topCategories()->with(['allChildCategories'])->get();
    }
}
