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
                        <h4>Categories</h4>
                        <!-- <p class="text-gray">Welcome aboard, Admin</p> -->
                    </div>
                    <div class="grid col-md-6">
                        <div class="grid-body">
                            <div class="item-wrapper">
                                <form>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inputEmail10">Name</label>
                                        </div>
                                        <div class="col-md-10 showcase_content_area">
                                            <input type="text" class="form-control" id="inputEmail10"
                                                placeholder="This name is appear on your site">
                                        </div>
                                    </div>
                                    <div class="form-group row showcase_row_area">
                                        <div class="col-md-2 showcase_text_area">
                                            <label for="inputEmail4">Slug</label>
                                        </div>
                                        <div class="col-md-10 showcase_content_area">
                                            <input type="text" class="form-control" id="inputEmail4"
                                                placeholder="The “slug” is the URL-friendly version of the name.">
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-sm btn-primary">Add Categories</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Slug</th>
                                        <th>Count</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr id="$i">
                                        <td id="$i">Non Fiction
                                            <div>
                                                <a href="#">Edit |</a><a href="#"> Quick Edit |</a><a href="#"
                                                    class="text-danger">
                                                    Delete </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>non-fiction</td>
                                        <td>14</td>
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
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="row">
                <div class="col-sm-6 text-center text-sm-right order-sm-1">
                    <ul class="text-gray">
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 text-center text-sm-left mt-3 mt-sm-0">
                    <small class="text-muted d-block">Copyright © 2022 <a href="#" target="_blank">Aksarasa.id</a>.
                        All rights reserved</small>
                </div>
            </div>
        </footer>
        <!-- partial -->
    </div>
    <!-- page content ends -->
    </div>
    <!--page body ends -->
    <!-- Scripts JS here -->
    @include('/layout/partials/_scripts')
</body>
@endsection