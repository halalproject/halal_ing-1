@extends('components.page')

@section('content')
    <link href="{{ asset('vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}" rel="stylesheet">

    <script>
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
                    url:'/admin/pengumuman/delete/'+id, //&datas='+datas,
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

        function do_page() {
            var carian = $('#carian').val();
            
            var pathname = window.location.pathname;

            if(carian.trim()==''){
                window.location = pathname;
            } else {
                window.location = pathname+'?carian='+carian;
            }
        }
    </script>

    @php 
        $carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
    @endphp

    <div class="box" style="background-color:#F2F2F2">
            <div class="box-body">
                <input type="hidden" name="soalan_id" value="" />
                <div class="x_panel">
                    <header class="panel-heading"  style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                        <h2 class="panel-title"><font color="#000000"><b>SENARAI PENGUMUMAN</b></font></h2> 
                    </header>
                </div>
            </div> 

            <br />

            <div class="box-body">
                <div class="form-group">
                @csrf
                    <div class="col-md-8">
                        <input type="text" class="form-control" id="carian" name="carian" value="{{ $carian }}" placeholder="Maklumat Carian">
                    </div>
        
                    <div class="col-md-2">
                        <button type="button" class="btn btn-success" onclick="do_page()">
                            <i class="fa fa-search"></i> Carian</button>
                    </div>
                    
                    <div class="col-md-2" align="right">
                        <a href="/admin/pengumuman/create" data-toggle="modal" data-target="#myModal" title="Tambah Pengumuman" class="fa" data-backdrop="static">
                            <button type="button" class="btn btn-primary">
                            <i class=" fa fa-plus-square"></i> <font style="font-family:Verdana, Geneva, sans-serif">Tambah</font></button>
                        </a>
                    </div>
                </div>    
            </div>

            <br>
            <br>

            <div align="right" style="padding-right:10px"><b>{{ $calendar->total() }} rekod dijumpai</b></div>
            <div class="box-body">
                <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                    <thead>
                    <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                    <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                    <th width="45%"><font color="#000000"><div align="left">Tajuk Pengumuman</div></font></th>
                    <th width="10%"><font color="#000000"><div align="left">Tarikh Awal</font></th>
                    <th width="10%"><font color="#000000"><div align="left">Tarikh Akhir</div></font></th>
                    <th width="10%"><font color="#000000"><div align="left">kategori</div></font></th>
                    <th width="10%"><font color="#000000"><div align="left">Dituju Kepada</div></font></th>
                    <th width="10%"><font color="#000000"><div align="left">Tindakan</div></font></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php $bil = $calendar->perPage()*($calendar->currentPage()-1) @endphp
                    @foreach ($calendar as $ev)
                    @php
                        if(!empty($carian)){
                            $text = preg_replace('#('.$carian.')#i', '<font color="red">\1</font>', $ev->event);
                        } else {
                            $text = $ev->event;
                        }
                    @endphp
                        <tr>
                            <td>{{ ++$bil }}</td>
                            <td>{!! $text !!}</td>
                            <td>{{ date('d/m/Y', strtotime($ev->start_date)) }}</td>
                            <td>{{ date('d/m/Y', strtotime($ev->end_date)) }}</td>
                            <td>
                                @if($ev->kategori == 1)
                                    <p>Pengumuman</p>
                                @elseif($ev->kategori == 2)
                                    <p>Aktiviti</p>
                                @elseif($ev->kategori == 3)
                                    <p>Mesyuarat</p>
                                @elseif($ev->kategori == 4)
                                    <p>SOP</p>
                                @endif
                            </td>
                            <td>
                                @if($ev->is_public == 1)
                                    <p>Awam</p>
                                @elseif($ev->is_public == 2)
                                    <p>Dalaman</p>
                                @elseif($ev->is_public == 3)
                                    <p>Syarikat</p>
                                @endif
                            </td>
                            <td align="center">
                                <a href="/admin/pengumuman/edit/{{ $ev->id }}" data-toggle="modal" data-target="#myModal" title="Kemaskini Maklumat Pengumuman" class="fa text-dark" data-backdrop="static">
                                    <button type="button" class="btn btn-sm btn-warning">
                                        <i class="fa fa-pencil-square-o fa-lg" style="color: #FFFFFF;"></i>
                                    </button>
                                </a>

                                <button type="button" class="btn btn-sm btn-danger" onclick="do_hapus({{ $ev->id }})">
                                    <span style="cursor:pointer;color:red" title="Buang Permohonan Ramuan">
                                        <i class="fa fa-trash-o fa-lg" style="color: #FFFFFF;"></i>
                                    </span>
                                </button> 
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div align="center" class="d-flex justify-content-center">
                    {!! $calendar->appends(['carian'=>$carian])->render() !!}
                </div>
            </div>
        </div>
    </div>
@endsection