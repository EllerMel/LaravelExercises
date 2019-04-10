@extends('layout')

@section('content')
    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
            <div class="top-right links">
                @auth
                    <a href="{{ url('/home') }}">Home</a>
                @else
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif

        <div class="content">
            <div class="title m-b-md">
                Laravel MAE
            </div>

            <div class="links">
                <a href="/">Home</a>
                <a href="/clock">Clock</a>
                <a href="/countdown">Countdown</a>
                <a href="/TicTacToe">TicTacToe</a> 
                <a href="/calculator">Calculator</a>                
                <a href="/mindreader">MindReader</a>                
            </div>
        </div>
    </div>
</div>
@endsection