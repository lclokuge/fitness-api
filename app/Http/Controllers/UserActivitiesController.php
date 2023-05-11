<?php

namespace App\Http\Controllers;
use App\Models\user_activity;
use Illuminate\Http\Request;

class UserActivitiesController extends Controller
{
    public function getAllUserActivities() {
        return user_activity::all();
          
    }

    public function create(Request $request) {
        $useract= new user_activity;
        $useract->date = $request->date;
        $useract->duration = $request->duration;
        $useract->calories = $request->calories;
        $useract->distance = $request->distance;
        $useract->note = $request->note;
        $useract->user_id = $request->user_id;
        $useract->activity_id = $request->activity_id;
     
                
        $useract->save();

        return response()->json([
            "message" => "user is created"
        ], 201);

      }

     
      public function getActivitiesByid($id) {
        if (user_activity::where('id', $id)->exists()) {
            $useract = user_activity::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($useract, 200);
          } else {
            return response()->json([
              "message" => "user not found"
            ], 404);
          }
      }   

      public function updateUserActivity(Request $request, $id) {
        if (user_activity::where('id', $id)->exists()) {
            $useract = user_activity::find($id);
            $useract->date = is_null($request->date) ? $useract->date : $request->date;
            $useract->duration = is_null($request->duration) ? $useract->duration : $request->duration;
            $useract->calories = is_null($request->calories) ? $useract->calories : $request->calories;
            $useract->distance = is_null($request->distance) ? $useract->distance : $request->distance;
            $useract->note = is_null($request->note) ? $useract->note : $request->note;
            $useract->user_id = is_null($request->user_id) ? $useract->user_id : $request->user_id;
            $useract->activity_id = is_null($request->activity_id) ? $useract->activity_id : $request->activity_id;

            $useract->save();
    
            return response()->json([
                "message" => "record updated successfully"
            ], 200);
            } else {
            return response()->json([
                "message" => "record not found"
            ], 404);
            
        }
      
    }  
    
    public function deleteUserActivity ($id) {
        if(user_activity::where('id', $id)->exists()) {
          $user = user_activity::find($id);
          $user->delete();
  
          return response()->json([
            "message" => "records deleted"
          ], 202);
        } else {
          return response()->json([
            "message" => "User not found"
          ], 404);
        }
      }
}
