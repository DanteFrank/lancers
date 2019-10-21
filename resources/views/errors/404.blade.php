@extends('layouts.app')

@section('title')
  Page Not Found
@stop

@section('styles')
<style>
    :root {
        --text-color: #262626;
        --border-color: #C4C4C4;
        --lancer-secondary-blue: #0ABAB5;
    }

    * {
        box-sizing: inherit;
        font-family: Ubuntu, sans-serif;
    }

    body,
    html {
        margin: 0;
        border: 0;
        padding: 0;
        box-sizing: border-box;
    }

    header {
        height: 98px;
        width: 100%;
        display: flex;
        align-items: center;
        padding: 0 64px;
    }

    @media only screen and (max-width: 566px) {
        header {
        padding: 0 32px;
        }
    }

    .form {
        max-width: 566px;
        padding: 32px;
        margin: auto;
        margin-top: 32px;

        border: 1px solid var(--border-color);
        border-radius: 6px;
    }

    @media only screen and (max-width: 566px) {
        .form {
        border: none;
        }
    }

    .form h4 {
        font-size: 2em;
        text-align: center;
        margin: 0 0 14px 0;
    }

    .form p {
        font-size: 1.15em;
        color: var(--text-color);
        margin: 0 0 24px 0;
    }

    form label {
        display: block;
        font-size: 1em;
        color: var(--text-color);
        margin-bottom: 8px;
    }

    
</style>
@endsection

@section('content')
<header>
    <a href="" class="navbar-brand"><img
    src="https://res.cloudinary.com/sgnolebagabriel/image/upload/v1570531368/Lancers_evgrmc.png"
    alt="logo"></a>
</header>
<div class="form">
    <h4>Oh Sorry, that page couldnt be found!!!</h4>
    <p>Pls click <a href="#">here</a> to goto homepage</p>
    
    
</div>
@endsection

