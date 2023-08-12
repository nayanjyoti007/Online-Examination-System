@extends('layouts.layouts-common')
@section('space-work')
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header text-center">
                <a href="javascript:void(0)" class="h1"><b>Student Register </b></a>
            </div>
            <div class="card-body">
                

                @if (Session::has('success'))
                <div class="alert alert-success alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h5><i class="icon fas fa-check"></i> Alert!</h5>
                  {{ Session::get('success') }}
                </div>

                @endif

                <form action="{{ route('register.submit') }}" method="post">
                    @csrf
                    <div class="input-group mb-3">
                        <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Full name">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('name'))
                        <span style="color: red">{{ $errors->first('name') }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('email'))
                        <span style="color: red">{{ $errors->first('email') }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password'))
                        <span style="color: red">{{ $errors->first('password') }}</span>
                    @enderror

                    <div class="input-group mb-3">
                        <input type="password" class="form-control" name="password_confirmation"
                            placeholder="Retype password">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    @if ($errors->has('password_confirmation'))
                        <span style="color: red">{{ $errors->first('password_confirmation') }}</span>
                    @enderror
                    <div class="row">
                        <!-- /.col -->
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Register</button>
                        </div>
                        <!-- /.col -->
                    </div>
</form><br>

<a href="{{route('login')}}" class="text-center">I already have a membership</a>
</div>
<!-- /.form-box -->
</div><!-- /.card -->
</div>
<!-- /.register-box -->
@endsection
