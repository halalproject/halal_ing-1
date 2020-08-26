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

function do_hapus(id)
{
    // alert(id);
    swal({
        title: 'Adakah anda pasti untuk menghapuskan permohonan ini?',
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Ya, Teruskan',
        cancelButtonText: 'Tidak, Batal!',
        reverseButtons: true
    }).then(function () {
        $.ajax({
			url:'/client/daftar/delete/'+id, //&datas='+datas,
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
$carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
$sijil=isset($_REQUEST["sijil"])?$_REQUEST["sijil"]:"";
$kategori=isset($_REQUEST["kategori"])?$_REQUEST["kategori"]:"";
@endphp
		<div class="box" style="background-color:#F2F2F2">
            <div class="box-body">
                @csrf
                <div class="x_panel">
                    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                        <div class="panel-actions">
                        <!--<a href="#" class="fa fa-caret-down"></a>
                        <a href="#" class="fa fa-times"></a>-->
                        </div>
                        <h6 class="panel-title"><font color="#000000"><b>SENARAI PERMOHONAN RAMUAN</b></font></h6> 
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
                    <div class="col-md-2">
                        <select name="kategori" id="kategori" onchange="do_page()" class="form-control">
                            <option value="">Kategori Bahan</option>
                            @foreach ($cat as $cat)
                            <option value="{{$cat->id}}" @if($kategori == $cat->id) selected @endif>{{$cat->nama}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
                    </div>
        
        			<div class="col-md-1" align="right">
                        <button type="button" class="btn btn-success" onclick="do_page()"><i class="fa fa-search"></i> Carian</button>
                    </div>
                    <div class="col-md-5" align="right">
                        <a href="/client/daftar/create" data-toggle="modal" data-target="#myModal" title="Tambah Permohonan Ramuan" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-primary">
                        	<i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
				        </a>
			        </div>
                </div>       
            </div>
            <div align="right" style="padding-right:10px"><b>{{ $permohonan->total() }} rekod dijumpai</b></div>
            <div class="box-body">
              <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                <thead>
                    <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                        <th width="5%"><font color="#000000"><div align="left">Bil.</div></font></th>
                        <th width="20%"><font color="#000000"><div align="left">No. Permohonan</div></font></th>
                        <th width="30%"><font color="#000000"><div align="left">Nama Ramuan</div></font></th>
                        <th width="15%"><font color="#000000"><div align="left">Kategori</div></font></th>
                        <th width="13%"><font color="#000000"><div align="left">Tarikh Permohonan</div></font></th>
                        <th width="10%"><font color="#000000"><div align="left">Status</div></font></th>
                        <th width="7%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                    </tr>
                </thead>
                <tbody>
                    @php $bil = $permohonan->perPage()*($permohonan->currentPage()-1) @endphp
                    @foreach($permohonan as $mohon)
                    <tr>
                        <td valign="top" align="center">{{ ++$bil }}</td>
                        <td valign="top" align="left">{{ $mohon->ing_kod }}</td>
                        <td valign="top" align="left">
                            {{ $mohon->nama_ramuan }}
                            <br>
                            ({{ $mohon->nama_saintifik }})
                        </td>
                        <td valign="top" align="left">{{ $mohon->sumber->nama }}</td>
                        <td valign="top" align="center">{{ date('d/m/Y', strtotime($mohon->create_dt)) }}</td>
                        <td valign="top" align="center">
                        @if($mohon->status == 0)
                        <span class="label label-info">Draft</span>
                        @elseif($mohon->status == 1)
                            @if(empty($mohon->tarikh_buka))
                            <span class="label label-success">Hantar</span>
                            @elseif(!empty($mohon->tarikh_buka))
                            <span class="label label-primary">Sedang Diprosess</span>
                            @endif
                        @elseif($mohon->status == 2)
                        <span class="label label-warning">Semak Semula</span>
                        @endif
                        </td>
                        <td align="center">
                            @if(empty($mohon->tarikh_buka) || $mohon->status == 2)
                            <a href="/client/daftar/edit/{{$mohon->id}}" data-toggle="modal" data-target="#myModal" title="Kemaskini Permohonan" class="fa text-dark" data-backdrop="static">
                                <button type="button" class="btn btn-sm btn-warning">
                                    <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                </button>
                            </a>
                            <button type="button" class="btn btn-sm btn-danger" onclick="do_hapus({{ $mohon->id }})">
                                <span style="cursor:pointer;color:red" title="Buang Permohonan Ramuan">
                                    <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                </span>
                            </button>
                            @endif
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
{{-- @php
$from = now();
$to = $mohon->tarikh_tamat_sijil;
if(!empty($to)){
    $diff_month = $from->diffInMonths($to);
    if($diff_month <=0){
        $diff_day = $from->diffInDays($to);
        echo $diff_day." days";
    } else {
        echo $diff_month." months";
    }
}
@endphp --}}
@endsection