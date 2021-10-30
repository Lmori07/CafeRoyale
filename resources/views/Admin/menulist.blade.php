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

<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>