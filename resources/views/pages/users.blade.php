@extends('/layout/html')
@section('categories')

<body class="header-fixed">
    <!-- partials side & nav -->
    @include('layout/partials/_navbar')
    @include('layout/partials/_sidebar')
    <div class="page-content-wrapper">
        <div class="page-content-wrapper-inner">
            <div class="content-viewport">
                <div class="row">
                    <div class="col-12 py-5">
                        <h4>Authors</h4>
                        @if(session('success'))
                        <div class="swal" status="success" message="<?= session('success') ?>">
                        </div>
                        @endif
                    </div>
                    <!-- <div class="grid col-md-6">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form action="{{route('storeCategory')}}" method="POST">
                                    @csrf
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inputEmail10">Name</label>
                                        </div>
                                        <div class="col-md-10 showcase_content_area">
                                            <input type="text" name="name" class="form-control" required
                                                id="inputEmail10" placeholder="This name is appear on your site">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inputEmail4">Slug</label>
                                        </div>
                                        <div class="col-md-10 showcase_content_area">
                                            <input type="text" name="slug" class="form-control" required
                                                id="inputEmail4"
                                                placeholder="The “slug” is the URL-friendly version of the name.">
                                        </div>
                                    </div>
                                    <input type="submit" class="btn btn-sm btn-primary" value="Add">
                                </form>
                            </div>
                        </div>
                    </div> -->
                </div>
                <div class="row">
                    <div class="col-12 item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Book Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr id="$i">
                                        <td id="$i">{{$user->nickname}}
                                            <div>
                                                <a href="#">Edit |</a><a href="#"> Quick Edit |</a><a href="#"
                                                    class="text-danger">
                                                    Delete </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>{{count($counts->where('created_by',$user->id))}}</td>
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