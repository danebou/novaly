<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $fillable = [
        'family_name',
        'given_name',
        'email',
        'password',
        'user_type_id',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getNameAttribute()
    {
        return $this->given_name . ' ' . $this->family_name;;
    }

    /**
     * Is the user an Admin
     *
     * @return bool
     */
    public function isAdmin()
    {
        return $this->user_type_id === UserType::ADMIN_ID;
    }

    /**
     * Is the user an Buyer
     *
     * @return bool
     */
    public function isBuyer()
    {
        return $this->user_type_id === UserType::BUYER_ID;
    }

    /**
     * Is the user an Vendor
     *
     * @return bool
     */
    public function isVendor()
    {
        return $this->user_type_id === UserType::VENDOR_ID;
    }

    /**
     * Relation: All the user's products
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany(Product::class);
    }

    /**
     * Query Scope: Only include users that are vendors
     *
     * @param  \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeVendors(Builder $query)
    {
        return $query->where('user_type_id', UserType::VENDOR_ID);
    }
}
