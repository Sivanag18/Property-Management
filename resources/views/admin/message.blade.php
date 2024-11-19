@extends('admin.master')
@section('title','Messages')
@section('content')
    <section class="grid">

        <h1 class="heading">Messages</h1>




        <form action="{{route('admin.message.search')}}" method="POST" class="search-form">
            @csrf
            <input type="text" name="search_box" placeholder="search messages..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
        <div class="box-container">


            @foreach($messages as $message)
            <div class="box">

                <p>name : <span><?= $message->name; ?></p>
                <p>email : <span><?= $message->email; ?></p>
                <p>phone : <span><?= $message->phone; ?></p>
                <p>Message : <span><?= $message->message; ?></p>
                <form action="{{route('admin.message.destroy',$message->id)}}" method="POST">
                    @method('delete')
                    @csrf
                    <input type="submit" value="Delete Message" onclick="return confirm('delete this message?');" name="delete" class="delete-btn">
                </form>
            </div>
            @endforeach
        </div>
    </section>

@endsection
