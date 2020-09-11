@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var status = $('#status_c').val();
    var level = $('#level_c').val();
    var carian = $('#carian').val();
//   alert(sijil);
    var pathname = window.location.pathname;

    if(status.trim()=='' && level.trim()=='' && carian.trim()==''){
        window.location = pathname;
    } else {
        window.location = pathname+'?status='+status+'&level='+level+'&carian='+carian;
    }
}

function do_reset(id)
{
    swal({
        title: 'Adakah anda pasti untuk tetapkan katalaluan ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Teruskan',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then(function () {
        $.ajax({
			url:'/admin/staff/reset/'+id, //&datas='+datas,
			type:'POST',
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Permohonan telah dihapuskan',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
                        location.reload();
					});
				} else if(data=='ERR'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				}
			}
		});
    });
}

function do_hapus(id)
{
    swal({
        title: 'Adakah anda pasti untuk menghapuskan kakitangan ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Teruskan',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then(function () {
        $.ajax({
			url:'/admin/staff/delete/'+id, //&datas='+datas,
			type:'POST',
			data: $("form").serialize(),
			//data: datas,
			success: function(data){
				console.log(data);
				//alert(data);
				if(data=='OK'){
					swal({
					  title: 'Berjaya',
					  text: 'Permohonan telah dihapuskan',
					  type: 'success',
					  confirmButtonClass: "btn-success",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					}).then(function () {
                        location.reload();
					});
				} else if(data=='ERR'){
					swal({
					  title: 'Amaran',
					  text: 'Terdapat ralat sistem.\nMaklumat anda tidak berjaya dikemaskini.',
					  type: 'error',
					  confirmButtonClass: "btn-warning",
					  confirmButtonText: "Ok",
					  showConfirmButton: true,
					});
				}
			}
		});
    });
}
</script>
@php
$status=isset($_REQUEST["status"])?$_REQUEST["status"]:"";
$level=isset($_REQUEST["level"])?$_REQUEST["level"]:"";
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp

<div class="box" style="background-color:#F2F2F2">
    <div class="box-body">
        <div class="x_panel">
            <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:15px;">
                <h6 class="panel-title"><font color="#000000"><b>SENARAI KAKITANGAN</b></font></h6> 
            </header>
        </div>
    </div>
    <br>
    <div class="box-body">
        @csrf
        <div class="form-group">
            <div class="col-md-3">
                <select name="level_c" id="level_c" onchange="do_page()" class="form-control">
                    <option value="">Level Pengguna</option>
                    @foreach ($rsl as $rsl)
                    <option value="{{ $rsl->id }}" @if($level == $rsl->id) selected @endif>{{ $rsl->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-2" >
                <select name="status_c" id="status_c" onchange="do_page()" class="form-control">
                    <option value="">Status</option>
                    @foreach ($rss as $rss)
                    <option value="{{ $rss->id }}" @if($status == $rss->id) selected @endif>{{ $rss->nama }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-3">
                <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
            </div>

            <div class="col-md-2">
                <button type="button" class="btn btn-success" onclick="do_page()">
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
    <br>
    <div align="right" style="padding-right:10px"><b>{{ $user->total() }} rekod dijumpai</b></div>
    <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
                <th width="17%"><font color="#000000"><div align="left">Nama</div></font></th>
                <th width="15%"><font color="#000000"><div align="left">Level Pengguna</div></font></th>
                <th width="8%"><font color="#000000"><div align="left">Jawatan</div></font></th>
                <th width="10%"><font color="#000000"><div align="left">No. HP</font></th>
                <th width="15%"><font color="#000000"><div align="left">Emel</font></th>
                <th width="8%"><font color="#000000"><div align="center">Status</div></font></th>
                <th width="8%"><font color="#000000"><div align="left">ID</div></font></th>
                <th width="10%"><font color="#000000"><div align="center">Tindakan</div></font></th>
                </tr>
            </thead>
            <tbody>
                @php $bil = $user->perPage()*($user->currentPage()-1) @endphp
                @foreach ($user as $rsu)
                <tr>
                    <td valign="top" align="center">{{ ++$bil }}</td>
                    <td valign="top" align="left">{{ $rsu->username }}</td>
                    <td valign="top" align="left">{{ $rsu->jawatan->nama }}</td>
                    <td valign="top" align="left">{{ $rsu->level->nama }}</td>
                    <td valign="top" align="left">{{ $rsu->nombor_hp }}</td>
                    <td valign="top" align="left">{{ $rsu->email }}</td>
                    <td valign="top" align="center">
                        @if($rsu->user_status == 1)
                            <span class="label label-primary">{{ $rsu->status->nama }}</span>
                        @elseif($rsu->user_status == 2)
                            <span class="label label-danger">{{ $rsu->status->nama }}</span>
                        @elseif($rsu->user_status == 3)
                            <span class="label label-warning">{{ $rsu->status->nama }}</span>
                        @endif
                    </td>
                    <td valign="top" align="left">{{ $rsu->userid }}</td>
                    <td align="center">
                        @if($rsu->password <> md5($rsu->userid))
                        <a title="Tetapkan Kata Laluan" class="fa text-dark" onclick="do_reset({{ $rsu->id }})">
                            <button type="button" class="btn btn-sm btn-info">
                                <i class="fa fa-key fa-lg" style="color: #FFFFFF;"></i>
                            </button>
                        </a>
                        @endif
                        <a href="/admin/staff/edit/{{ $rsu->id }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Kakitangan" class="fa text-dark" data-backdrop="static">
                            <button type="button" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                            </button>
                        </a>
                        <a title="Hapus Maklumat Kakitangan" class="fa text-dark" onclick="do_hapus({{ $rsu->id }})">
                            <button type="button" class="btn btn-sm btn-danger">
                                <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                            </button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
  <!--</div>-->    
<!-- DataTables -->

@endsection