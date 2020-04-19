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
<form>				
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
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                            </div>

                            <div class="kt-subheader__toolbar kt-hidden" id="kt_subheader_group_actions">

                    <div class="kt-subheader__desc"><span id="kt_subheader_group_selected_rows"></span></div>
                    
                    <div class="btn-toolbar kt-margin-l-20"></div>
                </div>
                    </div>        
        
        <div class="kt-subheader__toolbar">
            @if ($errors->has('multi_se'))
                <span class="feedback mb-0 text-danger w-100" role="alert">
                <strong>{{ $errors->first('multi_se') }}</strong>
                </span>
			@endif
            @if ($errors->has('mess_id'))
                <span class="feedback mb-0 text-danger w-100" role="alert">
                <strong>{{ $errors->first('mess_id') }}</strong>
                </span>
			@endif
                
            <select name="multi_se" class="form-control c-m-exe" id="se">
                <option value="">Select Executive</option>
                @foreach ($se as $ses)									
                <option  value="{{$ses->id}}">{{$ses->name}}</option>
                @endforeach
            </select>
            <span class="px-3">&</span>
            <select name="multi_e" class="form-control c-m-e" id="e">
                <option value="">Select Employee</option>
                @foreach ($e as $es)									
                <option data-id="{{$es->se_id}}" value="{{$es->id}}">{{$es->name}}</option>
                @endforeach
            </select>

            <button type="submit" formaction="{{route('facebook-page-message-assign-multi')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
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
						@verbatim
						<div ng-app="client-message" class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
							<table ng-controller="messageController" class="kt-datatable__table" data-url="{{route('facebook-page-message-auto')}}" id="client-message" style="display: block; overflow-x: auto;">
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
                                    </thead>
                                <tbody class="kt-datatable__body" id="client-message-body" style="">
								
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;" ng-repeat="message in messages>
                                        <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="id">
                                            <span style="width: 20px;">
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                                    <input type="checkbox" value="{{message.senders}}" name="mess_id[]">&nbsp;<span></span>
                                                </label>
                                            </span>
                                        </td>
                                        
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
						</div>
						@endverbatim
						<!--end: Datatable -->
					</div>
                </div>
                @if (!empty($paging["previous"]))
                <a href="{{route('facebook-page-message-prev-pagination', [$paging["cursors"]["before"]])}}" class="btn btn-brand btn-bold" style="border-radius: 30px;margin-bottom: 15px;margin-top: -10px;position: relative;left: 44%;">Prev</a>
                @endif
                <a href="{{route('facebook-page-message-next-pagination', [$paging["cursors"]["after"]])}}" class="btn btn-brand btn-bold" style="border-radius: 30px;margin-bottom: 15px;margin-top: -10px;transform: translate(-50%, 0);position: relative;left: 50%;">Next</a>
			</div>
        </div>
    </div>
    <!--End:: App Content-->
</div>
<!--End::App-->	</div>
<!-- end:: Content -->				
</form>			
@endsection