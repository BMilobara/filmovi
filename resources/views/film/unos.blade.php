@extends('layouts.app')

@php
use Illuminate\Support\Facades\DB;
@endphp

@section('content')

<style type="text/css">
table th {
text-align: center;
background-color: LightGray;
}

table td {
text-align: center;
}

body {
background-color: rgb(30, 70, 112);
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Unos filma</div>
				
					@if ( Auth::user())
						
				<br> 	Korisniče {{ Auth::user()->name }}, prijavljeni ste i sada možete unositi, pregledavati i brisati filmove.
					
				    <br/><br/><p>

					
						<form method="post" action="store">
						
						{{csrf_field()}}
						
			&emsp;			Upišite naslov filma: &nbsp; <input type="text" name="naslov" > <br/><br/>
						
			&emsp;			Odaberite žanr filma: &nbsp; <select name="id_zanr" > 

						<?php	$za = DB::table('zanr')->orderBy('naziv')->get() ;

						foreach ($za as $z)  {
						echo"<option value=". $z->id ."> " . $z->naziv . " </option>";
						}
						?>
						</select> <br/>  
						
						<br/><br/>
						
			&emsp;			Odaberite godinu filma: &nbsp; <select name="godina">
						
						<?php		
						
							for ($i=1900; $i<date("Y")+1; $i++){
							echo"<option value=". $i .">" . $i ."</option>";
						}  ?>
						</select>
						
						
						<br/><br/>
			&emsp;			Upišite trajanje filma: &nbsp; <input type="number" name="trajanje" min="1" /> <br/><br/>
						
			&emsp;			Odaberite sliku filma: &nbsp; <br/><br/>  <input type="file" name="slika" accept="image/*"/> <br/> <br/>
						
			&emsp;			<button type="submit" class="btn btn-primary">Pohrani</button> 
							
						</form></p>
							 
                    @endif	
					
					<br/>
					
					<centre>
					
					
					<br/><br/>
					
					<table style="width:80%" border="1" align="center">
				
					
					  <tr>
						<th>Slika</th>
						<th>Naslov filma</th> 
						<th>Godina</th>
						<th>Trajanje</th>
						<th>Akcija</th>
					  </tr>
					  

					
					<?php
				
					$f = DB::table('filmovi')->orderBy('naslov')->get();
				
				foreach($f as $film){
					echo "<tr>";
					
					echo "<td>";
					echo "<img src='../slike/" . $film->slika . "' height='180' width='120' >";
					echo "</td>";
					
					echo "<td>";
					echo " " . $film->naslov . " ";
					echo "</td>";
					
					echo "<td>";
					echo " " . $film->godina . " ";
					echo "</td>";
					
					echo "<td>";
					echo " " . $film->trajanje . " min ";
					echo "</td>";				
					
					echo "<td>";
					echo "[ <a href='destroy/" . $film->id . "' role='button' aria-pressed='true'> obriši </a> ]";
					echo "<td>";
					
					echo "</tr>";	
					
				}  
				

					?>
						
					</table>
					
					</centre>

                <div class="panel-body">
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
