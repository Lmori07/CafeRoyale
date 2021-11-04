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
    <div style="position: relative; top: 150px; right: 150px ">
        <table class="min-w-full divide-y divide-gray-200 w-full">
          <thead>
              <tr>
                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Chefs Name</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Specialty</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action2</th>
              </tr>
           </thead>
           <tbody class="bg-white divide-y divide-gray-200">
            <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
             @foreach ($chefdata as $chefdata )
              <tr align="center">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $chefdata->name}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $chefdata->specialty}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><img height="100" width="100" src="/chefimage/{{ $chefdata->image}}"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ url('/updatechefview',$chefdata->id) }}">Update</a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ url('/deletechef',$chefdata->id) }}">Delete</a></td>
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