<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Asset;

/**
 * @brief Controller for the requests related to an asset.
 */
class AssetController extends Controller
{
  /**
   * @brief Initializes an instance of the AssetController class.
   *
   * @param Asset $asset The asset.
   */
  public function __construct(Asset $asset)
  {
    $this->middleware('auth');
    $this->asset = $asset;
  }
  
  /**
   * @brief Handles the request the list of assets.
   *
   * @param Asset $asset
   *
   * @return The view that lists the assets.
   */
  public function list(Asset $asset)
  {
    $data = [];
    
    $data['assets'] = $this->asset->all();
    
    return view('asset/list', $data);
  }
  
  /**
   * @brief Handles the request to create an asset.
   *
   * @return The view that creates the assets.
   */
  public function create()
  {
    $asset = new Asset();
    
    return view('asset/form', [ 'asset' => $asset ]);
  }
  
  /**
   * @brief Saves a new asset from a request.
   *
   * @param Request $request The request.
   *
   * @return Redirect to the asset's information page.
   */
  public function submitCreate(Request $request)
  {
    $asset = new Asset($request->all());
    $asset->save();
    
    return $request->all();
  }
  
  /**
   * @brief Edits an asset's information from a request.
   *
   * @param Request $request The request.
   *
   * @return Redirect to the assets list.
   */
  public function submitEdit(Request $request)
  {
    $asset = $this->asset->find($request->id);
    $asset->update($request->all());
    
    return redirect('asset/' . $asset->id);
  }
  
  /**
   * @brief Handles the request to show a asset's information.
   *
   * @param unknown $asset_id The id of the asset to show.
   *
   * @return The view that shows the information of a asset.
   */
  public function show($asset_id)
  {
    $asset  = $this->asset->find($asset_id);
    $data = [];
    
    $data['asset_id']     = $asset->id;
    $data['asset_name']   = $asset->name;
    $data['asset_type']   = $asset->type;
    $data['asset_plate']  = $asset->plate;
    $data['asset_serial'] = $asset->serial;
    $data['asset_year']   = $asset->year;
    
    return view('asset/view', $data);
  }
  
  /**
   * @brief Handles the request to edit an asset's information.
   *
   * @param $asset_id The id of the asset to edit.
   *
   * @return The view that allows to edit the information of an asset.
   */
  public function edit($asset_id)
  {
    $asset = $this->asset->find($asset_id);

    return view('asset/form', [ 'asset' => $asset ]);
  }
}
