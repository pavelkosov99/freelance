<!doctype html>
<html class="no-js" lang="{{app()->getLocale()}}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Dr Fariz Məmmədov</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="manifest" href="site.webmanifest"> -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('img/favicon.png')}}">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href={{asset("css/bootstrap.min.css")}}>
    <link rel="stylesheet" href={{asset("css/owl.carousel.min.css")}}>
    <link rel="stylesheet" href={{asset("css/magnific-popup.css")}}>
    <link rel="stylesheet" href={{asset("css/font-awesome.min.css")}}>
    <link rel="stylesheet" href={{asset("css/themify-icons.css")}}>
    <link rel="stylesheet" href={{asset("css/nice-select.css")}}>
    <link rel="stylesheet" href={{asset("css/flaticon.css")}}>
    <link rel="stylesheet" href={{asset("css/gijgo.css")}}>
    <link rel="stylesheet" href={{asset("css/animate.css")}}>
    <link rel="stylesheet" href={{asset("css/slicknav.css")}}>
    <link rel="stylesheet" href={{asset("css/style.css")}}>
    <link rel="shortcut icon" href={{asset("img/favicon.png")}} type="image/x-icon">
    <!-- <link rel="stylesheet" href="css/responsive.css"> -->
</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

@include('pages.includes.header')

@yield('content')

@include('pages.includes.footer')

<!-- JS here -->
<script src={{asset("js/vendor/modernizr-3.5.0.min.js")}}></script>
<script src={{asset("js/vendor/jquery-1.12.4.min.js")}}></script>
<script src={{asset("js/popper.min.js")}}></script>
<script src={{asset("js/bootstrap.min.js")}}></script>
<script src={{asset("js/owl.carousel.min.js")}}></script>
<script src={{asset("js/isotope.pkgd.min.js")}}></script>
<script src={{asset("js/ajax-form.js")}}></script>
<script src={{asset("js/waypoints.min.js")}}></script>
<script src={{asset("js/jquery.counterup.min.js")}}></script>
<script src={{asset("js/imagesloaded.pkgd.min.js")}}></script>
<script src={{asset("js/scrollIt.js")}}></script>
<script src={{asset("js/jquery.scrollUp.min.js")}}></script>
<script src={{asset("js/wow.min.js")}}></script>
<script src={{asset("js/nice-select.min.js")}}></script>
<script src={{asset("js/jquery.slicknav.min.js")}}></script>
<script src={{asset("js/jquery.magnific-popup.min.js")}}></script>
<script src={{asset("js/plugins.js")}}></script>
<script src={{asset("js/gijgo.min.js")}}></script>
<!--contact js-->
<script src={{asset("js/contact.js")}}></script>
<script src={{asset("js/jquery.ajaxchimp.min.js")}}></script>
<script src={{asset("js/jquery.form.js")}}></script>
<script src={{asset("js/jquery.validate.min.js")}}></script>
<script src={{asset("js/mail-script.js")}}></script>

<script src={{asset("js/main.js")}}></script>
<script>
    $('#datepicker').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }
    });
    $('#datepicker2').datepicker({
        iconsLibrary: 'fontawesome',
        icons: {
            rightIcon: '<span class="fa fa-caret-down"></span>'
        }

    });
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
</body>

</html>