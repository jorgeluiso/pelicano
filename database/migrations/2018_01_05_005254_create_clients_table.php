<?php

/* USINGS ********************************************************************/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* CLASS IMPLEMENTATION ******************************************************/

/**
 * @brief Migration implementation for the Clients table.
 */
class CreateClientsTable extends Migration
{
  /**
   * @brief Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('clients', function (Blueprint $table){
      $table->increments('id');
      $table->string('name')->nullable();
      $table->string('phone')->nullable();
      $table->string('email')->nullable();
      $table->boolean('active')->default(true);
      $table->string('erp_id')->nullable();
      $table->timestamps();
    });
  }

  /**
   * @brief Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    if (Schema::hasTable('products') && Schema::hasColumn('products', 'client_id')) 
    {
      Schema::table('services', function (Blueprint $table) {
        $table->dropForeign('products_client_id_foreign');
        $table->dropColumn('client_id');});
    }
    
    if (Schema::hasTable('services') && Schema::hasColumn('services', 'client_id')) 
    {
      Schema::table('services', function (Blueprint $table) {
        $table->dropForeign('services_client_id_foreign');
        $table->dropColumn('client_id');});
    }
    
    Schema::dropIfExists('clients');
  }
}
