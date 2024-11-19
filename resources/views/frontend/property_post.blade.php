@extends('frontend.layout.master')
@section('title','Property Post')
@section('property_post')

<section class="property-form">

    <form action="{{ route('property.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <h3>Property Details</h3>
        
        <div class="box">
            <p>Property Name <span>*</span></p>
            <input type="text" name="property_name" required maxlength="50" placeholder="Enter property name" class="input">
        </div>

        <div class="flex">
            <div class="box">
                <p>Price <span>*</span></p>
                <input type="number" name="price" required min="0" max="9999999999" maxlength="10" placeholder="Enter property price" class="input">
            </div>
            <div class="box">
                <p>Property Address <span>*</span></p>
                <input type="text" name="address" required maxlength="100" placeholder="Enter address" class="input">
            </div>
            <div class="box">
                <p>Offer Type <span>*</span></p>
                <select name="offer" required class="input">
                    <option value="sale">Sale</option>
                    <option value="rent">Rent</option>
                </select>
            </div>
            <div class="box">
                <p>Property Type <span>*</span></p>
                <select name="type" required class="input">
                    <option value="flat">Flat</option>
                    <option value="house">House</option>
                </select>
            </div>
        </div>

        <div class="box">
            <p>Property Description <span>*</span></p>
            <textarea name="description" maxlength="1000" class="input" required cols="30" rows="10" placeholder="Write about property..."></textarea>
        </div>

        <div class="flex">
            <div class="box">
                <p>Number of Bedrooms <span>*</span></p>
                <input type="number" name="bedroom" min="0" maxlength="2" required placeholder="Enter number of bedrooms" class="input">
            </div>
            <div class="box">
                <p>Number of Bathrooms <span>*</span></p>
                <input type="number" name="bathroom" min="0" maxlength="2" required placeholder="Enter number of bathrooms" class="input">
            </div>
            <div class="box">
                <p>Balcony</p>
                <input type="number" name="balcony" min="0" maxlength="2" placeholder="Enter number of balconies" class="input">
            </div>
        </div>

        <div class="box">
            <p>Contact Name <span>*</span></p>
            <input type="text" name="contact_name" required maxlength="50" placeholder="Enter contact name" class="input">
        </div>

        <div class="box">
            <p>Contact Number <span>*</span></p>
            <input type="tel" name="contact_number" required maxlength="15" placeholder="Enter contact number" class="input">
        </div>

        <div class="box">
            <p>Property Images</p>
            <input type="file" name="image_01" class="input" accept="image/*">
        </div>

        <div class="box">
            <input type="file" name="image_02" class="input" accept="image/*">
        </div>

      

        <input type="submit" value="Post Property" class="btn" name="post">
    </form>

</section>

@endsection
