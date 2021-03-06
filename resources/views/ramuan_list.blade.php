@extends('components.portal')

@section('content')
        <script>
            function do_page(nama)
            {
                var cari = $('#cari').val();
                var pathname = window.location.pathname;

                if(nama.trim()=='' && cari.trim()==''){
                    window.location = pathname;
                } else {
                    window.location = pathname+'?carian='+nama+'&cari='+cari;
                }

            
            }

            function do_modal(id)
            {
                $('.modal-content').load('/view/'+id);
            }

            $(document).ready(function(){
                $('.launch-modal').click(function(){
                    $('#myModal').modal({
                        backdrop: 'dismiss'
                    });
                }); 
            });
        </script>
        @php
        $carian=isset($_REQUEST["carian"])?$_REQUEST["carian"]:"";
        $cari=isset($_REQUEST["cari"])?$_REQUEST["cari"]:"";
        @endphp

        <!-- dd($ing); -->
        
        <!-- semak status halal + login -->
        <section class="page-section bg-light" id="ramuanList" style="padding: 45px;">
            <div class="container">
                <div class="row row-25 align-items-center">
                    <div class="col-lg-12 col-12 mb-30 text-center about-content-two container" style="background:#ffffff;padding-top:30px;">
                        <div class="form-group row" style="padding-top:40px;padding-bottom:10px;padding-left:80px;">
                            <label for="colFormLabelLg" class="col-sm-3 col-form-label">Semak Status Halal :</label>
                                <div class="input-group col-sm-7">
                                    <input type="text" class="form-control form-control-lg" style="box-shadow: 1px 3px #d6d6d6;" name="cari" id="cari" value="{{ $cari }}">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" style="background-color:#00eaff;box-shadow: 1px 3px #d6d6d6;" onclick="do_page('')">
                                            <i class="fas fa-search text-white"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="form-group row col-12 text-center" >
                            <div class="col-sm-2">
                                <button name="tumbuhan" id="tumbuhan" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='tumbuhan') active @endif" style="padding: 10px;" onclick="do_page('tumbuhan')">
                                    <div class="">
                                        <i class="fab fa-pagelines fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Tumbuhan </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == 'tumbuhan')
                                                {{ $tumbuhan->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="kimia" id="kimia" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='haiwan') active @endif" style="padding: 10px;" onclick="do_page('haiwan')">
                                    <div class="image">
                                        <i class="fas fa-paw fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Haiwan </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == 'haiwan')
                                                {{ $haiwan->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                        
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="haiwan" id="haiwan" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='kimia') active @endif" style="padding: 10px;" onclick="do_page('kimia')">
                                    <div class="image">
                                        <i class="fas fa-atom fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Kimia </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == 'kimia')
                                                {{ $kimia->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="semulaJadi" id="semulaJadi" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='semulaJadi') active @endif" style="padding: 10px;" onclick="do_page('semulaJadi')">
                                    <div class="image">
                                        <i class="fas fa-leaf fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Semula Jadi </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == 'semulaJadi')
                                                {{ $semulaJadi->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="other" id="other" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='other') active @endif" style="padding: 10px;" onclick="do_page('other')">
                                    <div class="image">
                                        <i class="far fa-smile fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Lain-lain </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == 'other')
                                                {{ $other->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="all" id="all" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='') active @endif" style="padding: 10px;" onclick="do_page('')">
                                    <div class="image">
                                        <i class="fas fa-book-open fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Semua </label><br>
                                        <span class="badge badge-danger">
                                            @if($carian == '')
                                                {{ $all->count() }}
                                            @else
                                                0
                                            @endif
                                        </span>
                                    </div>
                                </button>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="col-12">
                        <h4 style="padding-top:15px;"><b>Senarai Ramuan 
                        ( @if($carian == 'tumbuhan') 
                            Tumbuhan
                        @elseif($carian == 'kimia') 
                            Kimia
                        @elseif($carian == 'haiwan') 
                            Haiwan
                        @elseif($carian == 'semulaJadi') 
                            Semula Jadi
                        @elseif($carian == 'other') 
                            Lain-lain
                        @elseif($carian == '' ) 
                            Semua
                        @endif ) </b></h4>
                        <div align="right" style="padding-right:10px"><b> {{ $list->total() }} rekod dijumpai</b></div>
                        <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                            <thead>
                                <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                                <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                                <th width="70%"><font color="#000000"><div align="left">Nama Ramuan & Alamat Syarikat</div></font></th>
                                <th width="20%"><font color="#000000"><div align="left">Tarikh Luput Sijil Halal</font></th>
                                <th width="5%"><font color="#000000"><div align="left">Syarikat</font></th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $bil = $list->perPage()*($list->currentPage()-1) @endphp
                                @foreach($list as $l)
                                @php
                                    if(!empty($cari)){
                                        $text = preg_replace('#('.$cari.')#i', '<font color="red">\1</font>', $l->nama_ramuan);
                                    } else {
                                        $text = $l->nama_ramuan;
                                    }

                                    if(!empty($cari)){
                                        $text2 = preg_replace('#('.$cari.')#i', '<font color="red">\1</font>', $l->nama_saintifik);
                                    } else {
                                        $text2 = $l->nama_saintifik;
                                    }
                                @endphp
                                <tr>
                                    <td>{{ ++$bil }}</td>
                                    <td>	
                                        <b>{!! $text !!} @if(!empty($l->nama_saintifik)) ({!! $text2 !!}) @endif </b>
                                        <br>
                                        <i>{{ $l->syarikat->company_name }}</i>
                                    </td>
                                    <td>{{ date('d/m/Y', strtotime($l->tarikh_tamat_sijil)) }}</td>
                                    <td>
                                        <a onclick="do_modal({{ $l->id }})" data-toggle="modal" data-target="#myModal" title="Maklumat Syarikat" data-backdrop="static">
                                            <button type="button" class="btn btn-info col-sm-10 launch-modal" >
                                                <i class="fa fa-list"></i>
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
                    {!! $list->appends(['carian'=>$carian, 'cari'=>$cari])->render() !!}
                </div>
            </div>
        </section>

        <!-- Modal -->
        <div class="bs-example">
			<div id="myModal" class="modal fade" role="dialog">
				<div class="modal-dialog modal-xl static">
					<div class="modal-content">
					</div>
				</div>
			</div>
		</div>
@endsection