@extends('layouts.app')
@section('content')
   {{-- <div class="container">
        <div class="jumbotron text-white jumbotron-fluid px-4"
             style="min-height:100%;
                    background:linear-gradient(0deg, rgba(0, 0, 50, 0.3), rgba(0, 0, 50, 0.3)),
                    url(https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGlicmFyeXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60);
                    background-size:cover;">
            <h1 class="display-4">Fluid jumbotron</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal
                space of its parent.
            </p>
        </div>
    </div>
--}}

   <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
       <ol class="carousel-indicators">
           <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
           <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
       </ol>
       <div class="carousel-inner">
           <div class="carousel-item active">
               <img class="d-block w-100" height="500px" src="https://images.unsplash.com/photo-1507842217343-583bb7270b66?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MXx8bGlicmFyeXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="First slide">
           </div>
           <div class="carousel-item">
               <img class="d-block w-100" height="500px" src="https://images.unsplash.com/photo-1568667256549-094345857637?ixid=MnwxMjA3fDB8MHxzZWFyY2h8OXx8bGlicmFyeXxlbnwwfHwwfHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Second slide">
           </div>
           <div class="carousel-item">
               <img class="d-block w-100" height="500px" src="https://images.unsplash.com/photo-1600431521340-491eca880813?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MTJ8fGxpYnJhcnl8ZW58MHx8MHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" alt="Third slide">
           </div>
       </div>
       <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
           <span class="sr-only">Previous</span>
       </a>
       <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
           <span class="carousel-control-next-icon" aria-hidden="true"></span>
           <span class="sr-only">Next</span>
       </a>
   </div>

    <section class="bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-3">

                </div>
            </div>
        </div>
    </section>

@endsection

@section('js')
    <script>
        $('.carousel').carousel({
            interval: 2000
        })
    </script>
@endsection
