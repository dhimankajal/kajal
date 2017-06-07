<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

   /*login page*/
    public function loginPage(){
       if(Auth::check())
      {
        return redirect('/home');
      }
      else
      {  
        return view('user.login');
      }
    }

    // login 
    public function login(Request $request)
    {
        $data=$request->all();
        if(!filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false){
            if(Auth::attempt(['email'=>$data['email'], 'password'=>$data['password'],'status'=>1,'usertype'=>1))
            {               
                 return redirect('/dashboard');              
            }else{
                     return redirect('/login')->with('message1', 'Please fill valid credentials.');
            }
        }else{
            if(Auth::attempt(['contact_no'=>$data['contact_no'], 'password'=>$request->password ,'status'=>1,'usertype'=>1 ]))
            {       
                return redirect('/dashboard');

            } else{
                return redirect('/login')->with('message1', 'Please fill valid credentials.');

            }
        }
    }

    // forgotPassword
    public function forgotPassword(Request $request)
    {
        $data=$request->all();
        $detail=DB::table('users')->where('email',$data['email'])->where('usertype','=',1)->first();
        $detail=json_decode(json_encode($detail),true);
        $email=$data['email'];
        $no= mt_rand(100000, 999999);
        DB::table('users')->where('email',$data['email'])->where('usertype','=',1)->update(['password'=>bcrypt($no)]);
        $messageData = [
                    'username'=>$detail['username'],
                    'email'=>$deatil['email'],
                    'password' => $no,
        ];
        Mail::send('emails.forgotPassword', $messageData ,function($message) use ($email){
                $message->to($email)->subject('Reset your password');
        }

        return redirect('/login')->with('message', 'New Password is send on Your email. Please check it');
    }

} 
?>    
