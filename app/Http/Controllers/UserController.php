<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("show");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
       $data = $request->only("name","email","password");
       User::create($data);
       $user = User::where("email",$request->email)->firstOrFail();
       $token = $user->createToken("auth_token")->plainTextToken;
       return response()->json($token, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $tasks = User::find($id)->tasks;
        return response()->json($tasks, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function login(Request $request)
    {
        $user = User::where("email",$request->email)->firstOrFail();
        $token = $user->createToken("auth_token")->plainTextToken;
        return response()->json($token, 201);
    }
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();
        return response()->json(["message"=>"true"], 200);
    }
}
