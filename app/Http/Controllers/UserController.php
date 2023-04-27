<?php

namespace App\Http\Controllers;
use App\Models\users;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function getAllUsers() {
        return users::all();
          
        }

        public function create(Request $request) {
            $user= new users;
            $user->user_name = $request->user_name;
            $user->email = $request->email;
            $user->dob = $request->dob;
            $user->age = $request->age;
            $user->height = $request->height;
            $user->weight = $request->weight;
            $user->Gender = $request->Gender;
                    
            $user->save();
    
            return response()->json([
                "message" => "user is created"
            ], 201);
    
          }
       
          public function getUser($id) {
            if (users::where('id', $id)->exists()) {
                $user = users::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
                return response($user, 200);
              } else {
                return response()->json([
                  "message" => "user not found"
                ], 404);
              }
          }  
          

          public function updateUser(Request $request, $id) {
            if (users::where('id', $id)->exists()) {
                $user = users::find($id);
                $user->user_name = is_null($request->user_name) ? $user->user_name : $request->user_name;
                $user->email = is_null($request->email) ? $user->email : $request->email;
                $user->dob = is_null($request->dob) ? $user->dob : $request->dob;
                $user->age = is_null($request->age) ? $user->age : $request->age;
                $user->height = is_null($request->height) ? $user->height : $request->height;
                $user->weight = is_null($request->weight) ? $user->weight : $request->weight;
                $user->Gender = is_null($request->Gender) ? $user->Gender : $request->Gender;

                $user->save();
        
                return response()->json([
                    "message" => "records updated successfully"
                ], 200);
                } else {
                return response()->json([
                    "message" => "users not found"
                ], 404);
                
            }
          
        }  
        
        public function deleteUser ($id) {
            if(users::where('id', $id)->exists()) {
              $user = users::find($id);
              $user->delete();
      
              return response()->json([
                "message" => "records deleted"
              ], 202);
            } else {
              return response()->json([
                "message" => "User not found."
              ], 404);
            }
          }
}
