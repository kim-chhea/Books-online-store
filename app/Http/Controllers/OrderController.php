<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Order;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
             $Orders = Order::with(['User:id,name,email,password'])->get(['id','status','total','user_id']);
        if($Orders)
        {
            return response()->json([
                'message' => 'Get orders successfully',
                'status' => 200,
                'data' => $Orders
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
        try
        {
             $validateOrder = $request->validate([
            'status' => 'required|string',
            'total' => 'required|string',
            'user_id' => 'required'
    
        ]);
        $Orders = Order::create($validateOrder);
        if($Orders)
        {
            return response()->json([
                'message' => 'Created orders successfully',
                'status' => 201,
                'data' => $Orders
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
    public function show($id)
    {
        try
        {
             $Orders = Order::with(['User:id,name,email,password'])->select(['id','status','total','user_id'])->findOrFail($id);
        if($Orders)
        {
            return response()->json([
                'message' => 'Get order successfully',
                'status' => 200,
                'data' => $Orders
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
        try
        {
            $validateOrder = $request->validate([
                'status' => 'required|string',
                'total' => 'required|string',
                'user_id' => 'nullable'
        
            ]);
            $Orders = Order::findOrFail($id);
            if($Orders)
            {
            $Orders->update($validateOrder);
            return response()->json([
                'message' => ' Orders updated successfully',
                'status' => 200,
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

        $Orders= Order::findOrFail($id);
        $Orders->delete();
        return response()->json([
            'message' => ' Orders deleted successfully',
            'status' => 200,
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
