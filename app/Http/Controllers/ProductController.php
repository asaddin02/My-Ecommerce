<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        $datas = Product::paginate(10);
        return view('product.table', [
            'datas' => $datas,
            'categories' => $categories,
        ]);
    }

    public function product(Request $request)
    {
        if(isset($request['search'])) {
            if($request['search'] == null) {
                $datas = Product::all();
            } else {
                $input = $request['search'];
                $datas = Product::where('name', 'LIKE', '%'.$input.'%')->paginate(10);
            }
        } else {
            $datas = Product::all();
        }
        return view('product', [
            'datas' => $datas
        ]);
    }

    public function detail($id) {
        $product = Product::find($id);
        $datas = Product::where('category_id', '=', $product['category_id'])->get();
        return view('product-detail', [
            'product' => $product,
            'datas' => $datas,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'max:255', 'string'],
            'price' => ['required'],
            'desc' => ['required', 'max:255', 'string'],
            'image' => ['required', 'max:10000', 'mimes:jpg,png,svg'],
        ]);
        $image = $request->file('image')->store('product/image');
        $validate['image'] = $image;
        $alert = Product::create($validate);
        if ($alert) {
            return redirect()->back()->with('success', 'Success, New product has been added!');
        } else {
            return redirect()->back()->with('error', 'Error, Add product error!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
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
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = Product::find($id);
        $validate = $request->validate([
            'category_id' => ['required'],
            'name' => ['required', 'max:255', 'string'],
            'price' => ['required'],
            'desc' => ['required', 'max:255', 'string'],
            'image' => ['required', 'max:10000', 'mimes:jpg,png,svg'],
        ]);
        if(Storage::fileExists($product['image'])) {
            Storage::delete($product['image']);
            $image = $request->file('image')->store('product/image');
        } else {
            $image = $request->file('image')->store('product/image');
        }
        $validate['image'] = $image;
        $alert = $product->update($validate);
        if($alert) {
            return redirect()->back()->with('success', 'Success, Product updated!');
        } else {
            return redirect()->back()->with('error', 'Error, Product not updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\test  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        if(Storage::fileExists($product['image'])) {
            Storage::delete($product['image']);
            $alert = $product->delete();
        } else {
            $alert = $product->delete();
        }
        if($alert) {
            return redirect()->back()->with('success', 'Success, Product deleted!');
        } else {
            return redirect()->back()->with('error', 'Error, Product not deleted!');
        }
    }
}
