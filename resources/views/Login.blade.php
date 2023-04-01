@extends('Layouts.Layout1')

@section('Content')
    <div class="login-wrapper" style="background-image: url('{{ asset('Images/Car.jpg') }}')"> 
        <div class="wrapper-inner">
            <div class="login-inner"> 
                <p class="company-logo">
                    <img src="{{ asset('Images/depasa-logo.png') }}" alt="">
                </p>
                <div class="inner-x">
                    <div class="login-inputs">
                        <label for="Email">Email</label>
                        <br>
                        <input type="text" placeholder="Enter Your Email..">
                    </div>
                    <div class="login-inputs">
                        <label for="Password">Password</label>
                        <br>    
                        <input type="password" placeholder="Your Password Here..">
                    </div>
                    <p>
                        <button>Sign In</button>
                    </p>
                </div>
            </div> 
        </div>
    </div>
@endsection