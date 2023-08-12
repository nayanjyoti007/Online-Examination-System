@extends('admin.admin_layout')
@section('title', 'Question & Answer')
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
                        <li class="breadcrumb-item"><a href="#">Question & Answer</a></li>
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
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#questionAnswerAdd">
                        Add Question & Answer
                    </button>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#importExcel">
                       Import Excel
                    </button>
                </div>

                <div class="modal fade" id="questionAnswerAdd">
                    <div class="modal-dialog modal-md">
                        <form id="addQuestionAnswer">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add Question & Answer</h4>
                                    <button type="submit" id="addAnswer" class="btn btn-warning btn-sm"
                                        style="
                                    margin-left: 10px;
                                    margin-top: 4px;
                                ">Add
                                        Answers</button>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="question">Question Name</label>
                                            <input type="text" name="question" class="form-control" id="question"
                                                placeholder="Enter Question" required>
                                        </div>

                                        <div class="answerBoxs">

                                        </div>



                                    </div>

                                    <div>
                                        <span class="error text-danger"></span>
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




                <div class="modal fade" id="showAnswerModel">
                    <div class="modal-dialog modal-lg">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="card-body">
                                    <div class="form-group">

                                        <table class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Answer</th>
                                                    <th>Is Correct</th>
                                                </tr>
                                            </thead>
                                            <tbody class="showAnsData">


                                            </tbody>
                                        </table>

                                        <input type="hidden" name="question_id" id="question_id">
                                    </div>
                                </div>
                                <!-- /.card-body -->
                            </div>
                        </div>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>




                <div class="modal fade" id="questionAnswerEdit">
                    <div class="modal-dialog modal-md">
                        <form id="editQuestionAnswer">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Edit Question & Answer</h4>
                                    <input type="hidden" name="edit_question_id" id="edit_question_id">
                                    <button type="submit" id="addEditAnswer" class="btn btn-warning btn-sm"
                                        style="
                                    margin-left: 10px;
                                    margin-top: 4px;
                                ">Add
                                        Answers</button>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="question">Question Name</label>
                                            <input type="text" name="edit_question" class="form-control"
                                                id="edit_question" placeholder="Enter Question" required>
                                        </div>

                                        <div class="EditanswerBoxs">

                                        </div>



                                    </div>

                                    <div>
                                        <span class="edit_error text-danger"></span>
                                    </div>
                                    <!-- /.card-body -->
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Update changes</button>
                                </div>
                            </div>
                        </form>
                        <!-- /.modal-content -->
                    </div>
                    <!-- /.modal-dialog -->
                </div>


                <div class="modal fade" id="questionAnswerDelete">
                    <div class="modal-dialog modal-md">
                        <form id="deleteQuestion">
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

                <div class="modal fade" id="importExcel">
                    <div class="modal-dialog modal-md">
                        <form id="importExcelData" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Import File </h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="file">File </label>
                                        <input type="file" name="file" class="form-control" id="fileupload"
                                            placeholder="Enter File" required accept=".csv,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms.excel">

                                           

                                            {{-- <input type="hidden" name="delete_id" id="delete_id"> --}}
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
            <!-- Table -->
            <div class="row my-5">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Question & Answers All List</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Question</th>
                                        <th>Answer</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->question }}</td>
                                            <td>
                                                <button type="button"
                                                    class="btn btn-block btn-success btn-sm showaansButton"
                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#showAnswerModel">Show Answer</button>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-block btn-primary btn-sm editButton"
                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#questionAnswerEdit">Edit</button>

                                                <button type="button"
                                                    class="btn btn-block btn-danger btn-sm deleteButton"
                                                    data-id="{{ $item->id }}" data-toggle="modal"
                                                    data-target="#questionAnswerDelete">Delete</button>

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

            $("#addQuestionAnswer").submit(function(e) {
                e.preventDefault();
                if ($(".answers").length < 2) {
                    $(".error").text('Please Enter Minimum 2 Answers');
                    setTimeout(() => {
                        $(".error").text('');
                    }, 2000);
                } else {
                    var checkIsCurrect = false;
                    for (let i = 0; i < $(".is_correct").length; i++) {
                        if ($(".is_correct:eq(" + i + ")").prop('checked') == true) {
                            checkIsCurrect = true;
                            $(".is_correct:eq(" + i + ")").val($(".is_correct:eq(" + i + ")").next()
                                .closest('input').val());
                        }
                    }

                    if (checkIsCurrect) {
                        var formData = $(this).serialize();
                        $.ajax({
                            url: "{{ route('admin.addQnA') }}",
                            type: 'POST',
                            data: formData,
                            success: function(data) {
                                if (data.success == true) {
                                    location.reload();
                                } else {
                                    alert(data.message);
                                }
                            }
                        });
                    } else {
                        $(".error").text('Please Select Any One Corrent Answer');
                        setTimeout(() => {
                            $(".error").text('');
                        }, 2000);
                    }
                }

            });


            $("#addAnswer").click(function(e) {
                e.preventDefault();

                if ($(".answers").length >= 6) {
                    $(".error").text('You Can Add Only 6 Answers');
                    setTimeout(() => {
                        $(".error").text('');
                    }, 2000);
                } else {
                    var html = `<div class="container answers">
                <div class="row mb-2">
                <div class="col-1" style="margin-top: 7px;">
            </div>
                  <div class="col-9">
                    <input class="form-check-input is_correct" type="radio" name="is_correct" style="margin-top: 15px;">
                    <input type="text" class="form-control" placeholder="Enter Answer" name="answers[]" required>
                  </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-sm remove" style="
                                    margin-left: 10px;
                                    margin-top: 4px;
                                ">Remove</button>
                  </div>
                </div></div>`;

                    $(".answerBoxs").append(html);
                }


            });

            $(document).on('click', '.remove', function(e) {
                e.preventDefault();
                alert('Are You Sure');
                $(this).closest('.container').remove();
            })




            $("#addEditAnswer").click(function(e) {
                e.preventDefault();

                if ($(".editanswers").length >= 6) {
                    $(".edit_error").text('You Can Add Only 6 Answers');
                    setTimeout(() => {
                        $(".edit_error").text('');
                    }, 2000);
                } else {
                    var html = `<div class="container editanswers">
                <div class="row mb-2">
                <div class="col-1" style="margin-top: 7px;">
            </div>
                  <div class="col-9">
                    <input class="form-check-input edit_is_correct" type="radio" name="edit_is_correct" style="margin-top: 15px;">
                    <input type="text" class="form-control" placeholder="Enter Answer" name="new_answers[]" required>
                  </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-sm editremove" style="
                                    margin-left: 10px;
                                    margin-top: 4px;
                                ">Remove</button>
                  </div>
                </div></div>`;

                    $(".EditanswerBoxs").append(html);
                }


            });

            $(document).on('click', '.editremove', function(e) {
                e.preventDefault();
                alert('Are You Sure');
                $(this).closest('.container').remove();
            })


            $(".editButton").click(function(e) {
                e.preventDefault();
                var qid = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('admin.QnADetails') }}",
                    type: "GET",
                    data: {
                        qid: qid
                    },
                    success: function(data) {
                        console.log(data);

                        var qna = data.data[0];
                        $("#edit_question_id").val(qna['id']);
                        $("#edit_question").val(qna['question']);
                        var html = "";

                        for (let i = 0; i < qna['answers'].length; i++) {
                            var checked = '';
                            if (qna['answers'][i]['is_correct'] == 1) {
                                checked = 'checked';
                            }

                            html +=
                                `<div class="container editanswers">
                <div class="row mb-2">
                <div class="col-1" style="margin-top: 7px;">
            </div>
                  <div class="col-9">
                    <input class="form-check-input edit_is_correct" type="radio" name="edit_is_correct" style="margin-top: 15px;" ` +
                                checked + `>
                    <input type="text" class="form-control" placeholder="Enter Answer" name="answers[` + qna['answers']
                                [i]['id'] + `]" value="` + qna['answers'][i]['answer'] + `" required>
                  </div>
                  <div class="col-2">
                    <button type="submit" class="btn btn-danger btn-sm editremove deleteAnswer" style="
                                    margin-left: 10px;
                                    margin-top: 4px;
                                " data-id="` + qna['answers'][i]['id'] + `">Remove</button>
                  </div>
                </div></div>`
                        }

                        $(".EditanswerBoxs").html(html);

                    }
                });
            });


            $(document).on('click', '.deleteAnswer', function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');

                $.ajax({
                    url: "{{ route('admin.ansDelete') }}",
                    type: "GET",
                    data: {
                        id: id
                    },
                    success: function(data) {
                        if (data.success == true) {
                            console.log(data.msg);
                        } else {
                            console.log(data.msg);
                        }
                    }
                });
            });

            $("#editQuestionAnswer").submit(function(e) {
                e.preventDefault();
                if ($(".editanswers").length < 2) {
                    $(".edit_error").text('Please Enter Minimum 2 Answers');
                    setTimeout(() => {
                        $(".edit_error").text('');
                    }, 2000);
                } else {
                    var checkIsCurrect = false;
                    for (let i = 0; i < $(".edit_is_correct").length; i++) {
                        if ($(".edit_is_correct:eq(" + i + ")").prop('checked') == true) {
                            checkIsCurrect = true;
                            $(".edit_is_correct:eq(" + i + ")").val($(".edit_is_correct:eq(" + i + ")")
                                .next()
                                .closest('input').val());
                        }
                    }

                    if (checkIsCurrect) {
                        var formData = $(this).serialize();
                        $.ajax({
                            url: "{{ route('admin.updateQna') }}",
                            type: 'POST',
                            data: formData,
                            success: function(data) {
                                console.log(data);
                                if (data.success == true) {
                                    location.reload();
                                } else {
                                    alert(data.message);
                                }
                            }
                        });
                    } else {
                        $(".edit_error").text('Please Select Any One Corrent Answer');
                        setTimeout(() => {
                            $(".edit_error").text('');
                        }, 2000);
                    }
                }

            });



            $(".showaansButton").click(function() {
                var data = @json($data);
                console.log(data);
                var qid = $(this).attr('data-id');
                $("#question_id").val(qid);
                var html = '';
                for (let i = 0; i < data.length; i++) {
                    if (qid == data[i].id) {
                        var answerlenght = data[i].answers.length;
                        //    console.log(data[i].answers);
                        for (j = 0; j < answerlenght; j++) {
                            let is_correct = 'No';

                            if (data[i]['answers'][j]['is_correct'] == 1) {
                                is_correct = 'Yes';
                            }

                            html += `
                                             <tr>
                                                        <td>` + (j + 1) + `</td>
                                                        <td>` + (data[i]['answers'][j]['answer']) + `</td>
                                                        <td>` + is_correct + `</td>
                                                    </tr>

                        `;
                        }
                        break;
                    }
                }

                $(".showAnsData").html(html);

            });


            $(".deleteButton").click(function(e) {
                e.preventDefault();
                var id = $(this).attr('data-id');
                $("#delete_id").val(id);
            });

            $("#deleteQuestion").submit(function(e) {
                e.preventDefault();
                var formData = $(this).serialize();

                $.ajax({
                    url: "{{ route('admin.deleteQna') }}",
                    type: 'POST',
                    data: formData,
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.message);
                        }
                    }
                });


            });

            $("#importExcelData").submit(function(e){
                e.preventDefault();

                let formData = new FormData();
                formData.append("file", fileupload.files[0]);

                $.ajaxSetup({
                    headers:{
                        "X-CSRF-TOKEN":"{{ csrf_token() }}" 
                    }
                });


                $.ajax({
                    url: "{{ route('admin.importQna') }}",
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        console.log(data);
                        if (data.success == true) {
                            location.reload();
                        } else {
                            alert(data.message);
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
