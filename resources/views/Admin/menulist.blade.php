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
 
<div style="position: relative; top: 60px; right: -150px">

    <form action="{{ url('/uploadmenu') }}" method="post" enctype="multipart/form-data">

        @csrf

        <div>

            <div>
                <label>Title</label>
                <input style="color: blue"; type="text" name="title" placeholder="Write a Title" required>
            </div>

            <div>
                <label>Price</label>
                <input style="color: blue"; type="num" name="price" placeholder="Price" required>
            </div>

            <div>
                <label>Image</label>
                <input type="file" name="image" required>
            </div>

            <div>
                <label>Description</label>
                <input style="color: blue"; type="text" name="description" placeholder="Description" required>
            </div>

            <div>
                <input style="color: black" type="submit" value="Save">
            </div>

        </div>
    </form>
</div>

<!-- Aqui vamos a crear una tabla para manejar la inforamcion de menu -->
<div>
    <div>
      <style>
        .menu-table
        {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        }
        .menu-table thead tr
        {
            background-color:#7f0093;
            color:#ffffff;
            text-align: left;
            font-weight: bold;
        }
        .menu-table th,
        .menu-table td 
        {
            padding: 12px 15px;
        }
        .menu-table tbody tr
        {
            border-bottom: 1px solid #dddddd;
        }
        .menu-table tbody tr:nth-of-type(even)
        {
            background-color: #f3f3f3;
        }
        .menu-table tbody tr:last-of-type
        {
            border-bottom: 2px solid #7f0093;
        }
    </style>
        <table class="menu-table">
          <thead>
              <tr>
                <th>Food Name</th>
                <th>Price</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
                <th>Action2</th>
              </tr>
           </thead>
           <tbody>
             <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
             @foreach ($data as $data )
              <tr>
                <td>{{ $data->title}}</td>
                <td>{{ $data->price}}</td>
                <td>{{ $data->description}}</td>
                <td><img height="100" width="100" src="/menuimage/{{ $data->image}}"></td>
                <td><a href="{{ url('/deletemenu',$data->id) }}">Delete</a></td>
                <td><a href="{{ url('/updatemenu',$data->id) }}">Update</a></td>
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