<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Room;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use File;
class EdicioUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        $request->validate([
            'background' => 'mimes:jpeg,jpg,gif,bmp,png' // Only allow .jpg, .bmp and .png file types.
        ]);

        $user = User::find($request->id);
        if($request->name != ""){
            $user->name = $request->name;
        }
        if($request->email != ""){
            $user->email = $request->email;
        }
        if($request->password != ""){
            $user->password = Hash::make($request->password);
        }

        if($request->background != ""){
  
            $imgName = time().'.'.$request->background->extension();

            
            $request->background->move(public_path('images/background'), $imgName);

            
            $image_path =   public_path('images/background/' . $user->background);
            
            if(file_exists($image_path)){
               
                File::delete($image_path);
            }

            

            $user->background = $imgName;
        }

        $user->save();
        
        return redirect('update');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
/*     public function editSalas()
    {
        $data['salas'] = DB::table('rooms')->select('*')->where('user_id', '=', Auth::user()->id)->get();
        return view('edicioSalas', $data);
    } */
    public function updateSales(Request $request)
    {

        if ($request->name != null){
            $room = Room::find($request->id);
            $room->name = $request->name;
            $room->save();
            return redirect('dashboard');
        } else {
            return back();
        }

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request)
    {
        Room::destroy($request->id);
        return redirect('dashboard');
    }
}
