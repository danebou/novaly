<?php

namespace App\Entities;

class PurchaseItem extends Entity
{
    /**
     * Relation: The product for this purchase item
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
