<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request)
    {
       $fields = $request->validate([
        'name' => 'required|string',
        'email' => 'required|string|unique:users,email',
        'password' => 'required|string|confirmed'
       ]);

       $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password'])
       ]);
       $token = $user->createToken('token')->plainTextToken;

       $response = [
            'user' => $user,
            'token' => $token
       ];

       return response($response, 201);
    }
    public function login(Request $request)
    {
       $fields = $request->validate([
        'email' => 'required|string',
        'password' => 'required|string'
       ]);
       
       //Check email
       $user = User::where('email', $fields['email'])->first();

       //Check password
       if(!$user || !Hash::check($fields['password'], $user->password)){
            return response([
                'message' => 'Your credentials do not match.'
            ], 401);
       }

       $token = $user->createToken('token')->plainTextToken;

       $response = [
            'message' => 'Logged in successfully.',
            'user' => $user,
            'token' => $token
       ];

       return response($response, 201);
    }



    public function logout(Request $request){
        auth()->user()->tokens()->delete();

        return [
            'message' => 'You are logged out.'
        ];
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
