@extends('admin.admin_layout')
@section('title', 'Subject')
@section('work-space')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
                </div><!-- /.col -->
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Subject</a></li>
                    </ol>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->


    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Small boxes (Stat box) -->
            <div class="row">
                <div class="col-12">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lg">
                        Add Student
                    </button>
                </div>

                <div class="modal fade" id="modal-lg">
                    <div class="modal-dialog modal-md">
                        <form method="post" id="addStudent">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Student</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control" id="name"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="email"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="stubtn">Save changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>
                <!-- /.modal -->




                {{-- Delete Model --}}
                <div class="modal fade" id="deleteModel">
                    <div class="modal-dialog modal-md">
                        <form method="post" id="deleteStudent">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            {{-- <label for="subject">Subject</label>
                                            <input type="text" name="subject" class="form-control" id="edit_subject"
                                                placeholder="Enter Subject" required> --}}

                                            <h3 style="text-align: center">Are You Sure !! <br> Do You want to delete this
                                                recored</h3>

                                            <input type="hidden" name="id" id="delete_id">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="modal fade" id="editModel">
                    <div class="modal-dialog modal-md">
                        <form method="post" id="editStudent">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Student</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="name">Name</label>
                                            <input type="hidden" name="id" id="id">
                                            <input type="text" name="name" class="form-control" id="edit_name"
                                                placeholder="Enter Name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input type="text" name="email" class="form-control" id="edit_email"
                                                placeholder="Enter Email" required>
                                        </div>
                                    </div>

                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary" id="stubtnedit">Update
                                        changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>

            </div>

            <div class="row my-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Student All List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-primary btn-sm editButton"
                                                    data-id="{{ $item->id }}" data-name="{{ $item->name }}"
                                                    data-email="{{ $item->email }}" data-toggle="modal"
                                                    data-target="#editModel">Edit</button>
                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-sm deleteButton"
                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#deleteModel">Delete</button>
                                            </td>

                                        </tr>
                                    @empty
                                    @endforelse

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->

                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
        </div>
    </section>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#addStudent").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.addStudent') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        $("#stubtn").prop('disabled', true);
                        $("#stubtn").text('Please Wait ...')

                    },
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });


            $(".editButton").click(function(e) {
                $("#id").val($(this).attr('data-id'));
                $("#edit_name").val($(this).attr('data-name'));
                $("#edit_email").val($(this).attr('data-email'));
            });

            $(".deleteButton").click(function(e) {
                // alert('pp');
                $("#delete_id").val($(this).attr('data-id'));

                // var delete_id = $(this).attr('data-id');

                // $("#delete_id").val(delete_id);
            });

            $("#deleteStudent").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.deleteStudent') }}",
                    type: "POST",
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });

            $("#editStudent").submit(function(e) {
                e.preventDefault();

                var formData = $(this).serialize();
                $.ajax({
                    url: "{{ route('admin.editStudent') }}",
                    type: "POST",
                    data: formData,
                    beforeSend: function() {
                        $("#stubtnedit").prop('disabled', true);
                        $("#stubtnedit").text('Please Wait ...')

                    },
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.msg);
                        }
                    }
                });
            });


            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
