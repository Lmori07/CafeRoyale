<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" type="text/css" href="public/form/form.css">
<!-- Aqui manejamos el CSS de las vistas de Admin -->
@include("Admin.admincss")

  </head>
  <body>
  <script src="public/form/form.js"></script>  
<!-- Para manejar las rutas y navegar por side menu vamos a incluir el view que contiene esa inforamcion -->
@include("Admin.navbar")
 
<div style="position: relative; top: 60px; right: -150px">

  <form action="{{ url('/savechef') }}" method="post" enctype="multipart/form-data">
      
        @csrf

        <div>

            <div>
                <label>Name</label>
                <input style="color: blue"; type="text" name="name" placeholder="Write Chef Name" required>
            </div>

            <div>
                <label>Specialty</label>
                <input style="color: blue"; type="text" name="specialty" placeholder="Enter Specialty" required>
            </div>

            <div>
                <label>Image</label>
                <input type="file" name="image" required>
            </div>

            <div>
                <input style="color: black" type="submit" value="Save">
            </div>

        </div>
    </form>

    <!-- Aqui vamos a crear una tabla para manejar la inforamcion de los chefs -->
<div>
    <div>
      <style>
        .chef-table
        {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        }
        .chef-table thead tr
        {
            background-color:#D80000;
            color:#ffffff;
            text-align: left;
            font-weight: bold;
        }
        .chef-table th,
        .chef-table td 
        {
            padding: 12px 15px;
        }
        .chef-table tbody tr
        {
            border-bottom: 1px solid #dddddd;
        }
        .chef-table tbody tr:nth-of-type(even)
        {
            background-color: #969696;
        }
        .chef-table tbody tr:last-of-type
        {
            border-bottom: 2px solid #D80000;
        }
    </style>
        <table class="chef-table">
          <thead>
              <tr>
                <th>Chefs Name</th>
                <th>Specialty</th>
                <th>Image</th>
                <th>Action</th>
                <th>Action2</th>
              </tr>
           </thead>
           <tbody>
            <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
             @foreach ($chefdata as $chefdata )
              <tr>
                <td>{{ $chefdata->name}}</td>
                <td>{{ $chefdata->specialty}}</td>
                <td><img height="100" width="100" src="/chefimage/{{ $chefdata->image}}"></td>
                <td><a href="{{ url('/updatechefview',$chefdata->id) }}">Update</a></td>
                <td><a href="{{ url('/deletechef',$chefdata->id) }}">Delete</a></td>
              </tr> 
             @endforeach
            </tbody>
          </table>
      </div>


</div>

</div>

<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>