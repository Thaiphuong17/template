<!doctype html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>News HTML-5 Template </title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.ico">

    <!-- CSS here -->
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/ticker-style.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/flaticon.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/slicknav.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/animate.min.css')}}">
    <link rel="stylesheet" href="Frontend/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/themify-icons.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/slick.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('Frontend/assets/css/style.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">

    <!--category-page-->
    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('category/assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('category/assets/css/style.css')}}" rel="stylesheet">

    <!--detail-page-->
    

</head>

<body>

    <body>
        <!-- Header news -->
        @include('layouts.header')
        <!-- End Header news -->


        @yield('content')

        <!-- Footer news -->
        @include('layouts.footer')
        <!-- End Footer news -->

        <a href="javascript:" id="return-to-top"><i class="fa fa-chevron-up"></i></a>

        <script type="text/javascript" src="{{ asset('Frontend/assets/js/index.bundle.js') }}"></script>
        {{--@include('sweetalert::alert')--}}
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })


            // Add csrf token in ajax request
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        </script>



        @stack('content')
        <!--category-page-->
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/owlcarousel/owl.carousel.min.js"></script>

        <!-- Contact Javascript File -->
        <script src="mail/jqBootstrapValidation.min.js"></script>
        <script src="mail/contact.js"></script>

        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>

</html>