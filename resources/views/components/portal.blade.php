<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MYHALAL INGREDIENT</title>
        <link rel="icon" type="image/x-icon" href="" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('css/styles.css') }}" rel="stylesheet" />
        <!-- Sweetalert -->
		<link rel="stylesheet" href="{{ asset('salert/sweetalert2.css') }}">
    </head>
    
    <body id="page-top">

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

        @yield('content')
        
        <!--Footer section start-->
        <section class="page-section" id="contact">
            <footer class="footer-section section">
                <!--Footer Top start-->
                <div class="footer-top section" style="padding-top:30px;padding-bottom:15px;">
                    <div class="container">
                        <div class="row row-25">				                    
                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-3 col-md-3 col-12 mb-40">
                                <h5 class="title"><span class="text-white"><b>Halal Apps</b></span></h5>
                                <div class="footer-social">
                                    <a href="http://www.malaysia.gov.my" title="Malaysia Government"><img class="logoimg" src="{{ asset('images/footer/malaysia.png') }}" width="50px"></a>&nbsp;
                                    <a href="http://www.islam.gov.my" title="Jabatan kemajuan Islam Malaysia"><img class="logoimg" src="{{ asset('images/footer/jakim.png') }}" width="50px"></a>&nbsp;
                                    <a href="https://www.kpdnhep.gov.my/" title="KEMENTERIAN PERDAGANGAN DALAM NEGERI DAN HAL EHWAL PENGGUNA (KPDNHEP)"><img class="logoimg" src="{{ asset('images/footer/kpdnkk.jpg') }}" width="50px"></a>
                                </div>
                                <div class="footer-social">
                                    <a href="http://www.ssm.com.my" title="Suruhanjaya Syarikat Malaysia"><img class="logoimg" src="{{ asset('images/footer/ssm.png') }}" width="50px"></a>&nbsp;
                                    <a href="http://www.dvs.gov.my" title="Jabatan Perkhidmatan Veterinar"><img class="logoimg" src="{{ asset('images/footer/veterinaryMalaysia.png') }}" width="50px"></a>&nbsp;
                                    <a href="http://www.dvs.gov.my" title="Kementerian Kesihatan Malaysia"><img class="logoimg" src="{{ asset('images/footer/kkm.png') }}" width="50px"></a>
                                </div>
                            </div>
                            <!--Footer Widget end-->
                            
                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h5 class="title"><span class="text-white"><b>Media Sosial</b></span></h5>
                                <div class="footer-social">   
                                    <a href="https://www.facebook.com/HabHalalJakim/" title="Facebook"><img width="50px" src="{{ asset('images/footer/facebook.png') }}"></a>
                                    <a href="https://twitter.com/halal_malaysia" title="Twitter"><img width="50px" style="padding-top:3px;" src="{{ asset('images/footer/twitter.png') }}"></a>
                                </div>
                            </div>
                            <!--Footer Widget end-->

                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-3 col-md-3 col-12 mb-40">
                                <h5 class="title"><span class="text-white"><b>Lokasi</b></span></h5>
                                <h7 style="color:#00eaff;">
                                    Jabatan Agama Islam Selangor (JAIS),<br>
                                    Bahagian Pengurusan Halal,<br>
                                    Tingkat 5, Menara Utara,<br>
                                    Bangunan Sultan Idris Shah,<br>
                                    No.2, Persiaran Masjid,<br>
                                    Bukit SUK, 40676 Shah Alam,<br>
                                    Selangor.
                                </h7>
                            </div>
                            <!--Footer Widget end-->

                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h5 class="title"><span class="text-white"><b>Hubungi Kami</b></span></h5>
                                <h7 style="color:#00eaff;">Tel: 03-5514 3600/3400 <br>Fax: 03-5510 3368<br>text: info@jais.gov.my</h7>             
                            </div>
                            <!--Footer Widget end-->


                            <!--Footer Widget start-->
                            <div class="footer-widget col-lg-2 col-md-2 col-12 mb-40">
                                <h5 class="title"><span class="text-white"><b>Pengunjung</b></span></h5>
                                
                                <h7 style="color:#00eaff;">
                                    Jumlah : <span name="totalvis" id="totalvis">{{  $total->value }}</span><br>
                                    Hari Ini : <span name="todayvis" id="todayvis">{{  $today->value }}</span><br>
                                    Kelmarin : <span name="yesterdayvis" id="yesterdayvis">{{  $yesterday->value }}</span><br>
                                    Bulan Ini : <span name="thismonthvis" id="thismonthvis">{{  $month->value }}</span><br>
                                    Bulan Lepas : <span name="lastmonthvis" id="lastmonthvis">{{  $last_month->value }}</span><br>
                                </h7>
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
                                    <h7>Copyright &copy; 2020 <a  href="#">Halal Malaysia</a>. All rights reserved.</h7>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Footer bottom end-->
            </footer>
        </section>
        <!--Footer section end--> 
        
        <!-- Modal -->
        <div class="modal fade" id="modalLupaKataLaluan" role="dialog">
            <div class="modal-dialog">
            
            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header" style="background:-webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:10px;">
                <h4 class="modal-title">Lupa Kata Laluan</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="col-md-12">
                        <div class="form-group" style="margin:0px;">
                            <div class="row">
                                <label class="col-sm-3 control-label"><font color="#FF0000">*</font> Emel :</label>
                                <div class="col-sm-9">
                                    <input type="email" name="emel" id="emel" class="form-control" value=""><br>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-12" style="padding:0px;">
                                <small class="text-danger">* Note: Masukkan emel anda dan kami akan menghantar pautan untuk menetapkan semula kata laluan anda.</small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
                <button type="button" class="mt-sm mb-sm btn btn-info" onclick="do_simpan()" id="simpan">
                    <i class="fa fa-save"></i> Hantar
                </button>
                </div>
            </div>
            
            </div>
        </div>        
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Sweetalert -->
        <script src="{{ asset('salert/sweetalert2.min.js') }}"></script>
        <script src="{{ asset('salert/sweetalert2.common.js') }}"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('js/scripts.js') }}"></script>
    </body>
</html>