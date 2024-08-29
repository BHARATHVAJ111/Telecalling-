<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Assets;
use App\Models\EngineerStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StoreController extends Controller
{
    public function indexstore(Request $request){
        // $assets=Assets::all();
        // $engineer=EngineerStore::all();
        $assets=[];
        $engineer=[];
        return view('employee.index',compact('assets','engineer'));
    }
    public function report(Request $request){
        $assets=Assets::all();
        $engineer=EngineerStore::all();
        return view('store',compact('assets','engineer'));
    }

    public function partsshow(Request $request){
        $id=$request->id;
        $partsshow=Assets::findOrFail($id);
        return view('parts.partsshow',compact('partsshow'));   
    }

    public function partsedit(Request $request){
        $id=$request->id;
        $edit=Assets::findOrFail($id);
        return view('parts.partsedit',compact('edit'));
    }
    public function partsupdate(Request $request)
    {
        $id = $request->id;
        $validatedData = Validator::make($request->all(), [
            'material_name' => 'required|string',
            'location' => 'required|string',
            'material_type' => 'required|string',
            'quantity' => 'required|string',
            'number_of_quantity' => 'required|numeric',
            'description' => 'required|string',
        ]);
    
        if ($validatedData->fails()) {
            return redirect()->back()->withErrors($validatedData)->withInput();
        }
    
        Assets::where('id', $id)->update([
            'material_name' => $request->input('material_name'),
            'location' => $request->input('location'),
            'material_type' => $request->input('material_type'),
            'quantity' => $request->input('quantity'),
            'number_of_quantity' => $request->input('number_of_quantity'),
            'description' => $request->input('description'),
        ]);
    
        return redirect()->route('store.index')->with('success', 'Parts updated successfully');
    }
    public function partsdelete(Request $request){
        $id=$request->id;
        $parts=Assets::findOrFail($id);
        $parts->delete();
        return redirect()->route('store.index')->with('success', 'Parts Deleted successfully');

       }
}
