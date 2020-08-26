@extends('components.header')

@section('page')
<section class="content-body">
            <header class="page-header visible-lg" style="background: #34495e;background: #1C2B36">
                <h2>Sistem MyHalal Ingredient</h2>
            
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
            <header class="page-header" style="background: #34495e;background: #1C2B36">
                <h2>Sistem MyHalal Ingredient</h2>
            
                <div class="right-wrapper pull-right">
                    <ol class="breadcrumbs">
                        <li>
                            <a href="/">
                                <i class="fa fa-home"></i>
                            </a>
                        </li>
                        <li><span><b>MyHalal Ingredient @if(!empty(\Request::route()->getname())) / {{ \Request::route()->getname() }} @endif&nbsp;</b></span></li>
                        
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