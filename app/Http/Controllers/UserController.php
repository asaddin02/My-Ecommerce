<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Auth::user();
        return view('profile.profile',compact('data'));
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
        $data = User::find($id);
        $request->validate([
            'name' => ['required', 'max:255','string'],
            'email' => ['required', 'max:255','email'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required','numeric'],
        ]);
        $data->update($request->all());
        Alert::success('Success', 'Data Changed Successfully')->autoClose(3000);
        return redirect()->back();
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

    public function password(Request $request, $id)
    {
        $pass = Hash::check($request->oldpass,Auth::user()->password);
        $data = User::find($id);
        if($request->oldpass == $pass){
            if($request->password == $request->repassword){
                Alert::success('Success', 'Data Changed Successfully')->autoClose(3000);
                $data->update([
                    'password' => Hash::make($request->password),
                ]);
            } else{
                Alert::warning('Error', 'The Password You Entered is Incorrect')->autoClose(3000);
            }
        } else{
            Alert::warning('Error', 'The Password You Entered is Incorrect')->autoClose(3000);
        }
        return redirect()->back();
    }

    public function sandi(Request $request){
        return view('layouts.app');
    }

    public function contact()
    {
        $preloader = true;
        return view('contact',compact('preloader'));
    }

    public function send(Request $request)
    {
        $massage = "Nama : $request->name <br>";
        $massage .= "Alamat : $request->address <br>";
        $massage .= "Feedback : $request->feedback <br>";
        $data = [
            'subject' => "Feedback My-ecommerce",
            'sender_name' => $request->email,
            'isi' => $massage
        ];
        Mail::to('prasada.arif@gmail.com')->send(new SendEmail($data));
        Alert::success('Success','Email sent successfully!')->autoClose(3000);
        return redirect()->back();
    }
}
