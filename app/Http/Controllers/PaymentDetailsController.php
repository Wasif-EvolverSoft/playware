<?php

namespace App\Http\Controllers;

use App\Models\payment_details;
use Auth;
use Illuminate\Http\Request;

class PaymentDetailsController extends Controller
{
    public function index()
    {
        $paymentDetails = payment_details::where('user_id', Auth::id())->get();
        return view('payment_details.index', compact('paymentDetails'));
    }

    public function create()
    {
        return view('payment_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_title' => 'required',
        ]);

        payment_details::create([
            'user_id' => Auth::id(),
            'bank_name' => $request->bank_name,
            'account_number' => $request->account_number,
            'account_title' => $request->account_title,
            'iban' => $request->iban,
            'swift_code' => $request->swift_code,
            'branch_address' => $request->branch_address,
        ]);

        return redirect()->route('payment_details.index')->with('success', 'Payment detail added successfully.');
    }

    public function edit(payment_details $paymentDetail)
    {
        return view('payment_details.edit', compact('paymentDetail'));
    }

    public function update(Request $request, payment_details $paymentDetail)
    {
        $request->validate([
            'bank_name' => 'required',
            'account_number' => 'required',
            'account_title' => 'required',
        ]);

        $paymentDetail->update($request->all());

        return redirect()->route('payment_details.index')->with('success', 'Payment detail updated successfully.');
    }

    public function destroy(payment_details $paymentDetail)
    {
        $paymentDetail->delete();

        return redirect()->route('payment_details.index')->with('success', 'Payment detail deleted successfully.');
    }    
}
