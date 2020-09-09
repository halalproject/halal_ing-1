@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var sijil = $('#sijil').val();
    var kategori = $('#kategori').val();
    var carian = $('#carian').val();
//   alert(sijil);
    var pathname = window.location.pathname;

    if(sijil.trim()=='' && kategori.trim()=='' && carian.trim()==''){
    window.location = pathname;
    } else {
    window.location = pathname+'?sijil='+sijil+'&kategori='+kategori+'&carian='+carian;
    }
}
</script>
@php
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
$sijil=isset($_REQUEST["sijil"])?$_REQUEST["sijil"]:"";
$kategori=isset($_REQUEST["kategori"])?$_REQUEST["kategori"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">

            <div class="box-body">
        	<input type="hidden" name="soalan_id" value="" />
            <div class="x_panel">
			<header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <div class="panel-actions">
                <!--<a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>-->
                </div>
                <h6 class="panel-title"><font color="#000000"><b>AUDIT RAMUAN</b></font></h6> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-2">
                        <select name="sijil" id="sijil" onchange="do_page()" class="form-control">
                            <option value="">Status Sijil Halal</option>
                            <option value="1" @if($sijil == '1') selected @endif>Ada</option>
                            <option value="0" @if($sijil == '0') selected @endif>Tiada</option>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <select name="kategori" id="kategori" onchange="do_page()" class="form-control">
                            <option value="">Kategori Bahan</option>
                            @foreach ($cat as $cat)
                            <option value="{{$cat->id}}" @if($kategori == $cat->id) selected @endif>{{$cat->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-2" align="right">
                        <button type="button" class="btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
                    </div>
                </div>
            </div>
            <br>
            <div align="right" style="padding-right:10px"><b>{{ $list->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                  <th width="20%"><font color="#000000"><div align="left">Nama Syarikat</div></font></th>
                  <th width="8%"><font color="#000000"><div align="left">Sumber Bahan</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">Sijil Halal</font></th>
                  <th width="4%"><font color="#000000"><div align="center">Tarikh Permohonan</div></font></th>
                  <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    @php $bil = $list->perPage()*($list->currentPage()-1) @endphp
                    @foreach ($list as $rs)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">
                            {{ $rs->nama_ramuan }}
                            <br>
                            ({{ $rs->nama_saintifik }})
                        </td>
                        <td valign="top" align="left">
                            <u><b>{{ $rs->nama_pengilang }}</b></u>
                            <br>
                            {{ $rs->alamat_pengilang_1 }} {{ $rs->alamat_pengilang_2 }} {{ $rs->alamat_pengilang_3 }}
                        </td>
                        <td valign="top" align="left">{{ optional($rs->sumber)->nama }}</td>
                        <td valign="top" align="center">
                        @if ($rs->is_sijil == 0)
                            Tiada
                        @else
                            Ada
                        @endif
                        <br>                        
                        <small class="text-muted">
                            (Tarikh Tamat: @if ($rs->tarikh_tamat_sijil != '0000-00-00') {{ date('d/m/Y', strtotime($rs->tarikh_tamat_sijil)) }} @else ?? @endif )</small>
                        <br>
                        </td>
                        <td valign="top" align="center">
                            <p>{{ date('d/m/Y', strtotime($rs->create_dt)) }}</p>
                        </td>
                        <td align="center">
                            <a href="/admin/audit/detail/{{ $rs->id }}" data-toggle="modal" data-target="#myModal" title="Maklumat Permohonan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-text fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
		</div>
        <div align="center" class="d-flex justify-content-center">
            {!! $list->appends(['sijil'=>$sijil,'kategori'=>$kategori,'carian'=>$carian])->render() !!}
        </div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection