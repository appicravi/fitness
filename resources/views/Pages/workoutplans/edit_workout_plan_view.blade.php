@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->

<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">Edit Workout Plan</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Edit Workout Plan</li>
			</ol>
		</div>
	</div>
    <!-- ============================================================== -->
    <!-- Container fluid  -->
    <!-- ============================================================== -->
    <div class="container-fluid">
		
		<div class="col-12">
			<div class="card">
				<div class="border-bottom title-part-padding">
					<h4 class="card-title mb-0">Add New Workout Plan</h4>
				</div>
				<div class="card-body min_height">
					<form name="workout_plan_edit" id="workout_plan_edit" method="post" action="javascript:void(0)" enctype="multipart/form-data">
						@csrf
					    <div class="row">
							<div class="">
								<!-- Alert Append Box -->
							<div class="result"></div>
							</div>
							<div class="mb-3 col-md-6">
							<input type="hidden" id="id" name="id" value="{{$workoutPlans->id}}" required="true" class="form-control">
								<label for="Name" class="control-label"> Workout Plan Name:</label>
								<input type="text" id="name" name="name" value="{{$workoutPlans->name}}" required="true" class="form-control">
							</div>
						<div class="mb-3 col-md-6">
								<label for="Name" class="control-label"> Workout Plan Category:</label>
								<select selected class="form-control" require = "true" name ="category" id="category">
										<option value="">Select Category</option>
										<option value="Weight Lifting" @if($workoutPlans->category == "Weight Lifting") selected  @endif >Weight Lifting</option>
										<option value="Sports Training" @if($workoutPlans->category == "Sports Training") selected  @endif >Sports Training</option>
										<option value="HIIT Training" @if($workoutPlans->category == "HIIT Training") selected  @endif >HIIT Training</option>

										 <option value="Dynamic Training" @if($workoutPlans->category == "Dynamic Training") selected  @endif >Dynamic Training</option>

										 <option value="Body Weight" @if($workoutPlans->category == "Body Weight") selected  @endif >Body Weight</option>

										 <option value="Follow Along" @if($workoutPlans->category == "Follow Along") selected  @endif >Follow Along</option>

										 <option value="Strength Training" @if($workoutPlans->category == "Strength Training") selected  @endif >Strength Training</option>

										  <option value="Body Building"  @if($workoutPlans->category == "Body Building") selected  @endif >Body Building</option>

										  <option value="Functional Training" @if($workoutPlans->category == "Functional Training") selected  @endif >Functional Training</option>
                                                                
                                        	<option value="Prenatal Training" @if($workoutPlans->category == "Prenatal Training") selected  @endif >Prenatal Training</option>
    	
    	                                    <option value="Mobility Training" @if($workoutPlans->category == "Mobility Training") selected  @endif >Mobility Training</option>
        
                                            <option value="Hands-Free" @if($workoutPlans->category == "Hands-Free") selected  @endif >Hands-Free</option>
                                    </select>
							</div>
							<div class="mb-4 col-md-12">
								<label for="Name" class="control-label"> Description:</label>
									<textarea class="form-control" rows="5" cols="5" required="true" name="description" id="description" >{{$workoutPlans->description}}</textarea>
							</div>
                           
							
							<div class="mb-3 col-md-6">
								<label for="username" class="control-label">uplaod workout Introductory Video:</label>
								<input type="file" id="upload_video" name="upload_video"  class="form-control">
								@if($workoutPlans->upload_video)
								
								<!-- 	<video width="320" height="240" controls>
										<source src="{{$workoutPlans->upload_video}}" ></video> -->
								@endif
								<input type="hidden" id="old_upload_video" name="upload_video" value="{{$workoutPlans->upload_video}}"/>
								
							<label id="image_error" class="error"></label>
							</div>
							<div class="mb-3 col-md-6">
								<label for="level" class="control-label"> Workout Level:</label>
									<select class="form-control" name ="level" id="level"  required="true">
										<option value="beginner" @if($workoutPlans->level == "beginner") selected  @endif >Beginner</option>
										<option value="intermediate" @if($workoutPlans->level == "intermediate") selected  @endif >Intermediate</option>
										<option value="advance" @if($workoutPlans->level == "advance") selected  @endif >Advance</option>								
									</select>
							</div>

							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Type:</label>
								<select class="form-control" name ="type" id="type" required="true">
										<option value="Gym" @if($workoutPlans->level == "Gym") selected  @endif >Gym</option>
										<option value="home" @if($workoutPlans->level == "home") selected  @endif >Home</option>
									</select>
							</div>
							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Workout Frequency:</label>
								<input type="text" name="frequency" id="frequency" required="true" class="form-control" placeholder="Workout Frequency" value="{{$workoutPlans->frequency}}" />
							</div>
							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Calories Burn:</label>
								<input type="text" name="calories_burn" id="calories_burn" required="true" class="form-control" placeholder="Workout Frequency" value="{{$workoutPlans->calories_burn}}"/>
							</div>
								<div class="mb-3 col-md-12">
								<label for="level" class="control-label"> Number Of Day:</label>
								<span id="spnErrorlegaladdress" style="color:red"></span>
								<input type="text" name="number_of_days" id="number_of_days" value="{{$workoutPlans->no_of_days}}" required="true" class="form-control" placeholder="Number Of Days"/>
							</div>
						
							<div class="mb-3 col-md-12">
								<div class="number_of_day_list_append">
								</div>
								@if($exercise_details)
									@foreach($exercise_details as $key =>$value)
									{{session()->put('data','0')}}
									<div class="number_of_day_list box_number_of_day" data-id="{{$key+1}}">
									<div class="input-group">
									<input type="hidden" name ="no_of_days_id" id="no_of_days_id{{$key+1}}" value="{{$days[$key][1]}}"/>
									<input type="text" required name="workoutname" id="workoutname{{$key+1}}" class="form-control workout_name" placeholder="WorkOut Name Of Day {{$key+1}}" value="{{$days[$key][0]}}">
									<button type="button" id="add{{$key+1}}" data-count="{{sizeof($exercise_details[$key])}}" class="btn btn-primary add_more_excercise" data-id="{{$key+1}}" onclick="addE('{{$key+1}}')">Add Excercise</button>
										<button type="button" class="btn btn-success add_more_number">Add Workout Day Name</button>
									</div>
									<div class="excercise_append" data-id="{{$key+1}}" id="excercise_append{{$key+1}}">
									@foreach($exercise_details[$key] as $k =>$val)
										{{session()->put('data',$k)}}
										<div class="input-group mt-2 getdata{{$key+1}}" data-id="{{$k}}">
										<input type="hidden" name="databind" value="{{$key+1}}">
										<input type="hidden" id="exercise_details_id{{$key+1}}{{$k}}" name="exercise_details_id" value="{{$val['id']}}">
										<input type="text" name="excercise_name" id="excercise_name{{$key+1}}{{$k}}" class="form-control excercise_name" placeholder=" Name Of Excercise {{$k}}" value="{{$val['exercise_name']}}">
										<input type="file" accept="video/*" name="exercise_details_video" id="exercise_details_video{{$key+1}}{{$k}}" class="form-control ms-2 exercise_details_video">
										<input type="hidden" readonly name ="exercise_video_link" id="exercise_video_link{{$key+1}}{{$k}}" value="{{$val['exercise_video']}}"/>
										<button type="button" class="btn btn-danger remove_more_excercise ">-</button></div>
									
									@endforeach
									</div>
								</div>
								
								@endforeach
								@endif
							</div>
						</div>
						
							
						<a type="button" href="{{ url('workout_plans') }}" class="btn btn-dark fa-pull-left mt-3">Back</a>
						<input type="submit" id="submit_w1" value="save" class="btn btn-success btn_submit add_workout_submitbtn1 fa-pull-right mt-3">
					</form>
				
			</div>
		</div>
		
	</div>
    <!-- ============================================================== -->
    <!-- End Container fluid  -->
    <!-- ============================================================== -->

	
	<script>
		
	function addE(x){
			var add=x;
			var countt=$('#add'+x).data('count');
			var selector="#excercise_append"+x;
			$(selector).append('<div class="input-group mt-2 getdata'+x+'" data-id="'+countt+'"><input type="hidden" name ="databind" value="'+x+'"><input type="hidden" id="exercise_details_id'+x+countt+'"" name="exercise_details_id" value="null"><input type="text" name="excercise_name" id="excercise_name'+x+countt+'" class="form-control excercise_name" placeholder=" Name Of Excercise '+countt+'"><input type="file"  accept="video/*" name="exercise_details_video" id="exercise_details_video'+x+countt+'" class="form-control ms-2 exercise_details_video"  > <input type="hidden" readonly name ="exercise_video_link" id="exercise_video_link'+x+countt+'" value="null"/><button type="button" class="btn btn-danger remove_more_excercise ">-</button></div>');
			    countt=countt+1;
			    $('#add'+x).data('count',countt);
			$(".remove_more_excercise").on('click',function(){
				$(this).parent().remove();
			    countt=countt-1;
			});
		}
	$(document).ready(function(){
		var count=2;

		
		
		$(".add_more_number").click(function(){
			var k='<div class="number_of_day_list box_number_of_day" data-id="'+count+'"><div class="input-group"><input type="text" name="workoutname" id="workoutname'+count+'" class="form-control workout_name" placeholder="Workout Name Of Days '+count+'"><button id="add'+count+'" data-id="'+count+'" type="button" class="btn btn-primary add_more_excercise" data-count="0" onclick="addE('+count+')">Add Excercise</button><button type="button" class="btn btn-danger remove_more_number">-</button></div><div class="excercise_append" id="excercise_append'+count+'" data-id="'+count+'"></div></div>'
			$(".number_of_day_list_append").append(k);
			count=count+1;
			$(".remove_more_number").on('click',function(){
				$(this).parent().parent().remove();
				count=count-1;
				
			});
		});

		
		
	$("#number_of_days").keypress(function(e){
		$("#spnErrorlegaladdress").text("");
		
		var keyCode = e.keyCode || e.which;
	
 
 //Regex for Valid Characters i.e. Alphabets and Numbers.
  
  var regex = /^[0-9\s]*$/;

 //Validate TextBox value against the Regex.
 var isValid = regex.test(String.fromCharCode(keyCode));
 if (!isValid) {
	$("#spnErrorlegaladdress").css("display","block");
	 $("#spnErrorlegaladdress").text("allow only numeric");
 }

 return isValid;
	});
		
	});
	
	</script>
@stop