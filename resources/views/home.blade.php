@extends('layouts.app')

@section('content')

<style type="text/css">

body {
background-color: rgb(44, 122, 76);
}

</style>

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">Dobrodosli {{ Auth::user()->name }}!</div>

                <div class="panel-body">
                    Ulogirani ste!<br/><br/>
					
				@if ( Auth::user())
					
					
									<a href="../public" class="btn btn-success btn-lg active" 
					         role="button" aria-pressed="true">Pregled filmova</a>
					<br/><br/>
					
						
					
				<a href="film/unos" class="btn btn-primary btn-lg active" 
					         role="button" aria-pressed="true">Unos filmova</a>
					<br/><br/>
				
				@endif
				
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
