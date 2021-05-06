<?php

namespace App\Http\Controllers;


use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index(){
        $users = User::all();
        return response($users);
    }

    public function register(Request $request){
            $input = User::insertGetId([
                'name' => $request->name,
                'api_token' => bin2hex(openssl_random_pseudo_bytes(32)),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);

            if($input){
                $new_user = User::find($input);
                return response()->json($new_user);
            }

            return response('Registration Failed', 500);

    }
}
