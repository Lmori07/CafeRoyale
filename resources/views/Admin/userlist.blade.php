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
      <table class="min-w-full divide-y divide-gray-200 w-full">
        <thead>
            <tr>
              <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
              <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
            </tr>
         </thead>
         <tbody class="bg-white divide-y divide-gray-200">
          <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
           @foreach ($usersdata as $userdata )
            <tr align="center">
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $userdata->name}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $userdata->email}}</td>
              <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ url('/deleteuser',$userdata->id) }}">Delete</a></td>
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