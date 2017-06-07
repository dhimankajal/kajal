<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Route;
use Session;
use DB;
use View;
use App\Admin;
use Redirect;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Input;

class AdminController extends Controller
{
	public function admin(Request $request){
     if($request->session()->has('adminsession')){
	 return redirect()->route('adminDashboard');
	 }else{
      return View('login');
	 }
	}
	public function dashboard(Request $request){
		
	    if($request->session()->has('adminsession'))
	    {
	        $admin=DB::table('admins')->first();
	        $admin=json_decode(json_encode($admin),true);
	    	return View('dashboard')->with('admin',$admin);
	    }
     	else
     	{
      		return redirect()->route('admin')->with('message1','Please login in site first');
        } 

	} 


	public function login(Request $request){
		$data=$request->all();
		$admin=DB::table('admins')->where('username',$data['username'])->where('password',$data['password'])->first();
		$admin=json_decode(json_encode($admin),true);
		if(!empty($admin)){
			Session::put('adminsession', $admin);
    		return redirect()->route('adminDashboard');
		}else
    	{
    		return redirect()->route('admin')->with('message1','Please fill vaild credentials');
    	}
	}


	public function profile(Request $request){
        if($request->session()->has('adminsession'))
	    {
	    $admin=DB::table('admins')->first();
		$admin=json_decode(json_encode($admin),true);
		if(!empty($admin)){
	    return View::make('profile')->with('admin',$admin);
	    }else{	
		return redirect()->route('adminDashboard');
		}
	    }

		
	}

    // profile form submit
	public function formProfile(Request $request){
		$data=$request->all();
		$admin=DB::table('admins')->first();
		$admin=json_decode(json_encode($admin),true);
		if(!empty($admin)){
        DB::table('admins')->update(['firstname'=>$data['first_name'],
              'lastname'=>$data['last_name'],
              'email'=>$data['email'],
              'contact_no'=>$data['contact_no'],
              'about'=>$data['about'],
              'address'=>$data['address'],
              'username'=>$data['user_name'],
              'latitude'=>$data['adminLat'],
              'longitude'=>$data['adminLng']]);
		}else{	

        $admin=    Admin::create([
              'firstname'=>$data['first_name'],
              'lastname'=>$data['last_name'],
              'email'=>$data['email'],
              'contact_no'=>$data['contact_no'],
              'about'=>$data['about'],
              'address'=>$data['address'],
              'username'=>$data['user_name'],
              'latitude'=>$data['adminLat'],
              'longitude'=>$data['adminLng']
        ]);

        }

        //DB::table('admins')->insert(['firstname',$data['first_name']]);

        return redirect()->Route('adminProfile')->with('message','profile updated');

	}

	public function profileImage(Request $request){
       $admin= DB::table('admins')->select('image')->first(); 
       $admin=json_decode(json_encode($admin),true);
		if($request->hasFile('image'))
        {
        	
            if (Input::file('image')->isValid()) 
            {
                       $file = Input::file('image');
               
                        $destination = 'img/profile/';
                        $extension= Input::file('image')->getClientOriginalExtension();
                        if($extension=="gif" || $extension=="png" || $extension=="jpg" || $extension=="gif" || $extension=="jpeg")
                        {

	                       $image = rand(11111,99999).'.'.$extension;
	                       $file->move($destination, $image);
                        }
                        else
                        {
                            return Redirect::back()->with('message','File type not allowed');
                        }
            }
        }
	    else
	    {
	           $image = $admin['image'];
        }

        DB::table('admins')->update(['image'=>$image]);

        return Redirect::back()->with('message','profile updated');

    }

    public function changePassword(Request $request){
    	$data=$request->all();
         DB::table('admins')->update(['password'=>$data['new_password']]);
         return redirect()->route('adminProfile')->with('message','Password is changed');
    }

    public function checkPassword(Request $request){
       if($request->ajax()){
       $admin=DB::table('admins')->where('password',$_POST['current_password'])->first();
       $admin=json_decode(json_encode($admin),true);
       $result=count($admin);
       if(!empty($result)){
       	return 'true';
       }else{
       	return 'false';
       }
       }
    }

    public function logout(Request $request){
    if($request->session()->has('adminsession'))
       	{
       		$request->session()->flush();
       	}
       	return redirect()->route('admin')->with('message', "Logout Successful.");
    }   

    public function forgotPassword(Request $request){
    //  echo "<pre>";
    //  print_r($request->all()); die;
      $data=$request->all();
      $admin=DB::table('admins')->where('email',$data['email'])->first();
      $admin=json_decode(json_encode($admin),true);
      if(!empty($admin)){

      }else{
        return redirect()->route('admin')->with('message1','your email is incorrect');
      }

    }
}
?>