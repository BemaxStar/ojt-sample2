@extends('templates.reg_form')

@section('regHeader')
	<div class="col-lg-12 black"> <div><img src="images/download.jpg" alt="logo template" class="img-rounded imgsize fltl"></div> <span><h3 class="whitec"> &emsp; BISU-MC OJT Site </h3></span> </div>
@stop

@section('regFormsContent')
	<div class="row">
		<div class="col-lg-4 gray hreg"> 
			<div> <h3>Registration Form <br> </h3> </div>
				<form action="{{ isset($user_info) ? route('update',['user_id' => $user_info->id]) : route('save') }}" method="POST">
					<input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
					<div class="form-group">
					    <label for="regName">Name</label>
					   <input type="text area" class="form-control" name="name" id="regName" placeholder="Enter Full Name Here" value="{{ isset($user_info) ? $user_info->name : '' }}">
					</div>

					<div class="form-group">
					    <label for="regUser">Username</label>
					   <input type="text area" class="form-control" name="user" id="regUser" placeholder="Enter Username Here" value="{{ isset($user_info) ? $user_info->user : '' }}">
					</div>

					<div class="form-group">
					    <label for="regPass">Password</label>
					   <input type="password" class="form-control" name="hashed_password" id="regPass" placeholder="Enter Password Here" value="{{ isset($user_info) ? $user_info->hashed_password : '' }}">
					</div>

					<div class="form-group">
					    <label for="regAdd">Address</label>
					   <input type="text area" class="form-control" name="address" id="regAdd" placeholder="Enter Address Here" value="{{ isset($user_info) ? $user_info->address : '' }}">
					</div>

					<div class="form-group">
					    <label for="regMail">E-mail</label>
					   <input type="email" class="form-control" name="e_mail" id="regMail" placeholder="ojt_registration@gmail.com" value="{{ isset($user_info) ? $user_info->e_mail : '' }}">
					</div>

					 <button type="submit" class="btn btn-default fltr" name="register">@if(isset($user_info)) Update @else Register @endif</button>
				</form>

				
		</div>

		<div class="col-lg-8 gray hreg">
			<h3> Registered List <br> <br> </h3>
			<table class="table table-bordered">
				<tr class="black">
					<th class="center"> Name </th>
					<th class="center"> Username </th>
					<th class="center"> Password </th>
					<th class="center"> Address </th>
					<th class="center"> E-mail </th>
					<th class="center"> Option </th>
				</tr>
				@if(isset($infos) && count($infos) > 0)
					@foreach($infos as $info)
						<tr class="black">
							<td class="center"> {{ $info->name }} </td>
							<td class="center"> {{ $info->user }} </td>
							<td class="center"> {{ "*********" }} </td>
							<td class="center"> {{ $info->address }} </td>
							<td class="center"> {{ $info->e_mail }} </td>
							<td class="center">
								<a href="{{ route('edit',['user_id' => $info->id]) }}">Edit</a>
								<a href="{{ route('delete',['user_id' => $info->id]) }}">Delete</a>
							</td>
						</tr>
					@endforeach
				@endif
			</table>			
		</div>
	</div>
@stop

@section('regFooter')
	<div class="row">
		<div id="footer">
			<p> <a class="hov" href="">Home</a> | <a class="hov1" href="">About Us</a> | <a class="hov2" href="">FAQ</a> </p>
		</div>
	</div>
@stop