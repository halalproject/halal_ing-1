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
                    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:15px;">
                        <h6 class="panel-title"><font color="#000000"><b>Carian Staf</b></font></h6> 
                    </header>
                </div>
                <br>
                <div class="form-group">
                    <div class="col-md-2">
                        <select name="status" onchange="" class="form-control">
                            <option value="">Status</option>
                            <option value="">Ada</option>
                            <option value="">Tiada</option>
                            <option value="">Cuti</option>
                        </select>
                    </div>
                    <div class="col-md-3" >
                        <select name="level_pengguna" onchange="" class="form-control">
                            <option value="">Level Pengguna</option>
                            <option value="9">Admin</option>
                            <option value="1">Penyemak</option>
                            <option value="2">Pelulus</option>
                            <option value="3">Staf</option>
                        </select>
                    </div>
                    <div class="col-md-3" style="0px">
                        <input type="text" class="form-control" id="l_cari" name="l_cari" value="" placeholder="Maklumat Carian">
                    </div>
        
                    <div class="col-md-2" align="right">
                        <button type="button" class="btn btn-success" 
                            onclick="">
                            <i class="fa fa-search"></i> Carian</button>
                    </div>

                    <div class="col-md-2" align="right">
                        <a href="/admin/staff/create" data-toggle="modal" data-target="#myModal" title="Tambah Staf Baru" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-primary">
                        	<i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
				        </a>
			        </div>
                </div>
            </div>
            <div class="box-body">
                <input type="hidden" name="soalan_id" value="" />
                <div class="x_panel">    
                </div>
                <br>

                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                        <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                        <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                        <th width="30%"><font color="#000000"><div align="left">Nama</div></font></th>
                        <!-- <th width="15%"><font color="#000000"><div align="left">No.KP</div></font></th> -->
                        <th width="10%"><font color="#000000"><div align="left">No.Tel</font></th>
                        <th width="15%"><font color="#000000"><div align="left">Emel</font></th>
                        <th width="10%"><font color="#000000"><div align="left">Level Pengguna</div></font></th>
                        <th width="5%"><font color="#000000"><div align="left">Status</div></font></th>
                        <th width="25%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>Khairul Anuar Bin Selamat</td>
                            <!-- <td>000000-00-0000</td> -->
                            <td>0137057666</td>
                            <td>ICTHALAL@ISLAM.GOV.MY</td>
                            <td>Admin</td>
                            <td>Tiada</td>
                            <td align="center">
                                <button type="button" class="btn btn-sm btn-info">
                                    <a href="/admin/staff/resetPassword/" data-toggle="modal" data-target="#myModal" title="Tetapkan Kata Laluan" class="fa text-dark"  data-backdrop="static">
                                        <i class="fa fa-key fa-lg" style="color: #FFFFFF;"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-sm btn-warning">
                                    <a href="/admin/staff/create/" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Bahagian" class="fa text-dark" data-backdrop="static">
                                        <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                    </a>
                                </button>
                                <button type="button" class="btn btn-sm btn-danger">
                                    <a href="" data-toggle="modal" data-target="#myModal" title="Padam Maklumat Bahagian" class="fa text-dark"  data-backdrop="static">
                                        <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                    </a>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
		</div>
  <!--</div>-->    
<!-- DataTables -->

@endsection