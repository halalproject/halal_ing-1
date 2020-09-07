@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
		<div class="box" style="background-color:#F2F2F2">

            <div class="box-body">
        	<input type="hidden" name="soalan_id" value="" />
            <div class="x_panel">
			<header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <div class="panel-actions">
                <!--<a href="#" class="fa fa-caret-down"></a>
                <a href="#" class="fa fa-times"></a>-->
                </div>
                <h6 class="panel-title"><font color="#000000"><b>SENARAI PELANGGAN</b></font></h6> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                {{-- <div class="form-group">
                    <div class="col-md-3">
                        <select name="lj_kategori" onchange="" class="form-control">
                            <option value="">Sijil Halal</option>
                            <option value="">Ada</option>
                            <option value="">Tiada</option>
                        </select>
                    </div>
                    <div class="col-md-3" >
                        <select name="lj_status" onchange="" class="form-control">
                            <option value="">Kategori</option>
                            <option value="9">Belum Diagihkan</option>
                            <option value="1">Belum Dijawab</option>
                            <option value="2">Telah Dijawab</option>
                        </select>
                    </div>
                    <div class="col-md-4" style="0px">
                    	<input type="text" class="form-control" id="l_cari" name="l_cari" value="" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-2" align="right" style="padding-right:25px">
                        <button type="button" class="btn btn-success" 
                        	onclick="">
                        	<i class="fa fa-search"></i> Carian</button>
                    </div>
                </div>        --}}
            </div>
            <div align="right" style="padding-right:10px"><b>{{ $client->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                  <th width="20%"><font color="#000000"><div align="left">Nama Syarikat</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">Kategori</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">No. Syarikat</font></th>
                  <th width="10%"><font color="#000000"><div align="left">H/P</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">Emel</div></font></th>
                  <th width="20%"><font color="#000000"><div align="left">Alamat</div></font></th>
                  <th width="20%"><font color="#000000"><div align="left">Senarai Ramuan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    @php $bil = $client->perPage()*($client->currentPage()-1) @endphp
                    @foreach ($client as $rs)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">
                            <a href="/admin/syarikat/view/{{ $rs->id }}" data-toggle="modal" data-target="#myModal" title="Nama Syarikat" class="fa" data-backdrop="static">
                            {{ $rs->company_name }}
                        </td>
                        <td valign="top" align="left">{{ $rs->company_type }}</td>
                        <td valign="top" align="center">{{ $rs->company_reg_code }}</td>
                        <td valign="top" align="center">{{ $rs->company_tel }}</td>
                        <td valign="top" align="center">{{ $rs->company_email }}</td>
                        <td valign="top" align="left">
                            {{ $rs->company_address_1 }} {{ $rs->company_address_2 }} {{ $rs->company_address_3 }} {{ $rs->company_city }} {{ $rs->company_poscode }}
                        </td>
                        <td align="center">
                            <a href="/admin/syarikat/ramuan/{{ $rs->userid }}">
                                <button type="button" class="btn btn-primary">
                                    <i class="fa fa-list fa-lg" style="color: #FFFFFF;"></i>
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
            {!! $client->render() !!}
        </div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection