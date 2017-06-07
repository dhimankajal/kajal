<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users.
    |
    */
    public function __construct()
    {
        $this->middleware('guest');
    }
   
    // register page
    public function registerPage(){
      if(Auth::check())
      {
        return redirect('/dashboard'); // if user is login , then automatically redirect to dashboard of user
      }
      else
      {  
        return view('user.register'); // if user is not login, then redirect to register page
      }
    }
    
    // check email that is already in use or not
    public function email_check()
    {

      $data=DB::table('users')
      ->where('email',$_POST['email'])
      ->first();
       $data    =  json_decode( json_encode($data), true);
        if (!empty($data)) {
            return 'false'; // not in use
        }
        else {
            return 'true'; // already in use
        }
    }

    // check contact number
    public function phone_check()
    {
      $data=DB::table('users')
      ->where('contact_no',$_POST['contact_no'])
      ->first();
       $data    =  json_decode( json_encode($data), true);
      if (!empty($data)) {
          return 'false'; // not in use
      }
      else {
          return 'true'; // already in use
      }
    }

    // regsiter
    public function create(Request $request)
    {  
       $data=$request->all();   
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'contact_no'=>$data['contact_no'],
            'usertype'=>1,
            'user_id'=>'',
            'permissions'=>'',
            'driving_licence'=>'',
            'identity_proof'=>'',
            'truck_id'=>'',
        ]);

        return redirect()->route('login')->with('message','An email veification message send on you email. Please check and now you can login on site');       
    }
}
