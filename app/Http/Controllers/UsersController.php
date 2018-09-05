<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\model\usersmodel;
class UsersController extends Controller

{
   public function index()
      {
         $user_table = usersmodel::all();

         return view('home.index')->with('user',$user_table);
      }





// insert section
     public function insertdata (Request $request)
      {
        $user_table = new usersmodel;
        $user_table->name   = $request->name;
        $user_table->email = $request->email;
        $user_table->phone = $request->phone;

       $user_table->save();
       return response()->json($user_table);
       echo "succesfully inserted !" ;

      }
// update section
 public function updatedata(Request $request)
      {
         $user_table = usersmodel::find($request->id);
         $user_table->name   = $request->name;
         $user_table->email = $request->email;
         $user_table->phone = $request->phone;

         $user_table->save();
         return response()->json($user_table);
      }
//delete section
public function deletedata(Request $request)
      {
           usersmodel::where ('id',$request->id)->delete();
          return response()->json();

      }

// emailvaladation

public function validationemail(Request $request)
      {
           $email = $request->email;
           $count = usersmodel::select('email')->where('email',$email)->first();
           if(count($count)<=1) {
            echo "This email is not available";
           }
            else { echo "This email is available";}
      }


////final bracket
}



















