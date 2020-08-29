
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
        <link href="css/styles.css" rel="stylesheet" />
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
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#page-top">Utama</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Hubungi Kami</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="{{ asset('images/login-bg2.jpg') }}" alt="First slide" height="250px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/login-bg2.jpg') }}" alt="Second slide" height="250px;">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="{{ asset('images/login-bg2.jpg') }}" alt="Third slide" height="250px;">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </header>
        <div class="d-flex justify-content-center">
            <div class="col-md-6">
                <marquee behavior="scroll" direction="left" scrollamount="6">
                    PERHATIAN! PERINGATAN! MAKANAN A DIDAPATI MENGANDUNGI LEMAK KHINZIR! SEBARANG PERTANYAAN SILA HUBUNGI KAMI DI 00-000000000
                </marquee>
            </div>
        </div>
        <!-- semak status halal + login -->
        <section class="page-section bg-light" id="login" style="padding: 20px;">
            <div class="container">
                <div class="row row-25 align-items-center">
                    <div class="col-lg-8 col-12 mb-30 text-center about-content-two container-login" style="background:#ffffff;">
                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label">Semak Status Halal :</label>
                                <div class="input-group col-sm-7">
                                    <input type="text" class="form-control form-control-lg" id="inlineFormInputGroup" style="box-shadow: 1px 3px #d6d6d6;">
                                    <div class="input-group-prepend">
                                        <div class="input-group-text" style="background-color:#00eaff;box-shadow: 1px 3px #d6d6d6;"><i class="fas fa-search text-white"></i></div>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group row col-12 text-center">
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="">
                                            <i class="fab fa-pagelines fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Tumbuhan</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-atom fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Kimia</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-paw fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Haiwan</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>

                        <br>

                        <div class="form-group row col-12 text-center">
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-leaf fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Semula Jadi</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="far fa-smile fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Lain-lain</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                            <div class="col-sm-4">
                                <a href="/ramuanList">
                                    <button type="button" class="btn btn-outline-info col-sm-10" style="padding: 10px;" >
                                        <div class="image">
                                            <i class="fas fa-book-open fa-2x"></i>
                                        </div>
                                        <div class="">
                                            <label class="title">Semua</label>
                                        </div>
                                    </button>
                                </a>
                            </div>
                        </div>
                        
                    </div>

                    <script>
                    function do_login()
                    {
                        var userid = $('#userid').val();
                        var password = $('#password').val();

                        if(userid.trim() == '' || password.trim() == ''){
                            swal({
                                title: 'Amaran',
                                text: 'Sila masukkan ID penguna dan katalaluan yang sah',
                                type: 'warning',
                                confirmButtonClass: "btn-warning",
                                confirmButtonText: "Ok",
                                showConfirmButton: true,
                            });
                        } else {
                            // alert($("form").serialize());
                            $.ajax({
                                url:'/auth', //&datas='+datas,
                                type:'POST',
                                data: $("form").serialize(),
                                //data: datas,
                                success: function(data){
                                    console.log(data);
                                    // alert(data);
                                    if(data == 'OK'){
                                        swal({
                                        title: 'Berjaya',
                                        text: 'Log Masuk Anda Berjaya',
                                        type: 'success',
                                        confirmButtonClass: "btn-success",
                                        confirmButtonText: "Ok",
                                        showConfirmButton: true,
                                        });
                                    } else {
                                        swal({
                                        title: 'Amaran',
                                        text: 'ID Pengguna atau Katalaluan anda salah. Sila cuba lagi.',
                                        type: 'error',
                                        confirmButtonClass: "btn-danger",
                                        confirmButtonText: "Ok",
                                        showConfirmButton: true,
                                        });
                                    }
                                }
                            });
                        }
                    }
                    </script>

                    <div class="col-lg-4 col-12 mb-20">
                        <div class="about-content-two container-login">
                            <h2 class="mb-30 text-white"><b>LOG MASUK</b></h2>
                            <form class="form-signin text-white">
                                @csrf
                                <label for="" >ID Penguna</label>
                                <input style="height: 35px;" type="text" id="userid" name="userid" class="form-control" required >
                                <br>
                                <label for="inputPassword">Kata Laluan</label>
                                    <input style="height: 35px;"  type="password" id="password" name="password" class="form-control"  required >
                                    <div class="text-danger mb-3 float-right">
                                        <span style="cursor: pointer" data-toggle="modal" data-target="#modalLupaKataLaluan" >
                                            <small class="text-red">Lupa Kata Laluan ?</small>
                                        </span>
                                    </div>
                                    <a href="/client">
                                        <button class="btnx btn-sm btn-block" style="color:#000;background-color:#00eaff;border-color:#00eaff;" onclick="do_login()">
                                            Masuk
                                        </button>
                                    </a>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
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
                                <h6 style="color:#00eaff;">Tel: 03-5514 3600/3400 <br>Fax: 03-5510 3368<br>Email: info@jais.gov.my</h6>             
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
        <!-- Core theme JS-->
        <script src="js/scripts.js"></script>
        <!-- Sweetalert -->
		<script src="{{ asset('salert/sweetalert2.min.js') }}"></script>
		<script src="{{ asset('salert/sweetalert2.common.js') }}"></script>
    </body>
</html>
