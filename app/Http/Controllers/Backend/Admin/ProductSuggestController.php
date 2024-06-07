<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSuggest;
use Illuminate\Http\Request;

class ProductSuggestController extends Controller
{
    //

    public function index(){

        $productSuggests = ProductSuggest::with('vendor')->get();
        return view('backend.Admin_Dashboard.product_suggest.index',compact('productSuggests'));

    }
}
