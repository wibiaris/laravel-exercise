<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 * GET /users
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}

	public function login()
	{
		if($this->isPostRequest()){
			$validator = $this->getLoginValidator();
				if($validator->passes()){
					$credentials = $this->getLoginCredentials();

					if(Auth::attempt($credentials)){
						return Redirect::route('user/profile');
					}
					return Redirect::back()->withErrors([
						"password" => ["Credentials invalid."]
						]);
				
			
			}else{
				// $data['error'] =  "Username and/or password invalid.";
				return Redirect::back()
				->withInput()
				->withErrors($validator);
			}

		}
		return View::make("users/login");
	}

	protected function isPostRequest(){
		return Input::server("REQUEST_METHOD") == "POST";
	}

	protected function getLoginValidator(){
		return Validator::make(Input::all(),[
			"username" => "required",
			"password" => "required"
			]);
	}

	protected function getLoginCredentials(){
		return[
		"username"	=> Input::get('username'),
		"password"	=> Input::get('password')
		];
	}

	public function profile(){
		return View::make('users/profile');
	}

	public function request(){
		if($this->isPostRequest()){
			$response = $this->getPasswordRemindResponse();

			if($this->isInvalidUser($response)) {
				return Redirect::back()
				->withInput()
				->with('error',Lang::get($response));
			}
			return Redirect::back()
			->with('status',Lang::get($response));
		}
		return View::make('user/request');
	}

	protected function getPasswordRemindResponse(){
		return Password::remind(Input::only('email'));
	}
	protected function isInvlaidUser($response){
		return $response === Password::INVALID_USER;
	}

	public function reset($token){
		if($this->isPostRequest()){
			$credentials = Input::only(
				'email',
				'password',
				'passsword_confirmation') + compact('token');
			$response = $this->resetPassword($credentials);

			if($response === PASSWORD::PASSWORD_RESET){
				return Redirect::route('user/profile');
			}
			return Redirect::back()
			->withInput
			->with('error',Lang::get($response));
		}
		return View::make('user/reset',compact('token'));
	}

	protected function resetPassword($credentials){
		return Password::reset($credentials,function($user,$pass) {
			$user->password = Hash::make($pass);
			$user->save();
		});
	}

	public function logout(){
		Auth::logout();
		return Redirect::route('user/login');
	}

	/**
	 * Show the form for creating a new resource.
	 * GET /users/create
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 * POST /users
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}

	/**
	 * Display the specified resource.
	 * GET /users/{id}
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
	 * GET /users/{id}/edit
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
	 * PUT /users/{id}
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
	 * DELETE /users/{id}
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}