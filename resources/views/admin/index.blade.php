<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ADMIN | Login</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css" />
    <link rel="stylesheet" href="font/font-awesome-4.7.0/css/font-awesome.css">
    <link rel="stylesheet" href="../css/style.css">
</head>

<body>
    <div id="wrapper-admin" class="body-content">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-4 col-md-4">
                    <img class="logo" src="images/news.jpg">
                    <h3 class="heading">Admin</h3>
                    <!-- Form Start -->
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    <form action="{{ route('admin.loginsubmit') }}" method="POST">
                        @csrf

                        <div class="form-group">
                            <label>Username</label>
                            <input type="text" name="username" class="form-control" placeholder=""
                                value="{{ old('username') }}">
                            @error('username')
                                <div class="text-red-500">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" name="password" class="form-control" placeholder="">
                            @error('password')
                                <div class="text-red-500">{{ $message }}div
                                @enderror
                            </div>
                            <input type="submit" name="login" class="btn btn-primary" value="login" />
                    </form>
                    <!-- /Form  End -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
