<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Client;

/**
 * @brief Controller for the requests related to a client.
 */
class ClientController extends Controller
{
  /**
   * @brief Initializes an instance of the ClientController class.
   * 
   * @param Client $client The client.
   */
  public function __construct(Client $client)
  {
    $this->middleware('auth');
    $this->client = $client;
  }

  /**
   * @brief Handles the request the list of clients. 
   * 
   * @param Client $client
   * 
   * @return The view that lists the clients.
   */
  public function list(Client $client)
  {
    $data = [];
    
    $data['clients'] = $this->client->all();
    
    return view('client/list', $data);
  }

  /**
   * @brief Handles the request to create a client.
   * 
   * @return The view that creates the clients.
   */
  public function create()
  {
    $data = [];
    
    $data['edit'] = false;
    
    return view('client/form', $data);
  }

  /**
   * @brief Saves a new client from a request.
   * 
   * @param Request $request The request.
   * 
   * @return Redirect to the client's information page.
   */
  public function submitCreate(Request $request)
  {
    $this->validate($request, [ 'name'  => 'required' ]);
    $this->validate($request, [ 'phone' => 'required' ]);
    $this->validate($request, [ 'email' => 'required' ]);
    
    $client = new Client();
    
    $client->name  = $request->name;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->save();
    
    return redirect('client/' . $client->id);
  }

  /**
   * @brief Edits a client's information from a request.
   * 
   * @param Request $request The request.
   * 
   * @return Rediction to the clients list.
   */
  public function submitEdit(Request $request)
  {
    $this->validate($request, [ 'name'  => 'required' ]);
    $this->validate($request, [ 'phone' => 'required' ]);
    $this->validate($request, [ 'email' => 'required' ]);
    
    $client = $this->client->find($request->id);
    
    $client->name  = $request->name;
    $client->phone = $request->phone;
    $client->email = $request->email;
    $client->save();
    
    return redirect('client/' . $client->id);
  }

  /**
   * @brief Handles the request to show a client's information.
   * 
   * @param unknown $client_id The id of the client to show.
   * 
   * @return The view that shows the information of a client.
   */
  public function show($client_id)
  {
    $obj  = $this->client->find($client_id);
    $data = [];
    
    $data['client_id']    = $obj->id;
    $data['client_name']  = $obj->name;
    $data['client_phone'] = $obj->phone;
    $data['client_email'] = $obj->email;
    
    return view('client/view', $data);
  }

  /**
   * @brief Handles the request to edit a client's information.
   *
   * @param unknown $client_id The id of the client to edit.
   *
   * @return The view that allows to edit the information of a client.
   */
  public function edit($client_id)
  {
    $obj  = $this->client->find($client_id);
    $data = [];
    
    $data['edit']         = true;
    $data['client_id']    = $obj->id;
    $data['client_name']  = $obj->name;
    $data['client_phone'] = $obj->phone;
    $data['client_email'] = $obj->email;
    
    return view('client/form', $data);
  }
}
