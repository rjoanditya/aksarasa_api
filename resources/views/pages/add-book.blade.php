@extends('/layout/html')
@section('add-book')

<body class="header-fixed">
    <!-- partials side & nav -->
    @include('layout/partials/_navbar')
    @include('layout/partials/_sidebar')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
            <div class="content-viewport">
                <div class="row">
                    <div class="col-12 py-5">
                        <h4>Create Book</h4>
                        <!-- <p class="text-gray">Welcome aboard, Admin</p> -->
                    </div>
                </div>
                <div class="grid">
                    <div class="grid-body align-self-start">
                        <div class="item-wrapper">
                            <div class="row mb-3">
                                <div class="col-md-8 mx-auto">
                                    <div class="col-md-12 bg-dark mb-3">
                                        <div class="container">
                                            <p class="text-light text-center"> Image here</p>
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area mb-4">
                                        <div class="col-md-3 showcase_text_area">
                                            <label>Cover</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="customFile">
                                                <label class="custom-file-label pl-4 text-muted"
                                                    style="font-size: 13px;" for="customFile">Choose
                                                    file</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputType1">Title</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <input type="text" class="form-control" id="inputType1"
                                                placeholder="Title Here">
                                        </div>
                                    </div>
                                    <div class="row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label>Categories</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <select class="custom-select">
                                                <option selected="" disabled class="pl-4 text-muted"
                                                    style="font-size: 13px;"">Categories</option>
                                            <option value=" 1">Horor</option>
                                                <option value="2">Romance</option>
                                                <option value="3">Fiction</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-3 showcase_text_area">
                                            <label for="inputType9">Description</label>
                                        </div>
                                        <div class="col-md-9 showcase_content_area">
                                            <textarea class="form-control" id="inputType9" cols="12"
                                                rows="5"></textarea>
                                        </div>
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
    @include('/layout/partials/_scripts')
</body>
@endsection