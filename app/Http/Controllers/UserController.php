<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try
        {
            $user = User::with(['Role:id,name'])->get(['id','name','email','role_id']);
            if($user)
            {
                return response()->json([
                    "message" => "Get users successfully",
                    "status" => 200,
                    "data" => $user
                ]);
            }
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
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
    public function store(Request $request)
    {
        try{
            $ValidateUser = $request->validate([
                'name' => 'required|string|min:3|max:30',
                'email' => 'required|email|unique:users,email',
                'password' => 'required|string|min:8|max:16',
                'role_id' => 'required',
            ]);
            $user = User::create($ValidateUser);
            if($user)
            {
                return response()->json([
                    'message' => 'Created user successfully',
                    'status' => 201,
                    "data" => $user
                ]);
            }
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try
        {
            $user = User::with(['Role:id,name'])->select(['id','name','email','role_id'])->findOrFail($id);
            if($user)
            {
                return response()->json([
                    "message" => "Get user successfully",
                    "status" => 200,
                    "data" => $user
                ]);
            }
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }

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
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
