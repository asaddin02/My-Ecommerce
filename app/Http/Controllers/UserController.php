<?php

namespace App\Http\Controllers;

use App\Mail\SendEmail;
use App\Models\User;
use Carbon\Carbon;
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
        $datas = User::paginate(10);
        return view('user.table', [
            'datas' => $datas
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
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'role' => ['required'],
            'password' => ['required']
        ]);
        $hash = Hash::make($validate['password']);
        $validate['password'] = $hash;
        $alert = User::create($validate);
        if($alert) {
            return redirect()->back()->with('success', 'Success, New user was added!');
        } else {
            return redirect()->back()->with('error', 'Error, User was not added!');
        }
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
        $user = User::find($id);
        $validate = $request->validate([
            'name' => ['required', 'max:255', 'string'],
            'email' => ['required', 'max:255', 'email'],
            'address' => ['required', 'max:255', 'string'],
            'phone' => ['required', 'numeric'],
            'updated_at' => ['required']
        ]);
        $updated = Carbon::now();
        $validate['updated_at'] = $updated;
        $alert = $user->update($validate);
        if($alert) {
            return redirect()->back()->with('success', 'Success, Your profile updated!');
        } else {
            return redirect()->back()->with('error', 'Errror, Your profile not updated!');
        }
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
        $user = User::find($id);
        if ($pass == true) {
            if ($request->password == $request->password_confirmation) {
                $status = 'success';
                $message = 'Success, Password has changed!';
                $user->update([
                    'password' => Hash::make($request->password),
                    'updated_at' => Carbon::now()
                ]);
            } else {
                $status = 'error';
                $message = 'Error, Password confirmation is incorrect!';
            }
        } else {
            $status = 'error';
            $message = 'Error, Current password is incorrect!';
        }
        return redirect()->back()->with($status, $message);
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
