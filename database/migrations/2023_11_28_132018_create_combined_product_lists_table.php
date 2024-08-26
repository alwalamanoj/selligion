<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCombinedProductListsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('combined_product_lists', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_combination_id');
            $table->unsignedBigInteger('product_id');
            $table->timestamps();

            $table->foreign('product_combination_id')->references('id')->on('product_combinations')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('combined_product_lists');
    }
}
