<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->double('width')->nullable();
            $table->double('height')->nullable();
            $table->double('depth')->nullable();
            $table->double('weight')->nullable();
            $table->bigInteger('amount_in_stock')->default(-1);

            $table->unsignedBigInteger('category_id');

            $table->foreign('category_id')->references('id')->on('categories');
        });

        Schema::table('categories', function (Blueprint $table) {
            $table->unsignedBigInteger('parent_category_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('width');
            $table->dropColumn('height');
            $table->dropColumn('depth');
            $table->dropColumn('weight');
            $table->dropColumn('category_id');
        });
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('parent_category_id');
        });
    }
};
