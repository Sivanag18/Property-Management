<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
@yield('style')
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="{{\Illuminate\Support\Facades\URL::asset('assets/css/style.css')}}">

</head>
<body>
<!-- header section starts  -->

@include('frontend.layout.header')

<!-- header section ends -->
<!-- login section starts  -->
@yield('login')
<!-- login section ends -->
<!-- register section starts  -->
@yield('register')
<!-- register section ends -->
<!-- view property section starts  -->
@yield('property')
<!-- view property section ends -->
<!-- post property section starts  -->
@yield('property_post')
<!-- post property section ends -->
<!-- search filter section starts  -->
@yield('filter')
<!-- search filter section ends -->
<!-- listings section starts  -->
@yield('search_listings')
<!-- listings section ends -->
<!-- listings section starts  -->
@yield('listings')
<!-- listings section ends -->
<!-- home section starts  -->
@yield('home')
<!-- home section ends -->
<!-- services section starts  -->
@yield('services')
<!-- services section ends -->
<!-- about section starts  -->
@yield('about')
<!-- about section ends -->
<!-- steps section starts  -->
@yield('steps')
<!-- steps section ends -->
<!-- review section starts  -->
@yield('review')
<!-- review section ends -->
<!-- contact section starts  -->
@yield('contact')
<!-- contact section ends -->
<!-- faq section starts  -->
@yield('faq')
<!-- faq section ends -->
@yield('latestListings')
@yield('all_listings')



<!-- footer section starts  -->

@include('frontend.layout.footer')

<!-- footer section ends -->


<!-- custom js file link  -->
<script src="{{\Illuminate\Support\Facades\URL::asset('assets/js/script.js')}}"></script>
@yield('script')

</body>
</html>
