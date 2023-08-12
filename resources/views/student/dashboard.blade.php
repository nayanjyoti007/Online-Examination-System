@extends('student.student_layout')
@section('title', 'Dashboard')
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
          <li class="breadcrumb-item"><a href="#">Home</a></li>
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
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
          <div class="inner">
            <h3>150</h3>

            <p>New Orders</p>
          </div>
          <div class="icon">
            <i class="ion ion-bag"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-success">
          <div class="inner">
            <h3>53<sup style="font-size: 20px">%</sup></h3>

            <p>Bounce Rate</p>
          </div>
          <div class="icon">
            <i class="ion ion-stats-bars"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
          <div class="inner">
            <h3>44</h3>

            <p>User Registrations</p>
          </div>
          <div class="icon">
            <i class="ion ion-person-add"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
      <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-danger">
          <div class="inner">
            <h3>65</h3>

            <p>Unique Visitors</p>
          </div>
          <div class="icon">
            <i class="ion ion-pie-graph"></i>
          </div>
          <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
      </div>
      <!-- ./col -->
    </div>
    <!-- /.row -->
    <!-- Main row -->


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
                              <th>Total Attempt</th>
                              <th>Available Attempt</th>
                              <th>Cony Link</th>
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
                              <td>{{ $item->attempt }}</td>
                              <td>{{ $item->time }}</td>
                              <td><a href="javascript:void(0)" class="btn btn-sm btn-outline-info copy" data-code="{{$item->enterance_id}}">Copy</a></td>
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
  
    <!-- /.row (main row) -->
  </div><!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script>
  $(document).ready(function () {

    $(".copy").click(function(){
      $(this).parent().append(" <span class='copied_text'> Copied </span> ");

      let code = $(this).attr('data-code');
      let url = "{{URL::to('/')}}/exam/"+code;

      let tempInput = $("<input>");
      $("body").append(tempInput);
      tempInput.val(url).select();
      document.execCommand('copy');
      tempInput.remove();

      setTimeout(() => {
        $('.copied_text').remove();
      }, 2000);
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