<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

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
     
    <div>
      <style>
        .user-table
        {
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            min-width: 400px;
            border-radius: 5px 5px 0 0;
            overflow: hidden;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
        }
        .user-table thead tr
        {
            background-color: #219a00;
            color:#ffffff;
            text-align: left;
            font-weight: bold;
        }
        .user-table th,
        .user-table td 
        {
            padding: 12px 15px;
        }
        .user-table tbody tr
        {
            border-bottom: 1px solid #dddddd;
        }
        .user-table tbody tr:nth-of-type(even)
        {
            background-color: #219a00;
        }
        .user-table tbody tr:last-of-type
        {
            border-bottom: 2px solid #219a00;
        }
    </style>

      <table class="user-table">
         <thead>
            <tr>
              <th>Name</th>
              <th>Email</th>
              <th>Action</th>
            </tr>
         </thead>

         <tbody>
           <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
           @foreach ($usersdata as $userdata )
            <tr align="center">
              <td>{{ $userdata->name}}</td>
              <td>{{ $userdata->email}}</td>
              <td><a href="{{ url('/deleteuser',$userdata->id) }}">Delete</a></td>
            </tr> 
           @endforeach
          </tbody>
      </table>
    </div>

    <!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
    @include("Admin.adminscript")
        
      </body>
    </html>
    
</body>
</html>