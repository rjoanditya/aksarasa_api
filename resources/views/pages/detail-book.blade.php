@extends('/layout/html')
@section('book')

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
                    <div class="col-4">
                        <div class="grid d-flex col-md-auto mx-5" height="200px"
                            style="background-image:url('/assets/images/cover/persona.png');background-size:cover;height:450px;">
                            <div class="pb-4 justify-content-center align-self-end px-5">
                                <label class="btn btn-rounded social-btn btn-behance" for="coverFile"><i
                                        class="mdi mdi-file-image"></i>Update Image</label>
                            </div>
                        </div>
                        <div class="text-muted text-small text-center">
                            <i> *for better experience, the images should 390px x 610px.</i>
                        </div>
                    </div>
                    <div class="grid col-8">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-8 mx-auto">
                                        <div class="form-group row showcase_row_area">
                                            <input hidden type="file" class="custom-file-input" id="coverFile">
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
                <div class="row">
                    <!-- url with parameters  -->
                    <a class="mt-5" href="{{route('add-part', ['id' => 1]) }}">
                        <div class="btn btn-primary has-icon rounded-pill mb-3 m-0">
                            <i class="mdi mdi-library-plus"></i>Add Part
                        </div>
                    </a>
                    <div class="col-12 item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Authors</th>
                                        <th>Parts</th>
                                        <th class="text-center">Audio</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="$i">
                                        <td id="$i">Prolog
                                            <div>
                                                <a href="books/water-bottle">Edit |</a><a href="#"> Quick Edit
                                                    |</a><a href="#" class="text-danger">
                                                    Trash </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>Zahra Amelia</td>
                                        <td>1</td>
                                        <td>
                                            <audio controls
                                                src="/assets/audio/mobydick_010_012_melville_64kb.mp3"></audio>
                                        </td>
                                        <td>
                                            <p>Published</p>
                                            June 25, 2022
                                        </td>
                                        <td class="actions">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Mereka Bilang itu Mudah tapi Tetap Saja Aku Ingin Menyerah
                                            <div>
                                                <a href="books/persona">Edit |</a><a href="#"> Quick Edit |</a><a
                                                    href="#" class="text-danger">
                                                    Trash </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>Zahra Amelia</td>
                                        <td>2</td>
                                        <td>
                                            <audio controls
                                                src="/assets/audio/mobydick_013_015_melville_64kb.mp3"></audio>
                                        </td>
                                        <td>
                                            <p>Last Modified</p>
                                            October 12, 2022
                                        </td>
                                        <td class="actions">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
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