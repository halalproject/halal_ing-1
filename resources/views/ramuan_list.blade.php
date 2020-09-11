
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>MYHALAL INGREDIENT</title>
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.js"></script>
    </head>

    <body id="page-top">
        
        <script>
            function do_page(nama)
            {
                
                var pathname = window.location.pathname;

                if(nama.trim()==''){
                    window.location = pathname;
                } else {
                    window.location = pathname+'?carian='+nama;
                }

            
            }

            function do_cari() {
                var cari = $('#cari').val();

                var pathname = window.location.pathname;

                if(cari.trim()==''){
                    window.location = pathname;
                } else {
                    swindow.location = pathname+'?cari='+cari;
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
        
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">My Halal Ingredient</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">Utama</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#ramuanList">Senarai Ramuan</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Hubungi Kami</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="/">SOP</a></li>
                    </ul>
                </div>
            </div>
        </nav>

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
                                        <button class="input-group-text" style="background-color:#00eaff;box-shadow: 1px 3px #d6d6d6;" onclick="do_cari()">
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
                                        <span class="badge badge-danger">{{ $tumbuhan->count() }}</span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="kimia" id="kimia" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='kimia') active @endif" style="padding: 10px;" onclick="do_page('kimia')">
                                    <div class="image">
                                        <i class="fas fa-atom fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Kimia </label><br>
                                        <span class="badge badge-danger">{{ $kimia->count() }}</span>
                                    </div>
                                </button>
                            </div>
                            <div class="col-sm-2">
                                <button name="haiwan" id="haiwan" type="button" class="btn btn-outline-info col-sm-10 @if($carian=='haiwan') active @endif" style="padding: 10px;" onclick="do_page('haiwan')">
                                    <div class="image">
                                        <i class="fas fa-paw fa-2x"></i>
                                    </div>
                                    <div class="">
                                        <label class="title">Haiwan </label><br>
                                        <span class="badge badge-danger">{{ $haiwan->count() }}</span>
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
                                        <span class="badge badge-danger">{{ $semulaJadi->count() }}</span>
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
                                        <span class="badge badge-danger">{{ $other->count() }}</span>
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
                                        <span class="badge badge-danger">{{ $all->count() }}</span>
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
                        @elseif($carian == '') 
                            Semua
                        @endif ) </b></h4>
                        <br>

                        <div align="right" style="padding-right:10px"><b>{{ $list->total() }} rekod dijumpai</b></div>
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
                    @if(!empty($carian))
                        {!! $list->appends(['carian'=>$carian])->render() !!}
                    @else
                        {!! $list->appends(['cari'=>$cari])->render() !!}
                    @endif
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
        
        
        <!--Footer section start-->
        <section class="page-section" id="contact">
            <footer class="footer-section section">
                <!--Footer Top start-->
                <div class="footer-top section" style="padding-top:30px;padding-bottom:15px;">
                    <div class="container">
                        <div class="row row-25">				                    
                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-3 col-md-3 col-12 mb-40">
                                <h4 class="title"><span class="text-white"><b>Halal Apps</b></span></h4>
                                <div class="footer-social">
                                    <a href="http://www.malaysia.gov.my" title="Malaysia Government"><img class="logoimg" src="{{ asset('images/footer/malaysia.png') }}" style="width:40px; height:40px;"></a>
                                    <a href="http://www.islam.gov.my" title="Jabatan kemajuan Islam Malaysia"><img class="logoimg" src="{{ asset('images/footer/jakim.png') }}" style="width:40px; height:40px;"></a>
                                    <a href="https://www.kpdnhep.gov.my/" title="KEMENTERIAN PERDAGANGAN DALAM NEGERI DAN HAL EHWAL PENGGUNA (KPDNHEP)"><img class="logoimg" src="{{ asset('images/footer/kpdnkk.jpg') }}" style="width:40px; height:40px;"></a>
                                </div>
                                <div class="footer-social">
                                    <a href="http://www.ssm.com.my" title="Suruhanjaya Syarikat Malaysia"><img class="logoimg" src="{{ asset('images/footer/ssm.png') }}" style="width:40px; height:40px;"></a>
                                    <a href="http://www.dvs.gov.my" title="Jabatan Perkhidmatan Veterinar"><img class="logoimg" src="{{ asset('images/footer/veterinaryMalaysia.png') }}" style="width:40px; height:40px;"></a>
                                    <a href="http://www.dvs.gov.my" title="Kementerian Kesihatan Malaysia"><img class="logoimg" src="{{ asset('images/footer/kkm.png') }}" style="width:40px; height:40px;"></a>
                                </div>
                            </div>
                            <!--Footer Widget end-->
                            
                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h4 class="title"><span class="text-white"><b>Media Sosial</b></span></h4>
                                <div class="footer-social">   
                                    <a href="https://www.facebook.com/HabHalalJakim/" title="Facebook"><img style="width:41px; height:41px;" src="{{ asset('images/footer/facebook.png') }}"></a>
                                    <a href="https://twitter.com/halal_malaysia" title="Twitter"><img style="width:40px; height:40px; padding-top:3px;" src="{{ asset('images/footer/twitter.png') }}"></a>
                                </div>
                            </div>
                            <!--Footer Widget end-->

                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-3 col-md-3 col-12 mb-40">
                                <h4 class="title"><span class="text-white"><b>Lokasi</b></span></h4>
                                <h6 style="color:#00eaff;">JABATAN AGAMA ISLAM,<br><br>BAHAGIAN PENGURUSAN HALAL,<br>TINGKAT 5, MENARA UTARA,<br>BANGUNAN SULTAN IDRIS SHAH,<br><br>NO.2, PERSIARAN MASJID,<br>BUKIT SUK, 40676 SHAH ALAM,<br>SELANGOR. </h6>
                            </div>
                            <!--Footer Widget end-->

                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h4 class="title"><span class="text-white"><b>Hubungi Kami</b></span></h4>
                                <h6 style="color:#00eaff;">Tel: 03-5514 3600/3400 <br>Fax: 03-5510 3368<br>text: info@jais.gov.my</h6>             
                            </div>
                            <!--Footer Widget end-->


                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h4 class="title"><span class="text-white"><b>Pengunjung</b></span></h4>
                                
                                <h6 style="color:#00eaff;">
                                    Jumlah : <span name="countvis" id="totalvis">xxx</span><br>
                                    Hari Ini : <span name="todayvis" id="todayvis">xxx</span><br>
                                    Kelmarin : <span name="yesterdayvis" id="yesterdayvis">xxx</span><br>
                                    Bulan Ini : <span name="thismonthvis" id="thismonthvis">xxx</span><br>
                                    Bulan Lepas : <span name="lastmonthvis" id="lastmonthvis">xxx</span><br>
                                </h6>
                            </div>
                            <!--Footer Widget end-->    
                        </div>
                    </div>
                </div>
                <!--Footer Top end-->
                <hr>
                <!--Footer bottom start-->
                <div class="footer-bottom section">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="copyright text-center text-white" style="padding-bottom:5px;">
                                    <h6>Copyright &copy; 2020 <a  href="#">Halal Malaysia</a>. All rights reserved.</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer bottom end-->
            </footer>
         </section>
         <!--Footer section end--> 
        
        
        
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>
