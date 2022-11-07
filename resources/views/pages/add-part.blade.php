@extends('/layout/html')
@section('add-part')
<?php
if (isset($_GET['submit_text'])) {
    $title = $_GET['title'];
    // $text = $_GET['content'];
    echo $title;
    // echo $text;
}

?>

<body class="header-fixed">
    <!-- partials side & nav -->
    @include('layout/partials/_navbar')
    @include('layout/partials/_sidebar')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
            <div class="content-viewport">
                <div class="row">
                    <div class="col-12 py-3">
                        <!-- <h4>Books</h4> -->
                        <!-- <p class="text-gray">Welcome aboard, Admin</p> -->
                    </div>
                </div>
                <div class="row">
                    <div class="grid col-md-12">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-12 mx-auto">
                                        <form action="{{ route('adding-part') }}" method="POST">
                                            @csrf
                                            <input type="hidden" name="slug" value="{{$post->slug}}">
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-1 showcase_text_area">
                                                    <label for="inputType1">Title<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <input required type="text" name="title" class="form-control"
                                                        id="inputType1" placeholder="Title of Part" required>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-1 showcase_text_area">
                                                    <label for="inputEditor">Content<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <textarea rows="10" type="text" name="content" class="form-control"
                                                        id="inputEditor"></textarea>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-1 showcase_text_area"></div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <div class="mt-3">
                                                        <input value="Submit" class="btn rounded-pill btn-primary mb-3"
                                                            type="submit">
                                                        <input class="btn btn-danger rounded-pill mb-3 m-0"
                                                            type="submit" value="Discard">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- content viewport ends -->
        @include('/layout/partials/_footer')
    </div>
    <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- Scripts JS here -->
    @include(' /layout/partials/_scripts')
</body>
@endsection