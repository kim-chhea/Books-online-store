<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Book;
use App\Models\Review;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
             $Review = Review::with(['Book:id,author,title,rating,cover_image','User:id,name,email'])->get(['id','rating','comment','user_id',"book_id"]);
        if($Review)
        {
            return response()->json([
                'message' => 'Get Review successfully',
                'status' => 200,
                'data' => $Review
            ]);
        }
        
        }
        catch(Exception $e)
        {
          throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
          throw new CustomeExceptions($e->getMessage(),);
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
    public function store(Request $request, $id)
    {
        try
        {
             $validateReview = $request->validate([
               'book_id' => 'required',
               'user_id' => 'required',
               'rating' => 'required|integer',
               'comment' => 'required|string',
    
        ]);
        $Review = Review::findOrFail($id);
        if($Review)
        {
          $Review->create($validateReview);
            return response()->json([
                'message' => 'Created Review successfully',
                'status' => 201,
                'data' => $Review
            ]);
        }
        }
        catch(Exception $e)
        {
          throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
          throw new CustomeExceptions($e->getMessage(),);
        }
       
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        try
        {
          $Review = Review::with(['Book:id,author,title,rating,cover_image','User:id,name,email'])->select(['id','rating','comment','user_id',"book_id"])->findOrFail($id);
        if($Review)
        {
            return response()->json([
                'message' => 'Get Review successfully',
                'status' => 200,
                'data' => $Review
            ]);
        }
        
        }
        catch(Exception $e)
        {
          throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
          throw new CustomeExceptions($e->getMessage(),);
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
            $validateReview = $request->validate([
                'status' => 'required|string',
                'total' => 'required|string',
        
            ]);
            $Review = Review::findOrFail($id);
            if($Review)
            {
            $Review->update($validateReview);
            return response()->json([
                'message' => ' Review updated successfully',
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
          throw new CustomeExceptions($e->getMessage(),);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try
        {

        $Review= Review::findOrFail($id);
        $Review->delete();
        return response()->json([
            'message' => ' Review deleted successfully',
            'status' => 200,
        ]);
        
        }
        catch(Exception $e)
        {
          throw new CustomeExceptions($e->getMessage(), 500);
        }
        catch(QueryException $e)
        {
          throw new CustomeExceptions($e->getMessage(),);
        }
    }
}
