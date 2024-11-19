@extends('admin.master')
@section('title','listings')
@section('content')
    <section class="listings">

        <h1 class="heading">all listings</h1>

        <form action="{{route('admin.property.search')}}" method="POST" class="search-form">
            @csrf
            <input type="text" name="search_box" placeholder="search properties..." maxlength="100" required>
            <button type="submit" class="fas fa-search" name="search_btn"></button>
        </form>
        <div class="box-container">


            @foreach ($properties as $property)


                @if(!empty($property->image_02))
                        <?php $image_coutn_02 = 1?>
                @else
                        <?php $image_coutn_02 = 0?>
                @endif
                @if(!empty($property->image_03))
                        <?php $image_coutn_03 = 1?>
                @else
                        <?php  $image_coutn_03 = 0?>
                @endif
                @if(!empty($property->image_04))
                        <?php $image_coutn_04 = 1?>
                @else
                        <?php $image_coutn_04 = 0?>
                @endif
                @if(!empty($property->image_05))
                        <?php $image_coutn_05 = 1?>
                @else
                        <?php $image_coutn_05 = 0?>
                @endif

                    <?php $total_images = (1 + $image_coutn_02 + $image_coutn_03 + $image_coutn_04 + $image_coutn_05);?>

                <div class="box">
                    <div class="thumb">
                        <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
<?php $path="attachments/$property->user_id/$property->id/$property->image_01"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }} " alt="">
                    </div>
                <p class="price"><i class="fas fa-indian-rupee-sign"></i>{{$property->price}}</p>
                <h3 class="name">{{$property->property_name}}</h3>
                <p class="location"><i class="fas fa-map-marker-alt"></i>{{$property->address}}</p>
                    <a href="{{route('admin.view_property',$property->id)}}" class="btn">view property</a>
                    <form action="{{route('admin.property.destroy',$property->id)}}" method="POST">
                        @method('delete')
                        @csrf

                        <input type="submit" value="Delete Property" onclick="return confirm('delete this property?');" name="delete" class="delete-btn">
                    </form>
            </div>

            @endforeach
        </div>

    </section>




@endsection
