<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>
    
    <base href="/public">
<!-- Aqui manejamos el CSS de las vistas de Admin -->
@include("Admin.admincss")

  </head>
  <body>
    
<!-- Para manejar las rutas y navegar por side menu vamos a incluir el view que contiene esa inforamcion -->
@include("Admin.navbar")
 

<form action="{{ url('/updatedatachef', $chefdata->id) }}" method="post" enctype="multipart/form-data">

  @csrf

  <div>

      <div>
          <label>Chef Name</label>
          <input style="color: blue"; type="text" name="name" value="{{ $chefdata->name }}" required>
      </div>

      <div>
          <label>Specialty</label>
          <input style="color: blue"; type="text" name="specialty" value="{{ $chefdata->specialty }}" required>
      </div>

      <div>
          <label>old Image</label>
          <img height="100" width="100" src="/chefimage/{{ $chefdata->image }}">
      </div>

      <div>
          <label>New Image</label>
          <input type="file" name="image">
      </div>

      <div>
          <input style="color: black" type="submit" value="Save">
      </div>

  </div>
</form>

<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>