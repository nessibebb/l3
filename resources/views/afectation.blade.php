@extends('layouts.app')
@section('content')

 <style type="text/css">
  #add-form{
     display:none;
  }
  #imp-form{
     display:none;
  }
#none-btn{     display:none;
  }
</style>
    <div class="container">
<div >

    <section class="mt-5">
        <div>
        <button id="add-btn" onclick="myFunction()" type="button"   class=" btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-plus" > </span> <b>ajouter</b></button>
        <button id="none-btn" onclick="myFunction()" type="button"   class=" btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-minus" > </span> <b>cacher</b></button>
        <button id="imp-btn" onclick="mfunction()" type="button"   class=" btn btn-lg btn-primary">
                  <span class="glyphicon glyphicon-print" > </span> <b>imprimer</b></button>
         
<a href="{{ url('dynamic_pdfa/pdfA') }}" class="btn btn-danger">Convert into PDF</a>

</div>
        <div>
            &nbsp
        </div>
    <div class="edit-form" style="display: none">
                <div class="card">
            <div class="card-header">
                <h4>edit form</h4>
            </div>
            <div class="card-body">
                <form id="edit-form">
                    <input type="hidden" id="u_id">
                    <div class="form-group">
                        <label for="u_nom">Domaine:</label>
                        <input type="text" name="nom_dom" id="u_nom_dom" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_num_etg"> Num_etagere:</label>
                        <input type="text" name="num_etg" id="u_num_etg" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_num_rayon">num_rayon:</label>
                        <input type="text" name="num_rayon" id="u_num_rayon" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_num_bloc"> num_bloc:</label>
                        <input type="text" name="num_bloc" id="u_num_bloc" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_statu"> statu:</label>
                        <input type="text" name="statu" id="u_statu" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="u_nb_etiq"> nb_etiq:</label>
                        <input type="text" name="nb_etiq" id="u_nb_etiq" class="form-control">
                    </div>
                    <button type="submit" id="submit-btn" class="btn btn-lg btn-primary">Enregistrer</button>
                </form>
            </div>
        </div>
    </div>
        </div>

        <div id="add-form" >
                <div class="card" style="width: 45rem;" >
            <div class="card-header">
                <h4>add form</h4>
            </div>
            <div class="card-body" >
                <form class ="add-form">
                   
                           <div class="form-group" style="width: 35rem;">
                               <label for="nom">Domaine</label>
                               <input type="text" name="nom_dom" id="nom_dom" class="form-control">
                           </div>
                           <div class="form-group" style="width: 35rem;">
                               <label for="num_etg">num_etg</label>
                               <input type="text" name="num_etg" id="num_etg" class="form-control">                     </div>
                               <div class="form-group" style="width: 35rem;">
                               <label for="num_rayon">num_rayon</label>
                               <input type="text" name="num_rayon" id="num_rayon" class="form-control">
                           </div>
                           <div class="form-group" style="width: 35rem;">
                               <label for="num_bloc">num_bloc</label>
                               <input type="text" name="num_bloc" id="num_bloc" class="form-control">                     </div>
                               <div class="form-group" style="width: 35rem;">
                               <label for="statu">statu</label>
                               <input type="text" name="statu" id="statu" class="form-control">                     </div>
                               <div class="form-group" style="width: 35rem;">
                               <label for="nb_etiq">nb_etiq</label>
                               <input type="text" name="nb_etiq" id="nb_etiq" class="form-control">                     </div>
                           <button type="submit" class="btn btn-lg btn-primary">enregistrer</button>
                       </form>
            </div>
        </div>
    </div>

 <div><div id="imp-form">
                <div class="card" style="width: 45rem;" >
            <div class="card-header">
                <h4>impression form</h4>
            </div>
            <div class="card-body" >
                <form class ="imp-form" >
                          @csrf
                           <div class="form-group" style="width: 35rem;">
                               <label for="num_etg">num_etg</label>
                               <input type="text" name="num_etg" id="num_etg" class="form-control">                     </div>
                               <div class="form-group" style="width: 35rem;">
                               <label for="num_rayon">num_rayon</label>
                               <input type="text" name="num_rayon" id="num_rayon" class="form-control">
                           </div>
                           <div class="form-group" style="width: 35rem;">
                               <label for="num_bloc">num_bloc</label>
                               <input type="text" name="num_bloc" id="num_bloc" class="form-control">                     </div>
                               <div class="form-group" style="width: 35rem;">
                               <label for="nb_etiq">nb_etiq</label>
                               <input type="text" name="nb_etiq" id="nb_etiq" class="form-control">                     </div>
                           <button type="submit" class="btn btn-lg btn-primary">enregistrer</button>
                       </form>
            </div>
        </div>
    </div>
 <div>



<div>
            &nbsp
        </div>
             <div class="card" >
        <table  id="myTable" class="table table-bordered data-table" width="100%">

            <thead>
            <tr>
                <th>id</th>
                <th>Domaine</th>
                <th>num_etg</th>
                <th>num_rayon</th>
                 <th>num_bloc</th>
                <th>statu</th>
                <th>nb_etiq</th>
                <th>Emp</th>
                <th>Action</th>
            </tr>
            </thead>
            <tbody>
            @forelse($afectations as $afectation)
                <tr>
                    <td>{{$afectation->id}}</td>
                    <td>{{$afectation->nom_dom}}</td>
                    <td>{{$afectation->num_etg}}</td>
                    <td>{{$afectation->num_rayon}}</td>
                    <td>{{$afectation->num_bloc}}</td>
                    <td>{{$afectation->statu}}</td>
                    <td>{{$afectation->nb_etiq}}</td>
                     <td>{{$afectation->Emp}}</td>
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
                        <form action="{{route('afectations.destroy' , $afectation->id)}}"
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
                let nom_dom = row.find('td').eq(1).text()
                let num_etg = row.find('td').eq(2).text()
                let num_rayon = row.find('td').eq(3).text()
                let num_bloc = row.find('td').eq(4).text()
                let statu  = row.find('td').eq(5).text()
                let nb_etiq  = row.find('td').eq(6).text()
                // $('.place-holder').replaceWith($('.edit-form').show())
                $('.edit-form').show()
                $('#u_nom_dom').val(nom_dom)
                $('#u_id').val(id)
                $('#u_num_etg').val(num_etg)
                $('#u_num_rayon').val(num_rayon)
                $('#u_num_bloc').val(num_bloc)
                $('#u_statu').val(statu)
                $('#u_nb_etiq').val(nb_etiq)
            })
         
            $('#edit-form').on('submit', function (e) {
                e.preventDefault()
                let id = $('#u_id').val()
                let _url = `afectations/${id}`
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
            // Add form logic
            $('.add-form').on('submit', function (e) {
                e.preventDefault()
                let _url = '{{route('afectations.store')}}'
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

  function mfunction() {
   var x =document.getElementById("imp-form");

     if(x.style.display=="none"){
      x.style.display="block";
      }
      else{
              x.style.display="none";
}
       }
</script>
@endsection
