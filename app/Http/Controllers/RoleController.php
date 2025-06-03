<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Role;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        try
        {
            $roles = Role::get();
        if($roles) 
        {
            return response()->json([
                'message' => "get roles successfully",
                "status" => 200,
                "data" => $roles
            ]);
        }  
    
        }
        catch(QueryException $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage() , 500);
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
        //
        try
        {
            $ValidateRole = $request->validate([
            'name' => 'required|string|min:3|max:10|unique:roles,name'
            ]);
                $roles = Role::create($ValidateRole);
            if($roles)
            {
                return response()->json([
                "message" => "Role created succesfully",
                "status" , 201,
                "data" => $roles
                ]);
            }
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
        

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        try
        {
        $role = Role::findOrFail($id);
        if($role)
        {
            return response()->json([
                "message" => "get role successfully",
                "status" => 200,
                "data" => $role
            ]);
        }
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
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
    public function update(Request $request, $id)
    {
        //
        try
        {
            $ValidateRole = $request->validate([
            'name' => 'required|string|min:3|max:10|unique:roles,name'
            ]);
                $roles = Role::findOrFail($id);
            if($roles)
            {
                $roles->update($ValidateRole);
                return response()->json([
                "message" => "Role updated succesfully",
                "status" , 200,
                "data" => $roles
                ]);
            }
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {
           
                $roles = Role::findOrFail($id);
      
               $roles->delete();
                return response()->json([
                "message" => "Role deleted succesfully",
                "status" , 200,
                ]);
            
        
        }
        catch(Exception $e)
        {
            throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
            throw new CustomeExceptions($e->getMessage(),500);
        }
    }
}
