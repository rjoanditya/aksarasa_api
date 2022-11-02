@extends('/layout/html')
@section('allBook')

<body class="header-fixed">
    <!-- partials side & nav -->
    @include('layout/partials/_navbar')
    @include('layout/partials/_sidebar')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
            <div class="content-viewport">
                <div class="row">
                    <div class="col-12 py-5">
                        <h4>Library</h4>
                        <!-- <p class="text-gray">Welcome aboard, Admin</p> -->
                    </div>
                    <a href="{{route('add-book')}}">
                        <div class="btn btn-primary has-icon rounded-pill mb-3 m-0">
                            <i class="mdi mdi-library-plus"></i>Add New
                        </div>
                    </a>
                    @if(session('success'))
                    <div class="swal" status="success" message="<?= session('success') ?>"></div>
                    @endif
                    @if(session('message'))
                    <div class="swal" status="warning" message="<?= session('message') ?>"></div>
                    @endif
                    <div class="col-12">
                        <a href="#" class="text-small">All ({{ count($post)}}) |</a>
                        <a href="#" class="text-small">Mine
                            ({{count($post->where('created_by','==',session()->get('id')))}}) |</a>
                        <a href="#" class="text-small">Published
                            ({{count($post->where('isShowed','==','true'))}}) |</a>
                        <a href="#" class="text-small">Draft ({{count($post->where('isShowed','==','false'))}})</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table table-hover">
                                <thead>
                                    <tr>
                                        <th>Title</th>
                                        <th>Authors</th>
                                        <th>Categories</th>
                                        <th>Parts</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($post as $p)

                                    <tr>

                                        <!-- title -->
                                        <td class="d-flex">
                                            <div class="align-self-center pr-3">
                                                <span class="status-indicator rounded-indicator small 
                                                    <?php if ($p->isShowed == 'true') {
                                                        echo "bg-success";
                                                    } else {
                                                        echo "bg-warning";
                                                    } ?>"></span>

                                            </div>
                                            <div class="flex-row">
                                                {{$p->title}}
                                                <div>
                                                    <form class="text-hover"
                                                        action="{{route('destroyBooks', ['id' => $p->id])}}"
                                                        method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('books-detail', ['slug' => $p->slug])}}">Edit
                                                            |</a>
                                                        <a href="#"> Quick Edit |</a>
                                                        <button type="submit"
                                                            style="background: none!important; border: none;padding: 0!important;"
                                                            class="text-danger show_confirm" data-toggle="tooltip"
                                                            data-swal-template="#trash-template">Trash</button>
                                                        <a href="#">| View</a>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>

                                        <!-- nickname -->
                                        <td>{{$user->where('id','=',$p->created_by)->first()['nickname']}}</td>
                                        <!-- Categories -->
                                        <td>
                                            <!-- </?php $category->where('post_id', '=', $p->id) ?> -->
                                            @foreach($category->where('post_id','=',$p->id) as $c)
                                            {{$c->name}},
                                            @endforeach
                                        </td>
                                        <!-- Count Part -->
                                        <td>{{ count($parts->where('post_id',$p->id))}}</td>
                                        <td>
                                            @if($p->updated_at == null)
                                            <p>Published</p>
                                            {{date_format($p->created_at,"F d, Y")}}
                                            @else
                                            <p>Last Modified</p>
                                            {{date_format($p->updated_at,"F d, Y")}}
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