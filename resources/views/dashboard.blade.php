@extends('layouts.auth')

@section('main-content')
<div class="container">
    <button class='create-invoice' @click.prevent="$router.push('/estimate/create')">Create Estimate</button>
    <h3>Estimates helps you place value to your work and time!</h3>
    <p>Create an estimate and easily convert it to an invoice and send to your client.</p>
</div> 
@endsection