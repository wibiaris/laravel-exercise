<?php
// use Models\Todo;
class TodoController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /todo
	 *
	 * @return Response
	 */
	public $restful = true;

	public function index()
	{
		//
		$todos = Todo::all();
		
		return View::make('index')->with('todos',$todos);
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /todo/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//

	}

	/**
	 * Store a newly created resource in storage.
	 * POST /todo
	 *
	 * @return Response
	 */
	public function store()
	{
		//
		if(Request::ajax()){
			$todo = new Todo();
			$todo->title = Input::get('title');
			$todo->save();
			$last_todo = $todo->id;
			$todos = Todo::whereId($last_todo)->get();

			return View::make("ajaxData")->with("todos",$todo);
		}
		
	}

	/**
	 * Display the specified resource.
	 * GET /todo/{id}
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
	 * GET /todo/{id}/edit
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 * PUT /todo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
		if(Request::ajax()){
			$task = Todo::find($id);
			$task->title = Input::get("title");
			$task->save();
			return "OK";	
		}
		
	}

	/**
	 * Remove the specified resource from storage.
	 * DELETE /todo/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
		if(Request::ajax()){
			$todo = Todo::whereId($id)->first();
			$todo->delete();
			return "OK";
		}
	}
	public function done($id)
	{
		if(Request::ajax()){
			$task = Todo::find($id);
			$task->status = 1;
			$task->save();
			return "OK";
		}
	}

}