@extends('frontend.layout.master')
@section('title','Search Page')
@section('filter')
    <!-- search filter section starts  -->
    <section class="filters" style="padding-bottom: 0;">

        <form action="{{route('search.filter')}}" method="post">
            @csrf
            <div id="close-filter"><i class="fas fa-times"></i></div>
            <h3>filter your search</h3>

            <div class="flex">
                <div class="box">
                    <p>enter location</p>
                    <input type="text" name="location" required maxlength="50" placeholder="enter ciyt name" class="input">
                </div>
                <div class="box">
                    <p>offer type</p>
                    <select name="offer" class="input" required>
                        <option value="sale">sale</option>
                        <option value="resale">resale</option>
                        <option value="rent">rent</option>
                    </select>
                </div>
                <div class="box">
                    <p>property type</p>
                    <select name="type" class="input" required>
                        <option value="flat">flat</option>
                        <option value="house">house</option>
                        <option value="shop">shop</option>
                    </select>
                </div>
                <div class="box">
                    <p>how many BHK</p>
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
                    <p>minimum budget</p>
                    <input type="number" name="minimum" required min="0" max="9999999999" maxlength="10" placeholder="enter minimum budget" class="input">
                </div>
                <div class="box">
                    <p>maximum budget <span>*</span></p>
                    <input type="number" name="maximum" required min="0" max="9999999999" maxlength="10" placeholder="enter maximum budget" class="input">

                </div>
                <div class="box">
                    <p>status</p>
                    <select name="status" class="input" required>
                        <option value="ready to move">ready to move</option>
                        <option value="under construction">under construction</option>
                    </select>
                </div>
                <div class="box">
                    <p>furnished</p>
                    <select name="furnished" class="input" required>
                        <option value="unfurnished">unfurnished</option>
                        <option value="furnished">furnished</option>
                        <option value="semi-furnished">semi-furnished</option>
                    </select>
                </div>
            </div>
            <input type="submit" value="search property" name="search" class="btn">
        </form>

    </section>
@endsection

<div id="filter-btn" class="fas fa-filter"></div>
@section('search_listings')
<section class="listings">



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

                       <button type="submit" name="save" class="save"><i class="fas fa-heart"></i><span>saved</span></button>

                       <button type="submit" name="save" class="save"><i class="far fa-heart"></i><span>save</span></button>

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


<!-- listings section ends -->
@endsection
@section('script')
    <script>

        document.querySelector('#filter-btn').onclick = () =>{
            document.querySelector('.filters').classList.add('active');
        }

        document.querySelector('#close-filter').onclick = () =>{
            document.querySelector('.filters').classList.remove('active');
        }

    </script>

@endsection










