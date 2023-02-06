<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminPassengerController extends Controller
{
    public function getPassengers(){
        $allPassenger = User::where('roles',1)->get();
        return response([
            'allPassengers' => $allPassenger,
            'status' => 200
        ]);
    }
}
