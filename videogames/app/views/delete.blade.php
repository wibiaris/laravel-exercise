@extends('layout')

@section('content')
	<div class="page-header">
		<h1>Delete{{ $game->Title}} <small> Are You Sure ? </small> </h1>
	</div>
	<form action ="{{ action('GamesController@handleDelete')}}" method="post" role="form">
		<input type="hidden" name="game" value="{{ $game->id}}"/>
		<input type="submit" class="btn btn-danger" value="Yes"/>
		<a href="{{ action('GamesController@index)}}" class="btn btn-default">No way!</a>
	</form>
@stop