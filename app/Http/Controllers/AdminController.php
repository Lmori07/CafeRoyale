<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Menu;

use Illuminate\Http\Request;

class AdminController extends Controller
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
     * Muestra la lista de la tabla usuario en la vista administrador.
     */
    public function userlist()
    {
        $usersdata = User::all();
        return view('admin.userlist', compact('usersdata'));
    }

    /**
     * Muestra la lista de la tabla menu en la vista administrador.
     */
    public function menulist()
    {
        return view('admin.menulist');
    }

    /**
     * Cargar a la tabla menu la informacion del menu desde la vista administrador.
     */
    public function uploadmenu(Request $request)
    {
        $data = new Menu;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
       /* Aqui lo que se esta haciendo es moviendo la imagen que va para la BD a una carpeta publica para
        *uso de la aplicacion 
        */
        $request->image->move('menuimage', $imagename);
        $data->image=$imagename;

        $data->title=$request->title;
        $data->price=$request->price;
        $data->description=$request->description;

        $data->save();

        return redirect()->back();
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usersdata=User::find($id);
        //dd($usersdata);
        $usersdata->delete();
        return redirect()->back();
    }
}
