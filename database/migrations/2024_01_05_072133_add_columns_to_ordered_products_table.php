<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrderedProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ordered_products', function (Blueprint $table) {
            $table->decimal('taxable_amount', 8, 2)->nullable();
            $table->decimal('total_tax', 8, 2)->nullable();
            $table->decimal('promo_discount', 8, 2)->nullable()->default(0);
            $table->decimal('combo_discount', 8, 2)->nullable()->default(0);
            $table->decimal('tax_percentage', 5, 2)->nullable();
            $table->integer('quantity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ordered_products', function (Blueprint $table) {
            $table->dropColumn('taxable_amount');
            $table->dropColumn('total_tax');
            $table->dropColumn('promo_discount');
            $table->dropColumn('combo_discount');
            $table->dropColumn('tax_percentage');
            $table->dropColumn('quantity');
        });
    }
}
