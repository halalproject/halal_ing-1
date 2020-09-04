
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
        <link href="css/styles.css" rel="stylesheet" />
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

        <!-- semak status halal + login -->
        <section class="page-section bg-light" id="ramuanList" style="padding: 45px;">
            <div class="container">
                <div class="row row-25 align-items-center">
                    <div class="col-lg-12 col-12 mb-30 text-center about-content-two container" style="background:#ffffff;padding-top:30px;">
                        <div class="form-group row" style="padding-top:40px;padding-bottom:10px;padding-left:80px;">
                            <label for="colFormLabelLg" class="col-sm-3 col-form-label">Semak Status Halal :</label>
                                <div class="input-group col-sm-7">
                                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" style="box-shadow: 1px 3px #d6d6d6;">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" style="background-color:#00eaff;box-shadow: 1px 3px #d6d6d6;">
                                            <i class="fas fa-search text-white"></i>
                                        </button>
                                    </div>
                                </div>
                        </div>
                        <br>
                        <div class="form-group row col-12 text-center">
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="">
                                            <i class="fab fa-pagelines fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Tumbuhan </label><br>
                                            <span class="badge badge-danger">{{ $tumbuhan->count() }}</span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-atom fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Kimia </label><br>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-paw fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Haiwan </label><br>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-leaf fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Semula Jadi </label><br>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="far fa-smile fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Lain-lain </label><br>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-2">
                                <a href="/ramuanList" >
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-book-open fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Semua </label><br>
                                            <span class="badge badge-danger"></span>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="col-12">
                        <h4 style="padding-top:15px;"><b>Senarai Ramuan (Tumbuhan) </b></h4>
                        <br>
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
                                <tr>
                                    <td>1</td>
                                    <td>	
                                        <b>MILK FLAVOR SC003932</b><br>
                                        AB MAURI MALAYSIA SDN. BHD.<br>
                                        LOT 4185, JALAN KB 1/9,<br>
                                        MYS.<br>
                                        03-89612864.
                                    </td>
                                    <td>19/9/2023</td>
                                    <td>
                                        <button type="button" class="btn btn-info col-sm-10" data-target="#companyDetail" data-toggle="modal">
                                            <i class="fa fa-list"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                        <ul class="pagination" style="padding-right:450px;padding-left:450px;">
                            <li><a href="#">Sebelum</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">Selepas</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>

    <!-- Modal -->
    <div class="modal fade" id="companyDetail" role="dialog">
        <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header" style="background:-webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);padding:10px;">
            <h4 class="modal-title">Maklumat Syarikat</h4>
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="col-md-12">
                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Nama Syarikat :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control text-uppercase">era whiz ict</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Alamat :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">NO.1 Jalan Ostia Bangi, Selangor</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Negeri :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">Selangor</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">No. Tel :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">012-0000000</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">No. Fax :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">03-000000000</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Emel :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="email" class="form-control" >erawhizict.gmail.com</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Laman Web :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">www.erawhizict.com.my</b>
                            </div>
                        </div>
                    </div>

                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">No. Rujukan :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control">AA123456</b>
                            </div>
                        </div>
                    </div>
                    
                    <div class="form-group" style="margin:0px;">
                        <div class="row">
                            <label class="col-sm-3 control-label">Pegawai Rujukan :</label>
                            <div class="col-sm-9">
                                <b style="border:none;" type="text" class="form-control text-uppercase">ABU BIN BAKAR</b>
                            </div>
                        </div>
                    </div>

                    <table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
                        <thead>
                            <tr style="background: -webkit-linear-gradient(top, #00eaff 20%,#ffffff 100%);">
                            <th width="5%"><font color="#000000"><div align="left">#</div></font></th>
                            <th width="70%"><font color="#000000"><div align="left">Nama Ramuan & Alamat Syarikat</div></font></th>
                            <th width="20%"><font color="#000000"><div align="left">Tarikh Luput Sijil Halal</font></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>	
                                    <b>MILK FLAVOR SC003932</b><br>
                                    AB MAURI MALAYSIA SDN. BHD.<br>
                                    LOT 4185, JALAN KB 1/9,<br>
                                    MYS.<br>
                                    03-89612864.
                                </td>
                                <td>19/9/2023</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary" data-dismiss="modal"><i class="fa fa-spinner"></i> Kembali</button>
            </button>
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
                                    Jumlah : <span name="totalvis" id="totalvis">xxx</span><br>
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
        
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
    </body>
</html>
