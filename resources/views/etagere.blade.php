
@extends('layouts.app')
@section('content')

   <style type="text/css">
 #add-form{  display:none;}
 #none-btn{ display:none; }
</style>
    <div class="container">
<div >

    <section class="mt-5">
        <div>
        <button id="add-btn" onclick="myFunction()" type="button"   class=" btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-plus" > </span> <b>ajouter</b></button>
        <button id="none-btn" onclick="myFunction()" type="button"   class=" btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-minus" > </span> <b>cacher</b></button>

        </div>
        <div>
            &nbsp
        </div>
    <div class="edit-form" style="display: none">
          <div class="card" >
            <div class="card-header">
                <h4>Formulaire de modification</h4>
            </div>
            <div class="card-body">
                <form id="edit-form">
                    <input type="hidden" id="u_id">
                    <div class="form-group">
                        <label for="u_code">code</label>
                        <input type="text" name="code" id="u_code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_num_rayon">numero rayon</label>
                        <input type="text" name="num_rayon" id="u_num_rayon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_num_bloc">numero bloc</label>
                        <input type="text" name="num_bloc" id="u_num_bloc" class="form-control">
                    </div>
                  
                    <button type="submit" id="submit-btn" class="btn btn-lg btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>

         <div id="add-form" >
          <div class="card" >
            <div class="card-header">
                <h4> formulaire d'ajout</h4>
            </div>
            <div class="card-body" action="{{ route('etageres.store')}}" method="POST">
                <form class="add-form">
                    <div class="form-group">
                        <label for="a_code">code</label>
                        <input type="text" name="code" id="a_code" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="a_num_rayon">numero rayon</label>
                        <input type="text" name="num_rayon" id="a_num_rayon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="a_num_bloc">numero bloc</label>
                        <input type="text" name="num_bloc" id="a_num_bloc" class="form-control">
                    </div>
                   
                    <button type="submit" id="submit-btn" class="btn btn-lg btn-primary">creer</button>
                </form>
            </div>
        </div>
    </div>
 <div>
            &nbsp
        </div>
    
                        <div class="card" >
        <table id="myTable" class="table table-bordered data-table" width="100%">
            <thead>
            <tr>
                <th>id</th>
                <th>code</th>
                <th>numero rayon</th>
                <th>numero bloc</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($etageres as $etagere)
                <tr>
                    <td>{{$etagere->id}}</td>
                    <td>{{$etagere->codeE}}</td>                    
                    <td>{{$etagere->num_rayon}}</td>
                    <td>{{$etagere->num_bloc}}</td>

                    
                    <td>
                         <button class="edit-btn btn btn-lg btn-primary">
                            <span class="glyphicon glyphicon-pencil"></span>&nbsp <b>modifier</b>
                        </button>
                        &nbsp
                        <button
                            onclick="event.preventDefault(); confirm(document.getElementById('delete-form').submit());"
                            class="btn btn-lg btn-danger">
                            <span class="glyphicon glyphicon-trash"></span>&nbsp <b>supprimer</b>
                        </button>
                        <form action="{{route('etageres.destroy' , $etagere->id)}}"
                              id="delete-form"
                              method="post" style="display: none">
                            @csrf
                            @method('DELETE')
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">No record</td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>


    </section>
@stop


@section('js')

    <script type="text/javascript">
        $(document).ready(function () {

            $('#myTable').DataTable({
                "language": {
                    "oPaginate": {
                        "sFirst": "Premier",
                        "sLast": "Dernier",
                        "sPrevious": "Precedent",
                        "sNext": "Suivant",
                    }
                }
            });

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            // Edit logic
            $('.edit-btn').on('click', function (e) {
                e.preventDefault()

                let row = $(this).closest('tr')
                let id = row.find('td').eq(0).text()
                let codeE = row.find('td').eq(1).text()
                let num_rayon = row.find('td').eq(2).text()
                let num_bloc = row.find('td').eq(3).text()


                // $('.place-holder').replaceWith($('.edit-form').show())
                $('.edit-form').show()

                $('#u_code').val(codeE)
                $('#u_id').val(id)
                $('#u_num_rayon').val(num_rayon)
                $('#u_num_bloc').val(num_bloc)

            })
         
    $('#edit-form').on('submit', function (e) {
                e.preventDefault()
                let id = $('#u_id').val()
                let _url = `etageres/${id}`
                $.ajax({
                    url: _url,
                    type: 'put',
                    // contentType: 'json',
                    data: $("#edit-form").serialize(),
                    success: function (response) {
                        console.log(response)
                        window.location.reload()
                    },
                    error: function (err) {
                        console.log(err)
                        window.location.reload()
                    }
                })
            })

         $('.add-form').on('submit', function (e) {
                e.preventDefault()
                let _url = '{{route('etageres.store')}}'
                $.ajax({
                    type: 'post',
                    url: _url,
                    data: $('.add-form').serialize(),
                    success: function (res) {
                        console.log(res)
                        window.location.reload()
                    },
                    error: function (err) {
                        console.log(err)
                        window.location.reload()
                    }
                })
            })
        })


    </script>
     <script type="text/javascript">
  function myFunction() {
   var x =document.getElementById("add-form");
      var y =document.getElementById("add-btn");
      var z =document.getElementById("none-btn");

     if(x.style.display=="none"){
      x.style.display="block";
            y.style.display="none";
      z.style.display="block";

     }
     else {
       x.style.display="none";
                   y.style.display="block";
                         z.style.display="none";
     }
     }




</script>
@endsection