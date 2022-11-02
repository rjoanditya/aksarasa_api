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

                    </div>
                </div>
                @if(session('success'))
                <div class="swal" status="success" message="<?= session('success') ?>">
                </div>
                @endif
                <div class="row">
                    <div class="grid col-md-12">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-12 mx-auto">
                                        <form action="{{route('updatedParts',['id'=>$parts->id])}}" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-1 showcase_text_area">
                                                    <label for="inputType1">Title<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <input type="text" name="title" required class="form-control px-3"
                                                        id="inputType1" value="{{$parts->title}}"
                                                        placeholder="Title of Part">
                                                </div>
                                            </div>
                                            <div class="row showcase_row_area mb-4">
                                                <div class="col-md-1 showcase_text_area">
                                                    <label>Audio</label>
                                                </div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <div class="custom-file">
                                                        <input name="file" type="file" accept="audio/*"
                                                            class="custom-file-input" id="customFile">
                                                        <label class="custom-file-label" for="customFile">Choose
                                                            file</label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-1 showcase_text_area">
                                                    <label for="inputEditor">Content<span
                                                            class="text-danger">*</span></label>
                                                </div>
                                                <div class="col-md-11 showcase_content_area">
                                                    <textarea type="text" name="content" class="form-control"
                                                        style="min-height: 500px;" id="inputEditor"
                                                        required>{{$parts->content}}</textarea>
                                                    <div class="mt-3">
                                                        <input class="btn btn-primary rounded-pill mb-3 m-0"
                                                            type="submit" value="Submit" name="submit_text">
                                                        <input class="btn btn-danger rounded-pill mb-3 m-0"
                                                            type="button" value="Discard">
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <div class="col">
                    <div class="row-md-2">
                        <a class="mt-5" href="/add-part/1">
                            <div class="btn btn-success has-icon rounded-pill mb-3 m-0">
                                Save Part
                            </div>
                        </a>
                        <a class="mt-5" href="/add-part/1">
                            <div class="btn btn-danger has-icon rounded-pill mb-3 m-0">
                                Discard
                            </div>
                        </a>
                    </div>
                </div> -->
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