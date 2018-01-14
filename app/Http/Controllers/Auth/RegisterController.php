<?php
namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

/**
 * @brief This controller handles the registration of new users as well as their
 * validation and creation. By default this controller uses a trait to
 * provide this functionality without requiring any additional code.
 */
class RegisterController extends Controller
{
  use RegistersUsers;

  /**
   * @brief Indicates the route Where to redirect users after registration.
   *
   * @var string
   */
  protected $redirectTo = '/home';

  /**
   * @brief Initializes an instance of the RegisterController class.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('guest');
  }

  /**
   * @brief Get a validator for an incoming registration request.
   *
   * @param array $data
   * 
   * @return Validator for the registration fields.
   */
  protected function validator(array $data)
  {
    return Validator::make($data,
      [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:6|confirmed'
      ]);
  }

  /**
   * @brief Create a new user instance after a valid registration.
   *
   * @param array $data The new user information.
   * 
   * @return The new user.
   */
  protected function create(array $data)
  {
    return User::create(
      [
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password'])
      ]);
  }
}
