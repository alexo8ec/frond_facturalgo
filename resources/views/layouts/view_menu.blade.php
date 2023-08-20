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
            <li class="active">
                <a href="{{url('/')}}"><i class="fa fa-home"></i> <span class="nav-label">Inicio</span></a>
            </li>
            <?php
            if (session('idEmpresa') != '') {
                if (config('data.moduls') != '' && count(config('data.moduls')) > 0) {
                    $menu = '';
                    foreach (config('data.moduls') as $modul) {
                        $menu .= '<li>
                        <a href="javascript:;"><i class="' . $modul->modul->icon_modul . '"></i> <span class="nav-label">' . $modul->modul->name_modul . '</span><span class="fa arrow"></span></a>';
                        if (count($modul->modul->submoduls) > 0) {
                            $menu .= '<ul class="nav nav-second-level collapse">';
                            foreach ($modul->modul->submoduls as $sub) {
                                $menu .= '<li><a href="graph_flot.html">' . $sub->name_submodul . '</a></li>';
                            }
                            $menu .= '</ul>';
                        }
                        $menu .= '</li>';
                    }
                    echo $menu;
                }
            }
            ?>
        </ul>
    </div>
</nav>