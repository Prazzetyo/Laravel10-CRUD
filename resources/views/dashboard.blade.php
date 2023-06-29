@include('template/header')
<!-- Page Container START -->
<div class="page-container" style="padding-left: 0px;">

    <!-- Content Wrapper START -->
    <div class="main-content">
        <div class="page-header">
            <h2 class="header-title">Title</h2>
            <div class="header-sub-title">
                <nav class="breadcrumb breadcrumb-dash">
                    <a href="#" class="breadcrumb-item"><i class="anticon anticon-home m-r-5"></i>Home</a>
                    <a class="breadcrumb-item" href="#">Breadcrumb 1</a>
                    <span class="breadcrumb-item active">Breadcrumb 2</span>
                </nav>
            </div>
        </div>
        @if ($errors->any())
        <div class="alert alert-danger" style="margin-top: 1rem;">{{ $errors->first() }}</div>
        @endif
        @if (session('succ_msg'))
        <div class="alert alert-success">{{ session('succ_msg') }}</div>
        @endif
        @if (session('err_msg'))
        <div class="alert alert-danger">{{ session('err_msg') }}</div>
        @endif
        <div style="text-align: right; margin-bottom: 1rem;">
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#insertModal">Insert</button>
        </div>
        <div class="table-responsive">
            <table id="data-table" class="table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $no = 1;
                    @endphp
                    @foreach ($students as $item)
                    <tr>
                        <td>{{$no++}}</td>
                        <td>{{$item->name}}</td>
                        <td>{{$item->course}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->phone}}</td>
                        <td>
                            <button onclick="showMdlEdit(
                                '{{ $item->id }}', 
                                '{{ $item->name }}', 
                                '{{ $item->course }}', 
                                '{{ $item->email }}', 
                                '{{ $item->phone }}'
                                )" class="btn btn-primary">Edit</button>
                            <button onclick="showMdlDelete('{{ $item->id }}')" class="btn btn-danger">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Course</th>
                        <th>Email</th>
                        <th>Phone</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
    <!-- Content Wrapper END -->

    <!-- Modal Insert -->
    <div class="modal fade" id="insertModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Insert Student</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="/insert" method="post">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Course</label>
                            <div class="m-b-15">
                                <select class="select2" name="course">
                                    <option value="Laravel">Laravel</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                    <option value="Golang">Golang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Phone</label>
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="Your Phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Insert -->

    <!-- Modal Update -->
    <div class="modal fade" id="mdlEdit">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <form action="/update" method="post">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <input type="hidden" name="id" id="mdlEdit_id">
                        <div class="form-group">
                            <label for="formGroupExampleInput">Name</label>
                            <input type="text" class="form-control" id="mdlEdit_name" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput2">Course</label>
                            <div class="m-b-15">
                                <select class="select2" name="course" id="mdlEdit_course">
                                    <option value="Laravel">Laravel</option>
                                    <option value="React">React</option>
                                    <option value="Vue">Vue</option>
                                    <option value="Golang">Golang</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Email</label>
                            <input type="email" class="form-control" id="mdlEdit_email" name="email" placeholder="Email" required>
                        </div>
                        <div class="form-group">
                            <label for="formGroupExampleInput">Phone</label>
                            <input type="text" class="form-control" id="mdlEdit_phone" name="phone" placeholder="Your Phone" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Update -->

    <!-- Modal Delete -->
    <div class="modal fade" id="mdlDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>

                <div class="modal-body">
                    Are you sure to delete this data?
                </div>
                <form action="/delete" method="post">
                    @csrf
                    @method('DELETE')
                    <div class="modal-footer">
                        <input type="hidden" name="id" id="mdlDelete_id">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Delete -->
</div>
<!-- Page Container END -->

@include('template/footer')