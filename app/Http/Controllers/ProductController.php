<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
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
        if (isset($request['search'])) {
            if ($request['search'] == null) {
                $datas = Product::all();
            } else {
                $input = $request['search'];
                $datas = Product::where('name', 'LIKE', '%' . $input . '%')->paginate(10);
            }
            return view('/product', ['datas' => $datas]);
        } elseif (isset($request['filter'])) {
            if ($request['filter'] == null) {
                $datas = Product::all();
            } else {
                $filter = $request['filter'];
                $datas = Product::join('categories', 'products.category_id', '=', 'categories.id')
                    ->where('categories.name', 'LIKE', '%' . $filter . '%')
                    ->paginate(10);
            }
            return view('/product', ['datas' => $datas]);
        } else {
            $hats = Product::whereHas('category', function($category) {
                $category->where('name', '=', 'Hat');
            })->get();
            $jackets = Product::whereHas('category', function($category) {
                $category->where('name', '=', 'Jacket');
            })->get();
            $tshirts = Product::whereHas('category', function($category) {
                $category->where('name', '=', 'Tshirt');
            })->get();
            $pants = Product::whereHas('category', function($category) {
                $category->where('name', '=', 'Pants');
            })->get();
            $shoes = Product::whereHas('category', function($category) {
                $category->where('name', '=', 'Shoes');
            })->get();
            return view('product', [
                'hats' => $hats,
                'jackets' => $jackets,
                'tshirts' => $tshirts,
                'pants' => $pants,
                'shoes' => $shoes,
            ]);
        }
    }

    public function detail($id)
    {
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
            'product_name' => ['required', 'max:255', 'string'],
            'price' => ['required'],
            'desc' => ['required', 'max:255', 'string'],
            'image' => ['required', 'max:10000', 'mimes:jpg,png,svg'],
            'qty' => ['required'],
        ]);
        if ($request->category_name == 'Hat') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 13;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 14;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 15;
            }
        } elseif ($request->category_name == 'Jacket') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 10;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 11;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 12;
            }
        } elseif ($request->category_name == 'Tshirt') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 7;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 8;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 9;
            }
        } elseif ($request->category_name == 'Pants') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 4;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 5;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 6;
            }
        } elseif ($request->category_name == 'Shoes') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 1;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 2;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 3;
            }
        }
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
            'product_name' => ['required', 'max:255', 'string'],
            'price' => ['required'],
            'desc' => ['required', 'max:255', 'string'],
            'image' => ['required', 'max:10000', 'mimes:jpg,png,svg'],
            'qty' => ['required'],
        ]);
        if ($request->category_name == 'Hat') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 13;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 14;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 15;
            }
        } elseif ($request->category_name == 'Jacket') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 10;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 11;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 12;
            }
        } elseif ($request->category_name == 'Tshirt') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 7;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 8;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 9;
            }
        } elseif ($request->category_name == 'Pants') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 4;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 5;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 6;
            }
        } elseif ($request->category_name == 'Shoes') {
            if ($request->category_for == 'Man') {
                $validate['category_id'] = 1;
            } elseif ($request->category_for == 'Woman') {
                $validate['category_id'] = 2;
            } elseif ($request->category_for == 'Kids') {
                $validate['category_id'] = 3;
            }
        }
        if (Storage::fileExists($product['image'])) {
            Storage::delete($product['image']);
            $image = $request->file('image')->store('product/image');
        } else {
            $image = $request->file('image')->store('product/image');
        }
        $validate['image'] = $image;
        $alert = $product->update($validate);
        if ($alert) {
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
        if (Storage::fileExists($product['image'])) {
            Storage::delete($product['image']);
            $alert = $product->delete();
        } else {
            $alert = $product->delete();
        }
        if ($alert) {
            return redirect()->back()->with('success', 'Success, Product deleted!');
        } else {
            return redirect()->back()->with('error', 'Error, Product not deleted!');
        }
    }
}
