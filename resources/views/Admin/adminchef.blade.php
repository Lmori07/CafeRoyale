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
</div>

<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>