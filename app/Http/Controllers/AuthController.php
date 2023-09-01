<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function userLogin(Request $req){
      
        $email = $req->email;
        $password = md5($req->password);
        $user = User::where('email', '=', $email)
            ->where('password', '=', $password)
            ->first();
            //dd($email, $password);
            if($user){
                // check if user is approved (check value of status coloumn is 1)

                if($user->status == 1){
                    //save user in the session
                    Session::put('user_fname',$user->first_name);
                    Session::put('user_lname',$user->last_name);
                    Session::put('user_email',$user->email);
                    Session::put('user_role',$user->role);
                
                    return redirect('admin/dashboard');

                }
                else{
                    return redirect()->back()->with('error', 'User Not Approved Yet...');

                }

                
            }
            else{
                return redirect()->back()->with('error', 'User Not Found with these credentials...');
            }
    }


    
    public function teacherRegister(){
        return view('auth.teacher_register');
    }
    public function registrationTeacher(Request $req){
        if($req->password == $req->conf_password){
            // Check if the submitted email is already in the User table or databse
              $user_exists =  User::where('email', '=', $req->email)->first();
              if($user_exists){
                return redirect()->back()->with('error', 'Email Already Exists!');
              }
              else{
                $user = new User();
                $user->first_name = $req->first_name;
                $user->last_name = $req->last_name;
                $user->email = $req->email;
                $user->password = md5($req->password);
                $user->role = 'Teacher';
                if($user->save()){
                    return redirect()->back()->with('success', 'User Registered. Login now');
            }
                  
              }
    
        }
       else {
        return redirect()->back()->with('error', 'Password Mismatch!');
       }
        
    }
    
    public function studentRegister(){
        return view('auth.student_register');
    }
    public function registrationStudent(Request $req){
        if($req->password == $req->conf_password){
            // Check if the submitted email is already in the User table or database
              $user_exists =  User::where('email', '=', $req->email)->first();
              if($user_exists){
                return redirect()->back()->with('error', 'Email Already Exists!');
              }
              else{
                $user = new User();
                $user->first_name = $req->first_name;
                $user->last_name = $req->last_name;
                $user->email = $req->email;

                $user->student_id = $req->roll;


                $user->password = md5($req->password);
                $user->role = 'Student';
                if($user->save()){
                    return redirect()->back()->with('success', 'User Registered. Login now');
            }
                  
              }
    
        }
       else {
        return redirect()->back()->with('error', 'Password Mismatch!');
       }
    }

    public function logout(Request $request){
        $request->session()->forget(['user_fname', 'user_lname', 'user_email', 'user_role']);
        return redirect('/login');
    }



    //register or login with provider
    protected function _registerOrLoginUser($data)
    {
        //dd($data);
        $user = User::where('email', '=', $data->email)->first();
        if($user) {
            Session::put('user_email', $user->email);
            Session::put('user_fname', $user->first_name);
            Session::put('user_role', 'Student');
            Auth::login($user, true);
            return redirect('/my/dashboard')->with('success', 'Login successful');;
            //return redirect()->back()->with('error', 'Email Already Exists!');
        } else {

            $user = new User();
            $user->first_name = $data->name;
            $user->email = $data->email;
            $user->provider_id = $data->id;
            $user->role = 'Student';
            $user->status = 1;
            if($user->save()) {
                Session::put('user_email', $data->email);
                Session::put('user_fname', $data->name);
                Session::put('user_role', 'Student');
                Auth::login($user, true);
                return redirect('/my/dashboard')->with('success', 'User Registered.');
                //return redirect()->back()->with('success', 'User Registered. Waiting for Admin Approval');
            }

        }

    }


      //login with google
      public function loginWithGoogle()
      {
          return Socialite::driver('google')->redirect('admin/dashboard');
      }
      public function loginWithGoogleRedirect()
      {
          $googleUser = Socialite::driver('google')->stateless()->user();
          $this ->_registerOrLoginUser($googleUser);
  
          return redirect('admin/dashboard');
      }

      
      

    //login with facebook
    public function loginWithFacebook()
    {   
        return Socialite::driver('facebook')->redirect();
    }
    public function loginWithFacebookRedirect()
    {
        $facebookUser = Socialite::driver('facebook')->stateless()->user();
        $this ->_registerOrLoginUser($facebookUser);
        return redirect('admin/dashboard');
    }


        //login with linkedin
        public function loginWithLinkedin()
        {
            return Socialite::driver('linkedin')->redirect();
        }
        public function loginWithLinkedinRedirect()
        {
            $linkedinUser = Socialite::driver('linkedin')->stateless()->user();
            $this ->_registerOrLoginUser($linkedinUser);
            return redirect('admin/dashboard');
        }

}