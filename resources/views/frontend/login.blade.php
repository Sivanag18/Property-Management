@extends('frontend.layout.master')
@section('title','Login')
@section('login')

    <section class="form-container">

        <form action="{{route('login')}}" method="post">
            @csrf
            <h3>welcome back!</h3>
            <input type="email" name="email" required  placeholder="enter your email" class="box">
            <input type="password" name="pass" required  placeholder="enter your password" class="box">
            <p>don't have an account? <a href="{{route('register')}}">register new</a></p>
            <input type="submit" value="login now" name="submit" class="btn">
        </form>

    </section>

@endsection