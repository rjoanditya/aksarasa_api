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
                                        <form action="">
                                            <div class="form-group row showcase_row_area">
                                                <input hidden type="file" class="custom-file-input" id="coverFile">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType1">Title</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <input type="text" class="form-control" id="inputType1"
                                                        placeholder="Title Here" value="{{$post->title}}">
                                                </div>
                                            </div>
                                            <div class="form-group row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area">
                                                    <label for="inputType9">Description</label>
                                                </div>
                                                <div class="col-md-9 showcase_content_area">
                                                    <textarea class="form-control" id="inputType9" cols="12"
                                                        rows="5">{{$post->description}}</textarea>
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
                                                            @foreach($post_categories as $pc)
                                                            <?php
                                                            if ($c->id == $pc['category_id']) :
                                                            ?>
                                                            <input type="checkbox" value="{{$c->id}}" checked
                                                                class="form-check-input">
                                                            <i class="input-frame"></i>
                                                            <?php else : ?>
                                                            <input type="checkbox" value="{{$c->id}}"
                                                                class="form-check-input">
                                                            <i class="input-frame"></i>
                                                            <?php endif ?>
                                                            @endforeach
                                                            {{$c->name}}
                                                        </label>
                                                    </div>
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="row showcase_row_area">
                                                <div class="col-md-3 showcase_text_area"></div>
                                                <div class="col-md-9">
                                                    <input
                                                        class="btn rounded-pill btn-primary px-5 d-flex align-self-end"
                                                        type="submit" value="Save">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <!-- url with parameters  -->
                        <a class="mt-5" href="{{route('add-part',['slug'=>$post->slug])}}">
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
                                        @foreach($parts as $part)
                                        <tr>
                                            <td>{{$part->title}}
                                                <div>
                                                    <a href="{{route('part', ['id' => $part->id])}}">Edit |</a><a
                                                        href="#">
                                                        Quick Edit |</a><a href="#" class="text-danger">
                                                        Trash </a><a href="#">| View</a>
                                                </div>
                                            </td>
                                            <td>{{$post_users->nickname}}</td>
                                            <td><?php
                                                $i = 1;
                                                echo $i++;
                                                ?></td>
                                            <td>
                                                <audio controls
                                                    src="/assets/audio/mobydick_010_012_melville_64kb.mp3"></audio>
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
</body>
@endsection