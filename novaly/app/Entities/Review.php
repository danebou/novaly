<?php

namespace App\Entities;

class Review extends Entity
{
    /**
     * Is there text on this review
     *
     * @return bool
     */
    public function hasText()
    {
        return $this->text != null;
    }

    /**
     * Relation: The product the review is for
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    /**
     * Relation: The user who made the review
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
