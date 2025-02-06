<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SalaryController extends Controller
{
    
    public function index()
    {
        $job = Job::all();
        return view("salary" , ["jobs" => $job]);
    }


}
