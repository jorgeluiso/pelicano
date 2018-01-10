<?php

/* INCLUDES ******************************************************************/

include_once 'DatabaseConstants.php';

/* USINGS ********************************************************************/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* CLASS IMPLEMENTATION ******************************************************/

/**
 * @brief Migration implementation for the Users table.
 */
class CreateUsersTable extends Migration
{
  /**
   * @brief Run the migrations.
   * 
   * @return void
   */
  public function up()
  {
    Schema::create('users', function (Blueprint $table){
      $table->increments('id');
      $table->string('name');
      $table->string('email', DatabaseConstants::EMAIL_FIELD_SIZE)->unique();
      $table->string('password');
      $table->rememberToken();
      $table->timestamps();});
  }
  
  /**
   * @brief Reverse the migrations.
   * 
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('users');
  }
}
