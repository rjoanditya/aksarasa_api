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
                    <a href="add-book">
                        <div class="btn btn-primary has-icon rounded-pill mb-3 m-0">
                            <i class="mdi mdi-library-plus"></i>Add New
                        </div>
                    </a>
                    <div class="col-12">
                        <a href="#" class="text-small">All (2) |</a>
                        <a href="#" class="text-small">Mine (1) |</a>
                        <a href="#" class="text-small">Published (2) |</a>
                        <a href="#" class="text-small">Draft (0)</a>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12 item-wrapper">
                        <div class="table-responsive">
                            <table class="table info-table">
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
                                    <tr id="$i">
                                        <td id="$i">Water Bottle
                                            <div>
                                                <a href="/books/water-bottle">Edit |</a><a href="#"> Quick Edit |</a><a
                                                    href="#" class="text-danger">
                                                    Trash </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>Admin</td>
                                        <td>Horor</td>
                                        <td>14</td>
                                        <td>
                                            <p>Published</p>
                                            June 25, 2022
                                        </td>
                                        <td class="actions">
                                            <i class="mdi mdi-dots-vertical"></i>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>Persona
                                            <div>
                                                <a href="/books/persona">Edit |</a><a href="#"> Quick Edit |</a><a
                                                    href="#" class="text-danger">
                                                    Trash </a><a href="#">| View</a>
                                            </div>
                                        </td>
                                        <td>Zahra Amelia</td>
                                        <td>Romance</td>
                                        <td>298</td>
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
        <!-- partial:partials/_footer.html -->
        <footer class="footer">
            <div class="row">
                <div class="col-sm-6 text-center text-sm-right order-sm-1">
                    <ul class="text-gray">
                        <li><a href="#">Terms of use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
                <div class="col-sm-6 text-center text-sm-left ml-5 mt-3 mt-sm-0">
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