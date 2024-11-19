@extends('frontend.layout.master')
@section('title', 'View Property')
@section('style')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
@endsection

@section('property')

    <section class="view-property">
        
        <h1 class="heading">Property Details</h1>
        
        @if($property->count() > 0)
        
        <div class="details">
            
            <div class="swiper images-container">
                <div class="swiper-wrapper">
                    <?php $path="attachments/$property->user_id/$property->id/$property->image_01"?>
                    <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="" class="swiper-slide">
                    
                    @if(!empty($property->image_02))
                        <?php $path="attachments/$property->user_id/$property->id/$property->image_02"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="" class="swiper-slide">
                    @endif
                    
                    @if(!empty($property->image_03))
                        <?php $path="attachments/$property->user_id/$property->id/$property->image_03"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="" class="swiper-slide">
                    @endif
                    
                    @if(!empty($property->image_04))
                        <?php $path="attachments/$property->user_id/$property->id/$property->image_04"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="" class="swiper-slide">
                    @endif
                    
                    @if(!empty($property->image_05))
                        <?php $path="attachments/$property->user_id/$property->id/$property->image_05"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="" class="swiper-slide">
                    @endif
                </div>
                <div class="swiper-pagination"></div>
            </div>

            <h3 class="name">{{$property->property_name}}</h3>
            <p class="location"><i class="fas fa-map-marker-alt"></i><span>{{$property->address}}</span></p>
            <div class="info">
                <p><i class="fas fa-indian-rupee-sign"></i><span>{{$property->price}}</span></p>
                <p><i class="fas fa-user"></i><span>{{$property->user_name}}</span></p>
                <p><i class="fas fa-phone"></i><a href="tel:{{$user->phone}}">{{$user->phone}}</a></p>
                <p><i class="fas fa-building"></i><span>{{$property->type}}</span></p>
                <p><i class="fas fa-house"></i><span>{{$property->offer}}</span></p>
                <p><i class="fas fa-calendar"></i><span>{{$property->date}}</span></p>
            </div>

            <div class="info">
                <p><i class="fas fa-bed"></i><span>{{$property->bedroom}} Bedroom(s)</span></p>
                <p><i class="fas fa-bath"></i><span>{{$property->bathroom}} Bathroom(s)</span></p>
                <p><i class="fas fa-balcony"></i><span>{{$property->balcony}} Balcony(ies)</span></p>
                <p><i class="fas fa-user-tie"></i><span>{{$property->contact_name}}</span></p>
                <p><i class="fas fa-phone"></i><a href="tel:{{$property->contact_number}}">{{$property->contact_number}}</a></p>
            </div>

            <h3 class="title">Description</h3>
            <p class="description">{{ $property->description }}</p>

        </div>

        @else
            <p class="empty">Property not found! <a href="{{route('property')}}" style="margin-top:1.5rem;" class="btn">Add New</a></p>
        @endif

    </section>

@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
<script>
    var swiper = new Swiper(".images-container", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        loop:true,
        coverflowEffect: {
            rotate: 0,
            stretch: 0,
            depth: 200,
            modifier: 3,
            slideShadows: true,
        },
        pagination: {
            el: ".swiper-pagination",
        },
    });
</script>
@endsection
