<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stripe extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'fbuid',
        'wc_order_id',
        'name',
        'email',
        'password',
        'stripeToken',
        'stripeTokenType',
        'stripeEmail',
        'stripeBillingName',
        'stripeBillingAddressLine1',
        'stripeBillingAddressLine2',
        'stripeBillingAddressZip',
        'stripeBillingAddressState',
        'stripeBillingAddressCity',
        'stripeBillingAddressCountry',
        'stripeBillingAddressCountryCode',
        'stripeShippingName',
        'stripeShippingAddressLine1',
        'stripeShippingAddressLine2',
        'stripeShippingAddressZip',
        'stripeShippingAddressState',
        'stripeShippingAddressCity',
        'stripeShippingAddressCountry',
        'stripeShippingAddressCountryCode',
        'order_id',
        'object_id',
        'image1'
    ];
}
