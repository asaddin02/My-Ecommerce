<?php

namespace App\Http\Controllers;

use Midtrans\Snap;
use App\Models\Cart;
use Midtrans\Config;
use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Cart::where('user_id', Auth::user()->id)->get();
        $priceTotal = 0;
        foreach ($datas as $data) {
            $priceTotal += $data->price_items;
        }
        $priceTotalResult = $priceTotal;
        return view('cart', [
            'datas' => $datas,
            'priceTotalResult' => $priceTotalResult
        ]);
    }

    public function addCart()
    {
    }

    public function checkout(Request $request)
    {
    }


    public function updatecart()
    {
        $total = DB::table('carts')->where('user_id', Auth::user()->id)->sum('price_items');
        Config::$serverKey = 'SB-Mid-server-FgSMRXe6gp7YP34lYPxa3knw';
        Config::$isProduction = false;
        Config::$isSanitized = true;
        Config::$is3ds = true;
        $params = array(
            'transaction_details' => array(
                'order_id' => rand(),
                'gross_amount' => $total,
            ),
            "enabled_payments" => [
                "bank_transfer",
                "shopeepay",
            ],
            'customer_details' => array(
                'first_name' => Auth::user()->name,
                'last_name' => '',
                'email' => Auth::user()->email,
                'phone' => Auth::user()->phone,
            ),
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        return response()->json([
            'success' => true,
            'token' => $snapToken,
            'total' => $total,
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
            'user_id' => ['required'],
            'product_id' => ['required'],
            'price_items' => ['required'],
            'qty' => ['required'],
        ]);
        $validate['price_items'] = $request->price_items * $request->qty;
        // $productId = Cart::find($request->product_id);
        // $userId = Cart::find($request->user_id);
        $cart = Cart::where('user_id', $request->user_id)->where('product_id', $request->product_id)->first();
        if ($request->user_id == $cart->user_id && $request->product_id == $cart->product_id) {
            $cart->update([
                'qty' => $request->qty + $cart->qty
            ]);
            dd($cart);
        } else {
            $alert = Cart::create($validate);
        }
        if ($alert) {
            $response = [
                'success' => session('success'),
                'error' => session('error')
            ];
            return response()->json($response);
        } else {
            return response()->with('error', 'Error, Product not added to cart');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        return view('detail.cart');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cart = Cart::find($id);
        $validate = $request->validate([
            'qty' => ['required'],
            'price_items' => ['required'],
        ]);
        $validate['price_items'] = $request->price_items * $request->qty;
        $alert = $cart->update($validate);
        if ($alert) {
            return redirect()->back()->with('success', 'Success, Quantity updated');
        } else {
            return redirect()->back()->with('error', 'Error, Quantity not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cart = Cart::find($id);
        $alert = $cart->delete();
        if ($alert) {
            return redirect()->back()->with('success', 'Success, List cart deleted');
        } else {
            return redirect()->back()->with('error', 'Error, List cart not deleted');
        }
    }
}
