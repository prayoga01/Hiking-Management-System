<?php

namespace App\Http\Controllers;

use App\Models\Mountain;
// use Illuminate\Support\Str;
use App\Models\MountainAble;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use App\Http\Requests\StoreMountainRequest;
use App\Http\Requests\UpdateMountainRequest;

class MountainController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.mountainlist',[
            'mountains'=> Mountain::all()
            
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.formmountainadd');
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMountainRequest $request)
    {
        $validatedData = $request->validate([
            'nm_mountain' => 'required',
            'address_mountain' => 'required',
            'content' => 'required',
            'mountain_img'=> 'required|mimes:jpg|max:2048'
        ]);
    
       
        if ($request->file('mountain_img')) {   
            $validatedData['mountain_img']= $request->file('mountain_img')->store('post-images');
        }
        
        
        Mountain::create($validatedData);
        Alert::success('success', 'New post has been added!');
        return redirect('/addmountains');
    }

    /**
     * Display the specified resource.
     */
    public function show(Mountain $mountain)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($mountain)
    {
        $value = Mountain::find($mountain);
        return view('admin.formeditmountain',[
            'mountain'=>$value,
        ]);
        
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMountainRequest $request, $mountain)
    {
        
        $rules = [
            'nm_mountain' => 'required',
            'address_mountain' => 'required',
            'content' => 'required',
            'mountain_img'=> 'mimes:jpg|max:2048',
            'check_active' => 'required'
        ];

        
        $validatedData =$request->validate($rules);
    
            if ($request->file('mountain_img')) {
                if ($request->oldFile) {
                    Storage::delete($request->oldFile);
                }
                $validatedData['mountain_img']= $request->file('mountain_img')->store('post-images');
            }
           
            $value = Mountain::find($mountain);
           
            Mountain::where('id', $value->id)
                    ->update($validatedData);

            Alert::success('success', 'Your work has been saved!');
            return redirect('/addmountains');
    }

    public function changeStatus($request, $mountain) 
    {
        $value = Mountain::find($mountain);
        $value->check_active = $request->status;
        $value->save();
        return response()->json(['success'=>'Status change successfully.']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($mountain)
    {
        $value = Mountain::find($mountain);
        $mountain = MountainAble::where('mountain_id', $value->id)->get();
        if($mountain->isEmpty()){
            if ($value->mountain_img) {
                Storage::delete($value->mountain_img);
            }
            Mountain::where('id', $value->id)->delete();
            Alert::success('success', 'Data has been removed!');
            return redirect('/addmountains');
        } else {
            Alert::warning('warning', 'Data is still connected to other table!');
            return redirect('/addmountains');
        }
        // dd($mountain);
        
    }
}