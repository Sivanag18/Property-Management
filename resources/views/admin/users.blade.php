@extends('admin.master')
@section('title','all_users')
@section('content')
    <section class="grid">

        <h1 class="heading">Users</h1>




        <form action="{{route('admin.user.search')}}" method="POST" class="search-form">
            @csrf
            <input type="text" name="search_box" placeholder="search Users..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
        <div class="box-container">


            @foreach($users as $user)
            <div class="box">

                <p>name : <span><?= $user->name; ?></p>
                <p>email : <span><?= $user->email; ?></p>
                <p>phone : <span><?= $user->phone; ?></p>
                <form action="{{route('admin.user.destroy',$user->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete user" onclick="return confirm('delete this user?');" name="delete" class="delete-btn">
                </form>
            </div>
            @endforeach
        </div>
    </section>

@endsection
