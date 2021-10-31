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
    <div style="position: relative; top: 250px; right: 150px ">
        <table class="min-w-full divide-y divide-gray-200 w-full">
          <thead>
              <tr>
                <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Food Name</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Price</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Description</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Action2</th>
              </tr>
           </thead>
           <tbody class="bg-white divide-y divide-gray-200">
            <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y todos sus usuarios mostrando los datos -->
             @foreach ($data as $data )
              <tr align="center">
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->title}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->price}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->description}}</td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><img height="100" width="100" src="/menuimage/{{ $data->image}}"></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ url('/deletemenu',$data->id) }}">Delete</a></td>
                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900"><a href="{{ url('/updatemenu',$data->id) }}">Update</a></td>
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