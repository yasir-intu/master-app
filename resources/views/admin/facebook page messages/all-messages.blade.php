@extends('layouts.admin')
@section('admin')
@if(Session::has('success_assign'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "Assign Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_assign'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Assign failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif
									<style>
										.post-overlay{
											user-select: none;
											position: fixed;
											z-index: 4000;
											width: 100%;
											height: 100%;
											left: 0;
											top: 0;
											right: 0;
											bottom: 0;
											margin: auto;
											text-align: center;
											box-sizing: border-box;
											background: rgba(0,0,0,.8);
										}
										.processing{
											position: fixed;
											transition: top .2s ease-in-out;
											left: 0;
											top: 0;
											right: 0;
											bottom: 0;
											margin: auto;
											width: 90px;
											height: 101px;
										}
										.modal-content{
											color: #1e1e1e;
											width: 98%;
											margin: auto;
											border-radius: 25px !important;
											padding: 10px;
											filter: drop-shadow( 0 5px rgba(0,0,0,.05));
											border: 1px solid rgba(0,0,0,.03);
											background: #f8f8f8;
										}
										.report-icon{
											-webkit-user-select: none;
											-moz-user-select: none;
											-ms-user-select: none;
											user-select: none;
											width: 110px;
											height: 110px;
											display: block;
											margin: 6px auto 12px;
										}
										.title{
											font-size: 16px;
											font-weight: 500;
											line-height: 1.4;
											margin: 0 0 10px;
											padding: 0 0 10px;
											border-bottom: 1px solid rgba(0,0,0,.1);
											float: left;
											width: 100%;
											text-align: center;
										}
										.message{
											font-size: 13px;
											line-height: 1.4;
											float: left;
											width: 100%;
											padding: 0 10px;
											margin: 0 0 10px;
										}
										@keyframes modal_ani {
											0%   {opacity: 0; transform: scale(1);}
											50%   {transform: scale(1.2);}
											100% {opacity: 1; transform: scale(1);}
										}
										@keyframes modal_ani_out {
											0% {transform: scale(1);}
											100% {transform: scale(0);}
										}
									</style>
					<div ng-app="client-message" ng-controller="messageController">
					<div ng-show="stopdiv" class="alert alert-warning" role="alert">
						Auto load of Message has stopped. Please uncheck to start loading
					</div>
					<div class="post-overlay" ng-show="processing">
						<div class="processing">
							<svg id="NXLoadingDots" fill="#32c682" width="80px" height="80px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid"><g transform="translate(25 50)"><circle cx="0" cy="0" r="9" fill="inherit" transform="scale(0.925712 0.925712)"><animateTransform attributeName="transform" type="scale" begin="-0.266s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"></animateTransform></circle></g><g transform="translate(50 50)"> <circle cx="0" cy="0" r="9" fill="inherit" transform="scale(0.514056 0.514056)"><animateTransform attributeName="transform" type="scale" begin="-0.133s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"></animateTransform></circle></g><g transform="translate(75 50)"><circle cx="0" cy="0" r="9" fill="inherit" transform="scale(0.0916972 0.0916972)"><animateTransform attributeName="transform" type="scale" begin="0s" calcMode="spline" keySplines="0.3 0 0.7 1;0.3 0 0.7 1" values="0;1;0" keyTimes="0;0.5;1" dur="0.8s" repeatCount="indefinite"></animateTransform></circle></g></svg>
						<p id="NotiflixLoadingMessage" class="loading-message" style="color:#dcdcdc;font-size:15px;height:21px; top:60px;">Processing...</p>
						</div>

					</div>
					<div class="modal" ng-style="modal_db" tabindex="-1">
					  <div class="modal-dialog modal-dialog-centered" role="document">
						<div class="modal-content">
						  
							<div class="modal-body">
								<div class="report-icon">
									<svg ng-show="success_icon" fill="#32c682" width="110px" height="110px" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 120 120" xmlns:xlink="http://www.w3.org/1999/xlink">
										<g>
											<path d="M60 115.38c-30.54,0 -55.38,-24.84 -55.38,-55.38 0,-30.54 24.84,-55.38 55.38,-55.38 30.54,0 55.38,24.84 55.38,55.38 0,30.54 -24.84,55.38 -55.38,55.38zm0 -115.38c-33.08,0 -60,26.92 -60,60 0,33.08 26.92,60 60,60 33.08,0 60,-26.92 60,-60 0,-33.08 -26.92,-60 -60,-60z" id="NXReportSuccess4"></path>
										</g>
										<g>
											<path d="M88.27 35.39l-35.47 39.9 -21.37 -17.09c-0.98,-0.81 -2.44,-0.63 -3.24,0.36 -0.79,0.99 -0.63,2.44 0.36,3.24l23.08 18.46c0.43,0.34 0.93,0.51 1.44,0.51 0.64,0 1.27,-0.26 1.74,-0.78l36.91 -41.53c0.86,-0.96 0.76,-2.42 -0.19,-3.26 -0.95,-0.86 -2.41,-0.77 -3.26,0.19z" id="NXReportSuccess6"></path>
										</g>
									</svg>
									<svg ng-show="fail_icon" fill=" #ff5549" width="110px" height="110px" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" version="1.1" style="shape-rendering:geometricPrecision; text-rendering:geometricPrecision; image-rendering:optimizeQuality; fill-rule:evenodd; clip-rule:evenodd" viewBox="0 0 120 120" xmlns:xlink="http://www.w3.org/1999/xlink">
									<g>
										<path d="M4.35 34.95c0,-16.82 13.78,-30.6 30.6,-30.6l50.1 0c16.82,0 30.6,13.78 30.6,30.6l0 50.1c0,16.82 -13.78,30.6 -30.6,30.6l-50.1 0c-16.82,0 -30.6,-13.78 -30.6,-30.6l0 -50.1zm30.6 85.05l50.1 0c19.22,0 34.95,-15.73 34.95,-34.95l0 -50.1c0,-19.22 -15.73,-34.95 -34.95,-34.95l-50.1 0c-19.22,0 -34.95,15.73 -34.95,34.95l0 50.1c0,19.22 15.73,34.95 34.95,34.95z" id="NXReportFailure4"></path>
									</g>
									<g>
										<path d="M82.4 37.6c-0.9,-0.9 -2.37,-0.9 -3.27,0l-19.13 19.13 -19.14 -19.13c-0.9,-0.9 -2.36,-0.9 -3.26,0 -0.9,0.9 -0.9,2.35 0,3.26l19.13 19.14 -19.13 19.13c-0.9,0.9 -0.9,2.37 0,3.27 0.45,0.45 1.04,0.68 1.63,0.68 0.59,0 1.18,-0.23 1.63,-0.68l19.14 -19.14 19.13 19.14c0.45,0.45 1.05,0.68 1.64,0.68 0.58,0 1.18,-0.23 1.63,-0.68 0.9,-0.9 0.9,-2.37 0,-3.27l-19.14 -19.13 19.14 -19.14c0.9,-0.91 0.9,-2.36 0,-3.26z" id="NXReportFailure6"></path>
									</g>
									</svg>
								</div>
								<h5 ng-show="success_icon" class="title">Assign Success</h5>
								<h5 ng-show="fail_icon" class="title">Assign failed</h5>
								<p ng-show="success_icon" class="message">"Do not try to become a person of success but try to become a person of value." <br><br>- Albert Einstein</p>
								<p ng-show="fail_icon" class="message">"Do not try to become a person of success but try to become a person of value." <br><br>- Albert Einstein</p>
							</div>
						  
						</div>
					  </div>
					</div>
					<form name='assignForm'>				
						@csrf
						<!-- begin:: Content Head -->
						<div class="kt-subheader   kt-grid__item" id="kt_subheader">
							<div class="kt-container  kt-container--fluid ">
								<div class="kt-subheader__main">
									<button class="kt-subheader__mobile-toggle" id="kt_subheader_mobile_toggle"><span></span></button>
									
									<h3 class="kt-subheader__title">
										Client Messages                               
									</h3>  

									<span class="kt-subheader__separator kt-subheader__separator--v"></span>
									
									<div class="kt-subheader__toolbar" id="kt_subheader_search"></div>

									<div class="kt-subheader__toolbar kt-hidden" id="kt_subheader_group_actions">

										<div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span></div>
											
										<div class="btn-toolbar kt-margin-l-20"></div>
									</div>
								</div>        
								
								<div class="kt-subheader__toolbar" id="assigning" data-ass-url="{{route('facebook-page-message-assigning')}}" data-post-url="{{route('facebook-page-message-assign-multi')}}">
									<span ng-show="validation" class="feedback mb-0 text-danger w-100" role="alert">
										<strong>@{{ validation }}</strong>
									</span>
									<span ng-show="validation2" class="feedback mb-0 text-danger w-100" role="alert">
										<strong>Please select a Message</strong>
									</span>
									<span ng-show="validation3" class="feedback mb-0 text-danger w-100" role="alert">
										<strong>Please Enter a Senior Executive</strong>
									</span>
										
									<select name="multi_se" ng-model="se" class="form-control c-m-exe" id="se" ng-class="{'border-danger' : assignForm.multi_se.$invalid && validation3}"  required>
										<option>Select Executive</option>
										<option ng-repeat="ses in assigning[0]" value="@{{ses.id}}">@{{ses.name}}</option>
									</select>
									<span class="px-3">& </span>
									<select name="multi_e" ng-model="e" class="form-control c-m-e" id="e">
										<option>Select Employee</option>									
										<option ng-repeat="es in assigning[1]" data-id="@{{es.se_id}}" value="@{{es.id}}">@{{es.name}}</option>
									</select>

									<button  type="button" ng-click="postassign()" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
										Submit
									</button>
								</div>
							</div>
						</div>
						<!-- end:: Content Head -->		

						<!-- begin:: Content -->
						<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding: 0px">
							<!--Begin::App-->
							<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
								<!--Begin:: App Aside Mobile Toggle-->
								<button class="kt-app__aside-close" id="kt_users_aside_close">
									<i class="la la-close"></i>
								</button>
								<!--End:: App Aside Mobile Toggle-->

								<!--Begin:: App Content-->
								<div class="kt-grid__item kt-grid__item--fluid kt-app__content" style="margin-left: 0;">
									<div class="row">
										<div class="col-12">
											<div class="kt-portlet kt-portlet--mobile">
												<div class="kt-portlet__body kt-portlet__body--fit">
													<!--begin: Datatable -->
													<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
														<table class="kt-datatable__table" id="client-message" style="display: block; overflow-x: auto;">
															<thead class="kt-datatable__head">
																<tr class="kt-datatable__row" style="left: 0px;">
																	<th data-field="id" class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check">
																		<span style="width: 20px;"></span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 170px;">Name</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 200px;">Messages</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 130px;">Assignend Director</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 130px;">Assignend Executive</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 130px;">Assignend Employee</span>
																	</th>
																	<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
																		<span style="width: 50px;">Unread</span>
																	</th>
																</tr>
															</thead>
															<tbody class="kt-datatable__body" id="client-message-body" style="">
															
																<tr data-row="0" class="kt-datatable__row" style="left: 0px;" ng-repeat="message in conversation">
																	
																	<td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="id">
																		<span style="width: 20px;">
																			<label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
																				<input type="checkbox" ng-change="stop()" ng-model="message.selected" ng-checked="checkid.indexOf(message.id)!= -1" name="mess_id[]">&nbsp;<span></span>
																			</label>
																		</span>
																	</td>
																	<td data-field="first_name" class="kt-datatable__cell">
																		<span style="width: 170px;">
																			<div class="kt-user-card-v2">
																				<div class="kt-user-card-v2__pic" ng-repeat="pic in profile_pic" ng-if="pic.id==message.senders.data[0].id">
																					<img width="40" height="40" ng-if="pic.profile_pic" ng-src="@{{pic.profile_pic}}" alt="">
																					<img width="40" height="40" ng-if="!pic.profile_pic" alt="no profile pic">
																				</div>
																				<div class="kt-user-card-v2__details">
																					<a class="kt-user-card-v2__name"  style="font-family: 'SolaimanLipi', sans-serif;" href="{{url('admin/client-message')}}/@{{message.id}}/@{{message.unread_count}}">
																						<b ng-if="message.unread_count>0">
																							@{{message.senders.data[0].name}}
																						</b>
																						<span ng-if="message.unread_count==0">
																							@{{message.senders.data[0].name}}
																						</span>
																					</a>
																				</div>
																			</div>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span style="width: 200px;">
																			<b ng-if="message.unread_count>0">
																				<span ng-if="message.messages.data[0].from.name!=='Master Design'"  style="padding-right: 10px; color: slateblue;font-weight: bold;">
																					<span class="kt-user-card-v2__pic" ng-repeat="lastName in profile_pic" ng-if="lastName.id==message.senders.data[0].id">
																						@{{lastName.last_name}}:
																					</span>
																				</span>
																				<span ng-if="message.messages.data[0].from.name=='Master Design'" style="padding-right: 10px padding-right: 10px;color: #b502c1;font-weight: bold;">
																					Me:
																				</span>
																				
																				@{{message.messages.data[0].message | str_limit:25}}
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].image_data">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].video_data">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].file_url">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].sticker"">
																					@{{message.snippet}}
																				</span>
																				
																				<span ng-if="message.messages.data[0].shares.data[0].link && !message.messages.data[0].sticker">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																			</b>
																			<span ng-if="message.unread_count==0">
																				<span ng-if="message.messages.data[0].from.name!=='Master Design'"  style="padding-right: 10px; color: slateblue;font-weight: bold;">
																					<span class="kt-user-card-v2__pic" ng-repeat="lastName in profile_pic" ng-if="lastName.id==message.senders.data[0].id">
																						@{{lastName.last_name}}:
																					</span>
																				</span>
																				<span ng-if="message.messages.data[0].from.name=='Master Design'" style="padding-right: 10px padding-right: 10px;color: #b502c1;font-weight: bold;">
																					Me:
																				</span>
																				
																				@{{message.messages.data[0].message | str_limit:25}}
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].image_data">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].video_data">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].attachments.data[0].file_url">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																				<span ng-if="message.messages.data[0].sticker"">
																					@{{message.snippet}}
																				</span>
																				
																				<span ng-if="message.messages.data[0].shares.data[0].link && !message.messages.data[0].sticker">
																					<i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> @{{message.snippet}}</span>
																				</span>
																				
																			</span>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span ng-repeat="messs in mess[2]" style="width: 130px;">
																			<span ng-if="messs.mess_id==message.id" style="width: 130px;">
																				@{{messs.director.name}}
																			</span>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span ng-repeat="messs in mess[2]" style="width: 130px;">
																			<span ng-if="messs.mess_id==message.id"style="width: 130px;">
																				@{{messs.executive.name}}   
																			</span>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span ng-repeat="messs in mess[2]" style="width: 130px;">
																			<span ng-if="messs.mess_id==message.id"style="width: 130px;">
																				@{{messs.employee.name}}
																			</span>
																		</span>
																	</td>
																	<td data-field="email" class="kt-datatable__cell">
																		<span style="width: 50px;">
																			<span ng-if="message.unread_count>0" class="kt-menu__link-badge">
																				<span class="kt-badge kt-badge--danger">
																					<b>
																						<span ng-if="message.unread_count<=99">
																							@{{message.unread_count}}
																						</span>
																						<span ng-if="message.unread_count>99">
																							99+
																						</span>
																					</b>
																				</span>
																			</span>
																		</span>
																	</td>
																</tr>
															</tbody>
														</table>
														
														<div style="text-align:center; padding-top: 15px;" ng-show="IsLoading">
														  <svg class="spinner" width="174px" height="174px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg">
															 <circle class="path" fill="transparent" stroke-width="2" cx="33" cy="33" r="30" stroke="url(#gradient)"/>
															   <linearGradient id="gradient">
																 <stop offset="50%" stop-color="#f15e22" stop-opacity="1"/>
																 <stop offset="65%" stop-color="#f15e22" stop-opacity=".5"/>
																 <stop offset="100%" stop-color="#f15e22" stop-opacity="0"/>
															   </linearGradient>
															</circle>
															 <svg class="spinner-dot dot" width="5px" height="5px" viewBox="0 0 66 66" xmlns="http://www.w3.org/2000/svg" x="37" y="1.5">
															   <circle class="path" fill="#42d179" cx="33" cy="33" r="30"/>
															  </circle>
															</svg> 
														  </svg> 
														</div>
													</div>
													<!--end: Datatable -->
												</div>
											</div>
										</div>
									</div>
								</div>
								<!--End:: App Content-->
							</div>
							<!--End::App-->	
						</div>
						<!-- end:: Content -->				
					</form>			
					</div>
@endsection