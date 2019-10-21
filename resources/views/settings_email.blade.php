@extends('layouts.settings_email')

@section('main-content')
	<main class="py-4">
			<div class="container-fluid">
				<div class="row">
					<div class="col-sm-12 col-md-8 offset-md-4">
						<h3 class="head-text">EMAIL SETTING</h3></div>
				</div>
				<div class="row">
					<div class="col-md-4 d-none d-md-block">
						<div class="side-nav">
							<div class="logo-con">
								<p class="logo text-center py-2">Lan<span>c</span>ers</p>
							</div>
							<div class="d-flex flex-column align-items-center">
								<div class="d-flex flex-column">
									<a href="settings-profile.html" class="nav-option py-3">Profile Settings</a>
									<a href="settings-email.html" class="nav-option active-nav py-3"
										>Email Notifications</a>
										<a href="/users/notifications" class="nav-option py-3">Subscription</a>
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-12 col-md-8">
						<div class="email-con container p-4">
							<h3 class="head-text">Default Auto Message</h3>
                            @if(($status == "success") && ($data != null ))

                                @php
                                $invoiceMessage = $data['auto_invoice_message'];
                                $proposalMessage = $data['auto_approval_message'];
                                $agreementMessage = $data['auto_agreement_message'];

                                @endphp
                        @endif

                        @if(($status == "failure") && ($data == null ))
                            @php
                            $invoiceMessage = '';
                            $proposalMessage = '';
                            $agreementMessage = '';

                            @endphp
                     @endif

                     @if(session('editErrors'))
                        <div class="alert alert-fail" role="alert">
                            <h5><strong>Error:</strong></h5>
                            @foreach(session('editErrors') as $error)
                                        <i style="color: red;">{{ $error }} </i></br>
                            @endforeach
                            </div>
                    @endif

                    @if(session('editSuccess') != null)
                    <div class="alert alert-fail" role="alert">
                        <h5><strong>Success:</strong></h5>

                        <i style="color: green;">{{ session('editSuccess') }} </i></br>

                        </div>
                    @endif

                    @if(session('editFailure') != null)
                    <div class="alert alert-fail" role="alert">
                        <h5><strong>Error:</strong></h5>

                        <i style="color: red;">{{ session('editFailure') }} </i></br>

                        </div>
                    @endif
                     <form method="POST" action="{{ route('SET-EMAIL') }}">
                        @csrf
                        @method('PUT')
							<div class="py-3">
								<h6 class="small-head-text">Auto Responds Invoice Message</h6>
								<textarea name="invoice" id="" cols="30" rows="3" class="message-con p-4">
                                {{ $invoiceMessage }}	</textarea>
							</div>
							<div class="py-3">
								<h6 class="small-head-text">Auto Responds Proposal Messsage</h6>
								<textarea name="proposal" id="" cols="30" rows="3" class="message-con p-4">
                                {{ $proposalMessage }}	</textarea>
							</div>
							<div class="py-3">
								<h6 class="small-head-text">Auto Responds Agreement Messsage</h6>
								<textarea name="agreement" id="" cols="30" rows="3" class="message-con p-4">
                                {{ $agreementMessage }}	</textarea>
							</div>
							<div class="d-flex justify-content-center">
								<button class="green-btn">Update</button>
							</div>
                            </form>
						</div>
					</div>
				</div>
				<!--<div class="row mt-5">
					<div class="col-sm-12 col-md-8 offset-md-4">
						<div class="email-con container p-4 cntr	">
							<h6 class="small-head-text"> Auto Responds Invoice Message</h6>
							<div class="radio mt-3">
									<input id="radio-1" name="radio" type="radio" checked>
									<label for="radio-1" class="radio-label">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</label>
								</div>

								<div class="radio">
									<input id="radio-2" name="radio" type="radio">
									<label  for="radio-2" class="radio-label">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</label>
								</div>
							<div class="d-flex justify-content-center">
									<button class="green-btn">Update</button>
								</div>
						</div>
					</div>
				</div> -->
			</div>
		</main>
        @endsection
