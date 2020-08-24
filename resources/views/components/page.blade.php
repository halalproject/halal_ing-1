@extends('components.header')

@section('page')
<section class="content-body">
            <header class="page-header visible-lg" style="background: rgb(244,164,96);background: linear-gradient(90deg, rgba(244,164,96,1) 0%, rgba(222,184,135,1) 0%, rgba(210,180,140,0.7651261188068977) 100%);">
                <h2 style="color:#000">Sistem MyHalal Ingredient</h2>
            
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="index.html">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span>Sistem MyHalal Ingredient</span></li>
                        
                    </ol>
            
                    <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fa fa-chevron-left"></i></a>
                </div>
            </header>
            <header class="page-header" style="background: rgb(244,164,96);background: linear-gradient(90deg, rgba(244,164,96,1) 0%, rgba(222,184,135,1) 0%, rgba(210,180,140,0.7651261188068977) 100%);">
                <h2 style="color:#000">Sistem MyHalal Ingredient</h2>
            
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li style="color:#000">
                            <a href="/">
                                <i class="fa fa-home" style="color:#000"></i>
                            </a>
                        </li>
                        <li style="color:#000"><span style="color:#000"><b>MyHalal Ingredient @if(!empty(\Request::route()->getname())) / {{ \Request::route()->getname() }} @endif&nbsp;</b></span></li>
                        
                    </ol>
                </div>
            </header>
			<!-- PAPARAN MENU BAGI MAKLUMAT PERMOHONAN -->
			<div class="row" style="margin-top: -20px">
                @yield('content')
            </div>						
		</section>
    </form>
@endsection