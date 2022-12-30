@extends('layouts.success')

@section('title', 'Checkout Unfinished')

@section('content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/images/ic_mail.png') }}" alt="success">
                <h1>Oops!</h1>
                <p>
                    Your transaction is unfinished.
                </p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">Home Page</a>
            </div>
        </div>
    </main>
@endsection
