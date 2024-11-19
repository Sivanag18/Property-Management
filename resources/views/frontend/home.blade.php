@extends('frontend.layout.master')
@section('title','Home')
@section('home')
    <div class="home">

        <section class="center">

            <form action="{{route('home.search')}}" method="post">
                @csrf
                <h3>find your perfect home</h3>
                <div class="box">
                    <p>enter location <span>*</span></p>
                    <input type="text" name="location" required maxlength="50" placeholder="enter ciyt name" class="input">
                </div>
                <div class="flex">
                    <div class="box">
                        <p>property type <span>*</span></p>
                        <select name="type" class="input" required>
                            <option value="flat">flat</option>
                            <option value="house">house</option>
                            <option value="shop">shop</option>
                        </select>
                    </div>
                    <div class="box">
                        <p>how many BHK <span>*</span></p>
                        <select name="bhk" class="input" required>
                            <option value="1">1 BHK</option>
                            <option value="2">2 BHK</option>
                            <option value="3">3 BHK</option>
                            <option value="4">4 BHK</option>
                            <option value="5">5 BHK</option>
                            <option value="6">6 BHK</option>
                            <option value="7">7 BHK</option>
                            <option value="8">8 BHK</option>
                            <option value="9">9 BHK</option>
                        </select>
                    </div>
                    <div class="box">
                        <p >minimum budget <span>*</span></p>
                        <input type="number" name="minimum" required min="0" max="9999999999" maxlength="10" placeholder="enter minimum budget" class="input">
                    </div>
                    <div class="box">
                        <p>maximum budget <span>*</span></p>
                        <input type="number" name="maximum" required min="0" max="9999999999" maxlength="10" placeholder="enter maximum budget" class="input">
                    </div>
                </div>
                <input type="submit" value="search property" name="search" class="btn">
            </form>

        </section>

    </div>
    <!-- home section ends -->
@endsection

@section('services')
    <!-- services section starts  -->

    <section class="services">

        <h1 class="heading">our services</h1>

        <div class="box-container">

            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/icon-1.png')}}" alt="">
                <h3>buy house</h3>
            </div>

            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/icon-2.png')}}" alt="">
                <h3>rent house</h3>
            </div>

            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/icon-3.png')}}" alt="">
                <h3>sell house</h3>
            </div>

            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/icon-4.png')}}" alt="">
                <h3>flats and buildings</h3>
            </div>

            <div class="box">
                <img src="{{\Illuminate\Support\Facades\URL::asset('assets/images/icon-6.png')}}" alt="">
                <h3>24/7 service</h3>
            </div>

        </div>

    </section>

    <!-- services section ends -->
@endsection

@section('latestListings')
    <!-- listings section starts  -->

    <section class="listings">

        <h1 class="heading">latest listings</h1>

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

        <div style="margin-top: 2rem; text-align:center;">
            <a href="{{route('all listings')}}" class="inline-btn">view all</a>
        </div>


    </section>


@endsection









