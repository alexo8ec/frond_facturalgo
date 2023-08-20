<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/plugins/iCheck/custom.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="middle-box text-center loginscreen   animated fadeInDown">
        <div>
            <div>
                <h1 class="logo-name">FA</h1>
            </div>
            <h3>{{$info->name_info . ' V' . $info->version_info.'.'.$info->major_info}}</h3>
            <form class="m-t" role="form" action="{{url('/inicio/saveRegister')}}" method="post">
                @csrf
                <div class="form-group">
                    <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required="">
                </div>
                <div class="form-group">
                    <input type="text" id="name" name="name" class="form-control" placeholder="Nombre" required="">
                </div>
                <div class="form-group">
                    <input type="text" id="last_name" name="last_name" class="form-control" placeholder="Apellido" required="">
                </div>
                <div class="form-group">
                    <input type="email" id="email" name="email" class="form-control" placeholder="Email" required="">
                </div>
                <div class="form-group">
                    <div class="checkbox i-checks"><label> <input type="checkbox"><i></i> Terminos y políticas </label></div>
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b">Registrar</button>
                <p class="text-muted text-center"><small>Ya tengo una cuenta</small></p>
                <a class="btn btn-sm btn-white btn-block" href="{{url('/')}}">Login</a>
            </form>
            <?php
            if (session('message')) {
                $msn = explode('|', session('message'));
                echo '<br/><div class="alert alert-' . $msn[0] . ' text-center">
                            ' . $msn[1] . '
                        </div>';
            }
            ?>
            <p class="m-t">
                <small>{{$info->name_info}} v{{$info->version_info}}.{{$info->major_info}} creado con <i class="fa fa-heart fa-1x" style="color: red;"></i> by {{$info->author_info}} &copy; {{date('Y')}}</small>
            </p>
        </div>
    </div>
    <script src="{{asset('public/js/jquery-3.1.1.min.js')}}"></script>
    <script src="{{asset('public/js/popper.min.js')}}"></script>
    <script src="{{asset('public/js/bootstrap.js')}}"></script>
    <script src="{{asset('public/js/plugins/iCheck/icheck.min.js')}}"></script>
    <script>
        $(document).ready(function() {
            $('.i-checks').iCheck({
                checkboxClass: 'icheckbox_square-green',
                radioClass: 'iradio_square-green',
            });
        });
    </script>
</body>

</html>