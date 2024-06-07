<?php

namespace App\Http\Controllers\Backend\Vendor;

use App\Http\Controllers\Controller;
use App\Models\ProductSuggest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductSuggestController extends Controller
{
    //
    public function index(){

        $productSuggests = ProductSuggest::all();
        return view('backend.Vendor_Dashboard.product_suggest.index',compact('productSuggests'));

    }

    public function create(){

        return view('backend.Vendor_Dashboard.product_suggest.create');

    }

    public function store(Request $request){

        $data = $request->validate([
            'name'=>'required|string',
            'notes'=>'nullable|string'
        ]);

        ProductSuggest::create([
            'name'=>$data['name'],
            'notes'=>$data['notes'],
            'vendor_id'=>Auth::user()->id
        ]);

        return redirect()->route('vendor.productSuggest.index')->with('toast_success', 'product Suggest added successfully');

    }

    public function edit($id){
        $productSuggest = ProductSuggest::findOrFail($id);
        return view('backend.Vendor_Dashboard.product_suggest.edit',compact('productSuggest'));

    }

    public function update(Request $request, $id){

        $data = $request->validate([
            'name'=>'required|string',
             'notes'=>'nullable|string'
        ]);

        $productSuggest = ProductSuggest::findOrFail($id);

        $productSuggest->update([
            'name'=>$data['name'],
            'notes'=>$data['notes'],
            'vendor_id'=>Auth::user()->id
        ]);

        return redirect()->route('vendor.productSuggest.index')->with('toast_success', 'product Suggest updated successfully');

    }

    public function destroy($id){


        $productSuggest = ProductSuggest::findOrFail($id);

        $productSuggest->delete();

        return redirect()->route('vendor.productSuggest.index')->with('toast_success', 'product Suggest deleted successfully');

    }

}
