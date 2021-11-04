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
 
<div style="position: relative; top: 60px; right: -10px ">
    <table class="min-w-full divide-y divide-gray-200 w-full">
      <thead>
          <tr>
            <th scope="col" width="50" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Name</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Email</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Phone</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Guest</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Date</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Time</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Message</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created At</th>
            <th scope="col" class="px-6 py-3 bg-gray-50 text-left text-xs font-medium text-gray-500 uppercase tracking-wider"></th>
          </tr>
       </thead>
       <tbody class="bg-white divide-y divide-gray-200">
<!-- Aqui vamos a manejar el arreglo que va a recorrer la tabla y mostrar todas las reservaciones, $data viene del controlador que maneja la vista -->
         @foreach ($data as $data )
          <tr align="center">
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->name}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->email}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->phone}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->guest}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->date}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->time}}</td>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->message}}</td>
            <th class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
              @if($data->status == true) 
              
                <span class="label label-info">Confirmed</span>
              
              @else
              <span class="label label-info">Not Confirmed</span>
              @endif
            </th>
            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $data->created_at }}</td>
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