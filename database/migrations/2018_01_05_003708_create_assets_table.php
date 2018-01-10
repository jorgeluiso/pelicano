<?php

/* USINGS ********************************************************************/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* CLASS IMPLEMENTATION ******************************************************/

/**
 * @brief Migration implementation for the Assets table.
 */
class CreateAssetsTable extends Migration
{
  /**
   * Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('assets', function (Blueprint $table){
      $table->increments('id');
      $table->string('name')->nullable();
      $table->string('type')->nullable();
      $table->string('plate')->nullable();
      $table->string('serial')->nullable();
      $table->integer('year')->unsigned()->nullable();
      $table->string('erp_id')->nullable();
      $table->string('erp_class')->nullable();
      $table->boolean('active')->default(true);
      $table->timestamps();});
  }

  /**
   * Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('assets');
  }
}
