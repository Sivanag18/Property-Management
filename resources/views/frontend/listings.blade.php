@extends('frontend.layout.master')
@section('title','All Listings')
@section('all_listings')
    <!-- listings section starts  -->

    <section class="listings">

        <h1 class="heading">all listings</h1>

        <div class="box-container">

@if ($properties != [])
@foreach ($properties as $property)


                @if(!empty($property->image_02))
                        <?php $image_coutn_02 = 1?>
                    @else
                   <?php $image_coutn_02 = 0?>
                    @endif
                    @if(!empty($property->image_03))
                            <?php $image_coutn_03 = 1?>
                    @else
                            <?php $image_coutn_03 = 0?>
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


            <form action="" method="POST">
                <div class="box">
                    <input type="hidden" name="property_id" value="{{$property->id}}">

{{--                    <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>--}}

{{--                    <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>--}}

                    <div class="thumb">
                        <p class="total-images"><i class="far fa-image"></i><span><?= $total_images; ?></span></p>
                            <?php $path="attachments/$property->user_id/$property->id/$property->image_01"?>
                        <img src="{{\Illuminate\Support\Facades\URL::asset($path) }}" alt="">
                    </div>
                    <div class="admin">
                        <h3><?= substr($property->user_name, 0, 1); ?></h3>
                        <div>
                            <p>{{$property->user_name}}</p>
                            <span>{{$property->created_at}}</span>
                        </div>
                    </div>
                </div>
                <div class="box">
                    <div class="price"><i class="fas fa-indian-rupee-sign"></i><span>{{$property->price}}</span></div>
                    <h3 class="name">{{$property->property_name}}</h3>
                    <p class="location"><i class="fas fa-map-marker-alt"></i><span>{{$property->address}}</span></p>
                    <div class="flex">
                        <p><i class="fas fa-house"></i><span>{{$property->type}}</span></p>
                        <p><i class="fas fa-tag"></i><span>{{$property->offer}}</span></p>
                        <!-- <p><i class="fas fa-bed"></i><span>{{$property->bnk}}</span></p>
                        <p><i class="fas fa-trowel"></i><span>{{$property->status}}</span></p>
                        <p><i class="fas fa-couch"></i><span>{{$property->furnished}}</span></p>
                        <p><i class="fas fa-maximize"></i><span>{{$property->carpet}}sqft</span></p> -->
                    </div>
                    <div class="flex-btn">
                        <a href="{{route('view_property',$property->id)}}" class="btn">view property</a>

                    </div>
                </div>
            </form>

@endforeach
@else
<p class="empty">no properties added yet! <a href="{{route('property')}}" style="margin-top:1.5rem;" class="btn">add new</a></p>
 @endif

        </div>

    </section>

    <!-- listings section ends -->


@endsection











