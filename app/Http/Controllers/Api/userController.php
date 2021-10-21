<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use PHPMailer\PHPMailer\PHPMailer; 
use PHPMailer\PHPMailer\SMTP; 
use PHPMailer\PHPMailer\Exception;
use Carbon\Carbon;
use Validator;
use App\Models\User;
use App\Models\Verification;
use Hash;
use DateTime;


class userController extends Controller
{
    //user register 
    public function userRegister(Request $request){
        $username = $request->username;
        $email = $request->email;
        $password = md5($request->password);

        $emailExist =DB::table('users')->where('email', $email)->count();
        $userExist =DB::table('users')->where('username', $username)->count();
         
        if(!isset($username)){
			$result=array('status'=>201,'message'=> 'Username is required.');
		}else if(!isset($email)){
			$result=array('status'=>201,'message'=> 'Email is required.');
		}else if(!isset($password)){
			$result=array('status'=>201,'message'=> 'Password is required.');
		}else if($emailExist > 0){
			$result=array('status'=>201,'message'=> 'Email is already exist.');
		}else if($userExist > 0){
			$result=array('status'=>201,'message'=> 'Username is already exist.');
		}else{
			$date = date("Y-m-d h:i:s", time());
            $data = ['username'=>$username,'email'=>$email,'password'=>$password,'status'=>1,'created_at'=>$date, 'updated_at'=>$date];
            $addUsers =DB::table('users')->insert($data);
            if($addUsers){
                $result=array('status'=>200,'message'=> 'User added successfully.');
            }else{
                $result=array('status'=>201,'message'=> 'Something went wrong. Please try again.');
            }
				
        }
       echo json_encode($result);
    }

    //email verification otp
    
    public function emailSentOtp(Request $request) {
        $email = $request->email;
        $otp =  mt_rand(1000,9999);
        $date = date("Y-m-d h:i:s", time());
        $check_email = DB::table('email_otp')->where('email',$email)->count();

        $mail = new PHPMailer();
        $mail->SMTPDebug  = 0;  
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;    
        $mail->IsHTML(true);
        $mail->Username = "sakil.appic@gmail.com";
        $mail->Password ='APPICSOFTWARES';
        $mail->SetFrom("sakil.appic@gmail.com");
        $mail->Subject = "Email verification";
        $mail->Body="Email verification OTP ". $otp;
        $mail->AddAddress($email);

        if($check_email > 0){
            $up_otp = ['otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $upt_success = DB::table('email_otp')->where('email', $email)->update($up_otp);
            if($upt_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent your email successfully');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Otp not sent');
            }
        }
        else{
            $gan_otp = ['email'=> $email, 'otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $otp_success = DB::table('email_otp')->insert($gan_otp);
            
            if($otp_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent your email successfully');
                }
                else{
                    $result = array('status'=> 201, 'message'=>'Otp not sent');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Something is Wrong.');
            }
        }
            echo json_encode($result);
    }
     
    public function emailVerification(Request $request){
        $email = $request->email;
        $otp = $request->otp;
        
        $verify_otp = DB::table('email_otp')->where('email', $email)->where('otp', $otp)->first();
        $otp_expires_time = Carbon::now()->subMinutes(5);
      
        if($verify_otp->create_at < $otp_expires_time){
            $result = array('status'=> false, 'message'=>'OTP is unvalid.');
        }
        else{
            $result = array('status'=> true, 'message'=>'otp valid successfully.');
        }      
        echo json_encode($result);
    }


    public function forgotPassword(Request $request) {
        $email = $request->email;
        $otp =  mt_rand(1000,9999);
        $date = date("Y-m-d h:i:s", time());
        $check_email = DB::table('password_otp')->where('email',$email)->count();

        $mail = new PHPMailer();
        $mail->SMTPDebug  = 0;  
        $mail->IsSMTP();
        $mail->Mailer = "smtp";
        $mail->SMTPAuth = true;
        $mail->Host = "smtp.gmail.com";
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;    
        $mail->IsHTML(true);
        $mail->Username = "sakil.appic@gmail.com";
        $mail->Password ='APPICSOFTWARES';
        $mail->SetFrom("sakil.appic@gmail.com");
        $mail->Subject = "Forgot password";
        $mail->Body="Forgot password OTP ". $otp;
        $mail->AddAddress($email);

        if($check_email > 0){
            $up_otp = ['otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $upt_success = DB::table('password_otp')->where('email', $email)->update($up_otp);
            if($upt_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent successfully');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Otp not sent');
            }
        }
        else{
            $gan_otp = ['email'=> $email, 'otp'=>$otp, 'create_at'=>$date, 'update_at'=>$date];
            $otp_success = DB::table('password_otp')->insert($gan_otp);
            
            if($otp_success){
                if($mail->Send()){
                    $result = array('status'=> 200, 'message'=>'Otp sent successfully');
                }
                else{
                    $result = array('status'=> 201, 'message'=>'Otp not sent');
                }
            }
            else{
                $result = array('status'=> 201, 'message'=>'Something is Wrong.');
            }
        }
            echo json_encode($result);
    }

    public function passwordVerification(Request $request){
        $email = $request->email;
        $otp = $request->otp;
        
        $verify_otp = DB::table('password_otp')->where('email', $email)->where('otp', $otp)->first();
        $otp_expires_time = Carbon::now()->subMinutes(5);
      
        if($verify_otp->create_at < $otp_expires_time){
            $result = array('status'=> false, 'message'=>'OTP is unvalid.');
        }
        else{
            $result = array('status'=> true, 'message'=>'otp valid successfully.');
        }   
        echo json_encode($result);
    }

    public function passwordUpdate(Request $request){
        $email = $request->email;
        $newPassword = md5($request->newPassword);
        $confirmPassword = md5($request->confirmPassword);
        
        if(!isset($email)){
            $result = array('status'=> false, 'message'=>'Email is required');
        }
        elseif(!isset($newPassword)){
            $result = array('status'=> false, 'message'=>'New password is required');
        }
        elseif(!isset($confirmPassword)){
            $result = array('status'=> false, 'message'=>'Confirm password is required');
        }
        elseif($newPassword != $confirmPassword){
            $result = array('status'=> false, 'message'=>'password not match');
        }
        else{
           $date = date("Y-m-d h:i:s", time());
           $data =['password'=>$newPassword,'updated_at'=>$date]; 
           $pass_upde = DB::table('users')->where('email',$email)->update($data);
           if($pass_upde){
            $result = array('status'=> true, 'message'=>'password changed successfully.');
           }
           else{
            $result = array('status'=> false, 'message'=>'password not changed.');
           }
        }

        echo json_encode($result);
    }
    

    public function signUp(Request $request){
        $validate= Validator::make($request->all(),[
            'name'=>'required',
            'email'=>'required',
            'password'=>'required',
            
        ]);
        if($validate->fails()){
            $result=array("status"=>false,"message"=>"Validation Failed","error"=>$validate->errors());
        }else{
               $res = User::where('email',$request->email)->first();
               if($res)
                {
                  $result=array("status"=>false,"message"=>"User  Already Register");                  
                }
                else
                {
                        $verify = new Verification();
                      
                        session(["name"=>$request->name]);
                        session(["email"=>$request->email]);
                        session(["phone"=>$request->phone]); 
                        session(["language"=>$request->language]); 
                        session(["password"=>$request->password]);                  
                     
                        $otp =  mt_rand(100000,999999);
                         $verify->email=$request->email;
                        $verify->otp=$otp;
                         $verify->verify_at=Carbon::now();
                         $verify->save();

                        $subject="Verify your account";
                         $message=$otp;
                         if($this->sendMail($request->email,$subject,$message)){
                             //   return view('Pages.email-verification');
                             $result=array('status' => true,'message' =>"Send Email in your Email Address");
                 
                        }else{
                         $result=array('status' => false,'message' =>"Something Went Wrong");
                      //  return view('signup');
                    }
                   

                        // $user->password=Hash::make($request->password);
                        // $user->save();
                        // $result=array("status"=>true,"message"=>"Send Otp In your Email Address ","data"=>$user);
                }
                echo json_encode($result);
            }
    }

    public function sendMail($email,$stubject=NULL,$message=NULL){

        require base_path("vendor/autoload.php");
        $mail = new PHPMailer(true);     // Passing `true` enables exceptions
        try {
            $mail->SMTPDebug = 0;   
            $mail->isSMTP();
            $mail->Host="smtp.gmail.com";
            $mail->Port=587;
            $mail->SMTPSecure="tls";
            $mail->SMTPAuth=true;
            $mail->Username="raviappic@gmail.com";
            $mail->Password="audnjvohywazsdqo";
            $mail->addAddress($email,"User Name");
            $mail->Subject=$stubject;
            $mail->isHTML();
            $mail->Body=$message;
            $mail->setFrom("raviappic@gmail.com");
            $mail->FromName="Fitness-final";
            
            if($mail->send())
            {   
                return 1;                 
            }
            else
            { 
                return 0;
            }

        } catch (Exception $e) {
             return 0;
        }
    }

    public function verifyOtp(Request $request){
        
        $email =  session("email");
        $otp=$request->digit1.$request->digit2.$request->digit3.$request->digit4.$request->digit5.$request->digit6;
        $otp = (int)$otp; 
        $date1=new DateTime(date('d-m-Y h:i:s',time()));
        $res=Verification::where('email',$email)->first();
        
        if($res){
            $date2=new DateTime($res->verify_at);   
            $differance=$date2->diff($date1);
            $diff=$differance->i;
            if($diff<=2){
                $res=Verification::where('otp',$otp)->first();
                    if($res){
                            Verification::where('email',$email)->delete();                     
                               //yaha databse me entry hogi  user ki sari details           
                            $user = new User();  
                            $user->name =  session("name");
                            $user->email = session("email");
                            $user->phone = session("phone");
                            $user->language = session("language");
                            $user->password = session("password");
                            $user->save();
                            
                        $result = array('status'=>true, 'message'=>'User Register Successfully');
                        
                        }else{   
                            $result=array('status'=>false,'message'=>'Wrong Otp ');
                        }
            }else{
                $result=array('status'=>false,'message'=>'Otp Expired' ,'time'=>$differance);
            }     
        }else{
            $result=array('status'=>false,'message'=>'email not exits ');
        }
        echo json_encode($result);
      }

    //   public function resendotp(Request $request]){
    //       'email' => 're'
    //   }


    public function fitness_survey(Request $request){
        $validate = Validator::make($request->all(),[
            'gender' => 'required',
            'weight' => 'required',
            'height' => 'required'
        ]);
        if($validate->fails()){
            $result = array('status'=>false, 'message'=>'Validation failed', 'error'=>$validate->errors());
        }
        else{
            session(["gender"=>$request->gender]);
            session(["weight"=>$request->weight]);
            session(["weight_unit"=>$request->weight_unit]);
            // session(["height"=>$request->height]);
            // session(["height_unit"=>$request->height_unit]);
            // session(["interest"=>$request->interest]);
            // session(["bodyparts_work"=>$request->bodyparts_work]);
            // session(["exercise"=>$request->exercise]);
            // session(["length_training"=>$request->length_training]);
            // session(["fitness_goal"=>$request->fitness_goal]);
            // session(["diedt_impact"=>$request->diedt_impact]);

            $fitness = new Fitness_survey();
            $fitness->gender =  session("gender");
            $fitness->weight =  session("weight");
            $fitness->weight_unit =  session("weight_unit");
            $fitness->height =  session("height");
            $fitness->height_unit =  session("height_unit");
            $fitness->interest =  session("interest");
            $fitness->bodyparts_work =  session("bodyparts_work");
            $fitness->exercise =  session("exercise");
            $fitness->length_training =  session("length_training");
            $fitness->fitness_goal =  session("fitness_goal");
            $fitness->diedt_impact =  session("diedt_impact");
            $fitness->save();
            if($fitness){
                $result = array('status'=>true, 'message'=>'Fitness Survey Successfully');
            }
            else{
                $result = array('status'=>false, 'message'=>'Something Went Wrong');
            }
        }
        echo json_encode($result);
    }

    public function fitness_one(Request $request){
        session(["gender"=>$request->gender]);
        session(["weight"=>$request->weight]);
        session(["weight_unit"=>$request->weight_unit]);
        session(["height"=>$request->height]);
            // session(["height_unit"=>$request->height_unit]);

        return view('Pages.fitness-survey2');
    }



}

              
     
// $data = array('gender' =>$request->gender, 'weight' =>$request->weight, 'weight_unit'=>$request->weight_unit,
// 'height'=>$request->height, 'height_unit'=>$request->height_unit, 'interest'=>$request->interest,
// 'bodyparts_work'=>$request->bodyparts_work, 'exercise'=>$request->exercise, 'length_training'=>$request->length_training,

// 'fitness_goal'=>$request->fitness_goal, 'diedt_impact'=>$request->diedt_impact);
// dd($data);