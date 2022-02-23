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
        Schema::table('users', function (Blueprint $table) {

            $table->string('legal_name')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('sdi_number')->nullable();
            $table->string('certified_email')->nullable();

            $table->unsignedBigInteger('billing_address_id')->nullable();
            $table->foreign('billing_address_id')->references('id')->on('address');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('billing_address_id');
        });
    }
};
