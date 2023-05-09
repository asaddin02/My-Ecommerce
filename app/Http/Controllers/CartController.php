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
        $carts = Cart::where('user_id',Auth::user()->id)->get();
        $kosong = "There are no items purchased";
        $kosong2 = "Go to the store to purchase items";
        $preloader = true;
        // $total = DB::table('carts')->where('user_id',Auth::user()->id)->sum('price_items');
        // if(count($carts) > 0){
        //     Config::$serverKey = 'SB-Mid-server-FgSMRXe6gp7YP34lYPxa3knw';
        //     Config::$isProduction = false;
        //     Config::$isSanitized = true;
        //     Config::$is3ds = true;
        //     $params = array(
        //         'transaction_details' => array(
        //             'order_id' => rand(),
        //             'gross_amount' => $total,
        //         ),
        //         "enabled_payments" => [
        //           "bank_transfer",
        //           "shopeepay",
        //         ],
        //         'customer_details' => array(
        //             'first_name' => Auth::user()->name,
        //             'last_name' => '',
        //             'email' => Auth::user()->email,
        //             'phone' => Auth::user()->phone,
        //         ),
        //     );
        //     $snapToken = \Midtrans\Snap::getSnapToken($params);
        // }
        return view('cart',compact('carts','kosong','kosong2','preloader'));
    }

    public function checkout(Request $request)
    {
       
    }


    public function updatecart()
    {
        $total = DB::table('carts')->where('user_id',Auth::user()->id)->sum('price_items');
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
        $duplicate = Cart::where('product_id',$request->product_id)->first();
        if($duplicate){
            return redirect('cart')->with('error','This item is already in the cart');
        }
        Cart::create($request->all());
        return redirect('cart')->with('success','Successfully added item to cart');
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
    public function update(Request $request, Cart $cart)
    {
        $cart->update([
            'qty' => $request->qty,
            'price_items' => $request->price_items * $request->qty,
        ]);
        return response()->json([
            'success' => true,
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        $cart->delete();
        return back();
    }

    
}
