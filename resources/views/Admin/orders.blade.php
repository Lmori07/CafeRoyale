<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    
<!-- Aqui manejamos el CSS de las vistas de Admin -->
@include("Admin.admincss")

  </head>
  <body>
    
<!-- Para manejar las rutas y navegar por side menu vamos a incluir el view que contiene esa inforamcion -->
@include("Admin.navbar")
<div class="container">
  <form action="{{ url('/search') }}" method="get">
    <input type="tex" name="search" style="color: blue;">
    <input type="submit" value="Search" class="btn btn-success">
  </form>
<style>
    .orders-table
    {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
    }
    .orders-table thead tr
    {
        background-color:#0077b6;
        color:#90e0ef;
        text-align: center;
        font-weight: bold;
    }
    .orders-table th,
    .orders-table td 
    {
        padding: 12px 15px;
    }
    .orders-table tbody tr
    {
        border-bottom: 1px solid #dddddd;
    }
    .orders-table tbody tr:nth-of-type(even)
    {
        background-color: #90e0ef;
    }
    .orders-table tbody tr:last-of-type
    {
        border-bottom: 2px solid #0077b6
    }
</style>
<table class="orders-table">
    <thead>
        <tr>
          <th>Name</th>
          <th>Phone</th>
          <th>Address</th>
          <th>Foodname</th>
          <th>Price</th>
          <th>Quantity</th>
          <th>Total Price</th>
        </tr>
     </thead>
     <tbody >
        <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y mostrar todas las reservaciones, $data viene del controlador que maneja la vista -->
       @foreach ($orderdata as $order )
        <tr align="center">
          <td>{{ $order->name}}</td>
          <td>{{ $order->phone}}</td>
          <td>{{ $order->address}}</td>
          <td>{{ $order->foodname}}</td>
          <td>${{ $order->price}}</td>
          <td>{{ $order->quantity}}</td>
          <td>${{$order->quantity * $order->price}}</td>
        </tr> 
       @endforeach
      </tbody>
    </table>
</div>
</div>
 
<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>