<!DOCTYPE html>
<html>
<head>
    <title>Laravel 7 Crud operation using ajax(Real Programmer)</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css" />
    <link href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css">
</head>
<body>
	<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Home</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Contact</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">...</div>
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">...</div>
</div>
      <style type="text/css">
  #bookForm{
     display:none;
  }
</style>
<div class="container">
    <h1>Laravel 7 Crud with Ajax</h1>
<button id="newTutBtn" href="javascript:void(0)" onclick="mFunction()" type="button" class="btn btn-default btn-lg">
                  <a class="glyphicon glyphicon-plus" ></a></button>

 <div class="panel panel-default">
                <form id="bookForm" name="bookForm" class="form-horizontal">
                   <input type="hidden" name="domaine_id" id="domaine_id">
                    <div class="form-group">
                        <p><label for="nom" class="col-sm-2 control-label">nom</label>
                            <input type="text" class="form-control" id="nom" name="nom" placeholder="Enter nom" value="" maxlength="50" required="" />
     
                        <label class="col-sm-2 control-label">sous domaine de:</label>
                         <select name="parent" id=""  class="form-control" placeholder="Enter parent">
             @foreach($domaines as $domaine)
             <option value="{{$domaine->id}}">{{$domaine->id}}</option>
             @endforeach
             </select>
           </p>
                    </div>
      
                    <div class="col-sm-offset-2 col-sm-10">
                     <button type="submit" class="btn btn-primary" id="savBtn" value="create">Save 
                     </button>
                    </div>
                </form>
            </div>

    <table class="table table-bordered data-table" width="100%">
        <thead>
            <tr>
                <th>id</th>
                <th>nom</th>
                <th>domaine parent</th>
                <th width="300px">Action</th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
</div>
    
          
    

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
    <script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js"></script> 

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
        ajax: "{{ route('domaines.index') }}",
        columns: [
            {data: 'id', name: 'id'},
            {data: 'nom', name: 'nom'},
            {data: 'idParent', name: 'parent'},
            {data: 'action', name: 'action', orderable: false, searchable: false},
        ]
    });
    $('#newTutBtn').click(function () {
        $('#saveBtn').val("create-book");
        $('#domaine_id').val('');
        $('#bookForm').trigger("reset");
          $('#bookForm').show();
    });

    $('body').on('click', '.editBook', function () {
      var domaine_id = $(this).data('id');
      $.get("{{ route('domaines.index') }}" +'/' + domaine_id +'/edit', function (data) {
          $('#saveBtn').val("edit-book");
          $('#bookForm').show();
          $('#domaine_id').val(data.id);
          $('#nom').val(data.nom);
          $('#parent').val(data.idParent);
      })
   });
    $('#saveBtn').click(function (e) {
        e.preventDefault();
        $(this).html('Save');

        $.ajax({
          data: $('#bookForm').serialize(),
          url: "{{ route('domaines.store') }}",
          type: "POST",
          dataType: 'json',
          success: function (data) {
              $('#bookForm').trigger("reset");
              table.draw();
                   $('#bookForm').hide();

          },
          error: function (data) {
              console.log('Error:', data);
              $('#saveBtn').html('Save Changes');
                   $('#bookForm').hide();

          }
      });
    });
    
    $('body').on('click', '.deleteBook', function () {
     
        var domaine_id = $(this).data("id");
        confirm("Are You sure want to delete !");
      
        $.ajax({
            type: "DELETE",
            url: "{{ route('domaines.store') }}"+'/'+domaine_id,
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

</script>
<script type="text/javascript">
  function myFunction() {
   var x =document.getElementById("newForm");
     if(x.style.display=="none"){
      x.style.display="block";
     }
     else {
       x.style.display="none";
     }
     }


</script>
</body>
</html>