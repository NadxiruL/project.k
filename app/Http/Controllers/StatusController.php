<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;

class StatusController extends Controller
{
    public function store(Request $request)
    {

      

    }


    public function show(){

        $statuses = Status::all();
        
        return view('tasklist',[
            'statuses' => $statuses,
        ]); 
    }
}
