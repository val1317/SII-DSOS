<!DOCTYPE html>
<html>
<head>
    <title>Alumnos</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}" />
    <link href="{{ asset('css/jquery.dataTables.min.css')}}" rel="stylesheet">
    <link href="{{ asset('css/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
    <script src="{{ asset('js/jquery.js')}}"></script>  
    <script src="{{ asset('js/jquery.validate.js')}}"></script>
    <script src="{{ asset('js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('js/bootstrap.min.js')}}"></script>
    <script src="{{ asset('js/dataTables.bootstrap4.min.js')}}"></script>
</head>
<body>
    
<div class="container">
    <h1>Alumnos </h1>
    <br>
    <a class="btn btn-success" href="javascript:void(0)" id="createNewProduct">Nuevo Alumno</a>
    <br>
    <table id="ejemplo" class="table table-bordered data-table">
        <thead>
            <tr>
                <th>Núm.</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Fecha de Inicio</th>
                <th>Fecha e</th>
                <th>Grado</th>
                <th>Fecha de nac.</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Baja</th>
                <th width="280px">Acciones</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
   
<div class="modal fade" id="ajaxModel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modelHeading"></h4>
            </div>
            <div class="modal-body">
                <form id="productForm" name="productForm" class="form-horizontal">
                   <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Nombre</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" value="" maxlength="50" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-2 control-label">Apellido</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Fecha de inicio</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_i" name="fecha_i" placeholder="Fecha de inicio" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Fecha e</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_e" name="fecha_e" placeholder="Fecha e" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Grado</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" id="grado" name="grado" placeholder="Grado" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Fecha de nacimiento</label>
                        <div class="col-sm-12">
                            <input type="date" class="form-control" id="fecha_n" name="fecha_n" placeholder="Fecha de nacimiento" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Dirección</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="" maxlength="100" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Teléfono</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Teléfono" value="" maxlength="10" required="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="name" class="col-sm-12 control-label">Baja</label>
                        <div class="col-sm-12">
                            <input type="text" class="form-control" id="baja" name="baja" placeholder="baja" value="" maxlength="10" required="">
                        </div>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="saveBtn" value="create">Guardar cambios
                     </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
    
</body>
    
<script type="text/javascript">

  $(function () {
     
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              
          }        
          
    });
    
    var table = $('.data-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('ajaxalumno.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'nombre', name: 'nombre'},
            {data: 'apellido', name: 'apellido'},
            {data: 'fecha_i', name: 'fecha_i'},
            {data: 'fecha_e', name: 'fecha_e'},
            {data: 'grado', name: 'grado'},
            {data: 'fecha_n', name: 'fecha_n'},
            {data: 'direccion', name: 'direccion'},
            {data: 'telefono', name: 'telefono'},
            {data: 'baja', name: 'baja'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
     
    $('#createNewProduct').click(function () {
        $('#saveBtn').val("create-product");
        $('#id').val('');
        $('#productForm').trigger("reset");
        $('#modelHeading').html("Crear Nuevo Alumno");
        $('#ajaxModel').modal('show');
    });
    
    $('body').on('click', '.editProduct', function () {
      var alumno_id = $(this).data('id');
      $.get("{{ route('ajaxalumno.index') }}" +'/' + alumno_id +'/edit', function (data) {
          $('#modelHeading').html("Editar Alumno");
          $('#saveBtn').val("edit-user");
          $('#ajaxModel').modal('show');
          $('#alumno_id').val(data.id);
          $('#nombre').val(data.nombre);
          $('#apellido').val(data.apellido);
          $('#fecha_i').val(data.fecha_i);
          $('#fecha_e').val(data.fecha_e);
          $('#grado').val(data.grado);
          $('#fecha_n').val(data.fecha_n);
          $('#direccion').val(data.direccion);
          $('#telefono').val(data.telefono);
          $('#baja').val(data.baja);
      })
   });
    
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Enviando...');
    
        $.ajax({
          data: $('#productForm').serialize(),
          url: "{{ route('ajaxalumno.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
     
              $('#productForm').trigger("reset");
              $('#ajaxModel').modal('hide');
              table.draw();
         
          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Guardar cambios');
          }
      });
    });
    
    $('body').on('click', '.deleteProduct', function () {
     
        var alumno_id = $(this).data("id");
        confirm("¿Seguro que quieres eliminar?");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('ajaxalumno.store') }}"+'/'+alumno_id,
            success: function (data) {
                table.draw();
            },
            error: function (data) {
                console.log('Error:', data);
            }
        });
    });
     
  });
</script>
</html>