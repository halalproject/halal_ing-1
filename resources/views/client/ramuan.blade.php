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
                <h6 class="panel-title"><font color="#000000"><b>SENARAI RAMUAN</b></font></h6> 
            </header>
			</div>
            </div>            
            <br />
            <div class="box-body">
                <div class="form-group">
                    <div class="col-md-3">
                        <select name="lj_kategori" onchange="" class="form-control">
                            <option value="">Status Sijil</option>
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
                </div>       
            </div>
            <br>
            <br>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                  <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                  <th width="17%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                  <th width="20%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                  <th width="15%"><font color="#000000"><div align="left">Kategori</font></th>
                  <th width="13%"><font color="#000000"><div align="left">Tarikh Permohonan</font></th>
                  <th width="13%"><font color="#000000"><div align="left">Tarikh Tamat Sijil</font></th>
                  <th width="15%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>HQ0012411123</td>
                        <td>Ayam</td>
                        <td>Semulajadi</td>
                        <td>20/8/2020</td>
                        <td>
                            <span class="label label-success">3 Bulan Lagi</span><br>
                            <p>20/10/2020</p>
                        </td>
                        <td align="center">
                            <a href="/client/proses/view/12" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-text fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <a href="/client/proses/edit/12" data-toggle="modal" data-target="#myModal" title="Kemaskini Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="do_hapus()">
                                <span style="cursor:pointer;color:red" title="Buang Ramuan">
                                    <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                </span>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>HQ0012411124</td>
                        <td>Kentang</td>
                        <td>Tumbuhan</td>
                        <td>21/8/2020</td>
                        <td>
                            <span class="label label-warning">1 Minggu Lagi</span><br>
                            <p>5/9/2020</p>
                        </td>
                        <td align="center">
                            <a href="/client/proses/view/12" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-text fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <a href="/client/proses/edit/12" data-toggle="modal" data-target="#myModal" title="Kemaskini Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="do_hapus()">
                                <span style="cursor:pointer;color:red" title="Buang Ramuan">
                                    <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                </span>
                            </button>
                        </td>
                    </tr>

                    <tr>
                        <td>3</td>
                        <td>HQ0012411125</td>
                        <td>Ikan</td>
                        <td>Semulajadi</td>
                        <td>25/8/2020</td>
                        <td>
                            <span class="label label-danger">1 Hari Lagi</span><br>
                            <p>1/8/2020</p>
                        </td>
                        <td align="center">
                            <a href="/client/proses/view/12" data-toggle="modal" data-target="#myModal" title="Maklumat Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-info">
                                    <i class="fa fa-file-text fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <a href="/client/proses/edit/12" data-toggle="modal" data-target="#myModal" title="Kemaskini Ramuan" class="fa" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="do_hapus()">
                                <span style="cursor:pointer;color:red" title="Buang Ramuan">
                                    <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                </span>
                            </button>
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