<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;

class PurchaseOrder extends Entity
{
    /**
     * Relation: The purchas item for this order
     *
     * @return \Illuminate\Database\Eloquent\Relations\hasOne
     */
    public function purchaseItem()
    {
        return $this->hasOne(PurchaseItem::class);
    }

    /**
     * Query Scope: Only include orders from logged in user
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeBuyers(Builder $query)
    {
        return $query->where('user_id', auth()->user()->id);
    }

    /**
     * Relation: The user that made the order
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
