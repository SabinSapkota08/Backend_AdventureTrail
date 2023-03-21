<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use Validator;
use Auth;
class RegisterController extends Controller
{
    public function register(Request $request)
    {
        request()->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'confirm_password' => 'required|same:password', 
            'phone' => 'required',
        ]);
      
   
   
        $input = $request->all();
        $input['password'] = bcrypt($input['password']);
        $user = User::create($input);
        $success['token'] =  $user->createToken('MyApp')->accessToken;
        $success['user'] =  $user;
   
        return $success;;
    }


    public function login(Request $request)
    {
 
        if(auth()->attempt(['email' => $request->email, 'password' => $request->password])){ 
            $user = auth()->user(); 
            $success['token'] =  $user->createToken('MyApp')-> accessToken; 
            $success['user'] =  $user;
   
            return $success;
        } 
        else{ 
            return response()->json(['error'=>'Unauthorised'],302);
        } 
    }
}
