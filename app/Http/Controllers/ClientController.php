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
		// $obj->name = 'Safco'; ̰
		//
		// $data['clients'][] = $obj;
		// $obj = new \stdClass;
		// $obj->id = 2;
		// $obj->name = 'Interoceanico';
		// $data['clients'][] = $obj;
		$data['clients'] = $this->client->all();
		
		return view('client/list',$data);
	}

	public function create(){
		$data = [];
		$data['edit'] = false;
		return view('client/form',$data);
	}
		
	public function submitCreate(Request $request){
		$this->validate($request,
		[
			'name'=>'required',
		]);
		$client = new Client;
        $client->name = $request->name;
		$client->save();
		
		return redirect('clientes/' . str($client->id));
	}
	
	public function submitEdit(Request $request){
		$this->validate($request,
		[
			'name'=>'required',
		]);
		$obj = $this->client->find($request->id);
		$obj->name = $request->name;
		$obj->save();
		return redirect('clientes/'.str($obj->id));
	}
	
	public function show($client_id){
		
		$obj = $this->client->find($client_id);
	  
		$data = [];
		$data['client'] = $obj;
		return view('client/view',$data);
	}

	public function edit($client_id){
		$obj = $this->client->find($client_id);
		
		$data = [];
		$data['edit'] = true;
		$data['client'] = $obj;
		
		return view('client/form',$data);
	}
}
