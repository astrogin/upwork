<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStripesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stripes', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('fbuid')->nullable();
            $table->bigInteger('wc_order_id')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('password')->nullable();
            $table->string('stripeToken')->nullable();
            $table->string('stripeTokenType')->nullable();
            $table->string('stripeEmail')->nullable();
            $table->string('stripeBillingName')->nullable();
            $table->string('stripeBillingAddressLine1')->nullable();
            $table->string('stripeBillingAddressLine2')->nullable();
            $table->string('stripeBillingAddressZip')->nullable();
            $table->string('stripeBillingAddressState')->nullable();
            $table->string('stripeBillingAddressCity')->nullable();
            $table->string('stripeBillingAddressCountry')->nullable();
            $table->string('stripeBillingAddressCountryCode')->nullable();
            $table->string('stripeShippingName')->nullable();
            $table->string('stripeShippingAddressLine1')->nullable();
            $table->string('stripeShippingAddressLine2')->nullable();
            $table->string('stripeShippingAddressZip')->nullable();
            $table->string('stripeShippingAddressState')->nullable();
            $table->string('stripeShippingAddressCity')->nullable();
            $table->string('stripeShippingAddressCountry')->nullable();
            $table->string('stripeShippingAddressCountryCode')->nullable();
            $table->bigInteger('order_id')->nullable();
            $table->bigInteger('object_id')->nullable();
            $table->string('image1')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('stripes');
    }
}
