<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();

            $table->string('slug')->unique();
            $table->string('name');
            $table->string('version')->nullable();
            $table->text('description');
            $table->json('images');
            $table->json('variants');

            $table->double('base_price');
            $table->double('vat_rate');

            $table->boolean('digital')->default(false);
            $table->boolean('required_product_key')->default(false);

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
        Schema::dropIfExists('products');
    }
};
