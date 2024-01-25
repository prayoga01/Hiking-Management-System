<?php

namespace App\Http\Controllers;

use App\Models\MountainAble;
use App\Models\Mountain;
use App\Http\Requests\StoreMountainAbleRequest;
use App\Http\Requests\UpdateMountainAbleRequest;
use RealRashid\SweetAlert\Facades\Alert;

class MountainAbleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mountainlistable',[
            'mountains'=> Mountain::all(),
            'mountainAbles'=> MountainAble::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formaddmountainable',[
            'mountains'=> Mountain::all()
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMountainAbleRequest $request)
    {
        $validatedData = $request->validate([
            'mountain_id' => 'required',
            'date_able' => 'required',
            'max_people' => 'required',
            'price'=> 'required'
        ]);
        
        $values = MountainAble::where('mountain_id', $request->mountain_id)->get();
        $mountain = Mountain::find($request->mountain_id);
        if($values->isEmpty()){
            MountainAble::create($validatedData);
            Alert::success('success', 'New post has been added!');
            return redirect('/mountainables');
        } else {
            // dd($values->where('date_able', $request->date_able)->count());
                if($values->where('date_able', $request->date_able)->count()){
                    Alert::warning('warning', 'Date : ' . $request->date_able . ' for ' . $mountain->nm_mountain . ' has been picked');
                    return redirect('/mountainables/create');
                    
                } else {
                    MountainAble::create($validatedData);
                    Alert::success('success', 'New post has been added!');
                    return redirect('/mountainables');
                } 
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(MountainAble $mountainAble)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mountainAble)
    {
        $value = MountainAble::find($mountainAble);
        return view('admin.formeditmountainable',[
            'mountainAble'=>$value,
            'mountains'=> Mountain::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMountainAbleRequest $request,  $mountainAble)
    {
        // dd($request->mountain_id);
        $rules = [
            'mountain_id' => 'required',
            'date_able' => 'required',
            'max_people' => 'required',
            'price'=> 'required'
        ];
        
        $validatedData =$request->validate($rules);
        $mtn = MountainAble::find($mountainAble);
        $values = MountainAble::where('mountain_id', $request->mountain_id)->get();
        $mountain = Mountain::find($request->mountain_id);
        if($values->isEmpty()){
            MountainAble::where('id', $mtn->id)->update($validatedData);
            Alert::success('success', 'post has been updated!');
            return redirect('/mountainables');
        } else { 
            $editable = true;
            $chekcdate = MountainAble::where('date_able', $request->date_able)->where('mountain_id', $request->mountain_id)->get();
            // dd($chekcdate);
     
                if($chekcdate){
                    foreach ( $chekcdate as $key => $value) {
                        if ($value->id != intval($mountainAble)) {
                            $editable = false; 
                        }
                    }
                    if ($editable) {
                        MountainAble::where('id', $mtn->id)->update($validatedData);
                        Alert::success('success', 'post has been updated!');
                        return redirect('/mountainables');
                    }else {
                        Alert::warning('warning', 'Date : ' . $request->date_able . ' for ' . $mountain->nm_mountain . ' has been picked');
                        return redirect('/mountainables/'.$mountainAble.'/edit');
                    }
                } else {
                    MountainAble::where('id', $mtn->id)->update($validatedData);
                    Alert::success('success', 'post has been updated!');
                    return redirect('/mountainables');
                }  
        }
        

        // $validatedData =$request->validate($rules);
        // $value = MountainAble::find($mountainAble);
        // MountainAble::where('id', $value->id)
        //         ->update($validatedData);

        // Alert::success('success', 'Your work has been saved!');
        // return redirect('/mountainables');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mountainAble)
    {
        $value = MountainAble::find($mountainAble);
        MountainAble::where('id', $value->id)->delete();
        Alert::success('success', 'Data has been removed!');
        return redirect('/mountainables');
        // dd($value);
    }
}