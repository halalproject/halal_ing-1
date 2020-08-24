@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

@php
$l_cari=isset($_REQUEST["l_cari"])?$_REQUEST["l_cari"]:"";
$lj_tanya=isset($_REQUEST["lj_tanya"])?$_REQUEST["lj_tanya"]:"";
$lj_dewan=isset($_REQUEST["lj_dewan"])?$_REQUEST["lj_dewan"]:"";
$ljid_sidang=isset($_REQUEST["ljid_sidang"])?$_REQUEST["ljid_sidang"]:"";
$lj_kategori=isset($_REQUEST["lj_kategori"])?$_REQUEST["lj_kategori"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">

            <div class="box-body">
        	<input type="hidden" name="soalan_id" value="" />
            <div class="x_panel">
			<header class="panel-heading"  style="background: -webkit-linear-gradient(top, #b0c4de 43%,#ffffff 100%);">
                <div class="panel-actions">
                <!--<a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>-->
                </div>
                <h6 class="panel-title"><font color="#000000"><b>SENARAI MAKLUMAT DAFTAR SOALAN</b></font></h6> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-2">
                        <select name="status" id="status" onchange="do_page()" class="form-control">
                            <option value="">Status Sijil Halal</option>
                            <option value="">Ada</option>
                            <option value="">Tiada</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <select name="kategori" id="kategori" onchange="do_page()" class="form-control">
                            <option value="">Kategori Bahan</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                    	<input type="text" class="form-control" id="carian" name="carian" value="" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-1" align="right">
                        <button type="button" class="btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
                    </div>
                    <div class="col-md-5" align="right">
                        <a href="/client/daftar/create" data-toggle="modal" data-target="#myModal" title="Tambah Permohonan Ramuan" class="fa" data-backdrop="static">
                            <button type="button" class="mb-xs mt-xs mr-xs btn btn-primary">
                        	<i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
				        </a>
			        </div>
                </div>       
            </div>
            <div align="right" style="padding-right:10px"><b>{{ $permohonan->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr style="background: -webkit-linear-gradient(top, #b0c4de 43%,#ffffff 100%);">
                        <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                        <th width="20%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                        <th width="30%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                        <th width="15%"><font color="#000000"><div align="left">Kategori</div></font></th>
                        <th width="15%"><font color="#000000"><div align="left">Tarikh Permohonan</div></font></th>
                        <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
                        <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                    </tr>
                </thead>
                <tbody>
                @php $bil = $permohonan->perPage()*($permohonan->currentPage()-1) @endphp
                @foreach($permohonan as $mohon)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="center">{{ $mohon->ing_kod }}</td>
                        <td valign="top" align="left">
                            {{ $mohon->nama_ramuan }}
                            <br>
                            ({{ $mohon->nama_saintifik }})
                        </td>
                        <td valign="top" align="left">{{ $mohon->sumber->nama }}</td>
                        <td valign="top" align="center">{{ date('d/m/Y', strtotime($mohon->create_dt)) }}</td>
                        <td valign="top" align="center">
                        @if($mohon->status == 0)
                        <span class="label label-default">Draft</span>
                        @elseif($mohon->status == 1)
                        <span class="label label-success">Hantar</span>
                        @endif
                        </td>
                        <td align="center">
                            <a href="/client/daftar/edit/{{$mohon->id}}" data-toggle="modal" data-target="#myModal" title="Tambah Permohonan Ramuan" class="fa" data-backdrop="static">
                                <i class="fa fa-pencil-square-o fa-lg"></i>
                            </a>
                            &nbsp;
                            <a href="/client/daftar/delete/{{$mohon->id}}" data-toggle="modal" data-target="#myModal" title="Hapus Permohonan Ramuan" class="fa" data-backdrop="static">
                                <i class="fa fa-trash-o fa-lg"></i>
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
            </div>
		</div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection