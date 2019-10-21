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
								
								<a href="/dashboard/profile/settings" class="nav-option py-3">Profile Settings</a>
								<a href="/dashboard/emails/settings" class="nav-option">Email Notifications</a>
								<a href="/users/subscriptions" class="nav-option py-3 active-nav">Subscription</a>
							</div>
						</div>
						<img id="image_selecter" src="" style="width: 100px; height: 100px; border-radius: 10%; pointer: finger;" alt="Profile Image">
						<img id="image_selecter" src="" style="width: 100px; height: 100px; border-radius: 10%; pointer: finger;" alt="Profile Image">
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-8">
			<div class="container">
				<div class="card">
					<div class="card-header">
						Subscriptions
					</div>
					<div class="card-body">
						@if(session('success'))
							<div class="alert alert-success">{{session('success')}}</div>
						@elseif(session('error'))
							<div class="alert alert-danger">{{session('error')}}</div>
						@endif
						<div class="card p-3">
							You are currently subscribed to {{ucwords(str_replace("_", " ", $plan->name))}} plan for {{$plan['months']}} months, it'll expire {{prettyDate($plan['end'])}}
						</div>
						<div class="plans mt-3">
							<div class="row">
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-center">
											<h5 class="card-title mr-3">Starter</h5>
											<h2 class="text-center">$0.00<small><small><small>/mo</small></small></small></h2>
										</div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Three active projects</li>
											<li class="list-group-item">Two collaborators per project</li>
											<li class="list-group-item">One of each generatable documents</li>
										</ul>
										<div class="card-body text-center">
											@if($plan->id == 1)
												<span class="text-primary">Currently subscribed to this plan</span>
											@elseif($plan->id > 1)
												<span class="text-primary">Cannot downgrade to this plan</span>
											@else
												<a href="/payment/subscription/starter" class="btn btn-primary btn-block float-right">Subscribe</a>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-center">
											<h5 class="card-title">Pro</h5>
											<h2 class="text-center">$24.99<small><small><small>/mo</small></small></small></h2>
											<p class="card-text">All of starter features and</p>
										</div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Unlimited active projects</li>
											<li class="list-group-item">Five collaborators per project</li>
											<li class="list-group-item">Three of each generatable document</li>
										</ul>
										<div class="card-body text-center">
											@if($plan->id == 2)
												<span class="text-primary">Currently subscribed to this plan</span>
												<a href="/payment/subscription/pro" class="btn btn-primary btn-block float-right">Add months</a>
											@elseif($plan->id > 2)
												<span class="text-primary">Cannot downgrade to this plan</span>
											@elseif($plan->id < 2)
												<a href="/payment/subscription/pro" class="btn btn-primary btn-block float-right">Upgrade to this plan</a>
											@else
												<a href="/payment/subscription/pro" class="btn btn-primary btn-block float-right">Subscribe</a>
											@endif
										</div>
									</div>
								</div>
								<div class="col-md-4">
									<div class="card">
										<div class="card-body text-center">
											<h5 class="card-title">Pro plus</h5>
											<h2 class="text-center">$79.99<small><small><small>/mo</small></small></small></h2>
											<p class="card-text">All of pro features and</p>
										</div>
										<ul class="list-group list-group-flush">
											<li class="list-group-item">Unlimited collaborators</li>
											<li class="list-group-item">Unlimited generatable doucments</li>
											<li class="list-group-item">Dedicated support</li>
											<li class="list-group-item">Beta access to test new features</li>
										</ul>
										<div class="card-body text-center">
											@if($plan->id == 3)
												<span class="text-primary">Currently subscribed to this plan</span>
												<a href="/payment/subscription/pro_plus" class="btn btn-primary btn-block float-right">Add months</a>
											@elseif($plan->id < 3)
												<a href="/payment/subscription/pro_plus" class="btn btn-primary btn-block float-right">Upgrade to this plan</a>
											@else
												<a href="/payment/subscription/pro_plus" class="btn btn-primary btn-block float-right">Subscribe</a>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection