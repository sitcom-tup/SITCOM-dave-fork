<!DOCTYPE html>
<html lang="en">
<head>
    @include('headers')
</head>
<body>
    <div class="container" style="padding-top:10%">
        <div class="d-flex justify-content-center">
            <div class="card text-dark bg-light mb-3">
                <div class="card-header text-center">
                    Password Reset
                </div>
                <div class="card-body">
                    <div class="alert alert-dark" role="alert">
                        Email: {{$email}}
                    </div>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method='POST' action="{{ route('send_password') }}">
                        @csrf
                        <input type="hidden" class="form-control" name="email" value="{{$email}}">
                        <input type="hidden" class="form-control" name="confirmation" value="{{\Request::get('confirmation')}}">
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="New password" name="password">
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Confirm password" name="password_confirmation">
                        </div>
                        <button type="submit" class="btn btn-primary">Reset</button>
                    </form>
                </div>
                <div class="card-footer text-muted text-center">
                    <footer> <small>&copy; Copyright 2021, {{config('app.name')}}</small> </footer> 
                </div>
            </div>
        </div>
    </div>
</body>
</html>