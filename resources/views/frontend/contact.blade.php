@extends('frontend.layout.master')
@section('title','Contact Us')
@section('contact')

<section class="contact">

   <div class="row">
      <div class="image">
         <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/contact-img.svg')}}" alt="">
      </div>
      <form action="{{route('contact.store')}}" method="post">
          @csrf
         <h3>get in touch</h3>
         <input type="text" name="name" required maxlength="50" placeholder="enter your name" class="box">
         <input type="email" name="email" required maxlength="50" placeholder="enter your email" class="box">
         <input type="number" name="phone" required maxlength="10" max="9999999999" min="0" placeholder="enter your number" class="box">
         <textarea name="message" placeholder="enter your message" required maxlength="1000" cols="30" rows="10" class="box"></textarea>
         <input type="submit" value="send message" name="send" class="btn">
      </form>
   </div>

</section>

@endsection








