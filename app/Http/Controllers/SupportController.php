<?php

namespace App\Http\Controllers;

use App\Models\Support;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SupportController extends Controller
{
    public function getSupportPage()
    {
        return view('user.pages.support');
    }

    public function postSupport(Request $req)
    {
        // Create a new Support entry
        $support = new Support;
        $support->ticket_type = $req->inquiry_type;
        $support->customer_id = $req->userId;
        $support->vendor_id = $req->has('vendor_id') ? $req->vendor_id : "NON";
        $support->save();

        // Insert message into support_single table
        DB::table('support_single')->insert([
            'ticket_id' => $support->id,
            'userMessage' => $req->message,
            'adminMessage' => 'Sent By User ', // Set a true NULL value for the adminMessage
            'created_at' => now(),  // Add timestamps if your table has them
            'updated_at' => now()
        ]);
    }
}
