<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Test/Vue</title>
    <link rel="stylesheet" href="/css/app.css"/>
</head>
<body>

<!-- trabajando de manera sincrona -->

<form action="/Insertar" method="post">
  @csrf
  <label for="">Nombre</label>
<input type="text" name="nombre" class="form-control">
<label for="">Apellidos</label>
<input type="text" name="apellidos"class="form-control">
<label for="">Sexo</label>
<input type="text" name="sexo" class="form-control">
<label for="">Edad</label>
<input type="text" name="edad" class="form-control">
<button >Enviar</button>
</form> 
<table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Nombre</th>
                      <th>Apellidos</th>
                      <th>Sexo</th>
                      <th>Edad</th>
                      <th>Accion</th>
                    </tr>
                  </thead>
                  <tbody>
                  @for ($i=0;$i<(count($datos));$i++)
                  <tr>
                      <td>{{$datos[$i]["nombre"]}}</td>
                      <td>{{$datos[$i]["apellidos"]}}</td>
                      <td>{{$datos[$i]["sexo"]}}</td>
                      <td>{{$datos[$i]["edad"]}}</td>
                      <td>
                      <a href="Two/borrar/{{$datos[$i]["id"]}}">Borrar
                      <a href="Two/editar/{{$datos[$i]["id"]}}">Editar
                      </td>
                      </tr>
                 @endfor
                  </tbody>
                </table>

                <div id="app">
    <!-- Parsear para que vue soporte -->
     <lista-component datos="{{json_encode($datos)}}"></lista-component>
                <div>
    <script src="{{mix('/js/app.js')}}"></script>

</body>
</html>