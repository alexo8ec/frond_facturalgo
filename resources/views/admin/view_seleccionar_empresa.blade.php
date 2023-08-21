<div class="wrapper wrapper-content">
    <div class="row">
        @if (config('data.companies') != '' && count(config('data.companies')) > 0)
        @php
        $colores = array('0' => 'default', '1' => 'primary', '2' => 'success', '3' => 'info', '4' => 'warning', '5' => 'danger', '6' => 'link');
        @endphp
        @foreach (config('data.companies') as $company)
        @php
        $d = rand(0, 6);
        $estado = '<h1 class="no-margins text-info">Activado</h1>';
        $verificado = '<div class="stat-percent font-bold text-success">&nbsp;</div>';
        @endphp
        @if ($company->status_company == 0)
        @php
        $estado = '<h1 class="no-margins text-danger">Desactivado</h1>';
        @endphp
        @endif
        @if ($company->verificate_company == 1)
        @php
        $verificado = '<small><img src="public/img/verificado.png" style="width:32px;height:32px;" title="Verificado" /></small>';
        @endphp
        @endif
        <div class="col-lg-3">
            <div class="ibox ">
                <a href="javascript:;" onclick="selectCompany('{{$company->id}}');">
                    <div class="ibox-title">
                        <div class="ibox-tools">
                            <span class="label label-{{$colores[$d]}} . ' float-right">{{$company->id}}</span>
                        </div>
                        <h5>{{$company->short_name_company}}</h5>
                    </div>
                    <div class="ibox-content">
                        <h1 class="no-margins"><?= $estado; ?></h1>
                        <div class="stat-percent font-bold text-success"><?= $verificado; ?></div>
                        <small>{{$company->tradename_company}}</small>
                    </div>
                </a>
            </div>
        </div>
        @endforeach
        @endif
    </div>
</div>