<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('id');
            $table->string('type')->nullable();
            $table->date('service_date')->nullable();
            $table->time('service_time')->nullable();
            $table->string('client_ref')->nullable();
            $table->string('operator')->nullable();
            $table->string('unit')->nullable();
            $table->decimal('quantity', 8, 2)->nullable();
            $table->decimal('price', 8, 2)->nullable();
            $table->decimal('total', 8, 2)->nullable();
            $table->string('erp_activity')->nullable();
            $table->string('erp_invoice')->nullable();
            $table->enum('status',['open','done','canceled','deleted','nonbillable'])->default('done');
            $table->text('notes')->nullable();
            $table->integer('client_id')->unsigned()->nullable();
            $table->foreign('client_id')->references('id')->on('clients');
            $table->integer('product_id')->unsigned()->nullable();
            $table->foreign('product_id')->references('id')->on('products');
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
        Schema::dropIfExists('services');
    }
}
