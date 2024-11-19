@extends('admin.master')
@section('title','Dashboard')
@section('content')

    <section class="dashboard">

        <h1 class="heading">dashboard</h1>

        <div class="box-container">


            <div class="box">

                <h3>{{$properties->count()}}</h3>
                <p>property posted</p>
                <a href="{{route('admin.properties')}}" class="btn">view listings</a>
            </div>

            <div class="box">

                <h3>{{$users->count()}}</h3>
                <p>total users</p>
                <a href="{{route('admin.users')}}" class="btn">view users</a>
            </div>

            <div class="box">

                <h3>{{$admins->count()}}</h3>
                <p>total admins</p>
                <a href="{{route('admin.admins')}}" class="btn">view admins</a>
            </div>

            <div class="box">

                <h3>{{$messages->count()}}</h3>
                <p>new messages</p>
                <a href="{{route('admin.messages')}}" class="btn">view messages</a>
            </div>

        </div>

    </section>


@endsection
