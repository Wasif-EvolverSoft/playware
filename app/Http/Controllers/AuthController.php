<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    public function getRegisterPage()
    {
        return view('seller.Auth.register');
    }
    public function registerSeller(Request $request)
    {
        $validatedData = $request->validate([
            'username'                 => 'required|string',
            'FatherName'               => 'required|string',
            'EmailAddress'             => 'required|email|unique:users,email',
            'DateOfBirth'              => 'required|date|before_or_equal:' . now()->subYears(8)->format('Y-m-d'),
            'Address'                  => 'required|string',
            'CNIC'                     => 'required|string|unique:users,CNIC',
            'phoneNumber'              => 'required|string|unique:users,number',
            'password'                 => 'required|min:6|confirmed',
            'password_confirmation'    => 'required|min:6',
            'confirmTermsAndConditions' => 'required',
        ], [
            'username.required'        => 'Please Enter Your Full Name',
            'username.string'          => 'Make Sure To Write Your Name In Correct Format',
            'FatherName.required'      => 'Please Enter Your Father Name',
            'FatherName.string'        => 'Please Enter Your Father Name In Correct Format',
            'EmailAddress.required'    => 'Please Enter Your Email Address',
            'EmailAddress.unique'      => 'This Email Address is already taken. Please log in instead.',

            'DateOfBirth.required'     => 'Please Enter Your Date of Birth',
            'DateOfBirth.date'         => 'Invalid Date Format',
            'DateOfBirth.before_or_equal'
            => 'You must be at least 8 years old to register.',

            'Address.required'         => 'Please Enter Your Address',

            'CNIC.required'            => 'Please Enter Your CNIC',
            'CNIC.unique'              => 'This CNIC is already taken',

            'phoneNumber.required'     => 'Please Enter Your Phone Number',
            'phoneNumber.unique'       => 'This Phone Number is already taken',

            'password.required'        => 'Please Enter Your Password',
            'password.min'             => 'Your Password must be at least 6 characters long',
            'password.confirmed'       => 'Your Password Confirmation does not match',

            'password_confirmation.required'
            => 'Please confirm your password',
            'password_confirmation.min'
            => 'Your Password confirmation must be at least 6 characters',

            'confirmTermsAndConditions.required'
            => 'Please confirm that you agree to our Terms and Conditions',
        ]);

        // Now that the data is valid, we can store it
        $user = new User;
        $user->fullName   = $validatedData['username'];
        $user->fatherName = $validatedData['FatherName'];
        $user->email      = $validatedData['EmailAddress'];
        $user->number     = $validatedData['phoneNumber'];
        $user->address    = $validatedData['Address'];
        $user->dob        = $validatedData['DateOfBirth'];
        $user->CNIC       = $validatedData['CNIC'];
        $user->password   = bcrypt($validatedData['password']);
        $user->save();

        Auth::login($user);

        return redirect()->route('auth.verificationForm');
    }

    public function verificationForm()
    {
        return view('seller.Auth.verification', [
            'title' => 'Verification Form'
        ]);
    }

    public function verifySeller(Request $request)
    {

        // dd($request->all());

        $validate = $request->validate([
            'AccountType' => 'required',
            'cnicNumber' => 'required|string|max:16|unique:users,CNIC',
            'CNICFrontPicture' => 'required|mimes:png,jpg,jpeg',
            'CNICBackPicture' => 'required|mimes:png,jpg,jpeg',
            'shopAddress' => $request->input('AccountType') == 'Shopkeepr' ? 'required' : '',
            'shopName' => $request->input('AccountType') == 'Shopkeepr' ? 'required' : '',
            'shopPicture' => $request->input('AccountType') == 'Shopkeepr' ? 'required|mimes:png,jpg,jpeg' : '',
            'businessCardPicture' => $request->input('AccountType') == 'Shopkeepr' ? 'required|mimes:png,jpg,jpeg' : '',
            'pouhcnic' => 'required|mimes:png,jpg,jpeg'
        ], [
            'AccountType.required' => 'Please select Account Type.',
            'cnicNumber.required' => 'Please Enter Your Correct 13 Digits CNIC Number.', // Corrected the typo here
            'cnicNumber.unique' => 'The CNIC number has already been taken.', // Corrected the typo here
            'CNICFrontPicture.mimes' => 'Make sure to upload image in png, jpg, or jpeg format.',
            'CNICFrontPicture.required' => 'Your CNIC Front Picture is required.',
            'CNICBackPicture.mimes' => 'Make sure to upload image in png, jpg, or jpeg format.',
            'CNICBackPicture.required' => 'Your CNIC Back Picture is required.',
            'shopAddress.required' => 'Your Shop Address is required.',
            'shopPicture.required' => 'Your Shop Picture is required.',
            'businessCardPicture.required' => 'Your Business Card Picture is required.', // Corrected the typo here
            'businessCardPicture.mimes' => 'Make sure to upload image in png, jpg, or jpeg format.', // Added 'jpg' here for consistency
            'shopPicture.mimes' => 'Make sure to upload image in png, jpg, or jpeg format.', // Added 'jpg' here for consistency
        ]);


        $folderPath = 'user_folders/verification/' . Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName);

        if (!file_exists(public_path($folderPath))) {
            mkdir(public_path($folderPath), 0777, true);
        }

        $cnicFrontPicture = $request->file('CNICFrontPicture');
        $cnicFrontPictureName = time() . '_' . 'Front_Picture.png';
        $cnicFrontPicture->move(public_path($folderPath), $cnicFrontPictureName);

        $CNICBackPicture = $request->file('CNICBackPicture');
        $CNICBackPictureName = time() . '_' . 'Back_Picture.png';
        $CNICBackPicture->move(public_path($folderPath), $CNICBackPictureName);

        $pouhcnic = $request->file('pouhcnic');
        $pouhcnicName = time().'_'.'selfie.png';
        $pouhcnic->move(public_path($folderPath), $pouhcnicName);

        $user = User::findOrfail(Auth::user()->id);
        $user->accountType = $validate['AccountType'];
        $user->CNIC = $validate['cnicNumber'];
        $user->CNICFrontPicture = Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName) . '/' . $cnicFrontPictureName;
        $user->CNICBackPicture = Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName) . '/' . $CNICBackPictureName;

        $user->selfie = Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName) . '/' . $pouhcnicName;

        if ($request->input('AccountType') == 'Shopkeepr') {
            $user->ShopAddress = $validate['shopAddress'];
            $user->ShopName = $validate['shopName'];

            $CardPicture = $request->file('businessCardPicture');
            $BusinessCardPicture = time() . '_' . 'business_card.png';
            $CardPicture->move(public_path($folderPath), $BusinessCardPicture);

            $ShopPicture = $request->file('shopPicture');
            $ShopPictureName = time() . '_' . 'shop_picture.png';
            $ShopPicture->move(public_path($folderPath), $ShopPictureName);

            $user->ShopPicture = Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName) . '/' . $BusinessCardPicture;
            $user->ShopBusinessCardPicture = Auth::user()->id . '_' . str_replace(' ', '_', Auth::user()->fullName) . '/' . $ShopPictureName;


        }

        $user->save();

        return redirect(route('seller.dashboard'));
    }

    public function logoutSeller()
    {
        Auth::logout();
        return redirect(route('indexPage'));
    }


    public function getLoginPage()
    {
        return view('seller.Auth.Login');
    }

    public function sellerLogin(Request $request)
    {
        // dd($request->all());
        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->first();

        if ($user && password_verify($password, $user->password)) {
            Auth::login($user);
            return redirect(route('seller.dashboard'));
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }


    // Reset Password
    public function forgotPasswordPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users'
        ]);

        $token = Str::random(64);

        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send("emails.seller.forgot-password", ['token' => $token], function ($message) use ($request) {
            $message->to($request->email);
            $message->subject("Reset Password | Playware");
        });


        return back();
    }

    public function getForgotPasswordPage()
    {
        return view('seller.Auth.forgot-password', [
            'title' => 'Forgot Password',
        ]);
    }


    public function getResetPasswordPage($token)
    {

        $hasToken = DB::table('password_reset_tokens')->where([
            'token' => $token,
        ])->first();

        if (!$hasToken) {
            return redirect(route('seller.login'));
        }

        return view('seller.Auth.Reset', [
            'title' => 'Reset Password',
            'token' => $token,
        ]);
    }
    public function resetPasswordPost(Request $request)
    {
        $request->validate([
            'password' => 'required|string|min:6|confirmed',
            'password_confirmation' => 'required'
        ]);

        $updatePassword = DB::table('password_reset_tokens')->where([
            'token' => $request->token,
            'email' => $request->email,
        ])->first();

        if (!$updatePassword) {
            return back()->withError('Token Is Invalid, Please Request Reset Again');
        }

        User::where('email', $request->email)->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect(route('seller.login'));
    }

    // ADMIN FUNCTIONS
    public function loginAdmin(Request $request)
    {
        $validate = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email', $email)->where('accountType', 'Admin')->first();

        if ($user && password_verify($password, $user->password)) {
            Auth::login($user);
            return redirect()->intended('/admin/dashboard');
        } else {
            return back()->with('error', 'Invalid email or password');
        }
    }
}
