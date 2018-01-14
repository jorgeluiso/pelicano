<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

/**
 * @brief The controller for the home route.
 */
class HomeController extends Controller
{

  /**
   * @brief Initializes an instance of the HomeController class.
   *
   * @return void
   */
  public function __construct()
  {
    $this->middleware('auth');
  }

  /**
   * @brief Show the application dashboard.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
    return view('home');
  }
}
