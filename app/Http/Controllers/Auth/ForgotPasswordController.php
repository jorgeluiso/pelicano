<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;

/**
 * @brief This controller is responsible for handling password reset emails and 
 * includes a trait which assists in sending these notifications from 
 * your application to your users. Feel free to explore this trait.
 */
class ForgotPasswordController extends Controller
{
  use SendsPasswordResetEmails;

  /**
   * @brief Initializes an instance of the ForgotPasswordController class.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }
}
