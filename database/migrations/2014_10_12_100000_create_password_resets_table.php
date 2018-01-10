<?php

/* INCLUDES ******************************************************************/

include_once 'DatabaseConstants.php';

/* USINGS ********************************************************************/

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/* CLASS IMPLEMENTATION ******************************************************/

/**
 * @brief Migration implementation for the PasswordsResets table.
 */
class CreatePasswordResetsTable extends Migration
{
  /**
   * @brief Run the migrations.
   *
   * @return void
   */
  public function up()
  {
    Schema::create('password_resets', function (Blueprint $table){
      $table->string('email', DatabaseConstants::EMAIL_FIELD_SIZE)->index(); 
      $table->string('token');
      $table->timestamp('created_at')->nullable();});
  }

  /**
   * @brief Reverse the migrations.
   *
   * @return void
   */
  public function down()
  {
    Schema::dropIfExists('password_resets');
  }
}
