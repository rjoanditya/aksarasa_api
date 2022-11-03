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
                @if(session('success'))
                <div class="swal" status="success" message="<?= session('success') ?>"></div>
                @endif
                <div class="row">
                    <div class="col-md-4 col-sm-6 col-6">
                        <div class="d-flex justify-content-center col-md-auto">
                            <div class="col-md-8 position-absolute pb-4 align-self-end mb-5">
                                <!-- <label class="btn btn-rounded social-btn btn-behance" for="thumbnail"><i
                                        class="mdi mdi-file-image custom-file-label "></i></label> -->
                                <label for="thumbnail" class="custom-file-label">Choose file</label>
                            </div>
                            @if ($post->image == "")
                            <img class=" img-fluid rounded-lg shadow img-preview" src="/assets/images/cover/default.png"
                                alt="">
                            @endif
                            <img class="img-fluid rounded-lg shadow img-preview" src="{{$post->image}}" alt="">
                        </div>
                        <div class="text-muted text-small text-center mt-3">
                            <i> *For a better experience, the images is recommended to be A5 (528px x 816px).</i>
                        </div>
                    </div>
                    <div class="grid col-md-8 col-sm-6 col-6 equel-grid">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <div class="row mb-3">
                                    <div class="col-md-8 mx-auto">
                                        <form action="{{route('updatedBooks',['id'=>$post->id])}}" method="POST"
                                            enctype="multipart/form-data">
                                            @csrf
                                            @method('PUT')
                                            <div class="form-group row showcase_row_area">
                                                <input type="hidden" name="old_image" value="{{$post->image}}">
                                                <input hidden type="file" accept="image/*" onchange="previewImg()"
                                                    name="image" class="custom-file-input" id="thumbnail">
                                                <div class="col-md-2 showcase_text_area">
                                                    <label for="inputType1">Title</label>
                                                </div>
                                                <div class="col-md-10 showcase_content_area">
                                                    <input type="text" name="title" class="form-control" id="inputType1"
                                                        placeholder="Title Here" value="{{$post->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <input hidden type="file" class="custom-file-input">
                                                <div class=" col-md-2 showcase_text_area">
                                                    <label for="inputType1">Slug</label>
                                                </div>
                                                <div class="col-md-10 showcase_content_area">
                                                    <input readonly type="text" name="slug" class="form-control"
                                                        id="inputType1" placeholder="Slug Here" value="{{$post->slug}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-2 showcase_text_area">
                                                    <label for="inputType9">Description</label>
                                                </div>
                                                <div class="col-md-10 showcase_text_area">
                                                    <textarea class="form-control" name="desc" id="inputType9" cols="12"
                                                        rows="5">{{$post->description}}</textarea>
                                                </div>
                                            </div>
                                            <div class="row showcase_row_area">
                                                <div class="col-md-2 mb-3 showcase_text_area">
                                                    <label>Categories</label>
                                                </div>
                                                <div class="col-md-10 form-inline">
                                                    @foreach ($category as $c)
                                                    <div class="col-4 mb-3 checkbox">
                                                        <label>
                                                            @if($pc!=null&&$c->id == $pc[$c->id])
                                                            <input name="{{$c->id}}" type="checkbox" value="{{$c->id}}"
                                                                checked class="form-check-input">
                                                            @else
                                                            <input name="{{$c->id}}" type="checkbox" value="{{$c->id}}"
                                                                class="form-check-input">
                                                            @endif
                                                            <i class="input-frame m-0"></i>
                                                            <span class="text-small">{{$c->name}}</span>
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row showcase_row_area">
                                                <div class="col-md-2 showcase_text_area">
                                                    <label>Status</label>
                                                </div>
                                                <div class="col-md-auto btn-group mb-0" data-toggle="buttons">
                                                    @if($post->isShowed == 'true')
                                                    <label class="btn btn-primary active">
                                                        <input type="radio" name="isShowed" value="true" id="" checked>
                                                        <i class="mdi mdi-book-open-page-variant"></i>Published
                                                    </label>
                                                    <label class="btn btn-primary ">
                                                        <input type="radio" name="isShowed" value="false" id="">
                                                        <i class="mdi mdi-pencil-box"></i>Drafted
                                                    </label>
                                                    @else
                                                    <label class="btn btn-primary">
                                                        <input type="radio" name="isShowed" value="true" id="">
                                                        <i class=" mdi mdi-book-open-page-variant"></i>Published
                                                    </label>
                                                    <label class="btn btn-primary active">
                                                        <input type="radio" name="isShowed" value="false" id="" checked>
                                                        <i class="mdi mdi-pencil-box"></i>Drafted
                                                    </label>
                                                    @endif

                                                </div>
                                            </div>
                                            <div class="row showcase_row_area">
                                                <div class="col-md-2 showcase_text_area"></div>
                                                <div class="col-md-10">
                                                    @if(session()->get('id') == $post->created_by)
                                                    <input
                                                        class="btn rounded-pill btn-primary px-5 d-flex align-self-end"
                                                        type="submit" value="Save">
                                                    @endif
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- url with parameters  -->
                    <div class="row mt-5">
                        @if(session()->get('id') == $post->created_by)
                        <a href="{{route('add-part',['slug'=>$post->slug])}}">
                            <div class="btn btn-primary has-icon rounded-pill mb-3 m-0">
                                <i class="mdi mdi-library-plus"></i>Add Part
                            </div>
                        </a>
                        @endif
                        <div class="col-12 item-wrapper">
                            <div class="table-responsive">
                                <table class="table info-table">
                                    <thead>
                                        <tr>
                                            <th class="col-md-4">Title</th>
                                            <th>Authors</th>
                                            <th>Parts</th>
                                            <th class="text-center">Audio</th>
                                            <th>Date</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $s = 0;
                                        $i = 1;
                                        ?> @foreach($parts as $part) <tr>
                                            <td>
                                                <span>{{$parts_title[$s++]}}</span>
                                                <div>
                                                    <span>
                                                        <form action="{{route('destroyParts', ['id' => $part->id])}}"
                                                            method="POST">
                                                            <a href=" {{route('part', ['id' => $part->id])}}">Edit
                                                                |</a>
                                                            <a href="#">Quick Edit |</a>
                                                            @csrf
                                                            @method('DELETE')
                                                            <input type="submit"
                                                                style="background: none!important; border: none;padding: 0!important;"
                                                                class="text-danger" value="Trash">
                                                            <a href="#">| View</a>
                                                        </form>
                                                    </span>
                                                </div>
                                            </td>
                                            <td>{{$post_users->nickname}}</td>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                <audio controls src="/assets/audio/"></audio>
                                            </td>
                                            <td>
                                                @if($part->updated_at == null)
                                                <p>Published</p>
                                                {{date_format($part->created_at,"F d, Y")}}
                                                @else
                                                <p>Last Modified</p>
                                                {{date_format($part->updated_at,"F d, Y")}}
                                                @endif
                                            </td>
                                            <td class="actions">
                                                <i class="mdi mdi-dots-vertical"></i>
                                            </td>
                                        </tr>
                                        @endforeach
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
    <script>
    let message = $(".swal").attr('message')
    let icon = $(".swal").attr('status')
    if (message) {
        swal({
            // title: "Good job!",
            text: message,
            icon: icon,
            button: false,
            closeOnEsc: true,
            timer: 2000,
        })
    }
    </script>
</body>
@endsection