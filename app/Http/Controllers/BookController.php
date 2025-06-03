<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\Book;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try
        {
             $books = Book::get([
            'id' ,'author' , 'title' , 'price' , 'rating' , 'cover_image'
        ]);
        if($books)
        {
            return response()->json([
                'message' => 'Get books successfully',
                'status' => 200,
                'data' => $books
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
    public function store(Request $request)
    {
        try
        {
             $ValidateUser = $request->validate([
            'author' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|integer',
            'rating' => 'required|integer',
            'cover_image' => 'nullable'
        ]);
        $books = Book::create($ValidateUser);
        if($books)
        {
            return response()->json([
                'message' => 'Created books successfully',
                'status' => 201,
                'data' => $books
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
             $books = Book::findOrFail($id);
        if($books)
        {
            return response()->json([
                'message' => 'Get books successfully',
                'status' => 200,
                'data' => $books
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
             $ValidateUser = $request->validate([
            'author' => 'required|string|min:3|max:50',
            'title' => 'required|string|min:3|max:50',
            'price' => 'required|integer',
            'rating' => 'required|integer',
            'cover_image' => 'nullable'
        ]);
        $books = Book::findOrFail($id);
        if($books)
        {
            $books->update($ValidateUser);
            return response()->json([
                'message' => ' Books updated successfully',
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

        $books= Book::findOrFail($id);
        $books->delete();
        return response()->json([
            'message' => ' Books deleted successfully',
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
