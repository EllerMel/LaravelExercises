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
            <br>
            <br>
            <div class="links m-t-md">
                <a href="https://ellermel.github.io/" Target="_blank"> My Website</a>
                <a href="https://github.com/EllerMel" Target="_blank">GitHub</a>
                <a href="https://www.linkedin.com/in/melissaeller248/" Target="_blank">LinkedIn</a>                
            </div>

            <br>

            <div class="title m-b-md">
                MAE 
                <br>
                Laravel Portfolio
            </div>

            <br>

            <div class="links">
                <a href="/clock">Clock</a>
                <a href="/countdown">Countdown</a>
                <a href="/TicTacToe">TicTacToe</a>
                <a href="/calculator">Calculator</a>
                <br>     
                <a href="/mindreader">MindReader</a>
                <a href="/weather">Weather</a>
                <a href="/todoList">ToDo</a>
                <a href="/restaurant">Restaurant</a>
            </div>
        </div>
    </div>
</div>
@endsection
