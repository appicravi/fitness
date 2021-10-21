<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\workoutPlans;
use App\Models\No_of_days;
use App\Models\ExcerciseName;
use App\Models\ExcerciseDetails;
use DB;

class workoutPlansController extends Controller
{
    public function index()
    { 
    $workoutplans = workoutPlans::all(); 
        return view('Pages.workoutplans.manage-workoutplans', compact('workoutplans'));
    }
    public function add_workout_plan_view()
    {
        return view('Pages.workoutplans.add_workout_plan_view');
    }
/*
    public function store(Request $request)
    {   

        
        dd($request->name);
        echo "<pre>";
      
        echo "number_of_days-->";
        print_r($request->number_of_days);
        echo "excercise_name-->";

        print_r($request->excercise_name);
        echo "exercise_details_video-->";
        print_r($request->file('exercise_details_video'));
    exit;
    //  dd($request->input());
        $workoutPlans = new workoutPlans();
        $workoutPlans->name =  $request->name;
        $workoutPlans->category_id =  $request->category_id;
        $workoutPlans->description =  $request->description;
        
        $workoutPlans->type =  $request->type;
          $workoutPlans->tranning_name =  $request->tranning_name;
           
            $fileimage="";
           $image_url='';
        if($request->hasfile('upload_video'))
        {
                
            $file_image=$request->file('upload_video');
            $fileimage=$file_image->getClientOriginalName();
            $destination=public_path("video");
            $file_image->move($destination,$fileimage);
            $image_url=url('public/video').'/'.$fileimage;
            $workoutPlans->upload_video =  $image_url;
        }
        $workoutPlans->location =  $request->location;
      
        $workoutPlans->level =  $request->level;
        $workoutPlans->save();

        $no_of_days = new No_of_days();
        $number_of_days = $request->number_of_days;
        
        foreach($number_of_days as $no)
        {
            $no_of_days->workout_plans_id =$workoutPlans->id ;
            $no_of_days->no_of_days = $no;
            $no_of_days->save(); 
            dd($no_of_days->id);
        }
         exit;
        if($sub->save()){
            $result=array('status'=>true,'message'=> 'Category Insert Successfully.');
        }
        else{
            $result=array('status'=>false,'message'=> 'Data Insert Not Successfully.');
        }
        echo json_encode($result);
        
    }*/

    public function store(Request $request)
    {   
      //  dd($request->input());
        $workoutPlans = new workoutPlans();
        $workoutPlans->name =  $request->name;
        $workoutPlans->category =  $request->category;
        $workoutPlans->description =  $request->description;

        $workoutPlans->frequency =  $request->frequency;
        $workoutPlans->calories_burn =  $request->calories_burn;
        
        $workoutPlans->type =  $request->type;
         
            $fileimage="";
           $image_url='';
        if($request->hasfile('upload_video'))
        {
                
            $file_image=$request->file('upload_video');
            $fileimage=$file_image->getClientOriginalName();
            $destination=public_path("video");
            $file_image->move($destination,$fileimage);
            $image_url=url('public/video').'/'.$fileimage;
            
        }
        $workoutPlans->status =  0;
        $workoutPlans->upload_video =  $image_url;
      
        $workoutPlans->level =  $request->level;
        $workoutPlans->save();

        // get data of excercise details
        $getDetails=explode('#',$request->workout);

        $wokout=array();
        foreach($getDetails as $key=>$value){
            $str=trim($value,",");
            if($str!=""){
                array_push($wokout, explode(",",$str));
            }
            
        }
        $collection=collect($wokout);

      
        $ex=array_column($wokout,1);
        $excercise_name=array_unique($ex);
        $nameIds=array();
        foreach($excercise_name as $val){
                $E_Name = new ExcerciseName();
                $E_Name->workout_plans_id=$workoutPlans->id;
                $E_Name->exercise_name = $val;
                $E_Name->save();
                // $nameIds[$value]=$E_Name->id;            
                $filtered = $collection->filter(function ($value, $key) use($val) {
                    if($value[1]==$val){
                        return true;
                    }
                });
            
               foreach($filtered as $key=>$value){
                $file='test';
                
                if($value){
                 
                    $image_base64 = base64_decode($value[4]);
                    //$file = uniqid() .'.mp4';
                    $file = uniqid() .'.mp4';
                    $url=public_path("video").'/'.$file;
                    //$url=url('public/video').'/'.$file;
                     file_put_contents($url, $image_base64);
                }

                 
                $Day_name = new ExcerciseDetails();
                $Day_name->exercise_name=$value[2];
                $Day_name->exercise_video=$file;
                $Day_name->exercise_name_id=$E_Name->id;
                $Day_name->save();
                            
               }
        }
        
        
        
     
        if($workoutPlans){
            $result=array('status'=>true,'message'=> 'Category Insert Successfully.');
        }
        else{
            $result=array('status'=>false,'message'=> 'Data Insert Not Successfully.');
        }
        echo json_encode($result);
        
    }

    public function workout_plan_update(Request $request)
    {
       // dd($request->input());
      
        $workoutPlans = new workoutPlans();
        $editid = $request->editid;
        $get_workoutPlans = workoutPlans::where("id",$editid)->first();
        
        $get_workoutPlans_data = array();
        $get_workoutPlans_data['name']= (isset($request->name)? $request->name : $get_workoutPlans->name);
        $get_workoutPlans_data['category']= (isset($request->category )? $request->category  : $get_workoutPlans->category);
        $get_workoutPlans_data['description']= (isset($request->description)? $request->description : $get_workoutPlans->description);
        $get_workoutPlans_data['type']= (isset($request->type)? $request->type : $get_workoutPlans->type);
        $get_workoutPlans_data['level']= (isset($request->level)? $request->level : $get_workoutPlans->level);

         $get_workoutPlans_data['frequency']= (isset($request->frequency)? $request->frequency : $get_workoutPlans->frequency);
          $get_workoutPlans_data['calories_burn']= (isset($request->calories_burn)? $request->calories_burn : $get_workoutPlans->calories_burn);

        $old_upload_video = $request->old_upload_video;
        // $workoutPlans->name =  $request->name;
        // $workoutPlans->category =  $request->category_id;
        // $workoutPlans->description =  $request->description;
        
        // $workoutPlans->type =  $request->type;
         
           
           $fileimage="";
           $image_url='';
        
           if($request->hasfile('upload_video'))
          {
            $file_image=$request->file('upload_video');
            $fileimage=$file_image->getClientOriginalName();
            $destination=public_path("video");
            $file_image->move($destination,$fileimage);
            $image_url=url('public/video').'/'.$fileimage;
            $get_workoutPlans_data['upload_video'] =$image_url;
          }
       
        $workoutPlans->where("id",$editid)->update($get_workoutPlans_data);
     
      //  $workoutPlans->save();

        // get data of excercise details
        $getDetails=explode('#',$request->workout);
       
        $wokout=array();
        foreach($getDetails as $key=>$value){
            $str=trim($value,",");
            if($str!=""){
                array_push($wokout, explode(",",$str));
            }
            
        }
       
        $collection=collect($wokout);
      // if($wokout[0][6]!="null"){
      //   echo var_dump($wokout[0][6]);
      //   dd($wokout);
      // }else{
      //   dd($wokout[0][6]);
      // }

        $ex=array_column($wokout,2);
        $ids = array_column($wokout,1);
        
        $excercise_name=array_unique($ex);
        $e_id = array_unique($ids);

        foreach($e_id as $key=>$value){
            ExcerciseName::where('id',$value)->delete();
            ExcerciseDetails::where('exercise_name_id',$value)->delete();

        }
        $nameIds=array();
        foreach($excercise_name as $val){
                $E_Name = new ExcerciseName();
                $E_Name->workout_plans_id=$editid;
                $E_Name->exercise_name = $val;
                $E_Name->save();
                // $nameIds[$value]=$E_Name->id;            
                $filtered = $collection->filter(function ($value, $key) use($val) {
                    if($value[2]==$val){
                        return true;
                    }
                });
            
               foreach($filtered as $key=>$value){
                $file='test';
                
                if($value[6]=="null"){
                    $file=$value[4];
                 }else{
                     $image_base64 = base64_decode($value[7]);
                    //$file = uniqid() .'.mp4';
                     $file = uniqid() .'.mp4';
                     $url=public_path("video").'/'.$file;
                    //$url=url('public/video').'/'.$file;
                     file_put_contents($url, $image_base64);
                 }
                $Day_name = new ExcerciseDetails();
                $Day_name->exercise_name=$value[5];
                $Day_name->exercise_video=$file;
                $Day_name->exercise_name_id=$E_Name->id;
                $Day_name->save();
                            
               }
        }
        
        
     
        if($editid){
            $result=array('status'=>true,'message'=> 'workout update Successfully.');
        }
        else{
            $result=array('status'=>false,'message'=> 'Data Insert Not Successfully.');
        }
        echo json_encode($result);
    }     
  
    
    public function  delete(Request $request,$id){ 
      $workoutPlans = new workoutPlans();
        $workoutPlans->where("id",$id)->delete();
        return redirect('/workout_plans');
    }

    public function deleteAll(Request $request){
        $ids = $request->ids;
      //  dd($request->ids);
        $workoutPlans = new workoutPlans();
        $workoutPlans->whereIn("id",explode(",",$ids))->delete();
        return response()->json(['success'=>"workoutplans Deleted successfully."]);
    }

    public function edit(Request $request,$id) {
        $id = $request->id;
        $exercise_details =array();
        $workoutPlans = workoutPlans::find($id);
        $no_of_days = ExcerciseName::where("workout_plans_id",$id)->get();
        $workoutPlans ->no_of_days = (isset($no_of_days)? count($no_of_days) : '0' );
         $days=array();
        foreach($no_of_days as $key => $val)
        { 
            $arr=array();
            array_push($arr,$val->exercise_name);
            array_push($arr,$val->id);
            array_push($days,$arr);
            
    
          //  $exercise_details[$key]= ExcerciseDetails::where("exercise_name_id",$val->id)->get();
            $exercise_details[$key]=  ExcerciseDetails::join('no_of_days', 'no_of_days.id', '=', 'exercise_details.exercise_name_id')
            ->where("exercise_details.exercise_name_id",$val->id)
            ->get(['no_of_days.exercise_name as day','no_of_days.id as no_of_days_id','no_of_days.workout_plans_id','exercise_details.*']);
        }

//    foreach($exercise_details as $key =>$val)
//    {

//        foreach($exercise_details[$key] as $k =>$val)
//         {
//             echo "<pre>";

//             echo var_dump($val);
//         }
//    }
//    exit;
   //  dd($workoutPlans);

   if($workoutPlans){
            return view('Pages.workoutplans.edit_workout_plan_view',compact('workoutPlans','no_of_days','exercise_details','days'));
        }
     
    }
    public function workout_plans_active_desctive(Request $request)
    {
        
        $status=$request->status;
        $workout_plans_id=$request->workout_plans_id;
        $status_t = $status ? 0 : 1;
        workoutPlans::where('id',$workout_plans_id)->update(['status'=>$status_t]);
        return response()->json(['success'=>"Status Changed."]);

    }
   
}
