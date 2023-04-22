@extends('layouts.auth')

@section('content')

<div class="row justify-content-start">
    <div class="col-lg-8">
        <h1 class="display-1 mb-4 animated slideInDown">We’ve expanded! Shorten URLs.
        </h1>
        <a href="{{ route('login') }}" class="btn btn-primary py-3 px-5 animated slideInDown">Shorten</a>
    </div>
</div>

@endsection