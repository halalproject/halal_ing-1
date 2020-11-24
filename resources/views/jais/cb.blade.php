@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

<script>
function do_page() {
    var carian = $('#carian').val();
    var negara = $('#negara').val();
    var status = $('#status').val();
    
    var pathname = window.location.pathname;

    if(carian.trim()=='' && negara.trim() == '' && status.trim() == ''){
        window.location = pathname;
    } else {
        window.location = pathname+'?negara='+negara+'&status='+status+'&carian='+carian;
    }
}

function do_sync() {
    $.ajax({
        url:'/jais/sijil_halal/sync',
        type:'GET',
        success: function(data){
            if(data == 'OK'){
                swal({
                    title: 'Berjaya',
                    text: 'Maklumat telah berjaya diproses',
                    type: 'success',
                    confirmButtonClass: "btn-success",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                }).then(function () {
                    reload = window.location; 
                    window.location = reload;
                });
            } else {
                swal({
                    title: 'Amaran',
                    text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya diproses.',
                    type: 'error',
                    confirmButtonClass: "btn-warning",
                    confirmButtonText: "Ok",
                    showConfirmButton: true,
                });
            }
        }
    });
}
</script>

@php 
    $negara=isset($_REQUEST["negara"])?$_REQUEST["negara"]:"";
    $status=isset($_REQUEST["status"])?$_REQUEST["status"]:"";
    $carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp

<div class="box" style="background-color:#F2F2F2">
    @csrf
    <div class="box-body">
        <input type="hidden" name="soalan_id" value="" />
        <div class="x_panel">
            <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <h2 class="panel-title"><font color="#000000"><b>SENARAI BADAN PERSIJILAN HALAL</b></font></h2> 
            </header>
        </div>
    </div> 

    <br />

    <div class="box-body">
        <div class="form-group">
            <div class="col-md-3">
                <select name="negara" id="negara" onchange="do_page()" class="form-control">
                    <option value="">-- Pilih Negara --</option>
                    @foreach ($rsn as $ng)
                    <option value="{{$ng->kod}}" @if($negara == $ng->kod) selected @endif>{{$ng->nama}}</option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-2">
                <select name="status" id="status" onchange="do_page()" class="form-control">
                    <option value="">-- Pilih Status --</option>
                    <option value="0" @if ($status == '0') selected @endif>Iktiraf</option>
                    <option value="1" @if ($status == '1') selected @endif>Tidak Iktiraf</option>
                </select>
            </div>

            <div class="col-md-6">
                <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-success" onclick="do_page()">
                    <i class="fa fa-search"></i> Carian</button>
            </div>
            
            <div class="col-md-2" align="right">
                <button type="button" class="btn btn-primary" onclick="do_sync()">
                    <i class=" fa fa-refresh"></i> <font style="font-family:Verdana, Geneva, sans-serif">Sync</font>
                </button>
            </div>
        </div>    
    </div>
    
    <div align="right" style="padding-right:10px"><b>{{ $cb->total() }} rekod dijumpai</b></div>
    <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
            <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
            <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
            <th width="30%"><font color="#000000"><div align="left">Nama Badan Persijilan</div></font></th>
            <th width="30%"><font color="#000000"><div align="left">Alamat Badan Persijilan</font></th>
            <th width="10%"><font color="#000000"><div align="center">Negara</div></font></th>
            <th width="10%"><font color="#000000"><div align="center">Status</div></font></th>
            <th width="10%"><font color="#000000"><div align="left">Tindakan</div></font></th>
            </tr>
            </thead>
            <tbody>
            @php $bil = $cb->perPage()*($cb->currentPage()-1) @endphp
            @foreach($cb as $item)
            <tr>
                <td valign="top" align="center">{{ ++$bil }}</td>
                <td valign="top" align="left">{{ $item->fldname }}</td>
                <td valign="top" align="left">
                    {{ $item->fldaddress1 }}<br>
                    {{ $item->fldaddress2 }}<br>
                    {{ $item->fldaddress3 }}<br>
                    {{ $item->fldposkod }}
                </td>
                <td valign="top" align="left">{{ optional($item->negara)->nama }}</td>
                <td valign="top" align="center">
                @if($item->fldstatus == 0)
                    Iktiraf
                @else
                    Tidak Iktiraf
                @endif
                </td>
                <td align="center">
                    <a href="/jais/sijil_halal/edit?id={{ $item->fldid }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Pengumuman" class="fa text-dark" data-backdrop="static">
                        <button type="button" class="btn btn-sm btn-warning">
                            <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                        </button>
                    </a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
        <div align="center" class="d-flex justify-content-center">
            {!! $cb->appends(['negara'=>$negara, 'status'=>$status,'carian'=>$carian])->render() !!}
        </div>
    </div>
</div>
@endsection