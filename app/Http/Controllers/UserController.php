<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use GuzzleHttp\RetryMiddleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
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
        //
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
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'numeric'],
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

    public function updatePassword(Request $request, $id)
    {
        $pass = Hash::check($request->current_password, Auth::user()->password);
        $data = User::find($id);
        if ($pass == true) {
            if ($request->password == $request->password_confirmation) {
                Session::flash('success');
                Session::flash('message', 'Success password has changed!');
                $data->update([
                    'password' => Hash::make($request->password),
                ]);
            } else {
                Session::flash('error');
                Session::flash('message', 'Password confirmation is incorrect!');
            }
        } else {
            Session::flash('error');
            Session::flash('message', 'Current password is incorrect!');
        }
        return redirect()->back();
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
        Alert::success('Success', 'Email sent successfully!')->autoClose(3000);
        return redirect()->back();
    }
}
