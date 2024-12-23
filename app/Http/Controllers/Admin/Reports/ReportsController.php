<?php

namespace App\Http\Controllers\Admin\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function getReportsPage(){
        return view('admin.pages.Support-Report.report',[
            'title' => 'Reports'
        ]);
    }
}
