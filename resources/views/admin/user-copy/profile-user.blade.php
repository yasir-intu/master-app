@extends('layouts.admin')
@section('admin')
										
<!-- begin:: Subheader -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
                            <h3 class="kt-subheader__title">Profile</h3>
            
                            <span class="kt-subheader__separator kt-hidden"></span>
                <div class="kt-subheader__breadcrumbs">
                    <a href="#" class="kt-subheader__breadcrumbs-home"><i class="flaticon2-shelter"></i></a>
                                            <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Custom                        </a>
                                            <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Apps                        </a>
                                            <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Profile                        </a>
                                            <span class="kt-subheader__breadcrumbs-separator"></span>
                        <a href="#" class="kt-subheader__breadcrumbs-link">
                            Overview 1                        </a>
                                        <!-- <span class="kt-subheader__breadcrumbs-link kt-subheader__breadcrumbs-link--active">Active link</span> -->
                </div>
                    
        </div>
        <div class="kt-subheader__toolbar">
            <div class="kt-subheader__wrapper">
                <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Reports" data-placement="top"><i class="flaticon2-writing"></i></a>
                <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="kt-tooltip" title="Calendar" data-placement="top"><i class="flaticon2-hourglass-1"></i></a>
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
                    <a href="#" class="btn btn-icon btn btn-label btn-label-brand btn-bold" data-toggle="dropdown" data-offset="0px,0px" aria-haspopup="true" aria-expanded="false">
                        <i class="flaticon2-add-1"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                        <ul class="kt-nav kt-nav--active-bg" role="tablist">
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-psd"></i>
                                    <span class="kt-nav__link-text">Document</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" role="tab"  >
                                    <i class="kt-nav__link-icon flaticon2-supermarket"></i>
                                    <span class="kt-nav__link-text">Message</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-shopping-cart"></i>
                                    <span class="kt-nav__link-text">Product</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" role="tab"  >
                                    <i class="kt-nav__link-icon flaticon2-chart2"></i>
                                    <span class="kt-nav__link-text">Report</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">pdf</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sms"></i>
                                    <span class="kt-nav__link-text">Post</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-avatar"></i>
                                    <span class="kt-nav__link-text">Customer</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                  
                <div class="dropdown dropdown-inline" data-toggle="kt-tooltip" title="Quick actions" data-placement="top">
                    <a href="#" class="btn btn btn-label btn-label-brand btn-bold" data-toggle="dropdown" data-offset="0 0" aria-haspopup="true" aria-expanded="false">
                        Reports
                    </a>
                    <div class="dropdown-menu dropdown-menu-right">
                        <ul class="kt-nav kt-nav--active-bg" id="kt_nav_1" role="tablist">
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-psd"></i>
                                    <span class="kt-nav__link-text">Products</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" role="tab" id="kt_nav_link_1" >
                                    <i class="kt-nav__link-icon flaticon2-supermarket"></i>
                                    <span class="kt-nav__link-text">Customers</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--success kt-badge--inline kt-badge--rounded">6</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-shopping-cart"></i>
                                    <span class="kt-nav__link-text">Orders</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-shopping-cart"></i>
                                    <span class="kt-nav__link-text">Reports</span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a class="kt-nav__link" role="tab" id="kt_nav_link_2" >
                                    <i class="kt-nav__link-icon flaticon2-chart2"></i>
                                    <span class="kt-nav__link-text">Console</span>
                                    <span class="kt-nav__link-badge">
                                        <span class="kt-badge kt-badge--danger kt-badge--inline kt-badge--rounded">new</span>
                                    </span>
                                </a>
                            </li>
                            <li class="kt-nav__item">
                                <a href="#" class="kt-nav__link">
                                    <i class="kt-nav__link-icon flaticon2-sms"></i>
                                    <span class="kt-nav__link-text">Settings</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                  
            </div>
        </div>
    </div>
</div>
<!-- end:: Subheader -->					
					<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--begin::Portlet-->
<div class="kt-portlet kt-profile">
	<div class="kt-profile__content">
		<div class="row">
			<div class="col-md-12 col-lg-5 col-xl-4">
				<div class="kt-profile__main">
					<div class="kt-profile__main-pic">
						<img src="{{asset('contents/admin')}}/assets/media/users/300_21.jpg" alt=""/>
						<label class="kt-profile__main-pic-upload" >
							<i class="flaticon-photo-camera"></i>
						</label>
					</div>
					<div class="kt-profile__main-info">
						<div class="kt-profile__main-info-name">Brian Johnson</div>
						<div class="kt-profile__main-info-position">Lead Designer</div>
					</div>
				</div>			
			</div>
			<div class="col-md-12 col-lg-4 col-xl-4">
				<div class="kt-profile__contact">
					<a href="#" class="kt-profile__contact-item">
						<span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-whatsup"><i class="flaticon-whatsapp"></i></span>
						<span class="kt-profile__contact-item-text">44 8475 804342</span>
					</a>
					<a href="#" class="kt-profile__contact-item">
						<span class="kt-profile__contact-item-icon"><i class="flaticon-email-black-circular-button kt-font-danger"></i></span>
						<span class="kt-profile__contact-item-text">brian@keenthemes.com</span>
					</a>
					<a href="#" class="kt-profile__contact-item">
						<span class="kt-profile__contact-item-icon kt-profile__contact-item-icon-twitter"><i class="flaticon-twitter-logo-button"></i></span>
						<span class="kt-profile__contact-item-text">@brianjohnson</span>
					</a>
				</div>
			</div>
			<div class="col-md-12 col-lg-3 col-xl-4">
				<div class="kt-profile__stats">
					<div class="kt-profile__stats-item">
						<div class="kt-profile__stats-item-label">Sales</div>
						<div class="kt-profile__stats-item-chart">
							<span>USP: +23%</span>
							<canvas id="kt_profile_mini_chart_1" width="100" height="40"></canvas>
						</div>
					</div>
					<div class="kt-profile__stats-item">
						<div class="kt-profile__stats-item-label">Reports</div>
						<div class="kt-profile__stats-item-chart">
							<span>RNP: +30%</span>
							<canvas id="kt_profile_mini_chart_2" width="100" height="40"></canvas>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="kt-profile__nav">
		<!--begin::Tabs--> 
		<ul class="nav nav-tabs nav-tabs-line" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#kt_tabs_1_1" role="tab">Dashboard</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_2" role="tab">Account & Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_3" role="tab">Activities</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#kt_tabs_1_4" role="tab">Tasks</a>
            </li>
		</ul>         
		<!--end::Tabs--> 
    </div>
</div>
<!--end::Portlet-->

<!--begin::Tab Content--> 
<div class="tab-content">
	<div class="tab-pane fade show active" id="kt_tabs_1_1" role="tabpanel">
		<!--begin::Row--> 
		<div class="row">			
			<div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
				<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">Top Categories</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-toolbar-wrapper">
	<div class="dropdown dropdown-inline">
		<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
			<i class="flaticon-more-1"></i>
		</button>
		<div class="dropdown-menu dropdown-menu-right">
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
</div>
		</div>
	</div>
	<div class="kt-portlet__body">
		<div class="kt-widget-16">
			<div class="kt-widget-16__item kt-widget-16__item--info">
				<div class="kt-widget-16__labels">
					<a href="#"><div class="kt-widget-16__title">Templates</div></a>
					<div class="kt-widget-16__desc">Front-end, Admin</div>
				</div>
				<div class="kt-widget-16__data">
					<div class="kt-widget-16__item-chart">
						<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
						<canvas id="kt_widget_latest_products_chart_1" width="80" height="40"></canvas>
					</div>
					<div class="kt-widget-16__numbers">
						<div class="kt-widget-16__numbers-total">5.7k</div>
						<div class="kt-widget-16__numbers-change">+780</div>
					</div>
				</div>
			</div>
			<div class="kt-widget-16__item kt-widget-16__item--danger">
				<div class="kt-widget-16__labels">
					<a href="#"><div class="kt-widget-16__title">Wordpress</div></a>
					<div class="kt-widget-16__desc">eCommerce, Website</div>
				</div>
				<div class="kt-widget-16__data">
					<div class="kt-widget-16__item-chart">
						<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
						<canvas id="kt_widget_latest_products_chart_6" width="80" height="40"></canvas>
					</div>
					<div class="kt-widget-16__numbers">
						<div class="kt-widget-16__numbers-total">2.8k</div>
						<div class="kt-widget-16__numbers-change">+350</div>
					</div>
				</div>
			</div>
			<div class="kt-widget-16__item kt-widget-16__item--warning">
				<div class="kt-widget-16__labels">
					<a href="#"><div class="kt-widget-16__title">eCommerce</div></a>
					<div class="kt-widget-16__desc">Fashion Websites</div>
				</div>
				<div class="kt-widget-16__data">
					<div class="kt-widget-16__item-chart">
						<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
						<canvas id="kt_widget_latest_products_chart_3" width="80" height="40"></canvas>
					</div>
					<div class="kt-widget-16__numbers">
						<div class="kt-widget-16__numbers-total">9.3k</div>
						<div class="kt-widget-16__numbers-change">+2.1k</div>
					</div>
				</div>
			</div>
			<div class="kt-widget-16__item kt-widget-16__item--brand">
				<div class="kt-widget-16__labels">
					<a href="#"><div class="kt-widget-16__title">UI/UX Design</div></a>
					<div class="kt-widget-16__desc">Everything you like</div>
				</div>
				<div class="kt-widget-16__data">
					<div class="kt-widget-16__item-chart">
						<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
						<canvas id="kt_widget_latest_products_chart_5" width="80" height="40"></canvas>
					</div>
					<div class="kt-widget-16__numbers">
						<div class="kt-widget-16__numbers-total">9.3k</div>
						<div class="kt-widget-16__numbers-change">+1.6k</div>
					</div>
				</div>
			</div>
			<div class="kt-widget-16__item kt-widget-16__item--success">
				<div class="kt-widget-16__labels">
					<a href="#"><div class="kt-widget-16__title">SAAS Solution</div></a>
					<div class="kt-widget-16__desc">Monthly Subscription</div>
				</div>
				<div class="kt-widget-16__data">
					<div class="kt-widget-16__item-chart">
						<!--Doc: For the chart initialization refer to "latestProductsMiniCharts" function in "src\theme\app\scripts\custom\dashboard.js"
                         and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
						<canvas id="kt_widget_latest_products_chart_4" width="80" height="40"></canvas>
					</div>
					<div class="kt-widget-16__numbers">
						<div class="kt-widget-16__numbers-total">5.7k</div>
						<div class="kt-widget-16__numbers-change">+598</div>
					</div>
				</div>
			</div>			
		</div>
	</div>	 
</div>
<!--end::Portlet-->			</div>

			<div class="col-lg-12 col-xl-8 order-lg-2 order-xl-1">
				<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">General Statistics</h3>
		</div>
		<div class="kt-portlet__head-toolbar">
			<div class="kt-portlet__head-actions">
				<a href="#" class="btn btn-default btn-sm btn-bold">XML</a>
				<a href="#" class="btn btn-default btn-sm btn-bold">CSV</a>
			</div>
		</div>
	</div>
	<div class="kt-portlet__body kt-portlet__body--fluid kt-portlet__body--fit">
		<div class="kt-widget-2">
			<div class="kt-widget-2__content kt-portlet__space-x">
				<div class="row">
					<div class="col-xl-3 col-lg-6 col-md-6 col-6">
						<div class="kt-widget-2__item">
							<div class="kt-widget-2__item-title">
								Sales
							</div>
							<div class="kt-widget-2__item-stats">
								<div class="kt-widget-2__item-info">
									<div class="kt-widget-2__item-text">
										USP:
									</div>
									<div class="kt-widget-2__item-value">
										+23%
									</div>
								</div>
								<div class="kt-widget-2__item-chart">
									<!--Doc: For the chart initialization refer to "generalStatistics" function in "src\theme\app\scripts\custom\dashboard.js"
									and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
									<canvas id="kt_widget_general_statistics_chart_1" width="80" height="40"></canvas>
								</div>
							</div>
						</div>
					</div>

					<div class="col-xl-3 col-lg-6 col-md-6 col-6">	
						<div class="kt-widget-2__item">
							<div class="kt-widget-2__item-title">
								Products
							</div>
							<div class="kt-widget-2__item-stats">
								<div class="kt-widget-2__item-info">
									<div class="kt-widget-2__item-text">
										MRT:
									</div>
									<div class="kt-widget-2__item-value">
										+10%
									</div>
								</div>
								<div class="kt-widget-2__item-chart">
									<!--Doc: For the chart initialization refer to "generalStatistics" function in "src\theme\app\scripts\custom\dashboard.js"
									and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
									<canvas id="kt_widget_general_statistics_chart_2" width="80" height="40"></canvas>
								</div>
							</div>
						</div>
					</div>	

					<div class="col-xl-3 col-lg-6 col-md-6 col-6">
						<div class="kt-widget-2__item">
							<div class="kt-widget-2__item-title">
								Profit
							</div>
							<div class="kt-widget-2__item-stats">
								<div class="kt-widget-2__item-info">
									<div class="kt-widget-2__item-text">
										FTP:
									</div>
									<div class="kt-widget-2__item-value">
										+19%
									</div>
								</div>
								<div class="kt-widget-2__item-chart">
									<!--Doc: For the chart initialization refer to "generalStatistics" function in "src\theme\app\scripts\custom\dashboard.js"
									and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
									<canvas id="kt_widget_general_statistics_chart_3" width="80" height="40"></canvas>
								</div>
							</div>
						</div>
					</div>	 

					<div class="col-xl-3 col-lg-6 col-md-6 col-6">
						<div class="kt-widget-2__item">
							<div class="kt-widget-2__item-title">
								Reports
							</div>
							<div class="kt-widget-2__item-stats">
								<div class="kt-widget-2__item-info">
									<div class="kt-widget-2__item-text">
										RNP:
									</div>
									<div class="kt-widget-2__item-value">
										+30%
									</div>
								</div>
								<div class="kt-widget-2__item-chart">
									<!--Doc: For the chart initialization refer to "generalStatistics" function in "src\theme\app\scripts\custom\dashboard.js"
									and "KLib.initMiniChart()" function in "themes/themes/keen/src/theme/app/scripts/bundle/lib.js" -->
									<canvas id="kt_widget_general_statistics_chart_4" width="80" height="40"></canvas>
								</div>
							</div>
						</div>
					</div>	
				</div>			 	 
				<div class="kt-widget-2__stats">
					<div class="kt-widget-2__stats-author">
						<div class="kt-widget-2__stats-bullet kt-bg-brand"></div>
						<span class="kt-widget-2__stats-text">Author Sales</span>
					</div>
					<div class="kt-widget-2__stats-product">
						<div class="kt-widget-2__stats-bullet kt-bg-danger"></div>
						<span class="kt-widget-2__stats-text">Product Profit</span>
					</div>				
				</div>
			</div>
			<div class="kt-widget-2__chart">
				<canvas id="kt_widget_general_statistics_chart_main" height="250"></canvas>
			</div>
		</div>
	</div>
</div>
<!--end::Portlet-->

			</div>

			<div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
				<!--begin::Portlet--> 
<div class="kt-portlet kt-portlet--tabs kt-portlet--height-fluid">
	<div class="kt-portlet__head">
		<div class="kt-portlet__head-label">
			<h3 class="kt-portlet__head-title">
				Work Progress						 
			</h3>			
		</div>
		<div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#kt_portlet_tabs_1111_1_content" role="tab" aria-selected="false">
                        Emails
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tabs_1111_2_content" role="tab" aria-selected="false">
                        Tickets
                    </a>
                </li>
            </ul>
        </div>
	</div>
	<div class="kt-portlet__body">
		<div class="tab-content">
			<div class="tab-pane fade active show" id="kt_portlet_tabs_1111_1_content" role="tabpanel">
				<div class="kt-widget-11">
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Pendings Tasks
							</div>
							<div class="kt-widget-11__value">
								78%
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Completed Tasks
							</div>
							<div class="kt-widget-11__value">
								320&nbsp;/&nbsp;<span class="kt-opacity-5">780</span>
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-primary" role="progressbar" style="width: 55%" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Tasks In Progress
							</div>
							<div class="kt-widget-11__value">
								45%
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-danger" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								All Tasks
							</div>
							<div class="kt-widget-11__value">
								1200
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-warning" role="progressbar" style="width: 60%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Reports
							</div>
							<div class="kt-widget-11__value">
								40
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-margin-t-30 kt-align-center">
					<a href="#" class="btn btn-brand btn-upper btn-bold kt-align-center">Full Report</a>
				</div>
			</div>
			<div class="tab-pane fade" id="kt_portlet_tabs_1111_2_content" role="tabpanel">
				<div class="kt-widget-11">
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Pendings Tasks
							</div>
							<div class="kt-widget-11__value">
								78%
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-info" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Completed Tasks
							</div>
							<div class="kt-widget-11__value">
								320&nbsp;/&nbsp;<span class="kt-opacity-5">780</span>
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-danger" role="progressbar" style="width: 58%" aria-valuenow="58" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Tasks In Progress
							</div>
							<div class="kt-widget-11__value">
								45%
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-warning" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								All Tasks
							</div>
							<div class="kt-widget-11__value">
								1200
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-success" role="progressbar" style="width: 20%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
					<div class="kt-widget-11__item">
						<div class="kt-widget-11__wrapper">
							<div class="kt-widget-11__title">
								Reports
							</div>
							<div class="kt-widget-11__value">
								40
							</div>
						</div>
						<div class="kt-widget-11__progress">
							<div class="progress">
								<!-- Doc: A bootstrap progress bar can be used to show a user how far along it's in a process, see https://getbootstrap.com/docs/4.1/components/progress/ -->
								<div class="progress-bar bg-primary" role="progressbar" style="width: 40%" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="kt-margin-t-30 kt-align-center">
					<a href="#" class="btn btn-brand btn-upper btn-bold kt-align-center">Full Report</a>
				</div>
			</div>
		</div>
	</div>
</div>
<!--end::Portlet-->			</div>

			<div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
				<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--height-fluid">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">Daily Salles</h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <div class="kt-portlet__head-actions">
                <a href="#" class="btn btn-default btn-sm btn-bold btn-upper">CSV</a>
            </div>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="kt-widget-4">
            <div class="kt-widget-4__item">
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-section">
                        <div class="kt-widget-4__item-pic">
                            <img class="" src="{{asset('contents/admin')}}/assets/media/users/100_3.jpg" alt="" />
                        </div>
                        <div class="kt-widget-4__item-info">
                            <a href="#" class="kt-widget-4__item-username">Chris Bent</a>
                            <div class="kt-widget-4__item-desc">SUV Themes Carp</div>
                        </div>
                    </div>
                </div>
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-price">
                        <span class="kt-widget-4__item-badge">$</span>
                        <span class="kt-widget-4__item-number">830</span>
                    </div>
                </div>
            </div>

            <div class="kt-widget-4__item">
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-section">
                        <div class="kt-widget-4__item-pic">
                            <img class="" src="{{asset('contents/admin')}}/assets/media/users/100_4.jpg" alt="" />
                        </div>
                        <div class="kt-widget-4__item-info">
                            <a href="#" class="kt-widget-4__item-username">Ashley Stock</a>
                            <div class="kt-widget-4__item-desc">Merscedes Benz AMGww</div>
                        </div>
                    </div>
                </div>
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-price">
                        <span class="kt-widget-4__item-badge">$</span>
                        <span class="kt-widget-4__item-number">675</span>
                    </div>
                </div>
            </div>

            <div class="kt-widget-4__item">
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-section">
                        <div class="kt-widget-4__item-pic">
                            <img class="" src="{{asset('contents/admin')}}/assets/media/users/100_5.jpg" alt="" />
                        </div>
                        <div class="kt-widget-4__item-info">
                            <a href="#" class="kt-widget-4__item-username">Jimmy Yesuku</a>
                            <div class="kt-widget-4__item-desc">All Nippon United Airlines</div>
                        </div>
                    </div>
                </div>
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-price">
                        <span class="kt-widget-4__item-badge">$</span>
                        <span class="kt-widget-4__item-number">194</span>
                    </div>
                </div>
            </div>

            <div class="kt-widget-4__item">
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-section">
                        <div class="kt-widget-4__item-pic">
                            <img class="" src="{{asset('contents/admin')}}/assets/media/users/100_2.jpg" alt="" />
                        </div>
                        <div class="kt-widget-4__item-info">
                            <a href="#" class="kt-widget-4__item-username">Amanda West</a>
                            <div class="kt-widget-4__item-desc">Comboy Westem Limited</div>
                        </div>
                    </div>
                </div>
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-price">
                        <span class="kt-widget-4__item-badge">$</span>
                        <span class="kt-widget-4__item-number">65</span>
                    </div>
                </div>
            </div>

            <div class="kt-widget-4__item">
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-section">
                        <div class="kt-widget-4__item-pic">
                            <img class="" src="{{asset('contents/admin')}}/assets/media/users/100_6.jpg" alt="" />
                        </div>
                        <div class="kt-widget-4__item-info">
                            <a href="#" class="kt-widget-4__item-username">Nick Holms</a>
                            <div class="kt-widget-4__item-desc">UILab Inc</div>
                        </div>
                    </div>
                </div>
                <div class="kt-widget-4__item-content">
                    <div class="kt-widget-4__item-price">
                        <span class="kt-widget-4__item-badge">$</span>
                        <span class="kt-widget-4__item-number">65</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!--end::Portlet-->			</div>
			
			<div class="col-lg-12 col-xl-4  order-lg-1 order-xl-1">
				<!--begin::Portlet-->
<div class="kt-portlet kt-portlet--height-fluid kt-portlet--tabs">
    <div class="kt-portlet__head">
        <div class="kt-portlet__head-label">
            <h3 class="kt-portlet__head-title">
                Latest Tasks                         
            </h3>
        </div>
        <div class="kt-portlet__head-toolbar">
            <ul class="nav nav-tabs nav-tabs-line nav-tabs-line-brand nav-tabs-bold" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active show" data-toggle="tab" href="#kt_portlet_tabs_1_1_content" role="tab" aria-selected="false">
                        Today
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tabs_1_2_content" role="tab" aria-selected="false">
                        Week
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#kt_portlet_tabs_1_3_content" role="tab" aria-selected="true">
                        Month
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div class="kt-portlet__body">
        <div class="tab-content">
            <div class="tab-pane fade active show" id="kt_portlet_tabs_1_1_content" role="tabpanel">
                <div class="kt-widget-5">
                    <div class="kt-widget-5__item kt-widget-5__item--info">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Management meeting
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                09:30 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Replace datatables rows color
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                12:00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--brand">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Export Navitare booking table
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                01:20 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--success">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                NYCS internal discussion
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                03: 00 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Project Launch 
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                11: 00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--success">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Server maintenance 
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                4: 30 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade" id="kt_portlet_tabs_1_2_content" role="tabpanel">
                <div class="kt-widget-5">
                    <div class="kt-widget-5__item kt-widget-5__item--brand">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Export Navitare booking table
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                01:20 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Replace datatables rows color
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                12:00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--brand">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Export Navitare booking table
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                01:20 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                    Replace datatables rows color
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                12:00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--success">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                NYCS internal discussion
                            </a>
                            <div class="kt-widget-5__item-datetime ">
                                03: 00 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check ">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--info ">
                        <div class="kt-widget-5__item-info ">
                            <a href="#" class="kt-widget-5__item-title">
                                Management meeting
                            </a>
                            <div class="kt-widget-5__item-datetime ">
                                09:30 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check ">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade " id="kt_portlet_tabs_1_3_content" role="tabpanel">
                <div class="kt-widget-5 ">
                    <div class="kt-widget-5__item kt-widget-5__item--success">
                        <div class="kt-widget-5__item-info ">
                            <a href="#" class="kt-widget-5__item-title">
                                NYCS internal discussion
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                03: 00 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info ">
                            <a href="#" class="kt-widget-5__item-title">
                                Replace datatables rows color
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                12:00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--danger">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Replace datatables rows color
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                12:00 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--brand">
                        <div class="kt-widget-5__item-info">
                            <a href="#" class="kt-widget-5__item-title">
                                Export Navitare booking table
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                01:20 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--brand">
                        <div class="kt-widget-5__item-info ">
                            <a href="#" class="kt-widget-5__item-title">
                                Export Navitare booking table
                            </a>
                            <div class="kt-widget-5__item-datetime ">
                                01:20 PM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                    <div class="kt-widget-5__item kt-widget-5__item--info">
                        <div class="kt-widget-5__item-info ">
                            <a href="#" class="kt-widget-5__item-title">
                                Management meeting
                            </a>
                            <div class="kt-widget-5__item-datetime">
                                09:30 AM
                            </div>
                        </div>
                        <div class="kt-widget-5__item-check">
                            <label class="kt-radio">
                                <input type="radio" checked="checked" name="radio1">
                                <span></span>
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!--end::Portlet-->			</div>
		</div>
		<!--end::Row--> 
	</div>
</div> 
<!--end::Tab Content-->	
</div>
<!-- end:: Content -->			

@endsection