<?php

namespace App\Http\Controllers\Admin\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupportTicketController extends Controller
{
    public function getSupportTicketPage()
    {
        return view('admin.pages.Support-Report.ticket', [
            'title' => 'Support Tickets'
        ]);
    }
}
