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
     <h4>etiquete Data</h4>
    </div>
    <div class="col-md-5" align="right">
     
    </div>
   </div>
   <br />
   
  <div class="table-responsive-sm">
   <style>
      table, th, td {
      padding: 10px;
      border: 1px solid black;
      border-collapse: collapse;
      }
    </style>
    <table class="table-responsive-sm table-bordered">
     
     
     <tbody>
     @foreach($etiquete_data as $etiquete)
     @for ($i = 1; $i <= $etiquete->nbr; $i++) 
      <tr>
       <td height ="100" style="border: 1px solid;">{{ $etiquete->Emp }}</td>
       <td height ="100" style="border: 1px solid;">{{ $etiquete->Emp }}</td>
       <td height ="100" style="border: 1px solid;">{{ $etiquete->Emp }}</td>
       <td height ="100" style="border: 1px solid;">{{ $etiquete->Emp }}</td>
       
       </tr>
    @endfor
  @endforeach
  </tbody>
</table>
</div>
 </body>
</html>