@extends('admin.master')
@section('title','register new admin')
@section('content')

    <section class="form-container">

        <form action="{{ route('admin.register') }}" method="POST">
            @csrf
            <h3>register new</h3>
            <input type="text" name="name" placeholder="enter username" maxlength="20" class="box" required>
            <!-- Email Address -->


            <input id="email"  placeholder="enter email" type="email" name="email" required maxlength="20" class="box" >


            <input type="password" name="password" placeholder="enter password" maxlength="20" class="box" required >

            <input type="submit" value="register now" name="submit" class="btn">
        </form>

    </section>

@endsection
