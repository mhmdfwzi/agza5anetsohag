<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductName;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class ProductNameController extends Controller
{
    //
    public function index(){

        return view('backend.Admin_Dashboard.product_name.index');

    }

    // public function getData(){

    //      // $productNames = ProductName::all();
    //      $productNames = ProductName::select(['id', 'name']);

    //      return DataTables::of($productNames)
    //      ->addColumn('actions', function($productName) {
    //          $editButton = '<a href="'.route('admin.productName.edit', $productName->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>';
    //          // $deleteButton = '<form action="'.route('admin.productName.destroy', $productName->id).'" method="post" style="display:inline">@csrf @method('delete')<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></form>';
    //          return $editButton ;
    //      })
    //      ->rawColumns(['actions'])
    //      ->make(true);

    // }
    public function show(){

        // $productNames = ProductName::all();
        $productNames = ProductName::select(['id', 'name']);

        return DataTables::of($productNames)
        ->addColumn('actions', function($productName) {
            $editButton = '<a href="'.route('admin.productName.edit', $productName->id).'" class="btn btn-warning btn-sm"><i class="fa fa-edit"></i></a>';
            $deleteButton = '<form action="'.route('admin.productName.destroy', $productName->id).'" method="post" style="display:inline;">'.csrf_field().method_field('delete').'<button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button></form>';
            return $editButton . ' ' . $deleteButton;
        })
        ->rawColumns(['actions'])
        ->make(true);

    }

    public function create(){

        return view('backend.Admin_Dashboard.product_name.create');

    }

    public function store(Request $request){

        $data = $request->validate([
            'name'=>'required|string',
            'note'=>'nullable|string'
        ]);

        ProductName::create([
            'name'=>$data['name'],
            'note'=>$data['note'],
        ]);

        return redirect()->route('admin.productName.index')->with('toast_success', 'product Name added successfully');

    }

    public function edit($id){
        $productName = ProductName::findOrFail($id);
        return view('backend.Admin_Dashboard.product_name.edit',compact('productName'));

    }

    public function update(Request $request, $id){

        $data = $request->validate([
            'name'=>'required|string',
             'note'=>'nullable|string'
        ]);

        $productName = ProductName::findOrFail($id);

        $productName->update([
            'name'=>$data['name'],
            'note'=>$data['note'],
            'admin_id'=>Auth::user()->id
        ]);

        return redirect()->route('admin.productName.index')->with('toast_success', 'product Name updated successfully');

    }

    public function destroy($id){


        $productName = ProductName::findOrFail($id);

        $productName->delete();

        return redirect()->route('admin.productName.index')->with('toast_success', 'product Name deleted successfully');

    }

}
