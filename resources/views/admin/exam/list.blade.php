@extends('admin.admin_layout')
@section('title', 'Exam')
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
                    <li class="breadcrumb-item"><a href="#">Exam</a></li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#examModel">
                    Add Exam
                </button>
            </div>

            <div class="modal fade" id="examModel">
                <div class="modal-dialog modal-md">
                    <form method="post" id="addExam">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Add Exam</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exam_name">Exam Name</label>
                                        <input type="text" name="exam_name" class="form-control" id="exam_name"
                                            placeholder="Enter Exam Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subject_id">Subject</label>
                                        <select class="custom-select" name="subject_id" id="subject_id">
                                            <option disabled selected>Select Subject</option>
                                            @foreach ($subjects as $items)
                                            <option value="{{ $items->id }}">{{ $items->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_date">Exam Date</label>
                                        <input type="date" name="exam_date" class="form-control" id="exam_date"
                                            placeholder="Enter Exam Date" required
                                            min="@php echo date('Y-m-d'); @endphp">
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_time">Exam Time</label>
                                        <input type="time" name="exam_time" class="form-control" id="exam_time"
                                            placeholder="Enter Exam Date" required
                                            min="@php echo date('Y-m-d'); @endphp">
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_attempt">Attempt</label>
                                        <input type="number" name="exam_attempt" class="form-control" id="exam_attempt"
                                            placeholder="Enter Exam Attempt" required min="1">
                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>
            <!-- /.modal -->

            {{-- Edit Model --}}
            <div class="modal fade" id="editModel">
                <div class="modal-dialog modal-md">
                    <form method="post" id="editExam">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                <h4 class="modal-title">Update Exam</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <input type="hidden" name="exam_id" id="exam_id">
                                    <div class="form-group">
                                        <label for="exam_name">Exam Name</label>
                                        <input type="text" name="exam_name" class="form-control" id="edit_exam_name"
                                            placeholder="Enter Exam Name" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="subject_id">Subject</label>
                                        <select class="custom-select" name="subject_id" id="edit_subject_id">
                                            <option disabled selected>Select Subject</option>
                                            @foreach ($subjects as $items)
                                            <option value="{{ $items->id }}">{{ $items->subject_name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_date">Exam Date</label>
                                        <input type="date" name="exam_date" class="form-control" id="edit_exam_date"
                                            placeholder="Enter Exam Date" required
                                            min="@php echo date('Y-m-d'); @endphp">
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_time">Exam Time</label>
                                        <input type="time" name="exam_time" class="form-control" id="edit_exam_time"
                                            placeholder="Enter Exam Date" required>
                                    </div>

                                    <div class="form-group">
                                        <label for="exam_attempt">Attempt</label>
                                        <input type="number" name="exam_attempt" class="form-control"
                                            id="edit_exam_attempt" placeholder="Enter Exam Attempt" required min="1">
                                    </div>


                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>


            {{-- Delete Model --}}
            <div class="modal fade" id="deleteModel">
                <div class="modal-dialog modal-md">
                    <form method="post" id="deleteSubjects">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h4 class="modal-title">Edit Subject</h4> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <label for="subject">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="edit_subject"
                                            placeholder="Enter Subject" required> --}}

                                        <h3 style="text-align: center">Are You Sure !! <br> Do You want to delete this
                                            recored</h3>

                                        <input type="hidden" name="delete_id" id="delete_id">
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



            {{-- Show Question Model --}}
            <div class="modal fade" id="showQuestionModel">
                <div class="modal-dialog modal-md">
                    <form method="post" id="showQuestionForm">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h4 class="modal-title">Edit Subject</h4> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <label for="subject">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="edit_subject"
                                            placeholder="Enter Subject" required> --}}

                                        {{-- <h3 style="text-align: center">Are You Sure !! <br> Do You want to delete
                                            this recored</h3> --}}

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Id</th>
                                                    <th>Question</th>
                                                    <th>Delete</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showQuestionData">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Submit</button>
                            </div>
                        </div>
                    </form>
                    <!-- /.modal-content -->
                </div>
                <!-- /.modal-dialog -->
            </div>

            {{-- Add Question Model --}}
            <div class="modal fade" id="addQuestionModel">
                <div class="modal-dialog modal-md">
                    <form method="post" id="addQuestionForm">
                        @csrf
                        <div class="modal-content">
                            <div class="modal-header">
                                {{-- <h4 class="modal-title">Edit Subject</h4> --}}
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">
                                        {{-- <label for="subject">Subject</label>
                                        <input type="text" name="subject" class="form-control" id="edit_subject"
                                            placeholder="Enter Subject" required> --}}

                                        {{-- <h3 style="text-align: center">Are You Sure !! <br> Do You want to delete
                                            this recored</h3> --}}

                                        <input type="hidden" name="exam_id" id="add_exam_id">
                                        <label for="search">Search</label>
                                        <input type="search" name="search" id="search" onkeyup="searchTable()"
                                            class="form-control"><br>

                                        <table class="table table-bordered table-hover" id="questionTable">
                                            <thead>
                                                <tr>
                                                    <th>Select</th>
                                                    <th>Question</th>
                                                </tr>
                                            </thead>
                                            <tbody id="showAnsData">


                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger">Submit</button>
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
                        <h3 class="card-title">Exam All List</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Exam Name</th>
                                    <th>Subject</th>
                                    <th>Date</th>
                                    <th>Time</th>
                                    <th>Add Question</th>
                                    <th>Show Answer</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($data as $item)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $item->exam_name }}</td>
                                    <td>{{ $item->subject->subject_name }}</td>
                                    <td>{{ $item->date }}</td>
                                    <td>{{ $item->time }}</td>
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                            class="btn btn-sm btn-primary add_question" data-toggle="modal"
                                            data-target="#addQuestionModel">Add Question </a>
                                    </td>
                                    <td>
                                        <a href="javascript:void(0)" data-id="{{ $item->id }}"
                                            class="btn btn-sm btn-primary show_question" data-toggle="modal"
                                            data-target="#showQuestionModel">Show Question </a>
                                    </td>
                                    <td>
                                        <button type="button" class="btn btn-block btn-primary btn-sm editButton"
                                            data-id="{{ $item->id }}" data-toggle="modal"
                                            data-target="#editModel">Edit</button>
                                        <button type="button" class="btn btn-block btn-danger btn-sm deleteButton"
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
    $(document).ready(function () {


        $(".show_question").click(function(){
            var id = $(this).attr('data-id');

            $.ajax({
                type: "GET",
                url: "{{route('admin.getExamQuestion')}}",
                data: {id:id},
                success: function (response) {
                    if(response.success == true){
                        var html = '';
                        var qustions = response.data;
                        if(qustions.length > 0){
                            // alert(qustions.length);
                            for(let i=0; i<qustions.length; i++){
                            console.log(qustions);
                            html += `<tr>
                                <td>`+(i+1)+`</td>
                                    <td>`+qustions[i]['question'][0]['question']+`</td>
                                    <td><button type="button" class="btn btn-block btn-warning btn-sm deleteQuestion" data-id="`+qustions[i]['id']+`">Delete</button></td>
                                </tr>`; 
                        }
                    }else{
                        html += `<tr>
                                    <td colspan="1">Question Not Found</td>
                                </tr>`;
                    }

                    $('#showQuestionData').html(html);

                   } 
                }
            });
        });

        $(document).on('click', '.deleteQuestion', function(){

            var id = $(this).attr('data-id');
            var obj = $(this);

            $.ajax({
                type: "GET",
                url: "{{route('admin.deleteExamQuestion')}}",
                data: {id:id},
                success: function (response) {
                    if(response.success == true){
                        obj.parent().parent().fadeOut();
                    }else{

                    }
                }
            });
        });

        $("#addExam").submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.addExam') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.success == true) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });

        $(".editButton").click(function () {
            var id = $(this).attr('data-id');
            $("#exam_id").val(id);

            var url = "{{ route('admin.getDetails', 'id') }}",
                url = url.replace('id', id);
            $.ajax({
                type: "GET",
                url: url,
                success: function (data) {
                    // console.log(data);
                    if (data.success == true) {
                        var exam = data.msg;
                        console.log(exam.exam_name);
                        $("#edit_subject_id").val(exam.subject_id);
                        $("#edit_exam_name").val(exam.exam_name);
                        $("#edit_exam_date").val(exam.date);
                        $("#edit_exam_time").val(exam.time);
                        $("#edit_exam_attempt").val(exam.attempt);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });

        $(".add_question").click(function () {
            var id = $(this).attr('data-id');
            $("#add_exam_id").val(id);

            var url = "{{ route('admin.getQuestion', 'id') }}",
                url = url.replace('id', id);

            $.ajax({
                type: "get",
                url: "{{route('admin.getQuestion')}}",
                data: { exam_id: id },
                success: function (data) {
                    console.log(data);

                    if (data.success == true) {
                        var qustions = data.data;
                        // console.log(qustions);
                        var html = "";
                        if (qustions.length > 0) {

                            for (let i = 0; i < qustions.length; i++) {
                                html += `<tr>
                                            <td><input type="checkbox" value="`+ qustions[i]['id'] + `" name="qustions_ids[]"></td>
                                            <td>`+ qustions[i]['question'] + `</td>
                                        </tr>`;
                            }
                        } else {
                            html += `<tr>
                                            <td colspan="2">Question Not Found</td>
                                        </tr>`;
                        }

                        $("#showAnsData").html(html);
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });

        $("#addQuestionForm").submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.addQuestion') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.success == true) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });


        $("#editExam").submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.updateexam') }}",
                type: "POST",
                data: formData,
                success: function (data) {
                    console.log(data);
                    if (data.success == true) {
                        location.reload();
                    } else {
                        alert(data.msg);
                    }
                }
            });
        });


        $(".deleteButton").click(function () {
            var delete_id = $(this).attr('data-id');

            $("#delete_id").val(delete_id);
        });


        $("#deleteSubjects").submit(function (e) {
            e.preventDefault();

            var formData = $(this).serialize();
            $.ajax({
                url: "{{ route('admin.deleteExam') }}",
                type: "POST",
                data: formData,
                success: function (data) {
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

<script>
    function searchTable() {
        var input, filter, table, tr, td, i, textValue;

        input = document.getElementById('search');
        filter = input.value.toUpperCase();

        table = document.getElementById('questionTable');
        tr = table.getElementsByTagName('tr');

        for(i=0; i<= tr.length; i++){
            td = tr[i].getElementsByTagName("td")[1];
            if(td){
                textValue = td.textContent || td.innerText;
                // console.log(textValue);
                if(textValue.toUpperCase().indexOf(filter) > -1){
                    tr[i].style.display = "";
                }else{
                    tr[i].style.display = "none";
                }
            }
        }

    }
</script>
@endsection