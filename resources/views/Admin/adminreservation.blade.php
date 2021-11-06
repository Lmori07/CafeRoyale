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
    .reservation-table
    {
        border-collapse: collapse;
        margin: 25px 0;
        font-size: 0.9em;
        min-width: 400px;
        border-radius: 5px 5px 0 0;
        overflow: hidden;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.15)
    }
    .reservation-table thead tr
    {
        background-color:#FFDB58;
        color:#ffffff;
        text-align: left;
        font-weight: bold;
    }
    .reservation-table th,
    .reservation-table td 
    {
        padding: 12px 15px;
    }
    .reservation-table tbody tr
    {
        border-bottom: 1px solid #dddddd;
    }
    .reservation-table tbody tr:nth-of-type(even)
    {
        background-color: #f3f3f3;
    }
    .reservation-table tbody tr:last-of-type
    {
        border-bottom: 2px solid #FFDB58
    }
</style>

    <table class="reservation-table">
      <thead>
          <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Guest</th>
            <th>Date</th>
            <th>Time</th>
            <th>Message</th>
            <th>Status</th>
            <th>Created At</th>
            <th></th>
          </tr>
       </thead>
       <tbody >
          <!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y mostrar todas las reservaciones, $data viene del controlador que maneja la vista -->
         @foreach ($data as $data )
          <tr>
            <td>{{ $data->name}}</td>
            <td>{{ $data->email}}</td>
            <td>{{ $data->phone}}</td>
            <td>{{ $data->guest}}</td>
            <td>{{ $data->date}}</td>
            <td>{{ $data->time}}</td>
            <td>{{ $data->message}}</td>
            <th>
              @if($data->status == true) 
              
                <span class="label label-info">Confirmed</span>
              
              @else
              <span class="label label-info">Not Confirmed</span>
              @endif
            </th>
            <td>{{ $data->created_at }}</td>
            <td>
              @if ($data->status == false)
                <form id="status-form-{{$data->id }}" action="{{ url('/reservationstatus', $data->id) }}"method="post" enctype="multipart/form-data">
                  @csrf
                </form>
                <button type="button" class="btn btn-primary" 
                onclick="if(confirm('Are you verify this request by phone'))
                {
                  event.preventDefault();
                  document.getElementById('status-form-{{$data->id }}').submit();
                }else
                {
                  event.preventDefault();
                }"<i class="material-icon">Verify</i></button>;
              @endif
            </td>
          </tr> 
         @endforeach
        </tbody>
      </table>
  </div>

<!-- Aqui se maneja los scrip que utilzia el CSS para las vistas de Admin -->
@include("Admin.adminscript")
    
  </body>
</html>