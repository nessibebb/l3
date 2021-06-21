<!DOCTYPE html>
<html>
 <head>
  <title>Laravel - How to Generate Dynamic PDF from HTML using DomPDF</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <style type="text/css">
   .box{
    width:600px;
    margin:0 auto;
   }
  </style>
 </head>
 <body>
  <br />
  <div class="container">
   <h3 align="center">Laravel - How to Generate Dynamic PDF from HTML using DomPDF</h3><br />
   
   <div class="row">
    <div class="col-md-7" align="right">
     <h4>domaine Data</h4>
    </div>
    <div class="col-md-5" align="right">
     <a href="{{ url('dynamic_pdf/pdf') }}" class="btn btn-danger">Convert into PDF</a>
    </div>
   </div>
   <br />
   
  <div class="table-responsive-sm">
  
    <table class="table-responsive-sm table-bordered">
       <tr width="20px" height ="60px">
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==3)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==4)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==5)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==6)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr>
     <tr width="20px" height ="60px">
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==7)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==8)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==9)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==10)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr>
     <tr width="20px" height ="60px">
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==11)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==12)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==13)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==14)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr><tr width="20px" height ="60px">
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==15)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==16)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==17)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==18)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr>
     <tr width="20px" height ="60px">
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==19)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==21)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==21)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==22)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr>
     <tr width="20px"  height ="60px" >
     @foreach($domaine_data as $domaine)
      
       @if( $domaine->id ==23)
      
       <td>{{ $domaine->nom }}</td>
       @endif
              @if( $domaine->id ==24)
       <td>{{ $domaine->nom }}</td>
       
       @endif
       
@if( $domaine->id ==25)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
        
@if( $domaine->id ==26)
      
       <td>{{ $domaine->nom }}</td>
      @endif 
     

    
     @endforeach
     </tr>
  </table>
  
 </body>
</html>