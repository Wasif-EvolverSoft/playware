<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserAuthController extends Controller
{
    public function signUp()
    {

        if (!Auth::check()) {
            return view('user.Pages.sign-up');
        } else {
            return redirect('/'); // or wherever you want authenticated users to go
        }
    }
    public function signUpUser(Request $req)
    {

        $req->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'password' => 'required|min:6',
            'number' => 'required',
            'email' => 'required|unique:users|email',
            'dob' => 'required'
        ]);

        $newUser = new User;
        $newUser->fullName = $req->firstname . ' ' . $req->lastname;
        $newUser->password = Hash::make($req->password);
        $newUser->number = $req->number;
        $newUser->email = $req->email;
        $newUser->dob = $req->dob;
        $newUser->fatherName = 'none';
        $newUser->address = 'Not Provided';
        $newUser->accountType = 'Customer';


        if ($newUser->save()) {
            Auth::login($newUser);
            return redirect('/')->with('success', 'Account Registered Successfully');
        } else {
            return redirect()->back()->with('error', 'Something Went Wrong');
        }
    }


    public function getLoginPage()
    {
        if (!Auth::check()) {
            return view('user.Pages.login');
        } else {
            return redirect('/'); // or wherever you want authenticated users to go
        }
    }

    public function loginUser(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ]);

        // Attempt to login with the given credentials
        if (Auth::attempt($credentials)) {
            // Authentication was successful
            $request->session()->regenerate(); // Regenerate session to prevent session fixation

            return redirect()->intended('/'); // Redirect to intended page or dashboard
        }

        // If the login attempt was unsuccessful, redirect back with an error
        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ])->onlyInput('username');
    }


    public function getAccountPage(){
        $user = Auth::user();
        if(!$user){
            return redirect()->route('login-user');
        }

        $subQuery = Order::select('parent_order_id', DB::raw('MIN(id) as id'))
            ->where('customer_id', $user->id)
            ->groupBy('parent_order_id');

        



        return view('user.Pages.account', compact('user', ));
    }

    public function userUpdateData(Request $req){
        $user = User::findorfail(Auth::user()->id);

        if($user){
            $user->fullName = $req->fullName;
            if($req->password !== ''){
                $user->password = Hash::make($req->password);
            }
            $user->number = $req->number;
            $user->Email = $req->email;
            $user->dob = $req->dob;
            $user->save();
        }
        return redirect('/my-account')->with('success', 'Saved Sucessfully');
    }

    public function logoutUser(){
        if(!Auth::check()){
            return redirect()->route('login-user');
        }

        Auth::logout();
        return redirect()->route('login-user');
    }


}
