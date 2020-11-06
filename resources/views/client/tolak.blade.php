@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var kategori = $('#kategori').val();
    var carian = $('#carian').val();
//   alert(sijil);
    var pathname = window.location.pathname;

    if(kategori.trim()=='' && carian.trim()==''){
    window.location = pathname;
    } else {
    window.location = pathname+'?&kategori='+kategori+'&carian='+carian;
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
                <h2 class="panel-title"><font color="#000000"><b>SENARAI PERMOHONAN DITOLAK</b></font></h2> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group">
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
            <div align="right" style="padding-right:10px"><b>{{ $permohonan->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                  <th width="30%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">Kategori</font></th>
                  <th width="15%"><font color="#000000"><div align="left">Tarikh Permohonan</font></th>
                  <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    @php $bil = $permohonan->perPage()*($permohonan->currentPage()-1) @endphp
                    @foreach($permohonan as $tolak)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">{{ $tolak->ing_kod }}</td>
                        <td valign="top" align="left">
                            {{ $tolak->nama_ramuan }}
                            <br>
                            ({{ $tolak->nama_saintifik }})
                        </td>
                        <td valign="top" align="left">{{ optional($tolak->sumber)->nama }}</td>
                        <td valign="top" align="center">{{ date('d/m/Y', strtotime($tolak->create_dt)) }}</td>
                        <td valign="top" align="center">
                            <span class="label label-danger">Ditolak</span>
                        </td>
                        <td align="center">
                            <a href="/client/tolak/view/{{ $tolak->id }}" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
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
          {!! $permohonan->appends(['sijil'=>$sijil,'kategori'=>$kategori,'carian'=>$carian])->render() !!}
        </div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection