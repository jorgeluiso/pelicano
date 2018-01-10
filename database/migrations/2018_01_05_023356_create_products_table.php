<?php

/* USINGS ********************************************************************/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* CLASS IMPLEMENTATION ******************************************************/

/**
 * @brief Migration implementation for the Products table.
 */
class CreateProductsTable extends Migration
{
  /**
   * @brief Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('products', function (Blueprint $table){
      $table->increments('id');
      $table->string('name');
      $table->decimal('sugested_price', 8, 2)->nullable();
      $table->string('erp_id')->nullable();
      $table->boolean('active')->default(true);
      $table->integer('client_id')->unsigned()->nullable();
      $table->foreign('client_id')->references('id')->on('clients');
      $table->timestamps();});
  }

  /**
   * @brief Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('services') && Schema::hasColumn('services', 'product_id'))
    {
      Schema::table('services', function (Blueprint $table) {
          $table->dropForeign('services_product_id_foreign');
          $table->dropColumn('product_id');});
    }
      
    Schema::dropIfExists('products');
  }
}
