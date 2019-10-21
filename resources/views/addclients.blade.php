@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Add clients</div>
                <div class="card-body">                   
                    <form method="POST" action="/invoices">
                        @csrf
                        <input type="text" name="estimate_id" value="11" style="display: none;">

                        <button type="submit" class="btn btn-primary btn-lg">Create Invoice</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
