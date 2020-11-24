@extends('components.page')

@section('content')
<link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">
<script>
function do_page()
{
    var type = $('#type').val();
    var carian = $('#carian').val();
//   alert(sijil);
    var pathname = window.location.pathname;

    if(type.trim()=='' && carian.trim()==''){
        window.location = pathname;
    } else {
        window.location = pathname+'?type='+type+'&carian='+carian;
    }
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
			url:'/jais/staff/delete/'+id, //&datas='+datas,
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
$type=isset($_REQUEST["type"])?$_REQUEST["type"]:"";
$level=isset($_REQUEST["level"])?$_REQUEST["level"]:"";
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
@endphp

<div class="box" style="background-color:#F2F2F2">
    <div class="box-body">
        <div class="x_panel">
            <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:15px;">
                <h2 class="panel-title"><font color="#000000"><b>SURAT RUJUKAN</b></font></h2> 
            </header>
        </div>
    </div>
    <br>

    <div class="box-body">
    @csrf
        <div class="form-group">
            <div class="col-md-3">
                <select name="type" id="type" onchange="do_page()" class="form-control">
                    <option value=""> -- Kategori -- </option>
                    <option value="S" @if($type == 'S') selected @endif>Surat</option>
                    <option value="M" @if($type == 'M') selected @endif>Memo</option>
                </select>
            </div>
            <div class="col-md-4">
                <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
            </div>

            <div class="col-md-2" align="right">
                <button type="button" class="btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
            </div>
        </div>
    </div>

    <br>
    <div align="right" style="padding-right:10px"><b>{{ $email->total() }} rekod dijumpai</b></div>
    <div class="box-body">
        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
            <thead>
                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                <th width="5%"><font color="#000000"><div align="center">#</div></font></th>
                <th width="15%"><font color="#000000"><div align="left">Perkara</div></font></th>
                <th width="12%"><font color="#000000"><div align="center">Kategori</div></font></th>
                <th width="12%"><font color="#000000"><div align="center">No. Rujukan</div></font></th>
                <th width="25%"><font color="#000000"><div align="left">Kandungan 1</div></font></th>
                <th width="25%"><font color="#000000"><div align="left">Kandungan 2</font></th>
                <th width="8%"><font color="#000000"><div align="center">Status</font></th>
                <th width="15%"><font color="#000000"><div align="center">Tindakan</div></font></th>
                </tr>
            </thead>
            <tbody>
                @php $bil = $email->perPage()*($email->currentPage()-1) @endphp
                @foreach ($email as $surat)
                @php
                if($surat->kod == 'S_LULUS'){
                    $title = 'Surat Lulus';
                } else if($surat->kod == 'S_TOLAK') {
                    $title = 'Surat Tolak';
                } else if($surat->kod == 'M_PEMOHON') {
                    $title = 'Memo Pemohon';
                } else if($surat->kod == 'M_PERMOHONAN') {
                    $title = 'Memo Permohonan';
                } else if($surat->kod == 'M_SEMAK') {
                    $title = 'Memo Semakan';
                } else if($surat->kod == 'M_TOLAK') {
                    $title = 'Memo Tolak';
                } else if($surat->kod == 'M_LULUS') {
                    $title = 'Memo Lulus';
                }
                @endphp
                <tr>
                    <td valign="top" align="center">{{ ++$bil }}</td>
                    <td valign="top" align="left">{{ $surat->perkara }}</td>
                    <td valign="top" align="center">
                        @if ($surat->type == 'S')
                            Surat
                            <br>
                            ( {{  $title }} )
                        @else
                            Memo
                            <br>
                            ( {{  $title }} )
                        @endif
                    </td>
                    <td valign="top" align="center">
                        @if ($surat->type == 'S')
                            {{ $surat->no_rujukan }}
                        @else
                            ??
                        @endif
                    </td>
                    <td valign="top" align="left">{!! $surat->kandungan_1 !!}</td>
                    <td valign="top" align="left">{!! $surat->kandungan_2 !!}</td>
                    <td valign="top" align="center">
                        @if($surat->status == 0)
                            <span class="label label-success">Aktif</span>
                        @elseif($surat->status == 1)
                            <span class="label label-danger">Tidak Aktif</span>
                        @endif
                    </td>
                    <td align="center">
                        <a href="/jais/surat/edit/{{ $surat->id }}?type=k1" data-toggle="modal" data-target="#myModal" title="Kemaskini Kandungan 1 Surat" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                            </button>
                        </a>
                        <a href="/jais/surat/edit/{{ $surat->id }}?type=k2" data-toggle="modal" data-target="#myModal" title="Kemaskini Kandungan 2 Surat" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-sm btn-warning">
                                <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
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
    {!! $email->appends(['type'=>$type,'carian'=>$carian])->render() !!}
</div>

@endsection