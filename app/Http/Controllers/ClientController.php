<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;

class ClientController extends Controller
{
	public function __construct(Client $client){
		$this->client = $client;
	}
	public function list(Client $client){
		
		$data = [];
		
		// $obj = new \stdClass;
		// $obj->id = 1;
		// $obj->name = 'Safco';
		//
		// $data['clients'][] = $obj;
		// $obj = new \stdClass;
		// $obj->id = 2;
		// $obj->name = 'Interoceanico';
		// $data['clients'][] = $obj;
		$data['clients'] = $this->client->all();
		
		return view('client/list',$data);
	}

	public function edit($client_id, Client $client){
		$obj = $this->client->find($client_id);
		// $obj = new \stdClass;
		// $obj->id = 1;
		// $obj->name = 'Safco';
		
		$data = [];
		$data['edit'] = true;
		$data['client_id'] = $client_id;
		$data['client_name'] = $obj->name;
		
		return view('client/form',$data);
	}
	
	public function create(){
		$data = [];
		$data['edit'] = false;
		return view('client/form',$data);
	}
		
	public function submitCreate(Request $request, Client $client){
		$this->validate($request,
		[
			'name'=>'required',
		]);
		
		
		$data = [];
		$data['id'] = $request->input('id');
		$data['name'] = $request->input('name');
		$client->insert($data);
		return view('client/view',$data);
	}
	
	public function submitEdit(Request $request, Client $client){
		$this->validate($request,
		[
			'name'=>'required',
		]);
		
		$data = [];
		$data['client_id'] = $request->input('id');
		$data['client_name'] = $request->input('name');
		
		
		return redirect('clientes/'.$data['client_id']);
	}
	
	public function show($client_id){
		
		$obj = $this->client->find($client_id);
	  
		$data = [];
		$data['action'] = 'view';
		$data['client_id'] = $client_id;
		$data['client_name'] = $obj->name;
		return view('client/view',$data);
	}
}
