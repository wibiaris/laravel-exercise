<?php

class GamesController extends BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /games
	 *
	 * @return Response
	 */
	public function index()
	{
		//Show a listing of games
		$games = Game::all();
		return View::make('index',compact('games'));
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /games/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
		return View::make('create');
	}

	public function handleCreate()
	{
		$game = new Game;
		$game->title = Input::get('title');
		$game->publisher = Input::get('publisher');
		$game->complete= Input::get('complete');
		$game->save();

		return Redirect::action('GamesController@index');
	}
	/**
	 * Store a newly created resource in storage.
	 * POST /games
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 * GET /games/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit(Game $game)
	{
		//
		return View::make('edit', compact('game'));
	}

	public function handleEdit()
	{
		 $game = Game::findOrFail(Input::get('id'));
		 $game->title = Input::get('title');
		 $game->publisher = Input::get('publisher');
		 $game->complete = Input::has('complete');
		 $game->save();

		 return Redirect::action('GamesController@index');
	}

	public function delete()
	{
		return View::make('delete', compact('game'));
	}

	public function handleDelete()
	{
		 $id = Input::get('game');
		 $game = Game::findOrFail($id);
		 $game->delete();

		 return Redirect::action('GamesController@index');
	}
	/**
	 * Update the specified resource in storage.
	 * PUT /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /games/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}