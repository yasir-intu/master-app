@extends('layouts.admin')
@section('admin')

					<!-- begin:: Content Head -->
					<div class="kt-subheader   kt-grid__item" id="kt_subheader" style="background: white; margin: 0 0 15px; padding: 15px 0;">
						<div class="kt-container  kt-container--fluid ">
							<div class="kt-subheader__main">
												<button class="kt-subheader__mobile-toggle" id="kt_subheader_mobile_toggle"><span></span></button>
								
												<h3 class="kt-subheader__title">
																Users                               
									</h3>
										   
					
								<span class="kt-subheader__separator kt-subheader__separator--v"></span>
								
								<div class="kt-subheader__toolbar" id="kt_subheader_search">
									<span class="kt-subheader__desc" id="kt_subheader_total">
																450 Total                                    </span>
									
										<form class="kt-subheader__search" id="kt_subheader_search_form">
											<div class="input-group">
												<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
												<div class="input-group-append">
													<span class="input-group-text" id="basic-addon2">
														<i class="flaticon2-search-1"></i>
													</span>
												</div>
											</div>
										</form>
												</div>
					
												<div class="kt-subheader__toolbar kt-hidden" id="kt_subheader_group_actions">
					
										<div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span> Selected:</div>
										
										<div class="btn-toolbar kt-margin-l-20">
											<div class="dropdown" id="kt_subheader_group_actions_status_change">
												<button type="button" class="btn btn-label-brand btn-bold btn-sm dropdown-toggle" data-toggle="dropdown">
													Update Status
												</button>
												<div class="dropdown-menu">
													<ul class="kt-nav">
														<li class="kt-nav__section kt-nav__section--first">
															<span class="kt-nav__section-text">Change status to:</span>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="1">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-success kt-badge--inline kt-badge--bold">Approved</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="2">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-danger kt-badge--inline kt-badge--bold">Rejected</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="3">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-warning kt-badge--inline kt-badge--bold">Pending</span></span>
															</a>
														</li>
														<li class="kt-nav__item">
															<a href="#" class="kt-nav__link" data-toggle="status-change" data-status="4">
																<span class="kt-nav__link-text"><span class="kt-badge kt-badge--unified-info kt-badge--inline kt-badge--bold">On Hold</span></span>
															</a>
														</li>
													</ul>
												</div>
											</div>
											<button class="btn btn-label-brand btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_fetch" data-toggle="modal" data-target="#kt_datatable_records_fetch_modal">
												Fetch Selected
											</button>                
											<button class="btn btn-label-brand btn-bold btn-sm btn-icon-h" id="kt_subheader_group_actions_delete_all">
												Delete All
											</button>
										</div>
									</div>
								</div>        
							
								<div class="kt-subheader__toolbar">
									<a href="/keen/preview/demo1/.html" class=""></a>
									<a href="/keen/preview/demo1/custom/users/add.html" class="btn btn-brand btn-bold">Add User</a>
								</div>
						</div>
					</div>
					<!-- end:: Content Head -->
	
					<!-- begin:: Content -->
					<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">

						<!--Begin::App-->
						<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
							<!--Begin:: App Aside Mobile Toggle-->
							<button class="kt-app__aside-close" id="kt_users_aside_close">
								<i class="la la-close"></i>
							</button>
							<!--End:: App Aside Mobile Toggle-->

							<!--Begin:: App Aside-->
							<div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--sm kt-app__aside--fit" id="kt_users_aside">
								<div class="kt-portlet">
									<div class="kt-portlet__body">
										<div class="kt-widget kt-widget--general-1">
											<div class="kt-media kt-media--brand kt-media--lg kt-media--circle">
												@if (!empty($data->photo))
												<img alt="user" src="{{asset('/masterdesign/public/contents/admin')}}/assets/media/users/300_25.jpg">
												@else
													@php
														$a=Str::title(Str::limit(Auth::user()->name,1,''));											
													@endphp
												@if ($a=='A' || $a=='F' || $a=='K' || $a=='P' || $a=='U' )
												<div class="kt-badge kt-badge--xl kt-badge--primary text-white text-capitalize">{{Str::limit(Auth::user()->name,1,'')}}</div>						
												@elseif($a=='B' || $a=='G' || $a=='L' || $a=='Q' || $a=='V')
												<div class="kt-badge kt-badge--xl kt-badge--secondary text-white text-capitalize">{{Str::limit(Auth::user()->name,1,'')}}</div>
												@elseif($a=='C' || $a=='H' || $a=='M' || $a=='R' || $a=='W')
												<div class="kt-badge kt-badge--xl kt-badge--bg-danger text-white text-capitalize">{{Str::limit(Auth::user()->name,1,'')}}</div>
												@elseif($a=='D' || $a=='I' || $a=='N' || $a=='S' || $a=='X')
												<div class="kt-badge kt-badge--xl kt-badge--bg-dark text-white text-capitalize">{{Str::limit(Auth::user()->name,1,'')}}</div>
												@else
												<div class="kt-badge kt-badge--xl kt-badge--warning text-white text-capitalize">{{Str::limit(Auth::user()->name,1,'')}}</div>
												@endif
												@endif
											</div>
											<div class="kt-widget__wrapper">
												<div class="kt-widget__label">
													<a href="#" class="kt-widget__title">
														{{Auth::user()->name}}
													</a>
													<span class="kt-widget__desc">
														Web Developer
													</span>
												</div>
												<div class="kt-widget__toolbar kt-widget__toolbar--top-">
													<div class="btn-group">
														<div class="dropdown dropdown-inline">
															<button type="button" class="btn btn-clean btn-sm btn-icon btn-icon-md" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
																<i class="flaticon-more-1"></i>
															</button>
															<div class="dropdown-menu dropdown-menu-fit dropdown-menu-md dropdown-menu-right">
																<!--begin::Nav-->
																<ul class="kt-nav">
																	<li class="kt-nav__head">
																		Export Options
																		<i class="flaticon2-information" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more..."></i>
																	</li>
																	<li class="kt-nav__separator"></li>
																	<li class="kt-nav__item">
																		<a href="#" class="kt-nav__link">
																			<i class="kt-nav__link-icon flaticon2-drop"></i>
																			<span class="kt-nav__link-text">Users</span>
																		</a>
																	</li>
																	<li class="kt-nav__item">
																		<a href="#" class="kt-nav__link">
																			<i class="kt-nav__link-icon flaticon2-calendar-8"></i>
																			<span class="kt-nav__link-text">Reports</span>
																			<span class="kt-nav__link-badge">
																				<span class="kt-badge kt-badge--danger">9</span>
																			</span>
																		</a>
																	</li>
																	<li class="kt-nav__item">
																		<a href="#" class="kt-nav__link">
																			<i class="kt-nav__link-icon flaticon2-drop"></i>
																			<span class="kt-nav__link-text">Statements</span>
																		</a>
																	</li>
																	<li class="kt-nav__item">
																		<a href="#" class="kt-nav__link">
																			<i class="kt-nav__link-icon flaticon2-new-email"></i>
																			<span class="kt-nav__link-text">Customer Support</span>
																		</a>
																	</li>
																	<li class="kt-nav__separator"></li>
																	<li class="kt-nav__foot">
																		<a class="btn btn-label-brand btn-bold btn-sm" href="#">Proceed</a>
																		<a class="btn btn-clean btn-bold btn-sm" href="#" data-toggle="kt-tooltip" data-placement="right" title="Click to learn more...">Learn more</a>
																	</li>
																</ul>
																<!--end::Nav-->
															</div>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>

									<div class="kt-portlet__separator"></div>

									<div class="kt-portlet__body">
										<ul class="kt-nav kt-nav--bold kt-nav--fit-ver kt-nav--v4" role="tablist">
											<li class="kt-nav__item">
												<a class="kt-nav__link active" data-toggle="tab" href="#kt_profile_tab_personal_information" role="tab">
													<span class="kt-nav__link-icon"><i class="flaticon2-user"></i></span>
													<span class="kt-nav__link-text">Personal Information</span>
												</a>
											</li>
											<li class="kt-nav__item  active">
												<a class="kt-nav__link" data-toggle="tab" href="#kt_profile_tab_account_information" role="tab">
													<span class="kt-nav__link-icon"><i class="flaticon-feed"></i></span>
													<span class="kt-nav__link-text">Acccount Information</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" data-toggle="tab" href="#kt_profile_change_password" role="tab">
													<span class="kt-nav__link-icon"><i class="flaticon2-settings"></i></span>
													<span class="kt-nav__link-text">Change Password</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" data-toggle="tab" href="#kt_profile_email_settings" role="tab">
													<span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
													<span class="kt-nav__link-text">Email Settings</span>
												</a>
											</li>
										</ul>
									</div>

									<div class="kt-portlet__separator"></div>

									<div class="kt-portlet__body">
										<ul class="kt-nav kt-nav--bold kt-nav--fit-ver kt-nav--v4" role="tablist">
											<li class="kt-nav__item">
												<a class="kt-nav__link" data-toggle="tab" href="#kt_profile_email_settings" role="tab">
													<span class="kt-nav__link-icon"><i class="flaticon2-chart2"></i></span>
													<span class="kt-nav__link-text">Email Settings</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
													<span class="kt-nav__link-icon"><i class="flaticon-safe-shield-protection"></i></span>
													<span class="kt-nav__link-text">Saved Credit Cards</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
													<span class="kt-nav__link-icon"><i class="flaticon-download-1"></i></span>
													<span class="kt-nav__link-text">Social Networks</span>
												</a>
											</li>
											<li class="kt-nav__item">
												<a class="kt-nav__link" href="#" role="tab" data-toggle="kt-tooltip" title="" data-placement="right" data-original-title="This feature is coming soon!">
													<span class="kt-nav__link-icon"><i class="flaticon-security"></i></span>
													<span class="kt-nav__link-text">Tax Information</span>
												</a>
											</li>

											<li class="kt-nav__space"></li>

											<li class="kt-nav__custom">
												<a href="#" class="btn btn-default btn-sm btn-upper btn-bold">
													New Group                    
												</a>
											</li>
										</ul>
									</div>
								</div>
							</div>
							<!--End:: App Aside-->

							<!--Begin:: App Content-->
							<div class="kt-grid__item kt-grid__item--fluid kt-app__content">
								<div class="row">
									<div class="col-12">
										<!--begin::Portlet-->
										<div class="kt-portlet  ">
											<div class="kt-portlet__body">
												<div class="kt-widget kt-widget--general-4">
													<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
														<table class="kt-datatable__table" style="display: block;">
															<thead class="kt-datatable__head">
																<tr class="kt-datatable__row" style="left: 0px;">
																	<th data-field="id" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
																		<span style="width: 20px;">
																			<label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
																				<input type="checkbox">&nbsp;<span></span>
																			</label>
																		</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 200px;">User</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 200px;">User Name</span>
																	</th>
																	<th data-field="email" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 182px;">Email</span>
																	</th>
																	<th data-field="Action" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 182px;">Action</span>
																	</th>
																</thead>
															<tbody class="kt-datatable__body" style="">
																@foreach ($all as $data)
																	
																<tr data-row="0" class="kt-datatable__row" style="left: 0px;">
																	<td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="id">
																		<span style="width: 20px;">
																			<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
																				<input type="checkbox" value="1">&nbsp;<span></span>
																				</label>
																			</span>
																	</td>
																	<td data-field="first_name" class="kt-datatable__cell">
																		<span style="width: 200px;">
																			<div class="kt-user-card-v2">
																				<div class="kt-user-card-v2__pic">
																					@if (!empty($data->photo))
																					<img alt="user" src="{{asset('/masterdesign/public/contents/admin')}}/assets/media/users/300_25.jpg">
																					@else
																						@php
																							$a=Str::title(Str::limit($data->name,1,''));
																							
																						@endphp
																						@if ($a=='A' || $a=='F' || $a=='K' || $a=='P' || $a=='U' )

																						<div class="kt-badge kt-badge--xl kt-badge--primary text-white text-capitalize">{{Str::limit($data->name,1,'')}}</div>
																						
																						@elseif($a=='B' || $a=='G' || $a=='L' || $a=='Q' || $a=='V')
																						<div class="kt-badge kt-badge--xl kt-badge--secondary text-white text-capitalize">{{Str::limit($data->name,1,'')}}</div>
																						@elseif($a=='C' || $a=='H' || $a=='M' || $a=='R' || $a=='W')
																						<div class="kt-badge kt-badge--xl kt-badge--bg-danger text-white text-capitalize">{{Str::limit($data->name,1,'')}}</div>
																						@elseif($a=='D' || $a=='I' || $a=='N' || $a=='S' || $a=='X')
																						<div class="kt-badge kt-badge--xl kt-badge--bg-dark text-white text-capitalize">{{Str::limit($data->name,1,'')}}</div>
																						@else
																						<div class="kt-badge kt-badge--xl kt-badge--warning text-white text-capitalize">{{Str::limit($data->name,1,'')}}</div>
																						@endif
																					@endif
																				</div>
																				<div class="kt-user-card-v2__details">
																					<a class="kt-user-card-v2__name" href="#">{{$data->name}}</a>
																					<span class="kt-user-card-v2__desc">Architect</span>
																				</div>
																			</div>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span style="width: 182px;">{{$data->user_name}}</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span style="width: 182px;">{{$data->email}}</span>
																	</td>
																	<td data-field="Actions" class="kt-datatable__cell">
																		<span style="width: 182px;">
																			<a href="/keen/preview/demo1/custom/users/add1.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-info-circle" style="padding: 0;" aria-hidden="true"></i></a>
																			<a href="/keen/preview/demo1/custom/users/add.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-pencil-square" style="padding: 0;" aria-hidden="true"></i></a>
																			<a href="/keen/preview/demo1/custom/users/add3.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-eraser" style="padding: 0;" aria-hidden="true"></i></a>
																		</span>
																	</td>
																</tr>
																
																@endforeach
															</tbody>
														</table>
													</div>
												</div>
											</div>
										</div>
										<!--end::Portlet-->
									</div>
								</div>

								<!--begin: Pagination-->
								<div class="kt-pagination kt-pagination--brand kt-margin-t-10">
									<ul class="kt-pagination__links">
										<li class="kt-pagination__link--first">
											<a href="#"><i class="fa fa-angle-double-left"></i></a>
										</li>
										<li class="kt-pagination__link--next">
											<a href="#"><i class="fa fa-angle-left"></i></a>
										</li>

										<li>
											<a href="#">...</a>
										</li>
										<li>
											<a href="#">29</a>
										</li>
										<li>
											<a href="#">30</a>
										</li>
										<li class="kt-pagination__link--active">
											<a href="#">32</a>
										</li>
										<li>
											<a href="#">34</a>
										</li>
										<li>
											<a href="#">...</a>
										</li>

										<li class="kt-pagination__link--prev">
											<a href="#"><i class="fa fa-angle-right"></i></a>
										</li>
										<li class="kt-pagination__link--last">
											<a href="#"><i class="fa fa-angle-double-right"></i></a>
										</li>
									</ul>
									<div class="kt-pagination__toolbar">
										<select class="form-control" style="width: 60px;">
											<option value="10">10</option>
											<option value="20">20</option>
											<option value="30">30</option>
											<option value="50">50</option>
											<option value="100">100</option>
										</select>
										<span class="pagination__desc">
											10 of 230
										</span>
									</div>
								</div>
								<!--end: Pagination-->
							</div>
							<!--End:: App Content-->
						</div>
						<!--End::App-->

					</div>

					<!-- end:: Content -->
					
@endsection