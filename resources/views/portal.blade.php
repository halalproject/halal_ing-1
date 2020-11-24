@extends('components.portal')

@section('content')
        <script>
            function do_cari() {
                var cari = $('#cari').val();
                var pathname = window.location.pathname;

                if(cari.trim()==''){
                window.location = pathname;
                } else {
                window.location = pathname+'ramuanList?carian=&cari='+cari;
                }
            }
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
                        url:'auth', //&datas='+datas,
                        type:'POST',
                        data: $("form").serialize(),
                        //data: datas,
                        success: function(data){
                            console.log(data);
                            // alert(data);
                            if(data[0] == 'OK'){
                                swal({
                                    title: 'Berjaya',
                                    text: 'Anda berjaya untuk log masuk',
                                    type: 'success',
                                    confirmButtonClass: "btn-success",
                                    confirmButtonText: "Ok",
                                    showConfirmButton: true
                                }).then(function(){
                                    if(data[1] == 'client'){
                                        window.location = '/client';
                                    } else if(data[1] == 'admin'){
                                        window.location = '/jais';
                                    }
                                });
                            } else {
                                swal({
                                title: 'Amaran',
                                text: 'ID pengguna atau katalaluan anda salah. Sila cuba lagi.',
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

        @php
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
            <div class="col-md-6" style="color:red;">
                <marquee behavior="scroll" direction="left" scrollamount="6" onmouseover="this.stop();" onmouseout="this.start();">
                    @foreach ($pengumuman as $umum)
                    <i>{{ strip_tags($umum->announcement) }}</i> <span style="color:#000;"><i class="fas fa-atom"></i></span>
                    @endforeach
                </marquee>
            </div>
        </div>
        <!-- semak status halal + login -->
        <section class="page-section bg-light" id="login" style="padding: 10px;">
            <div class="container">
                <div class="row row-25 align-items-center">
                    <div class="col-lg-8 col-12 mb-30 text-center about-content-two container-login" style="background:#ffffff;">
                        <div class="form-group row">
                            <label for="colFormLabelLg" class="col-sm-4 col-form-label">Semak Status Halal :</label>
                                <div class="input-group col-sm-7">
                                    <input type="text" class="form-control form-control-lg" name="cari" id="cari" value="{{ $cari }}" style="box-shadow: 1px 3px #d6d6d6; height: 40px;">
                                    <div class="input-group-prepend">
                                        <button class="input-group-text" style="background-color:#00eaff;box-shadow: 1px 3px #d6d6d6;" onclick="do_cari()"><i class="fas fa-search text-white" ></i></button>
                                    </div>
                                </div>
                        </div>
                        <div class="form-group row col-12 text-center">
                            <div class="col-sm-4">
                                <a href="/ramuanList?carian=tumbuhan">
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
                                <a href="/ramuanList?carian=kimia">
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
                                <a href="/ramuanList?carian=haiwan">
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
                                <a href="/ramuanList?carian=semulaJadi">
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
                                <a href="/ramuanList?carian=other">
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

                    <div class="col-lg-4 col-12 mb-20">
                        <div class="container-login">
                            <form class="text-white">
                                @csrf
                                <h4 class="mb-30"><b>LOG MASUK</b></h4>
                                <label for="idPengguna" >ID Penguna</label>
                                <input style="height: 35px;" type="text" id="userid" name="userid" class="form-control" required >
                                <br>
                                <label for="inputPassword">Kata Laluan</label>
                                <input style="height: 35px;"  type="password" id="password" name="password" class="form-control"  required >
                                <div class="text-danger mb-3 float-right">
                                    <span style="cursor: pointer" data-toggle="modal" data-target="#modalLupaKataLaluan" >
                                        <div class="text-red">Lupa Kata Laluan ?</div>
                                    </span>
                                </div>
                                <button type="button" class="btnx btn-sm btn-block" style="color:#000;background-color:#00eaff;border-color:#00eaff;" onclick="do_login()">
                                    Masuk
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection
