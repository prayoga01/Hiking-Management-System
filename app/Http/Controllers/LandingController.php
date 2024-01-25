<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
use App\Models\MountainAble;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index(){
        $mountains = Mountain::all();
        return view('landing', compact('mountains'));
    }

    public function show($mountain)
    {
        $value = Mountain::find($mountain);
        $ables = MountainAble::where('mountain_id', $mountain)->get();
        // dd($ables);
        return view('detail',[
            'mountain'=>$value,
            'ables'=>$ables,
        ]);
        
    }
}