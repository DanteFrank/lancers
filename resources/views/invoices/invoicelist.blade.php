@extends('layouts.auth')

@section('main-content')
						<div class="content">
						<!---------Body Content------------>
						<a href="/add/client" class="createInvoice">Create Invoice</a>
						<h3>INVOICE</h3>
						<p class="all">
							<label for="allInvoiceList"></label>
							<select name="invoiceList" class="allInvoiceList" id="invoiceList" style="border-radius: 5px;">
								<option value="1">All</option>
								<option value="2">NULL</option>
								<option value="3">NULL</option>
								<option value="4">NULL</option>
								<option value="5">NULL</option>
							</select>
						</p>
						@if(count($invoices) > 0)
							<table class="table">
								<tr align="left" class="thead">
									<th>Invoices</th>
									<th>Client</th>
									<th>Project</th>
									<th>Issued</th>
									<th>Status</th>
									<th>Amount</th>
								</tr>
									<?php $count = 1 ?>
									@foreach($invoices as $key => $invoice)
										<tr class="border single-invoice" style="cursor: pointer;" data-invoice="{{$invoice->invoice->id}}">
											<td>
												<p>{{$count++}}</p>
											</td>

											<td>
												<p>{{$invoice->client->name}}</p>
											</td>

											<td>
												<p>{{$invoice->title}}</p>
											</td>

											<td>
												<p>{{$invoice->invoice->issue_date == null ? dateSlash($invoice->invoice->created_at) : dateSlash($invoice->invoice->issue_date)}}</p>
											</td>

											<td>
												@if($invoice->invoice->status == 'paid')
													<p class="statuspaid">Paid</p>
												@else
													<p class="statussent">Unpaid</p>
												@endif
											</td>

											<td>
												<p>₦{{number_format((float)$invoice->invoice->amount, 2)}}</p>
											</td>
											{{--<td>
												<a href="">
													<i class="fa fa-ellipsis-v"></i>
												</a>
											</td> --}}
										</tr>
									@endforeach

							</table>
						@else
							<p class="text-center">No invoices to show</p>
						@endif
					</div>				
@endsection

@section('script')
	<script type="text/javascript">
		$(".single-invoice").click(function(e){
			window.location.href = "/invoices/" + e.currentTarget.dataset.invoice
		});
	</script>
@endsection

@push('styles')
	<style type="text/css">

	/*=========================Content Body Area ==================================*/
	.content {
		margin-top: 50px;
		padding: 10px;
	}

	.createInvoice {
		background: #0ABAB5;
		border: 1px solid #999999;
		box-sizing: border-box;
		font-size: 1.5em;
		font-weight: bold;
		font-family: 'Ubuntu', sans-serif;
		text-decoration: none;
		padding: 15px 15px;
		color: white;
		margin-left: 4%;
		border-radius: 5px;
	}

	h3 {
		font-family: 'Open Sans', sans-serif;
		font-weight: bold;
		font-size: 1.2em;
		margin-left: 4%;
		margin-top: 40px;
	}

	.all {
		margin-top: 30px;
		margin-bottom: 30px;
		margin-left: 4%;
	}

	.all select option {
		padding-top: 10px;
		font-size: 14px;
		line-height: 19px;
	}

	.allInvoiceList {
		width: 20%;
		padding: 10px;
		border: 1px solid #C4C4C4;
		font-size: 14px;
		line-height: 19px;
	}

	.table {
		width: 95%;
		margin-top: ;
		border-collapse: collapse;
		margin-left: 4%;
	}

	.thead {
		font-weight: bold;
		font-size: 1.1em;
		line-height: 25px;
	}

	tr.border {
		border: 1px solid #C4C4C4;
		padding: 5px;
	}

	tr td:first-child{
		padding-left: 15px;
	}
	tr td:last-child{
		padding-right: 15px;
	}

	tr td p{
		margin-bottom: 0;
	}

	.border td {
		padding: 15px 0px;
		font-size: 14px;
		line-height: 16px;
	}

	.statuspaid {
		width: 38%;
		padding: 5px 5px;
		border-radius: 4px;
		background-color: rgba(23, 150, 21, 0.1);
		color: #179615;
		font-weight: bold;
		text-align: center;
	}

	.statussent {
		width: 38%;
		padding: 5px 5px;
		background: rgba(0, 159, 255, 0.1);
		border-radius: 4px;
		color: #091429;
		font-weight: bold;
		text-align: center;
	}
	</style>
@endpush