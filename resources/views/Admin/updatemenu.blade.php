<x-app-layout>
    
</x-app-layout>


<!DOCTYPE html>
<html lang="en">
  <head>

<!-- Aqui le decimos a la vista que todos los recursos del CSS se encuentra en la carpeta public -->
    <base href="/public">

<!-- Aqui manejamos el CSS de las vistas de Admin -->
@include("Admin.admincss")

  </head>
  <body>
    
<!-- Para manejar las rutas y navegar por side menu vamos a incluir el view que contiene esa inforamcion -->
@include("Admin.navbar")

<div style="position: relative; top: 60px; right: -150px">

    <form action="{{ url('/postupdatemenu', $menudata->id) }}" method="post" enctype="multipart/form-data">

        @csrf

        <div>

            <div>
                <label>Title</label>
                <input style="color: blue"; type="text" name="title" value="{{ $menudata->title }}" required>
            </div>

            <div>
                <label>Price</label>
                <input style="color: blue"; type="num" name="price" value="{{ $menudata->price }}" required>
            </div>

            <div>
                <label>Description</label>
                <input style="color: blue"; type="text" name="description" value="{{ $menudata->description }}" required>
            </div>

            <div>
                <label>old Image</label>
                <img height="100" width="100" src="/menuimage/{{ $menudata->image }}">
            </div>

            <div>
                <label>New Image</label>
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