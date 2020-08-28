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
                <h6 class="panel-title"><font color="#000000"><b>SENARAI PENGUMUMAN</b></font></h6> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-4">
                    	<input type="text" class="form-control" id="l_cari" name="l_cari" value="" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-1">
                        <button type="button" class="btn btn-success" onclick="">
                        	<i class="fa fa-search"></i> Carian</button>
                    </div>
                    <div class="col-md-7" align="right">
                        <a href="/client/permohonan/create" data-toggle="modal" data-target="#myModal" title="Tambah Permohonan Ramuan" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-primary">
                            <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
                        </a>
                    </div>
                </div>    
            </div>
            <br>
            <br>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                  <th width="10%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">Nama Syarikat</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">Sijil Halal</font></th>
                  <th width="15%"><font color="#000000"><div align="left">Tarikh Permohonan</div></font></th>
                  <th width="5%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Ayam</td>
                        <td>Ayamas Sdn. Bhd.</td>
                        <td>Ada
                        <br>
                        <small class="text-muted">(Tarikh Tamat: 28/8/2020)</small>
                        </td>
                        <td>12/12/2020</td>
                        <td>
                        </td>
                    </tr>

                    <tr>
                        <td>1</td>
                        <td>Ayam</td>
                        <td>Ayamas Sdn. Bhd.</td>
                        <td>Tiada</td>
                        <td>28/8/2020</td>
                        <td>
                        </td>
                    </tr>

                    
                </tbody>
              </table>
            </div>
		</div>
     </div>
  <!--</div>-->    
<!-- DataTables -->

@endsection