@extends('layouts.settings_profile')

@section('main-content')
<div class="container-fluid">
		<div class="row mt-5 no-gutters">

				<!-- <h3 class="form_title">Profile Setting</h3> -->

				<div class="col-md-4 d-none d-md-block">
					<div class="container">
							<div class="side-nav">
									<div class="logo-con">
										<p class="logo text-center py-2">Lan<span>c</span>ers</p>
									</div>
									<div class="d-flex flex-column align-items-center">
									<div class="d-flex flex-column align-items-center">
								<div class="d-flex flex-column">
									<a href="/dashboard/profile/settings" class="nav-option active-nav py-3">Profile Settings</a>
									<a href="/dashboard/emails/settings" class="nav-option">Email Notifications</a>
									<a href="/pricing" class="nav-option py-3">Subscription</a>
								</div>
							</div>
                                        @if(null !== session('ImageUploadMessage'))
                                                {{session('ImageUploadMessage')}}
                                            @endif
                                            @if(null !== $data[3])

                                                <img id="image_selecter" src="{{ asset($data[3]['profile_picture']) }}" style="width: 100px; height: 100px; border-radius: 10%; pointer: finger;" alt="Profile Image">

                                            @endif
                                            @if(null == $data[3])
                                            <img id="image_selecter" src="{{ asset('images/user-default.jpg') }}" style="width: 100px; height: 100px; border-radius: 10%; pointer: finger;" alt="Profile Image">

                                            @endif


                                            <form action="{{ route('Profile-Image') }}"" method="POST" enctype="multipart/form-data">
                                            @csrf


                                            <input id="picture" name="profileimage" type="file" style="visibility: hidden;"  onchange="image1(this);" />
                                            </br>
                                            <div class="d-flex justify-content-center mb-3">
					                       	<button style="display: none;" id="picture_upload" type="submit" class="green-btn">Upload Image</button>
				                        	</div>
                                            </form>
									</div>

								</div>


					</div>
					</div>

			 <div class="col-sm-12 col-md-8  pl-2 pr-2 pb-4">
                        <p><strong>Personal Profile</strong></p>

                    @if(session('editStatus'))

                    <div class="alert alert-success" role="alert">
                      {{ session('editStatus') }}
                     </div>

                @endif

                    @if(session('editErrors'))


                         @if(sizeof(session('editErrors')) > 1)
                            @foreach(session('editErrors') as $errors)

                                <p style="color:red;">{{$errors}}<p/>

                            @endforeach
                        @endif

                        @if(sizeof(session('editErrors'))  <= 1)

                                <p style="color:red;">{{session('editErrors')[0]}}<p/>
                        @endif

                     @endif


                     @php
                     $name = explode(" ",Auth::user()->name);
                     $first_name = $name[0];
                     $last_name = $name[1];
                     $email = Auth::user()->email;
                     if($data[3] != null)
                     {

                     $company_name = ($data[3]['company_name'] == null ) ? null : $data[3]['company_name'] ;
                     $company_email = ($data[3]['company_email'] == null ) ? null : $data[3]['company_email'] ;
                     $company_address = ($data[3]['company_address'] == null ) ? null : $data[3]['company_address'] ;
                     $phone = ($data[3]['phone'] == null ) ? null : $data[3]['phone'] ;
                     $street = ($data[3]['street'] == null ) ? null : $data[3]['street'] ;

                     $street_number = ($data[3]['street_number'] == null ) ? null : $data[3]['street_number'] ;

                     $country_id = ($data[3]['country_id'] == null ) ? null : $data[3]['country_id'] ;
                     $city = ($data[3]['city'] == null ) ? null : $data[3]['city'] ;
                     $zipcode = ($data[3]['zipcode'] == null ) ? null : $data[3]['zipcode'] ;

                     $state_id = ($data[3]['state_id'] == null ) ? null : $data[3]['state_id'] ;
                     $timezone = ($data[3]['timezone'] == null ) ? null : $data[3]['city'] ;
                     $contacts = ($data[3]['contacts'] == null ) ? null : $data[3]['contacts'] ;
                     $title =  ($data[3]['title'] == null ) ? null : $data[3]['title'] ;


                     }
                     @endphp
					<div class="container profile_form">
							<form id="profileForm"  method="POST" action="{{ route('edit-profile') }}">
                            @csrf


									<label for="" class="msg"></label>
							<div class="form-group">
									<div class="names">
											<div class="firstname">
													<label for="firstName">First Name</label>
													<input id="firstName" class="form-control" type="text" name="first_name" value="{{$first_name}}" placeholder="First Name">
											</div>
											<div class="lastname">
													<label for="lastName">Last Name</label>
													<input id="lastName" class="form-control" type="text" name="last_name" placeholder="Last Name" value="{{$last_name}}">
											</div>
									</div>
											<!-- <span id="name_message"></span> -->
							</div>
							<div class="form-group">
									<div class="title_text">
													<div class="title">
															<label for="title">Title</label>
															<input id="mytitle" class="form-control" type="text" name="title" placeholder="Your Job Title" value="{{$title}}">
													</div>
													<div class="email">
															<label for="my-email">User Email</label>
															<input id="email" class="form-control" type="text" name="email" placeholder="Your Email Address" value="{{$email}}">
													</div>
									</div>
									<!-- <span id="emessage"></span> -->
							</div>
							<div class="caret">
									<h6> <i class="fas fa-angle-down show-angle-down"></i><i class="fas fa-angle-up show-angle-up"></i> &nbsp Change Password</h6>
							</div>
							<div class="form-group show-password-section">

									<p>
									<div>
											<label for="my-password">Password</label>
											<input id="password" class="form-control" type="password" name="password_old" placeholder="Current password">
									</div>
									</p>
									<div class="newpassword">
													<div class="newPass">
															<label for="new_password">New Password</label>
															<input id="npassword" class="form-control" type="password" name="password" placeholder="New password">
													</div>
													<div class="conPass">
															<label for="confirm_password">Confirm Password</label>
															<input id="cpassword" class="form-control" type="password" name="password_confirmation" placeholder="Confirm password">
													</div>
									</div>

                                      </br>
                                      </br>
                                      </br>
                                      </br>
                                            <p style="text-align: center;">
                                            	<button  type="submit" class="green-btn">Update</button>
                                            </p>

							</div>


					</form>

					</div>

				</div>
		</div>

		<div class="row align-items-center mt-5 no-gutters">

					 <div class="col-sm-8 offset-md-4 company-details-form mt-5 pl-5 pr-5 pt-4 pb-4">
                     <p><strong>Company Information</strong></p>
							<div class="container">

                            <form id="company-details"  method="POST" action="{{ route('edit-company') }}">
                            @csrf
											<label for="" class="msg"></label>
									<p>
									<div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="coyName">Company Name</label>
															<input id="coyName" class="form-control" type="text" name="company_name" placeholder="Company Name" value="{{$company_name}}">
													</div>
													<div class="coy-details-email">
															<label for="coyEmail">Company Email</label>
															<input id="coyEmail" class="form-control" type="text" name="company_email" placeholder="Company Email" value="{{$company_email}}">
													</div>
											</div>
													<!-- <span id="name_message"></span> -->
									</div>
							         </p>
									<!-- <p>
											<div class="caretCompany">
													<h6> <i class="fas fa-angle-down show-angle-down"></i><i class="fas fa-angle-up show-angle-up"></i> &nbsp Address Setting</h6>
											</div>
									</p> -->

									<div class="form-group">
											<p>
											<div>
													<label for="coyaddress">Company Address</label>
													<input id="coyaddress" class="form-control" type="text" name="company_address" placeholder="Company Address" value="{{$company_address}}">
											</div>
									</p>

                                    <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="firstName">Street Name</label>
															<input id="coyName" class="form-control" type="text" name="street" placeholder="Street" value="{{$street}}">
													</div>
													<div class="coy-details-email">
															<label for="lastName">Street Number</label>
															<input id="coyEmail" class="form-control" type="text" name="street_number" placeholder="Street Number" value="{{$street_number}}">
													</div>
											</div>
													<!-- <span id="name_message"></span> -->
									</div>

                                      <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="city">City</label>
															<input id="city" class="form-control" type="text" name="city" placeholder="city" value="{{$city}}">
													</div>


													<div class="coy-details-email">
															<label for="Zipcode">Zipcode</label>
															<input id="Zipcode" class="form-control" type="text" name="zipcode" placeholder="zipcode" value="{{$zipcode}}">
													</div>

											</div>
													<!-- <span id="name_message"></span> -->
									</div>


                                        <div class="form-group">
											<div class="coy-details">
													<div class="coy-details-name">
															<label for="phone">Phone Number</label>
															<input id="phone" class="form-control" type="text" name="phone" placeholder="Phone Number" value="{{$phone}}">
													</div>


													<div class="coy-details-email">
															<label for="Contacts">Contacts</label>
															<input id="Contacts" class="form-control" type="text" name="contacts" value="{{$contacts}}" placeholder="Contacts">
													</div>

											</div>
													<!-- <span id="name_message"></span> -->
									</div>


											<div class="coy-contact">
															<div class="coy-contact-country">
																	<label for="country_id">Country</label>
                                                                    <select id="country_id" name="country_id" class="form-control">
                                                                    <option value="">Select a country</option>
                                                                    @if($data != null)

                                                                            @foreach($data[0] as $dataCountry)
                                                                            <option value={{ $dataCountry['id'] }}>{{ $dataCountry['name'] }}</option>
                                                                            @endforeach

                                                                        @endif
                                                                    </select>

															</div>
															<div class="coy-contact-state">
																	<label for="state_id">State</label>
																	<select id="state_id" name="state_id" class="form-control">
                                                                    <option value="">Select State</option>
                                                                    @if($data != null)

                                                                    @foreach($data[2] as $dataState)
                                                                    <option value={{ $dataState['id'] }}>{{ $dataState['name'] }}</option>
                                                                    @endforeach

                                                                    @endif
                                                                    </select>


															</div>
											</div>

									</div>

											<div class="form-group">
															<div class="coy-details-2">
																			<div class="coy-currency">
																					<label for="currency_id">Currency</label>

                                                                                    <select class="form-control" id="currency_id" name="currency_id">
                                                                                    <option value="">Select Currency</option>

                                                                                        @if($data != null)

                                                                                        @foreach($data[1] as $dataCurrency)
                                                                                        <option value={{ $dataCurrency['id'] }} >{{ $dataCurrency['symbol']}} -> {{ $dataCurrency['name'] }}</option>
                                                                                         @endforeach


                                                                                    @endif
                                                                                    </select>
																			</div>
																			<div class="coy-time-zone">
																					<label for="time-zone">Time Zone</label>
																					<select class="form-control" id="country" name="timezone">
                                                                                    <option value="">Select a Timezone</option>
                                                                                    <option value="">Time Zone</option>
                                                                                    <option value="GMT">GMT</option>
                                                                                    <option value="GMT +1">GMT +1</option>
                                                                                    <option value="GMT +2">GMT +2</option>
                                                                                    <option value="GMT +3">GMT +3</option>
																					</select>
																			</div>
															</div>
															<!-- <span id="emessage"></span> -->
											<!-- <span id="pmessage"></span> -->
									</div>

									<div class="d-flex justify-content-center">
											<button type="submit" class="green-btn">Update</button>
										</div>
							</form>
							</div>
						</div>
				</div>
            </div>
        @endsection
