<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Aksarasa</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/assets/images/assets-mini.svg') }}">
    <!-- plugins:css -->
    <link rel="stylesheet" href="/assets/vendors/iconfonts/mdi/css/materialdesignicons.css">
    <!-- endinject -->
    <!-- vendor css for this page -->
    <!-- End vendor css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="/assets/css/shared/style.css">
    <!-- endinject -->
    <!-- Layout style -->
    <link rel="stylesheet" href="/assets/css/demo_1/style.css">
    <!-- Layout style -->
    <link rel="shortcut icon" href="/assets/images/favicon.ico" />
    <!-- CKEditor 5 -->
    <!-- <script src="/ckeditor5/build/ckeditor.js"></script> -->
    <!-- <link rel="stylesheet" href="/assets/css/content-styles.css" type="text/css"> -->
    <script src="/ckeditor5/build/ckeditor.js"></script>


    <!-- Sweet Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<style>
::-webkit-scrollbar {
    display: none !important;
}
</style>
<!-- Dashboard -->
@yield('home')

<!-- Books -->
@yield('allBook')
@yield('book')
@yield('add-book')
@yield('add-part')
@yield('categories')
@yield('tags')

<!-- Audio -->
@yield('allAudiobook')

<!-- Auth -->
@yield('login')

</html>