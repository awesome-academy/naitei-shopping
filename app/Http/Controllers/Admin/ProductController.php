<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Excel;
use App\Imports\ProductsImport;
use App\Category;
use App\Product;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::all();

        return view ('admin.product', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view ('admin.create.create_product', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->file('image') != NULL){   
            if ($request->file('image')->isValid()){
                $fileExtension = $request->file('image')->getClientOriginalExtension();
                $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
                $uploadPath = public_path('/dataImages');
                $request->file('image')->move($uploadPath, $fileName);
            }
        }
        $product = Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'status' => 1,
            'img' => $fileName,
        ]);
        foreach ($request->categories as $category){
            $product->categories()->attach($category);
        }

        return redirect()->route('admin_product_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::findOrFail($id);

        return view ('admin.show.show_product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::findOrFail($id); //get info product
        $product_c = array();
        foreach ($product->categories as $category) {
            array_push ($product_c, $category->id);
        }
        $categories = Category::all();     //get all categories

        return view ('admin.edit.edit_product', compact('product', 'categories', 'product_c'));
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
        $product = Product::findOrFail($id);
        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
        ]);
        if ($request->file('image') != NULL){   
            if ($request->file('image')->isValid()){
                $fileExtension = $request->file('image')->getClientOriginalExtension();
                $fileName = time() . "_" . rand(0,9999999) . "." . $fileExtension;
                $uploadPath = public_path('/dataImages');
                $request->file('image')->move($uploadPath, $fileName);
                $product->update([
                    'img' => $fileName,
                ]);
            }
        }
        $product->categories()->detach(); 
        foreach ($request->categories as $category){
            $product->categories()->attach($category);
        }

        return redirect()->route('admin_product_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->categories()->detach();
        $product->delete();

        return redirect()->route('admin_product_index');
    }

    public function importData(Request $req){
        Excel::import(new ProductsImport,request()->file('file'));

        return back();
    }
}
