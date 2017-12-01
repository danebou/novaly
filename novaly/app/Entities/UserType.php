<?php

namespace App\Entities;

class UserType extends Entity
{
    /** @var int */
    const BUYER_ID = 1;

    /** @var int */
    const VENDOR_ID = 2;

    /** @var int */
    const ADMIN_ID = 3;

    /** @var bool */
    public $timestamps = false;
}
