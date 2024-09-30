@extends('Layouts.Layout1')

@section('Content')
    <div class="login-wrapper" style="background-image: url('{{ asset('Images/Car.jpg') }}')"> 
        <div class="wrapper-inner">
            <div class="login-inner"> 
                <p class="company-logo">
                    @if ($_SERVER['HTTP_HOST'] == 'fleet.seylekschools.com.ng')
                    <img src="{{ asset('Images/seylekschools-logo.png') }}" alt="">
                    @elseif (($_SERVER['HTTP_HOST'] == 'fleet.depasamarine.com') || ($_SERVER['HTTP_HOST'] == 'www.fleet.depasamarine.com') || ($_SERVER['HTTP_HOST'] == '192.168.20.100'))
                    <img src="{{ asset('Images/depasa-logo.png') }}" alt="">
                    @endif
                </p>
                <form action="/Login" method="POST">
                @csrf
                 
                <div class="error">
                    @if ($errors->any()) 
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span>
                        @endforeach
                    @endif
                    {{ request()->session()->get('Error') }}
                </div>

                <div class="inner-x">
                    <div class="login-inputs">
                        <label for="Email">Email</label>
                        <br>
                        <input value="{{ old('Email') }}" name="Email" type="text" placeholder="Enter Your Email..">
                    </div>
                    <div class="login-inputs">
                        <label for="Password">Password</label>
                        <br>    
                        <input value="{{ old('Password') }}" name="Password" type="password" placeholder="Your Password Here..">
                    </div>
                    <p>
                        <button>Sign In</button>
                    </p>
                </div>
            </form>
            </div> 
        </div>
    </div>
@endsection