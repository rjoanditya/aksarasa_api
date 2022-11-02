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
                                    <form action="{{route('adding-book')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <div class="col-md-12 bg-dark mb-3">
                                            <div class="container">
                                                <p class="text-light text-center">Image here</p>
                                            </div>
                                        </div>
                                        <input type="hidden" name="paid" value="unpaid">
                                        <input type="hidden" name="created_by" value="{{session()->get('id')}}">
                                        <input type="hidden" name="isShowed" value="false">
                                        <div class="form-group row showcase_row_area mb-4">
                                            <div class="col-md-3 showcase_text_area">
                                                <label>Cover</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <div class="custom-file">
                                                    <input type="file" accept="image/*" class="custom-file-input"
                                                        id="customFile" name="image">
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
                                                <input type="text" required name="title" class="form-control"
                                                    id="inputType1" placeholder="Title Here">
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType1">Slug</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <input type="text" required name="slug" class="form-control"
                                                    id="inputType1"
                                                    placeholder='The "slug" is the URL-friendly version of the name'>
                                            </div>
                                        </div>
                                        <div class="form-group row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label for="inputType9">Description</label>
                                            </div>
                                            <div class="col-md-9 showcase_content_area">
                                                <textarea required name="desc" class="form-control" id="inputType9"
                                                    cols="12" rows="5"></textarea>
                                            </div>
                                        </div>
                                        <div class="row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area">
                                                <label>Categories</label>
                                            </div>
                                            <div class="col-md-9 form-inline">
                                                @foreach ($category as $c)
                                                <div class="checkbox mb-3">
                                                    <label>
                                                        <input type="checkbox" name="{{$c->id}}" value="{{$c->id}}"
                                                            class="form-check-input">
                                                        <i class="input-frame"></i>
                                                        {{$c->name}}
                                                    </label>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                        <div class="row showcase_row_area">
                                            <div class="col-md-3 showcase_text_area"></div>
                                            <div class="col-md-9">
                                                <input class="btn rounded-pill btn-primary px-5 d-flex align-self-end"
                                                    type="submit" value="Create">
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
        <!-- content viewport ends -->
        @include(' /layout/partials/_footer')
    </div>
    <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- Scripts JS here -->
    @include('/layout/partials/_scripts')
</body>
@endsection