<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("profile");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("addPro");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $req = $request->except("_token");
        Profile::create($req);
        return redirect("pro");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pro = User::find($id)->profile;
        return $pro;
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
}
