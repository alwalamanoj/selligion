<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLimitedTimeOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('limited_time_offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->nullable()->constrained('products')->onDelete('cascade');
            $table->string('offer_title')->nullable();
            $table->string('offer_description')->nullable();
            $table->integer('offer_quantity')->nullable();
            $table->integer('items_sold')->default(0);
            $table->decimal('offer_price', 10, 2)->nullable();
            $table->dateTime('offer_start_date');
            $table->dateTime('offer_end_date');
            $table->integer('is_activated')->default(0);
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
        Schema::dropIfExists('limited_time_offers');
    }
}
