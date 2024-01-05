<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Heir;

class DashboardHistoryController extends Controller
{
    //
    public function index()
    {   
        // return post::all();
        return view('dashboard.history.historyfix',[
            'heirs' => heir::where('user_id', auth()->id())->get()
        ]);
    }
}