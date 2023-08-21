<nav class="navbar-default navbar-static-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav metismenu" id="side-menu">
            <li class="nav-header">
                <div class="dropdown profile-element">
                    <img alt="image" class="rounded-circle" src="{{url('public/img/profile_small.jpg')}}" />
                    <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                        <span class="block m-t-xs font-bold">{{config('data.user')->name_user.' '.config('data.user')->last_name_user}}</span>
                        <span class="text-muted text-xs block">Art Director <b class="caret"></b></span>
                    </a>
                    <ul class="dropdown-menu animated fadeInRight m-t-xs">
                        <li><a class="dropdown-item" href="profile.html">Profile</a></li>
                        <li><a class="dropdown-item" href="contacts.html">Contacts</a></li>
                        <li><a class="dropdown-item" href="mailbox.html">Mailbox</a></li>
                        <li class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                    </ul>
                </div>
                <div class="logo-element">
                    FA
                </div>
            </li>
            @if (session('idEmpresa') != '')
            <li class="{{config('data.submodulo')!=''?active:''}}">
                <a href="{{url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>
            @if (config('data.modules') != '' && count(config('data.modules')) > 0)
            @foreach (config('data.modules') as $module)
            <li><a href="javascript:;"><i class="{{$module->module->icon_module}}"></i> <span class="nav-label">{{$module->module->name_module}}</span><span class="fa arrow"></span></a>
                @if (isset($module->module->submodules) && count($module->module->submodules) > 0)
                <ul class="nav nav-second-level collapse">
                    @foreach ($module->module->submodules as $sub)
                    <li><a href="graph_flot.html">{{$sub->name_submodule}}</a></li>
                    @endforeach
                </ul>
                @endif
            </li>
            @endforeach
            @endif
            @endif
        </ul>
    </div>
</nav>