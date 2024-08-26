<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MakeCombinationDescriptionNullableInProductCombinationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('product_combinations', function (Blueprint $table) {
            $table->string('combination_description')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('product_combinations', function (Blueprint $table) {
            $table->string('combination_description')->nullable(false)->change();
        });
    }
}
