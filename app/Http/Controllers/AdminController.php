<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Menu;
use App\Models\Reservation;
use App\Models\Chef;
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
        $data = Menu::all();
        return view('admin.menulist', compact("data"));
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
     * Muestra la vista para actualizar la informacion de menu.
     * Nota la variable que esta en compact es la que se debe usuar para llenar en la vista
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updatemenu($id)
    {
        $menudata=Menu::find($id);
        return view('admin.updatemenu', compact("menudata"));
    }

    /**
     * Ejecuta el post para enviar la informacion capturada y actualizar la tabla.
     * Nota la variable que esta en compact es la que se debe usuar para llenar en la vista
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function postupdatemenu(Request $request,$id)
    {
        $data=Menu::find($id);
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
     * Aqui elimino un usuario de la tabla user.
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

    /**
     * Aqui elimino un elemento de la tabla menu.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroymenu($id)
    {
        $menudata=Menu::find($id);
        //dd($menudata);
        $menudata->delete();
        return redirect()->back();
    }

    /**
     * Aqui envia un post con la informacion de la reservacion la base de datos.
     * Nota la variable que esta en compact es la que se debe usuar para llenar en la vista
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createreservation(Request $request)
    {
        $reservationdata = new Reservation;

        $reservationdata->name=$request->name;
        $reservationdata->email=$request->email;
        $reservationdata->phone=$request->phone;
        $reservationdata->guest=$request->guest;
        $reservationdata->date=$request->date;
        $reservationdata->time=$request->time;
        $reservationdata->message=$request->message;

        $reservationdata->save();

        return redirect()->back();
    }

    /**
     * Aqui manejaremos la lista de reservaciones en la vista de admin.
     * Nota la variable que esta en compact es la que se debe usuar para llenar en la vista
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function reservationlist(Request $request)
    {
        $data = Reservation::all();
        return view('admin.adminreservation', compact("data"));
    }

    /**
     * Aqui manejaremos la lista de los chef en la vista de admin.
     * Nota la variable que esta en compact es la que se debe usuar para llenar en la vista
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function viewchef()
    {
        return view('admin.adminchef');
    }

    /**
     * Cargar a la tabla chef la informacion del menu desde la vista administrador.
     */
    public function createchef(Request $request)
    {
        $data = new Chef;

        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
       /* Aqui lo que se esta haciendo es moviendo la imagen que va para la BD a una carpeta publica para
        *uso de la aplicacion 
        */
        $request->image->move('chefimage', $imagename);
        $data->image=$imagename;

        $data->name=$request->name;
        $data->specialty=$request->specialty;

        $data->save();

        return redirect()->back();
    }
}
