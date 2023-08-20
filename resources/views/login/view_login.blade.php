<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{$title}}</title>
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
</head>

<body class="gray-bg">
    <div class="loginColumns animated fadeInDown">
        <div class="row">
            <div class="col-md-6">
                <h2 class="font-bold">{{$info->name_info . ' V' . $info->version_info.'.'.$info->major_info}}</h2>
                <p>
                    {{$info->description_info}}
                </p>
                <p>
                    <a href="javascript:;"><i class="fa fa-info-circle"></i> Información</a>
                </p>
            </div>
            <div class="col-md-6">
                <div class="ibox-content">
                    <form class="m-t" role="form" action="{{url('/inicio/login')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <input type="text" id="user" name="user" class="form-control" placeholder="Usuario" required="">
                        </div>
                        <div class="form-group">
                            <input type="password" id="password" name="password" class="form-control" placeholder="Contraseña" required="">
                        </div>
                        <button type="submit" class="btn btn-primary block full-width m-b">Ingresar</button>
                        <a href="#">
                            <small>¿Olvido su contraseña?</small>
                        </a>
                        <p class="text-muted text-center">
                            <small>No tiene una cuenta?</small>
                        </p>
                        <a class="btn btn-sm btn-white btn-block" href="register.html">Crear cuenta</a>
                    </form>
                    <?php
                    if (session('message')) {
                        $msn = explode('|', session('message'));
                        echo '<div class="alert alert-' . $msn[0] . ' text-center">
                            ' . $msn[1] . '
                        </div>';
                    }
                    ?>
                    <p class="m-t">
                        <small>{{$info->name_info}} v{{$info->version_info}}.{{$info->major_info}} creado con <i class="fa fa-heart fa-1x" style="color: red;"></i> by {{$info->author_info}} &copy; {{date('Y')}}</small>
                    </p>
                </div>
            </div>
        </div>
        <hr />
        <div class="row">
            <div class="col-md-6">
                Copyright {{$info->author_info}}
            </div>
            <div class="col-md-6 text-right">
                <small>© 2004-{{date('Y')}}</small>
            </div>
        </div>
    </div>

</body>

</html>