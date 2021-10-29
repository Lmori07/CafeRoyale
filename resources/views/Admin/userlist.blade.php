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
     
    <div style="position: relative; top: 60px; right: -150px ">
        <table bgcolor="grey" border="3px">
            <tr>
                <th style="padding: 30px">Name</th>
                <th style="padding: 30px">Email</th>
                <th style="padding: 30px">Action</th>
            </tr>
<!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
            @foreach ($usersdata as $userdata )
            <tr align="center">
                <td>{{ $userdata->name}}</td>
                <td>{{ $userdata->email}}</td>
                <td><a href="{{ url('/deleteuser',$userdata->id) }}">Delete</a></td>
            </tr> 
            @endforeach
            
        </table>
    </div>

    <!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
    @include("Admin.adminscript")
        
      </body>
    </html>
    
</body>
</html>