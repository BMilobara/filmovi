@extends('layouts.app')

@php
use Illuminate\Support\Facades\DB;
@endphp

@section('content')

<style type="text/css">

body {
background-color: rgb(44, 76, 76);
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading"><center>Dobrodosli na bazu filmova!</center></div>

                <div class="panel-body">
					<center>
					<font size="5">
				<?php
				
				$slova=range('A','Z');
				
				echo "|";
				foreach ($slova as $s)
				{
					echo "<a href='?sl=".$s."' >".$s."</a>|";
				}
				echo "</font>";
				
				if(isset($_GET["sl"])) { 
				$s=$_GET["sl"];
			
				$f = DB::table('filmovi')->where('naslov', 'like', $s . '%')->orderBy('naslov')->get();
				
				foreach($f as $film){
					echo "<br><br><img src='slike/".$film->slika."'  height='280' width='240' ><br>"
					. $film->naslov .
					" ("
					. $film->godina .
					") <br>Trajanje: "
					. $film->trajanje .
					" min <br><br>";  
				}  
				
				}   
				
				?>
				
				<br/><br/>
				
				@if ( Auth::user())
					
				<a href="film/unos" class="btn btn-primary btn-lg active" 
					         role="button" aria-pressed="true">Unos filmova</a>
					<br/><br/>
				
				@endif
				
					</center>
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
