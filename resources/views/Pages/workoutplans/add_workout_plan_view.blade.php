@extends('layouts.admin')
@section('content')
<!-- ============================================================== -->
<!-- Page wrapper  -->
<!-- ============================================================== -->
<div class="page-wrapper">
    <div class="row page-titles">
        <div class="col-md-5 col-12 align-self-center">
            <h4 class="text-themecolor mb-0">Add New Workout Plan</h4>
		</div>
        <div class="col-md-7 col-12 align-self-center d-none d-md-block">
            <ol class="breadcrumb mb-0 p-0 bg-transparent fa-pull-right">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item active">Add New Workout Plan</li>
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
					<form name="workout_plan_add" id="workout_plan_add" method="post" action="javascript:void(0)" enctype="multipart/form-data">
						@csrf
					    <div class="row">
							<div class="">
								<!-- Alert Append Box -->
							<div class="result"></div>
							</div>
							<div class="mb-3 col-md-6">
								<label for="Name" class="control-label"> Workout Plan Name:</label>
								<input type="text" id="name" name="name"  required="true" class="form-control">
							</div>
						<div class="mb-3 col-md-6">
								<label for="Name" class="control-label"> Workout Plan Category:</label>
									<select selected class="form-control" required="true" required="true" name ="category" id="category">
										<option value="">Select Category</option>
										<option value="Weight Lifting">Weight Lifting</option>
										<option value="Sports Training">Sports Training</option>
										<option value="HIIT Training">HIIT Training</option>
                                        <option value="Dynamic Training">Dynamic Training</option>
                                        <option value="Body Weight">Body Weight</option>
                                        <option value="Follow Along">Follow Along</option>
                                        <option value="Strength Training">Strength Training</option>
                                        <option value="Body Building">Body Building</option>
                                        <option value="Functional Training">Functional Training</option>
                                        <option value="Prenatal Training">Prenatal Training</option>
                                        <option value="Mobility Training">Mobility Training</option>
                                        <option value="Hands-Free">Hands-Free</option>
                                </select>
							</div>
							<div class="mb-4 col-md-12">
								<label for="Name" class="control-label"> Description:</label>
									<textarea class="form-control" rows="5" cols="5" required="true" name="description" id="description" ></textarea>
							</div>
                           
							
							<div class="mb-3 col-md-6">
								<label for="username" class="control-label">Uplaod Workout Introductory Video:</label>
								<input type="file" id="upload_video" name="upload_video" required="true" class="form-control">
							
							<label id="image_error" class="error"></label>
							</div>
							<div class="mb-3 col-md-6">
								<label for="level" class="control-label"> Workout Level:</label>
									<select class="form-control" name ="level" id="level" required="true" >
										<option value="beginner">Beginner</option>
										<option value="intermediate">Intermediate</option>
										<option value="advance">Advance</option>								
									</select>
							</div>

							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Type:</label>
									<select class="form-control" name ="type" id="type" required="true" >
										<option value="Gym">Gym</option>
										<option value="home">home</option>
									</select>
							</div>

							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Workout Frequency:</label>
								<input type="text" name="frequency" id="frequency" required="true" class="form-control" placeholder="Workout Frequency"/>
							</div>
							<div class="mb-3 col-md-4">
								<label for="level" class="control-label"> Calories Burn:</label>
								<input type="text" name="calories_burn" id="calories_burn" required="true" class="form-control" placeholder="Workout Frequency"/>
							</div>

							<div class="mb-3 col-md-12">
								<label for="level" class="control-label"> Number Of Day:</label>
								<span id="spnErrorlegaladdress" style="color:red"></span>
								<input type="text" name="number_of_days" id="number_of_days" value="" required="true" class="form-control" placeholder="Number Of Days"/>
							</div>
						
							<div class="mb-3 col-md-12">
								<div class="number_of_day_list_append">
								</div>
								<div class="number_of_day_list box_number_of_day" data-id="1">
									<div class="input-group">

										<input type="text" required name="workoutname" id="workoutname1" class="form-control workout_name" placeholder="WorkOut Name Of Day 1">
										<button type="button" id="add1" data-count="0" class="btn btn-primary add_more_excercise" data-id="1" onclick="addE('1')">Add Excercise</button>
										<button type="button" class="btn btn-success add_more_number">Add Workout Day Name</button>
									</div>
									<div class="excercise_append" data-id="1" id="excercise_append1">
									</div>
								</div>
								
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
			$(selector).append('<div class="input-group mt-2 getdata'+x+'" data-id="'+countt+'"><input type="hidden" name ="databind" value="'+x+'"><input type="text" name="excercise_name" id="excercise_name'+x+countt+'" class="form-control excercise_name" placeholder=" Name Of Excercise '+countt+'"><input type="file" accept="video/*" name="exercise_details_video" id="exercise_details_video'+x+countt+'" class="form-control ms-2 exercise_details_video"  ><button type="button" class="btn btn-danger remove_more_excercise ">-</button></div>');
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