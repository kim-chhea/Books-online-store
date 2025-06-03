<?php

namespace App\Http\Controllers;

use App\Exceptions\CustomeExceptions;
use App\Models\User;
use Exception;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try
        {
        $request->validate([
            'email' => 'required|email|string',
            'password' => 'required|string|min:8|max:16',
        ]);

        $email = $request->input('email');
        $password = $request->input('password');

        $user = User::where('email',$email)->first();

        if (!$user || !Hash::check($password, $user->password)) {
            throw new CustomeExceptions('Invalid email or password', 403);
        }

        $token = $user->createToken($user->id)->plainTextToken;

        return response()->json([
            'message' => 'Verified successfully',
            'status' => 200,
            'token' => $token,
        ]);
    }
    catch(Exception $e)
    {
        throw new CustomeExceptions($e->getMessage(), 500);
    }
}


public function register(Request $request){
    try
    {
      $validateUser = $request->validate([
        'name' => 'required|string|min:8|max:12',
        'email' => 'required|string|email|unique:users,email',
        'password' => 'required|string|min:8|max:16'
      ]);
      $validateUser['password'] = Hash::make($validateUser['password']);
      $user = User::create($validateUser);
      if($user)
      {
        
        $token = $user->createToken($user->id)->plainTextToken;
        return response()->json([
            'message' => 'Registration successful',
            'status' => 201,
            'token' => $token,
        ]);

      }
    }
    catch (QueryException $e) 
    {
        throw new CustomeExceptions($e->getMessage(), 500);
    } 
    catch(Exception $e)
    {
        throw new CustomeExceptions($e->getMessage(), 500);
    }
}
public function logout(Request $request)
{
    try
    {

    // /checking the user token in header
    $user = $request->user('sanctum');
    if (!$user) {
        throw new CustomeExceptions('Unauthentication' , 401);
    }
    // if it have return the token 
    $token = $user->currentAccessToken();
    // $BaseToken= $token->token;
    if($token)
    {
     return response()->json(['message' => 'Logged out successfully' , 'token' => $token]);
    }
        throw new CustomeExceptions('No active token found',400);
    }
    // if it does not have return error
    catch(Exception $e)
    {
        throw new CustomeExceptions($e->getMessage() , 500);        
    }
    catch(QueryException $e)
    {
        throw new CustomeExceptions($e->getMessage());  
    }
}
}
