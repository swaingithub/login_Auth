<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<body>
  <div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4" style="margin-top:20px;">
            <h4>Login</h4>
            <hr>
            <form action="{{route('login-user')}}" method="post">
                 @if(Session::has('success'))
                <div class="alert alert-success">{{Session::get('success')}}</div>
                @endIf
                 @if(Session::has('fail'))
                <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endIf
                @csrf
                 <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" class="form-control", placeholder="Enter Email" name="email" value="{{old('email')}}">
                    <span class="text-danger">@error('email') {{$message}} @enderror</span>

                </div>
                 <div class="form-group">
                    <label for="password">password:</label>
                    <input type="password" class="form-control", placeholder="Enter password" name="password" value="{{old('passwoed')}}">
                    <span class="text-danger">@error('password') {{$message}} @enderror</span>

                </div>
                    <button class="btn btn-block btn-primary mt-2" type="submit">Login</button>
                    <br>
                   <a href="registration">New User !! Register here</a>

            </form>
        </div>
    </div>
  </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</html>
