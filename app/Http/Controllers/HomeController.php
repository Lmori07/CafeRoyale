<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Menu;
use App\Models\User;
use App\Models\Chef;
use App\Models\Cart;
use App\Models\Order;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         * Aqui pasamo la informacion de la tabla de Menu para mostrar el menu en nuestra homepage
         */
        
        if(Auth::id())
        {
            return redirect('redirects');
        }

        else
        
         $data=Menu::all();
        $chefdata=Chef::all();
        return view('home', compact("data","chefdata"));
    }

    /**
     * Esta funcion va a redirigir los usuarios con el correspondiente usertype que tengan.
     *
     */
    public function redirects()
    {
        $usertype = Auth::user()->usertype;
        $data=Menu::all();
        $chefdata=Chef::all();

        //Condicion que valida que tipo de usuario esta conectado.
        if($usertype == '1')
        {
            return view('Admin.adminhome');
        }

        else
        {
            $user_id=Auth::id();

    //Aqui se cuenta en tabla cart cuantas veces aparece el id del usuario para saber cuantos items tiene.
            $count= Cart::where('user_id',$user_id)->count();
            //dd($count);
            return view('home', compact("data","chefdata",'count'));
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addcart(Request $request, $id)
    {
        /**
         * Aqui manejamos la funcion addcart para los usuario
         */
        
         if(Auth::id())
         {
            $user_id=Auth::id();
            //dd($user_id);

            $food_id=$id; 

            $quantity=$request->quantity;

            $cart = new Cart;
            $cart->user_id=$user_id;
            $cart->food_id= $food_id;
            $cart->quantity=$quantity;
            $cart->save();

            return redirect()->back();
         }

         else
         {
             return redirect('/login');
         }
    }

    /**
     * Muestra los elementos dentro de cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function showcart(Request $request, $id)
    {
        
        if(Auth::id()==$id)
        {
        $count=Cart::where('user_id',$id)->count();

        $data2=cart::select('*')->where('user_id', '=', $id)->get();

        $data=Cart::where('user_id',$id)->join('Menus','carts.food_id','=', 'Menus.id')->get();

        return view('showcart', compact('count','data','data2'));
        }
        else
        {
            return redirect()->back();
        }
    }

    /**
     * Muestra los elementos dentro de cart.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroycartelement($id)
    {
        $cartdata=cart::find($id);
        //dd($cartdata);
        $cartdata->delete();
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
        //
    }

    /**
     * Aqui guarda la data que esta en el carrito para ser manipulada por el adminitrador.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function orderconfirm(Request $request)
    {
        foreach ($request->foodname as $key=>$foodname)
        {
            $orderdata = new Order;

            //Data viene de la BD con los items del cliente
            $orderdata->foodname = $foodname;
            $orderdata->price = $request->price[$key];
            $orderdata->quantity = $request->quantity[$key];

            //Informacion del cliente
            $orderdata->name=$request->name;
            $orderdata->phone=$request->phone;
            $orderdata->address=$request->address;

            $orderdata->save();
        }

        return redirect()->back();
    }
}
