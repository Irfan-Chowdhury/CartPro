<?php

namespace App\Http\Controllers\frontend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\ProductAttribute;
use App\Brand;
use App\Collection;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::where('parent',null)->get();
        $brand = Brand::get();
        $product = Product::orderByDesc('id')->with('categories')->limit(3)->get();
        //return $product;
        return view('pages.index',compact('category','brand','product'));
    }
    public function SubcategoryView($slug)
    {
        $collection = Collection::select('id','name')->where('slug',$slug)->first();
        $products = Product::where('collection_id', 'like', "%".$collection->id."%")->with('categories')->get();
        return view('pages.products',compact('collection','products'));        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function productdetailsview($slug,$sku)
    {
        $product = Product::where('slug',$slug)->where('sku',$sku)->first();

        $attributes = ProductAttribute::where('product_id', $product->id)->where('qty', '>', 0)->get();
        //return $attributes;
         
        return view('pages.product-details',compact('product','attributes'));
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
