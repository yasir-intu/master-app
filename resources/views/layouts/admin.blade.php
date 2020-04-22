<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" >

	 <!-- begin::Head -->
    
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
        <meta charset="utf-8"/>

        <title>Keen | Dashboard</title>
        <meta name="description" content="Latest updates and statistic charts"> 
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<!--begin::routes for aungularjs -->
		<script type="text/javascript">
		var auth = {!! json_encode(Auth::user(),true) !!};
		var ass_url= "{{route('facebook-page-message-assigning')}}";
		var ass_url1= "{{route('facebook-page-message-assigning1')}}";
		var post_url="{{route('facebook-page-message-assign-multi')}}";
		var post_url_se1="{{route('facebook-page-message-senior-executive-assign-multi')}}";
		var post_url_se2="{{route('facebook-page-message-senior-executive-assain-progressive')}}";
		var post_url_se3="{{route('facebook-page-message-senior-executive-assain-complete')}}";
		var post_url_se4="{{route('facebook-page-message-senior-executive-assain-reprogressive')}}";
		var se="{{route('facebook-page-message-senior-executive')}}";
		var se1="{{url('admin/senior-executive/client-message2/')}}";
		</script>
		<!--end::routes for aungularjs -->
		
		<!--begin::angular -->
		<script src="{{asset('contents/admin')}}/assets/js/angular/angular.min.js" type="text/javascript"></script>
		<script src="{{asset('contents/admin')}}/assets/js/angular-route/angular-route.min.js" type="text/javascript"></script>
		<script src="{{asset('contents/admin')}}/assets/js/angular-cookies/angular-cookies.min.js" type="text/javascript"></script>
		<script src="{{mix('contents/admin/assets/js/app.js')}}" type="text/javascript"></script>
		<script src="{{mix('contents/admin/assets/js/controllers.js')}}" type="text/javascript"></script>
		<!--end::angular -->

        <!--begin::Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700">        <!--end::Fonts -->

        <!--begin::Page Vendors Styles(used by this page) -->
        <link href="{{asset('contents/admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
        <!--end::Page Vendors Styles -->

        <!--begin::Page Custom Styles(used by this page) -->
        <link href="{{asset('contents/admin')}}/assets/css/pages/wizards/wizard-v3.css" rel="stylesheet" type="text/css" />
        <!--end::Page Custom Styles -->
        
        
        <!--begin::Global Theme Styles(used by all pages) -->
        <link href="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
        <link href="{{asset('contents/admin')}}/assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
        <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
        <!--end::Global Theme Styles -->

        <!--begin::Layout Skins(used by all pages) -->
        
		<link href="{{asset('contents/admin')}}/assets/css/skins/header/base/light.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('contents/admin')}}/assets/css/skins/header/menu/light.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('contents/admin')}}/assets/css/skins/brand/navy.css" rel="stylesheet" type="text/css" />
		<link href="{{asset('contents/admin')}}/assets/css/skins/aside/navy.css" rel="stylesheet" type="text/css" />
		
		<!--end::Layout Skins -->

        <link rel="shortcut icon" href="https://keenthemes.com/keen/themes/keen/theme/demo1/dist/assets/media/logos/favicon.ico" />

        <!-- Hotjar Tracking Code for keenthemes.com -->
		
		<style>
															.spinner {
															  animation: rotate 1.4s linear infinite;
															  -webkit-animation: rotate 1.4s linear infinite;
															  -moz-animation: rotate 1.4s linear infinite;
															  width:60px;
															  height:60px;
															  position: relative;
															}

															.spinner-dot {
															  width:274px;
															  height:274px;
															  position: relative;
															  top: 0;
															}


															@keyframes rotate {
															  to {
																transform: rotate(360deg);
															  }
															}

															@-webkit-keyframes rotate {
															  to {
																-webkit-transform: rotate(360deg);
															  }
															}

															@-moz-keyframes rotate {
															  to {
																transform: rotate(360deg);
															  }
															}

															.path {
															  stroke-dasharray: 170;
															  stroke-dashoffset: 20;
															}

														</style>
<script>
    (function(h,o,t,j,a,r){
        h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        h._hjSettings={hjid:1070954,hjsv:6};
        a=o.getElementsByTagName('head')[0];
        r=o.createElement('script');r.async=1;
        r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        a.appendChild(r);
    })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
</script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-37564768-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'UA-37564768-1');
</script>    </head>
    <!-- end::Head -->
	<script src="{{asset('contents/admin')}}/assets/js/jquery.min.js"></script>
    <script src="{{asset('contents/admin')}}/assets/js/sweetalert.min.js"></script>
    <!-- begin::Body -->
    <body ng-app="masterApp" class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed {{Request::is('admin')? '':'kt-subheader--fixed'}} kt-subheader--enabled kt-subheader--transparent kt-aside--enabled kt-aside--fixed kt-page--loading"  >

       
    	
	<!-- begin:: Header Mobile -->
<div id="kt_header_mobile" class="kt-header-mobile  kt-header-mobile--fixed " >
	<div class="kt-header-mobile__logo">
		<a href="index.html">
			<img alt="Logo" src="{{asset('contents/admin')}}/assets/media/logos/logo-6.png"/>
		</a>
	</div>
	<div class="kt-header-mobile__toolbar">
			
			<button class="kt-header-mobile__toolbar-toggler kt-header-mobile__toolbar-toggler--left" id="kt_aside_mobile_toggler"><span></span></button>
			
					<button class="kt-header-mobile__toolbar-toggler" id="kt_header_mobile_toggler"><span></span></button>
				
		<button class="kt-header-mobile__toolbar-topbar-toggler" id="kt_header_mobile_topbar_toggler"><i class="flaticon-more"></i></button>
	</div>
</div>
<!-- end:: Header Mobile -->	<!-- begin:: Root -->
	<div class="kt-grid kt-grid--hor kt-grid--root">
		<!-- begin:: Page -->
		<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
							<!-- begin:: Aside -->
<button class="kt-aside-close " id="kt_aside_close_btn"><i class="la la-close"></i></button>

<div class="kt-aside  kt-aside--fixed  kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop" id="kt_aside">
	<!-- begin::Aside Brand -->
<div class="kt-aside__brand kt-grid__item " id="kt_aside_brand">
	<div class="kt-aside__brand-logo">
		<a href="{{route('admin')}}">
			<img alt="Logo" src="{{asset('contents/admin')}}/assets/media/logos/logo-6.png"/>
		</a>
	</div>
	
	<div class="kt-aside__brand-tools">
		<div class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left"><span></span></div>
	</div>
</div>
<!-- end:: Aside Brand -->	<!-- begin:: Aside Menu -->
<div class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid" id="kt_aside_menu_wrapper">
	<div id="kt_aside_menu" class="kt-aside-menu" data-ktmenu-vertical="1" data-ktmenu-scroll="1" data-ktmenu-dropdown-timeout="500">		
		
		<ul class="kt-menu__nav ">
            {{-- <li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">My Menu</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
            </li> --}}
            
            <li class="kt-menu__item  kt-menu__item--submenu {{Request::is('admin/profile')? 'kt-menu__item--active' : ''}}" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
                <a  href="{{route('profile')}}" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon2-user"></i>
                    <span class="kt-menu__link-text">Profile</span>
                </a>
            </li>
            @if (Auth::user()->role_id<4)
			<li class="kt-menu__item  kt-menu__item--submenu {{Request::is('admin/user')? 'kt-menu__item--open kt-menu__item--here' : ''}} {{Request::is('admin/user/add')? 'kt-menu__item--open kt-menu__item--here' : ''}}" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
				<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
                    <i class="kt-menu__link-icon flaticon-users-1"></i>
					<span class="kt-menu__link-text">Users</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu ">
					<span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
                       
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
							<span class="kt-menu__link">
								<span class="kt-menu__link-text">All Users</span>
							</span>
                        </li>
                        @if (Auth::user()->role_id==1)
                            
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/super-admin')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{route('super-admin-all-super-admin')}}" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Super Admin</span>
							</a>
						</li>
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/managing-director')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{route('super-admin-all-director')}}" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Managing Director</span>
							</a>
                        </li>
                        
                        @endif
                        @if (Auth::user()->role_id<=2)
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/seniour-executive')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="@if (Auth::user()->role_id==1){{route('super-admin-all-executive')}}@endif @if (Auth::user()->role_id==2){{route('managing-director-all-executive')}}@endif" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Senior Executive</span>
							</a>
                        </li>
                        @endif
                        @if(Auth::user()->role_id<=3)
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/employee')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="@if (Auth::user()->role_id==1){{route('super-admin-all-employee')}}@endif @if (Auth::user()->role_id==2){{route('managing-director-all-employee')}}@endif @if (Auth::user()->role_id==3){{route('senior-executive-all-employee')}}@endif" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Employee</span>
							</a>
                        </li>
                        @endif
                        @if (Auth::user()->role_id==1)
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/author')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{route('super-admin-all-author')}}" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Author</span>
							</a>
                        </li>
                        <li class="kt-menu__item  {{Request::is('admin/super-admin/all/editor')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{route('super-admin-all-editor')}}" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
                                    <span></span>
								</i>
								<span class="kt-menu__link-text">All Editor</span>
							</a>
                        </li>
                        @endif
                        @if (Auth::user()->role_id<4)
						<li class="kt-menu__item {{Request::is('admin/user/add')? 'kt-menu__item--active' : ''}}" aria-haspopup="true" >
							<a  href="{{route('add-user')}}" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
								<span class="kt-menu__link-text">Add Users</span>
							</a>
                        </li>
                        @endif
					</ul>
				</div>
            </li>
            @endif
			@if (Auth::user()->role_id<=4)
			<li class="kt-menu__item {{Request::is('admin/client-message')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{after}')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{before}')? 'kt-menu__item--here' : ''}}" aria-haspopup="true"><a href="@if (Auth::user()->role_id<=2){{'/admin/client-message'}}@endif @if (Auth::user()->role_id==3){{'/admin/senior-executive/client-message'}}@endif @if (Auth::user()->role_id==4){{route('facebook-page-message-employee')}}@endif" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-facebook-letter-logo"></i><span class="kt-menu__link-text">Client Messages</span></a></li>
			@endif
			@if (Auth::user()->role_id==4)
			<li class="kt-menu__item {{Request::is('admin/client-message')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{after}')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{before}')? 'kt-menu__item--here' : ''}}" aria-haspopup="true"><a href="{{route('facebook-page-message-employee-progressive')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-cogwheel-1"></i><span class="kt-menu__link-text">Work in Progress</span></a></li>
			@endif
			@if (Auth::user()->role_id==4)
			<li class="kt-menu__item {{Request::is('admin/client-message')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{after}')? 'kt-menu__item--here' : ''}} {{Request::is('admin/client-message/next-pagination/{before}')? 'kt-menu__item--here' : ''}}" aria-haspopup="true"><a href="{{route('facebook-page-message-employee-complete')}}" class="kt-menu__link "><i class="kt-menu__link-icon flaticon-medal"></i><span class="kt-menu__link-text">Work Completed</span></a></li>
            @endif
            @if (Auth::user()->role_id==1 || Auth::user()->role_id==0)
            @endif

			{{-- <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
				<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<i class="kt-menu__link-icon flaticon2-telegram-logo"></i>
					<span class="kt-menu__link-text">Apps</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu ">
					<span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
							<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
								<span class="kt-menu__link-text">Users</span>
								<i class="kt-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="kt-menu__submenu ">
								<span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-columns-1.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Columns 1</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
                    </ul>
                </div>
            </li> --}}
		</ul>

		@if (Auth::user()->role_id==0)
			
		<ul class="kt-menu__nav ">
			<li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--open kt-menu__item--here" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
				<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<i class="kt-menu__link-icon flaticon2-graphic"></i>
					<span class="kt-menu__link-text">Dashboards</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu ">
					<span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
							<span class="kt-menu__link">
								<span class="kt-menu__link-text">Dashboards</span>
							</span>
						</li>
						<li class="kt-menu__item  kt-menu__item--active" aria-haspopup="true" >
							<a  href="index.html" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot">
									<span></span>
								</i>
								<span class="kt-menu__link-text">Navy Aside</span>
							</a>
						</li>
						<li class="kt-menu__item " aria-haspopup="true" >
							<a  href="dashboards/brand-aside.html" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
								<span class="kt-menu__link-text">Brand Aside</span>
							</a>
						</li>
						<li class="kt-menu__item " aria-haspopup="true" >
							<a  href="dashboards/navy-header.html" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
								<span class="kt-menu__link-text">Navy Header</span>
							</a>
						</li>
						<li class="kt-menu__item " aria-haspopup="true" >
							<a  href="dashboards/light-aside.html" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
								<span class="kt-menu__link-text">Light Aside</span>
							</a>
						</li>
						<li class="kt-menu__item " aria-haspopup="true" >
							<a  href="dashboards/brand-header.html" class="kt-menu__link ">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
								<span class="kt-menu__link-text">Brand Header</span>
							</a>
						</li>
					</ul>
				</div>
			</li>
			<li class="kt-menu__section ">
                <h4 class="kt-menu__section-text">Custom</h4>
                <i class="kt-menu__section-icon flaticon-more-v2"></i>
			</li>
			<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
				<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
					<i class="kt-menu__link-icon flaticon2-telegram-logo"></i>
					<span class="kt-menu__link-text">Apps</span>
					<i class="kt-menu__ver-arrow la la-angle-right"></i>
				</a>
				<div class="kt-menu__submenu ">
					<span class="kt-menu__arrow"></span>
					<ul class="kt-menu__subnav">
						<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
							<span class="kt-menu__link">
								<span class="kt-menu__link-text">Apps</span>
							</span>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
							<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i>
								<span class="kt-menu__link-text">Users</span>
								<i class="kt-menu__ver-arrow la la-angle-right"></i>
							</a>
							<div class="kt-menu__submenu ">
								<span class="kt-menu__arrow"></span>
								<ul class="kt-menu__subnav">
									<li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true" >
										<span class="kt-menu__link">
											<span class="kt-menu__link-text">Users</span>
										</span>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-columns-1.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Columns 1</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-columns-2.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Columns 2</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-columns-3.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Columns 3</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-row.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Row</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/list-datatable.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">List - Datatable</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/add.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">Add User</span>
										</a>
									</li>
									<li class="kt-menu__item " aria-haspopup="true" >
										<a  href="custom/users/edit.html" class="kt-menu__link ">
											<i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i>
											<span class="kt-menu__link-text">Edit User</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true"  data-ktmenu-submenu-toggle="hover">
							<a  href="javascript:;" class="kt-menu__link kt-menu__toggle">
								<i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Profile</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
<div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
    <ul class="kt-menu__subnav">
        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Profile</span></span></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/overview-1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Overview 1</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/overview-2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Overview 2</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/overview-3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Overview 3</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/personal-information.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Personal Information</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/account-settings.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Account Settings</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/change-password.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Change Password</span></a></li>
        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/profile/user-settings.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">User Settings</span></a></li>
    </ul>
</div>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="custom/inbox.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Inbox</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger kt-badge--inline">new</span></span></a></li>
</ul>
</div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-copy"></i><span class="kt-menu__link-text">Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pages</span></span></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizards</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Wizards</span></span></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/wizards/wizard-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/wizards/wizard-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard v2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/wizards/wizard-v3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard v3</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/wizards/wizard-v4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Wizard v4</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Blog</span></span></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/blog/grid.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog Grid</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/blog/grid-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog Grid v2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/blog/list.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog List</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/blog/post.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Blog Post</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Pricing</span></span></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pricing/pricing-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/pricing/pricing-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pricing v2</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoices</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Invoices</span></span></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/invoices/invoice-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoice v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/invoices/invoice-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Invoice v2</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">FAQs</span></span></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/faq/faq-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/faq/faq-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ v2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/faq/faq-v3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ v3</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/faq/faq-v4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">FAQ v4</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/login/login-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/login/login-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Login v2</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Error Pages</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/error/404-v1.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">404 - v1</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/error/404-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">404 - v2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/error/404-v3.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">404 - v3</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="custom/error/404-v4.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">404 - v4</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">Layout</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-open-box"></i><span class="kt-menu__link-text">Features</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Features</span></span></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Header</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/header/non-fixed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Non-fixed</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/header/menu-removed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Menu Removed</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Subheader</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/subheader/fixed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Fixed</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/subheader/subheader-v2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Subheader v2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/subheader/removed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Removed</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Aside</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/aside/minimized.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Minimized</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/aside/non-fixed.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Non-fixed</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/aside/dropdown-menu.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Dropdown Menu</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/aside/no-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">No Aside</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/aside/no-aside-fixed-content.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">No Aside & Fixed Content</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Misc</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/misc/fixed-content.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Fixed Content</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/misc/fixed-content-subheader.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Fixed Content & Subheader</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/misc/secondary-aside.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Secondary Aside</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/misc/fixed-footer.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Fixed Footer</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="layout/features/misc/blank-page.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">Blank Page</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="kt-menu__item " aria-haspopup="true"><a href="builder.html" class="kt-menu__link "><i class="kt-menu__link-icon flaticon2-gear"></i><span class="kt-menu__link-text">Builder</span></a></li>
<li class="kt-menu__section ">
    <h4 class="kt-menu__section-text">Components</h4>
    <i class="kt-menu__section-icon flaticon-more-v2"></i>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-layers-1"></i><span class="kt-menu__link-text">Base</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Base</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/alert.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Alert</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/buttons.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Buttons</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/button-group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Button Group</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/card.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Card</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/collapse.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Collapse</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/accordions.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Accordions</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/dropdown.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dropdown</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/list-group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List Group</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/modal.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Modal</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/navs.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Navs</span></a></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tabs</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/tabs/base.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Base Tabs</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/tabs/line.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Line Tabs</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/tabs/button.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Button Tabs</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/badge.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Badge</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/spinners.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Spinners</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/toasts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Toasts</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/pagination.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pagination</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/popovers.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Popovers</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/tooltips.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tooltips</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/progress.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Progress</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/breadcrumb.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Breadcrumb</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/base/table.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Table</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-start-up"></i><span class="kt-menu__link-text">Custom</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Custom</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/colors.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Colors</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/typography.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Typography</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/spinners.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Spinners</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/notes.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Notes</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/lists.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Lists</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/notifications.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Notifications</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/media.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Media</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/timeline.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Timeline</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/navs.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Navs</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/pagination.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pagination</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/custom/head.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Head</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-cube-1"></i><span class="kt-menu__link-text">Extended</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">2</span></span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Extended</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--brand">2</span></span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/sticky-panels.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sticky Panels</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/blockui.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Block UI</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/scroll.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Perfect Scroll</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/toastr.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Toastr</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/treeview.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tree View</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/sweetalert2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">SweetAlert2</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/dual-listbox.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dual Listbox</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/session-timeout.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Session Timeout</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/extended/idle-timer.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Idle Timer</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-pie-chart-4"></i><span class="kt-menu__link-text">Widgets</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Widgets</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/widgets/charts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Charts</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/widgets/general.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">General</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-copy"></i><span class="kt-menu__link-text">Forms</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Forms</span></span></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Controls</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/base.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Base Inputs</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/input-group.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Input Groups</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/checkbox.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Checkbox</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/radio.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Radio</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/switch.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Switch</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/option.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Options</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/controls/avatar.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Avatar Inputs</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Widgets</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-datepicker.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Datepicker</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-datetimepicker.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Datetimepicker</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-timepicker.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Timepicker</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-daterangepicker.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Daterangepicker</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-touchspin.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Touchspin</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-maxlength.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Maxlength</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/tagify.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tagify</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/select2.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Select2</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-multipleselectsplitter.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Multiple Select Splitter</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/bootstrap-select.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Bootstrap Select</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/typeahead.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Typeahead</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/nouislider.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">noUiSlider</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/input-mask.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Input Masks</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/autosize.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Autosize</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/clipboard.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Clipboard</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/dropzone.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Dropzone</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/widgets/recaptcha.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Google reCaptcha</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Editors</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/tinymce.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">TinyMCE</span></a></li>
                        <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">CKEditor</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                            <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/ckeditor-classic.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">CKEditor Classic</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/ckeditor-inline.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">CKEditor Inline</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/ckeditor-balloon.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">CKEditor Balloon</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/ckeditor-balloon-block.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">CKEditor Balloon Block</span></a></li>
                                    <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/ckeditor-document.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--line"><span></span></i><span class="kt-menu__link-text">CKEditor Document</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/quill.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Quill Text Editor</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/summernote.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Summernote</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/editors/bootstrap-markdown.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Markdown</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Layouts</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/layouts/basic.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Basic</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/layouts/multi-column.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Multi Column</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/layouts/action-bars.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Basic Action Bar</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/layouts/sticky-action-bars.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sticky Action Bars</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/layouts/repeater.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Form Repeater</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Validation</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/validation/states.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">States</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/validation/controls.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Controls</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/validation/widgets.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Widgets</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">File Upload</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/file-upload/dropzonejs.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">DropzoneJS</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/forms/file-upload/uppy.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Uppy</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-browser-2"></i><span class="kt-menu__link-text">Keen Datatable</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Keen Datatable</span></span></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Base</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/data-local.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Local Data</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/data-json.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">JSON Data</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/data-ajax.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Ajax Data</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/html-table.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">HTML Table</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/local-sort.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Local Sort</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/base/translation.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Translation</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Advanced</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/advanced/record-selection.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Record Selection</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/advanced/row-details.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Row Details</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/advanced/modal.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Modal Examples</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/advanced/column-rendering.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Column Rendering</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/advanced/column-width.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Column Width</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Scrolling</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/scrolling/vertical.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Vertical Scrolling</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/scrolling/horizontal.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Horizontal Scrolling</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Child Datatables</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/child/data-local.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Local Data</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/child/data-ajax.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Remote Data</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">API</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/api/methods.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">API Methods</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/keen-datatable/api/events.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Events</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-list-3"></i><span class="kt-menu__link-text">DataTables</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">DataTables</span></span></li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Basic</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/basic/basic.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Basic Tables</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/basic/scrollable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Scrollable Tables</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/basic/headers.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Complex Headers</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/basic/paginations.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Pagination Options</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Advanced</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/column-rendering.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Column Rendering</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/multiple-controls.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Multiple Controls</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/column-visibility.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Column Visibility</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/row-callback.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Row Callback</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/row-grouping.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Row Grouping</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/advanced/footer-callback.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Footer Callback</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Data sources</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/data-sources/html.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">HTML</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/data-sources/javascript.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Javascript</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/data-sources/ajax-client-side.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Ajax Client-side</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/data-sources/ajax-server-side.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Ajax Server-side</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Search Options</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/search-options/column-search.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Column Search</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/search-options/advanced-search.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Advanced Search</span></a></li>
                    </ul>
                </div>
            </li>
            <li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Extensions</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
                    <ul class="kt-menu__subnav">
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/buttons.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Buttons</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/colreorder.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">ColReorder</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/keytable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">KeyTable</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/responsive.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Responsive</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/rowgroup.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">RowGroup</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/rowreorder.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">RowReorder</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/scroller.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Scroller</span></a></li>
                        <li class="kt-menu__item " aria-haspopup="true"><a href="components/datatables/extensions/select.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Select</span></a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-gift-1"></i><span class="kt-menu__link-text">Icons</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/icons/flaticon.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Flaticon</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/icons/fontawesome5.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Fontawesome 5</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/icons/lineawesome.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Lineawesome</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/icons/socicons.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Socicons</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-browser-1"></i><span class="kt-menu__link-text">Portlets</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Portlets</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/portlets/base.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Base</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/portlets/tools.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Tools</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/portlets/draggable.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Draggable</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/portlets/sticky.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Sticky</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-calendar-2"></i><span class="kt-menu__link-text">Calendar</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Calendar</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/basic.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Basic</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/list-view.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">List View</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/agenda-week.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Agenda Week View</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/google.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Google Calendar</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/external.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">External Events</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/calendar/rendering.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Event Rendering</span></a></li>
        </ul>
    </div>
</li>
<li class="kt-menu__item  kt-menu__item--submenu" aria-haspopup="true" data-ktmenu-submenu-toggle="hover"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-icon flaticon2-graph-1"></i><span class="kt-menu__link-text">Charts</span><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
    <div class="kt-menu__submenu "><span class="kt-menu__arrow"></span>
        <ul class="kt-menu__subnav">
            <li class="kt-menu__item  kt-menu__item--parent" aria-haspopup="true"><span class="kt-menu__link"><span class="kt-menu__link-text">Charts</span></span></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/charts/flotcharts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Flot Charts</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/charts/google-charts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Google Charts</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/charts/morris-charts.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Morris Charts</span></a></li>
            <li class="kt-menu__item " aria-haspopup="true"><a href="components/charts/chart-js.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Chart JS</span></a></li>
        </ul>
    </div>
</li>
</ul>
@endif
</div>
</div>
<!-- end:: Aside Menu -->
<!-- begin:: Aside Footer -->
@if (Auth::user()->role_id==0)
<div class="kt-aside__footer kt-grid__item" id="kt_aside_footer">
    <div class="kt-aside__footer-nav">
        <div class="kt-aside__footer-item">
            <a href="#" class="btn btn-icon"><i class="flaticon2-gear"></i></a>
        </div>
        <div class="kt-aside__footer-item">
            <a href="#" class="btn btn-icon"><i class="flaticon2-cube"></i></a>
        </div>
        <div class="kt-aside__footer-item">
            <a href="#" class="btn btn-icon"><i class="flaticon2-bell-alarm-symbol"></i></a>
        </div>
        <div class="kt-aside__footer-item">
            <button type="button" class="btn btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="flaticon2-add"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-left">
                <ul class="kt-nav">
                    <li class="kt-nav__section kt-nav__section--first">
                        <span class="kt-nav__section-text">Export Tools</span>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-print"></i>
                            <span class="kt-nav__link-text">Print</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-copy"></i>
                            <span class="kt-nav__link-text">Copy</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-file-excel-o"></i>
                            <span class="kt-nav__link-text">Excel</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-file-text-o"></i>
                            <span class="kt-nav__link-text">CSV</span>
                        </a>
                    </li>
                    <li class="kt-nav__item">
                        <a href="#" class="kt-nav__link">
                            <i class="kt-nav__link-icon la la-file-pdf-o"></i>
                            <span class="kt-nav__link-text">PDF</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="kt-aside__footer-item">
            <a href="#" class="btn btn-icon"><i class="flaticon2-calendar-2"></i></a>
        </div>
    </div>
</div>
@endif
<!-- end:: Aside Footer-->
</div>

<!-- end:: Aside -->
<!-- begin:: Wrapper -->
<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper" id="kt_wrapper">
    <!-- begin:: Header -->
    <div id="kt_header" class="kt-header kt-grid__item  kt-header--fixed ">

        <!-- begin:: Header Menu -->
        <button class="kt-header-menu-wrapper-close" id="kt_header_menu_mobile_close_btn"><i class="la la-close"></i></button>
         <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">

            <div id="kt_header_menu" class="kt-header-menu kt-header-menu-mobile  kt-header-menu--layout- ">
                {{--<ul class="kt-menu__nav ">
                    <li class="kt-menu__item  kt-menu__item--submenu kt-menu__item--rel kt-menu__item--active" data-ktmenu-submenu-toggle="click" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><span class="kt-menu__link-text">Pages</span><i class="kt-menu__hor-arrow la la-angle-down"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                        <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--left">
                            <ul class="kt-menu__subnav">
                                <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Create New Post</span></a></li>
                                <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Generate Reports</span><span class="kt-menu__link-badge"><span class="kt-badge kt-badge--success">2</span></span></a></li>
                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="javascript:;" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Manage Orders</span><i class="kt-menu__hor-arrow la la-angle-right"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Latest Orders</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Pending Orders</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Processed Orders</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Delivery Reports</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Payments</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Customers</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__item  kt-menu__item--submenu" data-ktmenu-submenu-toggle="hover" aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link kt-menu__toggle"><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Customer Feedbacks</span><i class="kt-menu__hor-arrow la la-angle-right"></i><i class="kt-menu__ver-arrow la la-angle-right"></i></a>
                                    <div class="kt-menu__submenu kt-menu__submenu--classic kt-menu__submenu--right">
                                        <ul class="kt-menu__subnav">
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Customer Feedbacks</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Supplier Feedbacks</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Reviewed Feedbacks</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Resolved Feedbacks</span></a></li>
                                            <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><span class="kt-menu__link-text">Feedback Reports</span></a></li>
                                        </ul>
                                    </div>
                                </li>
                                <li class="kt-menu__item " aria-haspopup="true"><a href="index-2.html#.html" class="kt-menu__link "><i class="kt-menu__link-bullet kt-menu__link-bullet--dot"><span></span></i><span class="kt-menu__link-text">Register Member</span></a></li>
                            </ul>
                        </div>
                    </li>
				</ul>--}}
	</div>
</div> 
<!-- end:: Header Menu -->		<!-- begin:: Header Topbar -->
<div class="kt-header__topbar">
{{-- 
    <!--begin: Search -->
	<div class="kt-header__topbar-item kt-header__topbar-item--search dropdown">
		<div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
			<span class="kt-header__topbar-icon" ><i class="flaticon2-search-1"></i></span>
		</div>
		<div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-top-unround dropdown-menu-anim dropdown-menu-lg">
			<div class="kt-quick-search kt-quick-search--dropdown kt-quick-search--result-compact" id="kt_quick_search_dropdown">
    <form method="get" class="kt-quick-search__form">
        <div class="input-group">
            <div class="input-group-prepend"><span class="input-group-text"><i class="flaticon2-search-1"></i></span></div>
            <input type="text" class="form-control kt-quick-search__input" placeholder="Search...">
            <div class="input-group-append"><span class="input-group-text"><i class="la la-close kt-quick-search__close"></i></span></div>
       	</div>
    </form>
    <div class="kt-quick-search__wrapper kt-scroll" data-scroll="true" data-height="325" data-mobile-height="200">

    </div>
</div>
		</div>
	</div>
<!--end: Search -->
 --}}
<!--begin: Notifications -->
    <div class="kt-header__topbar-item dropdown">
        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="30px,0px">
            <span class="kt-header__topbar-icon">
                <i class="flaticon2-bell-alarm-symbol"></i>
                <span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger" style="position: absolute;top: 9px;right: 6px;"><b>
                    
                </b></span></span>
                <span class="kt-badge kt-badge--dot kt-badge--notify kt-badge--sm kt-badge--danger"></span>
            </span>
        </div>
        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg">
            <form>
                <div class="kt-head" style="background-image: url({{asset('contents/admin')}}/assets/media/misc/head_bg_sm.jpg)">
    <h3 class="kt-head__title">User Notifications</h3>
    <div class="kt-head__sub"><span class="kt-head__desc">23 new notifications</span></div>
</div>
<div class="kt-notification kt-margin-t-30 kt-margin-b-20 kt-scroll" data-scroll="true" data-height="270" data-mobile-height="220">
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-line-chart kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New order has been received
            </div>
            <div class="kt-notification__item-time">
                2 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-box-1 kt-font-brand"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New customer is registered
            </div>
            <div class="kt-notification__item-time">
                3 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-chart2 kt-font-danger"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                Application has been approved
            </div>
            <div class="kt-notification__item-time">
                3 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-image-file kt-font-warning"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New file has been uploaded
            </div>
            <div class="kt-notification__item-time">
                5 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-user kt-font-info"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New user feedback received
            </div>
            <div class="kt-notification__item-time">
                8 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-pie-chart-2 kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                System reboot has been successfully completed
            </div>
            <div class="kt-notification__item-time">
                12 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-favourite kt-font-focus"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New order has been placed
            </div>
            <div class="kt-notification__item-time">
                15 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item kt-notification__item--read">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-safe kt-font-primary"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                Company meeting canceled
            </div>
            <div class="kt-notification__item-time">
                19 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-psd kt-font-success"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New report has been received
            </div>
            <div class="kt-notification__item-time">
                23 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon-download-1 kt-font-danger"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                Finance report has been generated
            </div>
            <div class="kt-notification__item-time">
                25 hrs ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon-security kt-font-warning"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New customer comment recieved
            </div>
            <div class="kt-notification__item-time">
                2 days ago
            </div>
        </div>
    </a>
    <a href="#" class="kt-notification__item">
        <div class="kt-notification__item-icon">
            <i class="flaticon2-pie-chart kt-font-focus"></i>
        </div>
        <div class="kt-notification__item-details">
            <div class="kt-notification__item-title">
                New customer is registered
            </div>
            <div class="kt-notification__item-time">
                3 days ago
            </div>
        </div>
    </a>
</div>
            </form>
        </div>
    </div>
<!--end: Notifications -->
{{--
<!--begin: Quick Actions -->
    <div class="kt-header__topbar-item">
        <div class="kt-header__topbar-wrapper" id="kt_offcanvas_toolbar_quick_actions_toggler_btn">
            <span class="kt-header__topbar-icon"><i class="flaticon2-gear"></i></span>
        </div>
    </div>
<!--end: Quick Actions -->
 
<!--begin:: Languages -->
<div class="kt-header__topbar-item kt-header__topbar-item--langs">
    <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="10px,0px">
        <span class="kt-header__topbar-icon">
			<img class="" src="https://keenthemes.com/keen/themes/keen/theme/demo1/dist/assets/media/flags/226-united-states.svg" alt="" />
		</span>
    </div>
    <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround">
        <ul class="kt-nav kt-margin-t-10 kt-margin-b-10">
    <li class="kt-nav__item kt-nav__item--active">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="https://keenthemes.com/keen/themes/keen/theme/demo1/dist/assets/media/flags/226-united-states.svg" alt="" /></span>
            <span class="kt-nav__link-text">English</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="https://keenthemes.com/keen/themes/keen/theme/demo1/dist/assets/media/flags/128-spain.svg" alt="" /></span>
            <span class="kt-nav__link-text">Spanish</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="#" class="kt-nav__link">
            <span class="kt-nav__link-icon"><img src="https://keenthemes.com/keen/themes/keen/theme/demo1/dist/assets/media/flags/162-germany.svg" alt="" /></span>
            <span class="kt-nav__link-text">German</span>
        </a>
    </li>
</ul>    </div>
</div>
<!--end:: Languages -->
 --}}
<!--begin: User Bar -->
<div class="kt-header__topbar-item kt-header__topbar-item--user">

        <div class="kt-header__topbar-wrapper" data-toggle="dropdown" data-offset="0px,0px">
            <!--use "kt-rounded" class for rounded avatar style-->
        <div class="kt-header__topbar-user kt-rounded-">
			
			@if (Auth::user()->role_id==1)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->superAdmin->photo)}}">
			@endif
            @if (Auth::user()->role_id==2)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->director->photo)}}">
			@endif
            @if (Auth::user()->role_id==3)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->executive->photo)}}">
			@endif
            @if (Auth::user()->role_id==4)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->employee->photo)}}">
			@endif
            @if (Auth::user()->role_id==5)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->author->photo)}}">
			@endif
            @if (Auth::user()->role_id==6)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->editor->photo)}}">
            @endif
            <span class="kt-header__topbar-username kt-hidden-mobile" style="padding: 0 0 0 0.55rem;">
                @if (Auth::user()->role_id==1)
				{{Auth::user()->superAdmin->name}}
				@endif
				@if (Auth::user()->role_id==2)
				{{Auth::user()->director->name}}
				@endif
				@if (Auth::user()->role_id==3)
				{{Auth::user()->executive->name}}
				@endif
				@if (Auth::user()->role_id==4)
				{{Auth::user()->employee->name}}
				@endif
				@if (Auth::user()->role_id==5)
				{{Auth::user()->author->name}}
				@endif
				@if (Auth::user()->role_id==6)
				{{Auth::user()->editor->name}}
                @endif
            </span>
            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
            <span class="kt-badge kt-badge--username kt-badge--lg kt-badge--brand kt-hidden kt-badge--bold">S</span>
        </div>
    </div>

        <div class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-sm">
        <div class="kt-user-card kt-margin-b-40 kt-margin-b-30-tablet-and-mobile" style="background-image: url({{asset('contents/admin')}}/assets/media/misc/head_bg_sm.jpg)">
    <div class="kt-user-card__wrapper">
        <div class="kt-user-card__pic">
            <!--use "kt-rounded" class for rounded avatar style-->
            @if (Auth::user()->role_id==1)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->superAdmin->photo)}}">
			@endif
            @if (Auth::user()->role_id==2)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->director->photo)}}">
			@endif
            @if (Auth::user()->role_id==3)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->executive->photo)}}">
			@endif
            @if (Auth::user()->role_id==4)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->employee->photo)}}">
			@endif
            @if (Auth::user()->role_id==5)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->author->photo)}}">
			@endif
            @if (Auth::user()->role_id==6)
			<img alt="user" src="{{asset('uploads/users/'.Auth::user()->editor->photo)}}">
			@endif
        </div>
        <div class="kt-user-card__details">
            <div class="kt-user-card__name">
				@if (Auth::user()->role_id==1)
				{{Auth::user()->superAdmin->name}}
				@endif
				@if (Auth::user()->role_id==2)
				{{Auth::user()->director->name}}
				@endif
				@if (Auth::user()->role_id==3)
				{{Auth::user()->executive->name}}
				@endif
				@if (Auth::user()->role_id==4)
				{{Auth::user()->employee->name}}
				@endif
				@if (Auth::user()->role_id==5)
				{{Auth::user()->author->name}}
				@endif
				@if (Auth::user()->role_id==6)
				{{Auth::user()->editor->name}}
                @endif
            </div>
            <div class="kt-user-card__position">{{Auth::user()->roleName->role}}.</div>
        </div>
    </div>
</div>

<ul class="kt-nav kt-margin-b-10">
    <li class="kt-nav__item">
        <a href="{{route('profile')}}" class="kt-nav__link">
            <span class="kt-nav__link-icon"><i class="flaticon2-calendar-3"></i></span>
            <span class="kt-nav__link-text">My Profile</span>
        </a>
    </li>
    <li class="kt-nav__item">
        <a href="{{route('facebook-page-message')}}" class="kt-nav__link">
            <span class="kt-nav__link-icon"><i class="flaticon2-mail"></i></span>
            <span class="kt-nav__link-text">Messages</span>
        </a>
    </li>
    <li class="kt-nav__separator kt-nav__separator--fit"></li>

    <li class="kt-nav__custom kt-space-between">
        <a  href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="btn btn-label-brand btn-upper btn-sm btn-bold">Sign Out</a>
		<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
			@csrf
		</form>
    </li>
</ul>
    </div>
    </div>
<!--end: User Bar -->
{{-- 
<!--begin:: Quick Panel Toggler -->
<div class="kt-header__topbar-item kt-header__topbar-item--quick-panel" data-toggle="kt-tooltip" title="Quick panel" data-placement="right">
	<span class="kt-header__topbar-icon" id="kt_quick_panel_toggler_btn">
					<i class="flaticon2-grids"></i>
			</span>
</div>
<!--end:: Quick Panel Toggler -->
 --}}	
</div>
<!-- end:: Header Topbar --></div>
<!-- end:: Header -->

				<div class="kt-content  kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="padding: 10px;" id="kt_content" ng-view>
				
				{{-- @yield('admin') --}}

				</div>

				

					<!-- begin:: Footer -->
<div class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop" style="z-index: -1;position: relative;bottom: -36px;">
	<div class="kt-container  kt-container--fluid ">
		<div class="kt-footer__copyright">
			<a href="http://keenthemes.com/keen" target="_blank" class="kt-link">Master Design.Com</a>&nbsp;&copy;&nbsp;<script>var x = new Date().getFullYear(); if (x != '2020') { document.write('2020 - ');}</script><script>document.write(new Date().getFullYear());</script>
		</div>
	</div>
</div>
<!-- end:: Footer -->			</div>
			<!-- end:: Wrapper -->

					</div>
		<!-- end:: Page -->
	</div>
	<!-- end:: Root -->
/* 
	<!-- begin:: Topbar Offcanvas Panels -->
	
	
			<!-- begin::Offcanvas Toolbar Quick Actions -->
<div id="kt_offcanvas_toolbar_quick_actions" class="kt-offcanvas-panel">
	<div class="kt-offcanvas-panel__head">
		<h3 class="kt-offcanvas-panel__title">
			Quick Actions
		</h3>
		<a href="#" class="kt-offcanvas-panel__close" id="kt_offcanvas_toolbar_quick_actions_close"><i class="flaticon2-delete"></i></a>
	</div>
	<div class="kt-offcanvas-panel__body">
		<div class="kt-grid-nav-v2">
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-box"></i></div>
				<div class="kt-grid-nav-v2__item-title">Orders</div>				
			</a>
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon-download-1"></i></div>
				<div class="kt-grid-nav-v2__item-title">Uploades</div>				
			</a>
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-supermarket"></i></div>
				<div class="kt-grid-nav-v2__item-title">Products</div>				
			</a>
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-avatar"></i></div>
				<div class="kt-grid-nav-v2__item-title">Customers</div>				
			</a>
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-list"></i></div>
				<div class="kt-grid-nav-v2__item-title">Blog Posts</div>				
			</a>
			<a href="#" class="kt-grid-nav-v2__item">
				<div class="kt-grid-nav-v2__item-icon"><i class="flaticon2-settings"></i></div>
				<div class="kt-grid-nav-v2__item-title">Settings</div>				
			</a>			
		</div>
	</div>
</div>
<!-- end::Offcanvas Toolbar Quick Actions -->	
		<!-- end:: Topbar Offcanvas Panels -->

            <!-- begin:: Quick Panel -->
<div id="kt_quick_panel" class="kt-offcanvas-panel">
	<div class="kt-offcanvas-panel__nav">
		<ul class="nav nav-pills" role="tablist">
	        <li class="nav-item active">
	            <a class="nav-link active" data-toggle="tab" href="#kt_quick_panel_tab_notifications" role="tab">Notifications</a>
	        </li>
	        <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_actions" role="tab">Actions</a>
	        </li>
	        <li class="nav-item">
	            <a class="nav-link" data-toggle="tab" href="#kt_quick_panel_tab_settings" role="tab">Settings</a>
	        </li>
	    </ul>

	    <button class="kt-offcanvas-panel__close" id="kt_quick_panel_close_btn"><i class="flaticon2-delete"></i></button>
	</div>

	<div class="kt-offcanvas-panel__body">
	    <div class="tab-content">
	        <div class="tab-pane fade show kt-offcanvas-panel__content kt-scroll active" id="kt_quick_panel_tab_notifications" role="tabpanel">
 				<!--Begin::Timeline -->
                <div class="kt-timeline">
                    <!--Begin::Item -->                      
                    <div class="kt-timeline__item kt-timeline__item--success">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon">
                                    <i class="flaticon-feed kt-font-success"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">02:30 PM</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            KeenThemes created new layout whith tens of new options for Keen Admin panel                                                                                             
                        </a>
                        <div class="kt-timeline__item-info">
                            HTML,CSS,VueJS                                                                                            
                        </div>
                    </div>
                    <!--End::Item -->  

                    <!--Begin::Item --> 
                    <div class="kt-timeline__item kt-timeline__item--danger">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon">
                                    <i class="flaticon-safe-shield-protection kt-font-danger"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">01:20 AM</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            New secyrity alert by Firewall & order to take aktion on User Preferences                                                                                             
                        </a>
                        <div class="kt-timeline__item-info">
                            Security, Fieewall                                                                                         
                        </div>
                    </div>  
                    <!--End::Item --> 

                    <!--Begin::Item --> 
                    <div class="kt-timeline__item kt-timeline__item--brand">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon">
                                    <i class="flaticon2-box kt-font-brand"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">Yestardey</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            FlyMore design mock-ups been uploadet by designers Bob, Naomi, Richard                                                                                            
                        </a>
                        <div class="kt-timeline__item-info">
                            PSD, Sketch, AJ                                                                                       
                        </div>
                    </div>  
                    <!--End::Item --> 

                    <!--Begin::Item --> 
                    <div class="kt-timeline__item kt-timeline__item--warning">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon">
                                    <i class="flaticon-pie-chart-1 kt-font-warning"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">Aug 13,2018</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            Meeting with Ken Digital Corp ot Unit14, 3 Edigor Buildings, George Street, Loondon<br> England, BA12FJ                                                                                           
                        </a>
                        <div class="kt-timeline__item-info">
                            Meeting, Customer                                                                                          
                        </div>
                    </div> 
                    <!--End::Item --> 

                    <!--Begin::Item --> 
                    <div class="kt-timeline__item kt-timeline__item--info">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon">
                                    <i class="flaticon-notepad kt-font-info"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">May 09, 2018</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            KeenThemes created new layout whith tens of new options for Keen Admin panel                                                                                                
                        </a>
                        <div class="kt-timeline__item-info">
                            HTML,CSS,VueJS                                                                                            
                        </div>
                    </div> 
                    <!--End::Item --> 

                    <!--Begin::Item --> 
                    <div class="kt-timeline__item kt-timeline__item--accent">
                        <div class="kt-timeline__item-section">
                            <div class="kt-timeline__item-section-border">
                                <div class="kt-timeline__item-section-icon"                                        >
                                    <i class="flaticon-bell kt-font-success"></i>
                                </div>
                            </div>
                            <span class="kt-timeline__item-datetime">01:20 AM</span>
                        </div>

                        <a href="#" class="kt-timeline__item-text">
                            New secyrity alert by Firewall & order to take aktion on User Preferences                                                                                             
                        </a>
                        <div class="kt-timeline__item-info">
                            Security, Fieewall                                                                                         
                        </div>
                    </div>   
                    <!--End::Item -->                    

                </div> 
                <!--End::Timeline --> 
	        </div>
	        <div class="tab-pane fade kt-offcanvas-panel__content kt-scroll" id="kt_quick_panel_tab_actions" role="tabpanel">
	        	<!--begin::Portlet-->
				<div class="kt-portlet kt-portlet--solid-success">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon kt-hide"><i class="flaticon-stopwatch"></i></span>
							<h3 class="kt-portlet__head-title">Recent Bills</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-group">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="flaticon-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Separated link</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry. 
						</div>
					</div>	
					<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">Dismiss</a>
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">View</a>
					</div>
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet kt-portlet--solid-focus">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<span class="kt-portlet__head-icon kt-hide"><i class="flaticon-stopwatch"></i></span>
							<h3 class="kt-portlet__head-title">Latest Orders</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-group">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="flaticon-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Separated link</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry. 
						</div>
					</div>	
					<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">Dismiss</a>
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">View</a>
					</div>
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet kt-portlet--solid-info">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Latest Invoices</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-group">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="flaticon-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Separated link</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry. 
						</div>
					</div>	
					<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">Dismiss</a>
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">View</a>
					</div>
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet kt-portlet--solid-warning">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">New Comments</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-group">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="flaticon-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Separated link</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry. 
						</div>
					</div>	
					<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">Dismiss</a>
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">View</a>
					</div>
				</div>
				<!--end::Portlet-->

				<!--begin::Portlet-->
				<div class="kt-portlet kt-portlet--solid-brand">
					<div class="kt-portlet__head">
						<div class="kt-portlet__head-label">
							<h3 class="kt-portlet__head-title">Recent Posts</h3>
						</div>
						<div class="kt-portlet__head-toolbar">
							<div class="kt-portlet__head-group">
								<div class="dropdown dropdown-inline">
									<button type="button" class="btn btn-sm btn-font-light btn-outline-hover-light btn-circle btn-icon" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="flaticon-more"></i>
									</button>
									<div class="dropdown-menu dropdown-menu-right">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Separated link</a>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="kt-portlet__body">
						<div class="kt-portlet__content">
							Lorem Ipsum is simply dummy text of the printing and typesetting simply dummy text of the printing industry. 
						</div>
					</div>	
					<div class="kt-portlet__foot kt-portlet__foot--sm kt-align-right">
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">Dismiss</a>
						<a href="#" class="btn btn-bold btn-upper btn-sm btn-font-light btn-outline-hover-light">View</a>
					</div>
				</div>
				<!--end::Portlet-->
	        </div>
	        <div class="tab-pane fade kt-offcanvas-panel__content kt-scroll" id="kt_quick_panel_tab_settings" role="tabpanel">
	        	<form class="kt-form">
					<div class="kt-heading kt-heading--space-sm">Notifications</div>

					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable notifications:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_1">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable audit log:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_2">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Notify on new orders:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_2">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					
					<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>

					<div class="kt-heading kt-heading--space-sm">Orders</div>

					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable order tracking:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_3">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable orders reports:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_3">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Allow order status auto update:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--danger">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_4">
									<span></span>
								</label>
							</span>
						</div>
					</div>

					<div class="kt-separator kt-separator--space-md kt-separator--border-dashed"></div>

					<div class="kt-heading kt-heading--space-sm">Customers</div>

					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable customer singup:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--success">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_5">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-xs row">
						<label class="col-8 col-form-label">Enable customers reporting:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--success">
								<label>
									<input type="checkbox"  name="quick_panel_notifications_5">
									<span></span>
								</label>
							</span>
						</div>
					</div>
					<div class="form-group form-group-last form-group-xs row">
						<label class="col-8 col-form-label">Notifiy on new customer registration:</label>
						<div class="col-4 kt-align-right">
							<span class="kt-switch kt-switch--sm kt-switch--success">
								<label>
									<input type="checkbox" checked="checked" name="quick_panel_notifications_6">
									<span></span>
								</label>
							</span>
						</div>
					</div>

				</form>
	        </div>
	    </div>
	</div>
</div>
<!-- end:: Quick Panel --> */
    

        <!-- begin::Global Config(global config for global JS sciprts) -->
        <script>
            var KTAppOptions = {
    "colors": {
        "state": {
            "brand": "#5d78ff",
            "metal": "#c4c5d6",
            "light": "#ffffff",
            "accent": "#00c5dc",
            "primary": "#5867dd",
            "success": "#34bfa3",
            "info": "#36a3f7",
            "warning": "#ffb822",
            "danger": "#fd3995",
            "focus": "#9816f4"
        },
        "base": {
            "label": [
                "#c5cbe3",
                "#a1a8c3",
                "#3d4465",
                "#3e4466"
            ],
            "shape": [
                "#f0f3ff",
                "#d9dffa",
                "#afb4d4",
                "#646c9a"
            ]
        }
    }
};
    </script>
    <!-- end::Global Config -->
	
    <!--begin::Global Theme Bundle(used by all pages) -->
    <script src="{{asset('contents/admin')}}/assets/plugins/global/plugins.bundle.js" type="text/javascript"></script> -->
    <script src="{{asset('contents/admin')}}/assets/js/scripts.bundle.js" type="text/javascript"></script>
	<!--end::Global Theme Bundle -->

    <!--begin::Page Vendors(used by this page) -->
    <script src="{{asset('contents/admin')}}/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js" type="text/javascript"></script>
    <!--end::Page Vendors -->
        
    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('contents/admin')}}/assets/js/pages/dashboard.js" type="text/javascript"></script>
	<!--end::Page Scripts -->
						
	<!--begin::Page Scripts(used by this page) -->
	<script src="{{asset('contents/admin')}}/assets/js/pages/custom/users/list-columns.js" type="text/javascript"></script>
    <!--end::Page Scripts -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('contents/admin')}}/assets/js/pages/custom/users/list-datatable.js" type="textjavascript"></script>
    <!--end::Page Scripts -->

    <!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('contents/admin')}}/assets/js/pages/custom/users/add.js" type="text/javascript"></script>
    <!--end::Page Scripts -->
	
	<!--begin::Page Scripts(used by this page) -->
    <script src="{{asset('contents/admin')}}/assets/js/pages/custom/users/edit.js" type="text/javascript"></script>
	<!--end::Page Scripts -->

	<script>
		$(document).ready(function(){
			$("select#role").change(function(){
				var role = $(this).children("option:selected").val();
				if (role==2) {
					$(".md").addClass("d-block");
					$(".e").removeClass("d-block");
					$(".se").removeClass("d-block");
				}else if (role==3) {
					$(".se").addClass("d-block");
					$(".md").addClass("d-block");
					$(".e").removeClass("d-block");
					
				} else if (role==4) {
					$(".e").addClass("d-block");
					$(".md").addClass("d-block");
					$(".se").addClass("d-block");
					
				} else {
					$(".md").removeClass("d-block");
					$(".se").removeClass("d-block");
					$(".e").removeClass("d-block");
				}
            });
            
            $("select.c-m-exe").change(function(){
        
                var cmex = $(this).children("option:selected").val();
                
                if(cmex){
                    
                    $("select.c-m-e").children("option[data-id]").addClass("d-none").removeClass("d-block");
                
                    $("select.c-m-e").children("option[data-id="+cmex+"]").addClass("d-block").removeClass("d-none");
                    
                }else{
                    
                    $("select.c-m-e").children("option[data-id]").removeClass("d-none").removeClass("d-block");
                    
                }
                    
            });
            
            $("select.dep").change(function(){
        
                var dep = $(this).children("option:selected").val();
                
                if(dep){
                    
                    $("select.director").children("option[data-dep]").addClass("d-none").removeClass("d-block");
                
                    $("select.director").children("option[data-dep="+dep+"]").addClass("d-block").removeClass("d-none");
                    
                    $("select.executive").children("option[data-dep]").addClass("d-none").removeClass("d-block");
                
                    $("select.executive").children("option[data-dep="+dep+"]").addClass("d-block").removeClass("d-none");
                    
                }else{
                    
                    $("select.director").children("option[data-dep]").removeClass("d-none").removeClass("d-block");
                    
                    $("select.executive").children("option[data-dep]").removeClass("d-none").removeClass("d-block");
                    
                }
                    
            });
            
             $("select.director").change(function(){
        
                var director = $(this).children("option:selected").val();
                
                if(director){
                    
                    $("select.executive").children("option[data-md]").addClass("d-none").removeClass("d-block");
                
                    $("select.executive").children("option[data-md="+director+"]").addClass("d-block").removeClass("d-none");
                    
                }else{
                    
                    $("select.executive").children("option[data-md]").removeClass("d-none").removeClass("d-block");
                    
                }
                    
            });
		});
	</script>
	
	<script>
			$.ajaxSetup({
				headers: {
					'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
				}
			});
		</script>
	
</body>
<!-- end::Body -->
</html>