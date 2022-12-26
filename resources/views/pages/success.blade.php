@extends('layouts.success')

@section('title', 'Checkout Success')

@section('content')
    <main>
        <div class="section-success d-flex align-items-center">
            <div class="col text-center">
                <img src="{{ url('frontend/images/ic_mail.png') }}" alt="success">
                <h1>Yay! Success</h1>
                <p>
                    We've been sent you email for trip instuction
                    <br> please read it as well
                </p>
                <a href="{{ route('home') }}" class="btn btn-home-page mt-3 px-5">Home Page</a>
            </div>
        </div>
    </main>
@endsection
