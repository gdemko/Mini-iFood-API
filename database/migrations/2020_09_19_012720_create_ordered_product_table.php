<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderedProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ordered_product', function (Blueprint $table) {

            $table->foreignId('ordered_id')->references('id')->on('ordereds');
            $table->foreignId('product_id')->references('id')->on('products');
            $table->decimal('value', 8, 2);

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
        Schema::dropIfExists('ordered_product');
    }
}
