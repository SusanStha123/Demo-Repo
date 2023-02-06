<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiController extends Controller
{
    // Login function
    function login(Request $request){
        $fields = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        // Check emails
        $user = User::where('email',$fields['email'])->first();
        
        // Check password
        if(!$user || !Hash::check($fields['password'],$user->password)){
            return response([
                'status' => '401',
                'message' => 'Invalid credentials'
            ]);
        }
        
        $token = $user->createToken('myapptoken')->plainTextToken;
        
        return response([
            'status' => 200,
            'user' => $user,
            'token' => $token
        ]);
    }

    // Register passenger function
		function passengerRegister(Request $request){
			$request->validate([
				'name' => 'required',
				'email' => 'required|email',
				'password' => 'required|string',
			]);

			$find_passenger = User::where('email', '=', $request->email)->first();

			if($find_passenger)
			{
				return response([
					'status' => 402,
					'message' => 'user already registered'
				]);
			}

    	$user = new User();
			$user->name = $request->name;
			$user->email = $request->email;
			$user->roles = 1;
			$user->password = Hash::make($request->password);
			$user->save();

			Auth::login($user);

			$token = $user->createToken('myapptoken')->plainTextToken;

			return response([
				'status' => '200',
				'token'=>$token,
				'user' => $user
			]);
		}

        // Register driver function
		function driverRegister(Request $request){
			$request->validate([
				'name' => 'required|string',
				'email' => 'required|email',
				'password' => 'required|string',
			]);
			
			$find_driver = User::where('email', '=', $request->email)->first();
			if ($find_driver){
				return response([
					'status' => '402',
					'message' => 'driver already registered',
				]);
			}


			$user = new User();
			$user->name = $request->name;
			$user->email = $request->email;
			$user->roles = 2;
			$user->password = Hash::make($request->password);
			$user->save();

			Auth::login($user);
			$token = $user->createToken('myapptoken')->plainTextToken;

			return response([
				'status' => '200',
				'token' => $token,
				'user' => $user
			]);
		}


}
