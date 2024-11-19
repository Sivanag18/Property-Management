@extends('frontend.layout.master')
@section('title','About Us')
@section('about')

<section class="about">

   <div class="row">
      <div class="image">
         <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/about-img.svg')}}" alt="">
      </div>
      <div class="content">
         <h3>why choose us?</h3>
         <p>Property Managament simplifies the entire process of managing real estate properties, helping owners, managers, and tenants with easy access to all property-related tasks in one place. From property listings to maintenance requests, we ensure a seamless and efficient experience.</p>
         <a href="{{route('contact')}}" class="inline-btn">contact us</a>
      </div>
   </div>

</section>

@endsection
@section('steps')

<section class="steps">

   <h1 class="heading">3 simple steps</h1>

   <div class="box-container">

      <div class="box">
         <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/step-1.png')}}" alt="">
         <h3>search property</h3>
         
      </div>

      <div class="box">
         <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/step-2.png')}}" alt="">
         <h3>contact agents</h3>
      </div>

      <div class="box">
         <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/step-3.png')}}" alt="">
         <h3>enjoy property</h3>
      </div>

   </div>

</section>
<!-- steps section ends -->
@endsection












