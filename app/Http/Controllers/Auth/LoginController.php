<?php
namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

/**
 * @brief This controller handles authenticating users for the application and
 * redirecting them to your home screen. The controller uses a trait
 * to conveniently provide its functionality to your applications.
 */
class LoginController extends Controller
{
  use AuthenticatesUsers;

  /**
   * @brief Indicates the route where to redirect users after login.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * @brief Initializes an instance of the LoginController class.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest')->except('logout');
  }

  /**
   * @brief Handles the request to logout an user·
   * 
   * @param Request $request The request information.
   * 
   * @return The response to the logout request.
   */
  public function logout(Request $request)
  {
    Auth::logout();
    return redirect('/login');
  }
}
