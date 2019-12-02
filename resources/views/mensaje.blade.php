@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
		<div class="col-sm-4 col-md-4">
            <div class="panel panel-default">
                <div class="panel-body">          
                    <form accept-charset="UTF-8" action="{{ url('telegram')}}" method="GET">
                        <textarea class="form-control counted" id="message" name="message" placeholder="Inserta el aviso" rows="5" style="margin-bottom:10px;"></textarea>
                        
                        <button class="btn btn-info" type="submit" id="enviar">Enviar aviso</button>
                    </form>
                </div>
            </div>
        </div>
	</div>
</div>
@endsection