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
                    @if(Session::has('success_progressive'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "Adding Progressive Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_progressive'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Adding Progressive failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif
                    @if(Session::has('success_complete'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "Adding Completing Task Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_complete'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Adding Completing Task! Please try again.",
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
                
            <select name="multi_md" class="form-control" id="md">
			<option>Select Employee</option>
			@foreach (Auth::user()->executive->employee as $mds)									
			<option  value="{{$mds->id}}">{{$mds->name}}</option>
			@endforeach
		</select>
        <button type="submit" formaction="{{route('facebook-page-message-senior-executive-assign-multi')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
			Submit
		</button>
        <button type="submit" formaction="{{route('facebook-page-message-senior-executive-assain-progressive')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
			Progressive
		</button>
        <button type="submit" formaction="{{route('facebook-page-message-senior-executive-assain-complete')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
			Complete
		</button>
            <button type="submit" formaction="{{route('facebook-page-message-senior-executive-assain-reprogressive')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
			Reprogressive
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
							<table class="kt-datatable__table" style="display: block; overflow-x: auto;">
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
                                            <span style="width: 130px;">Assignend Employee</span>
                                        </th>
										<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 50px;">Unread</span>
                                        </th>
                                    </thead>
                                <tbody class="kt-datatable__body" style="">

                                    @if($response!=null)
                                    @foreach ($response as $response)
                                    @php
									$graphNode = $response->getDecodedBody();
									$all= $graphNode;
                                        try {
                                            $responses = $fb->get(
                                                '/'.$all["senders"]["data"][0]["id"],
                                                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
                                            );
                                        } catch(FacebookExceptionsFacebookResponseException $e) {
                                            echo 'Graph returned an error: ' . $e->getMessage();
                                            exit;
                                        } catch(FacebookExceptionsFacebookSDKException $e) {
                                            echo 'Facebook SDK returned an error: ' . $e->getMessage();
                                            exit;
                                        }
                                    
                                        $graphNode2 = json_decode($responses->getGraphNode(), true);
                                        
                                        $b= $graphNode2;
                                    @endphp
                                        
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell--center kt-datatable__cell kt-datatable__cell--check" data-field="id">
                                            <span style="width: 20px;">
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--solid">
                                                    <input type="checkbox" value="{{$all['id']}}" name="mess_id[]">&nbsp;<span></span>
                                                </label>
                                            </span>
                                        </td>
                                        <td data-field="first_name" class="kt-datatable__cell">
                                            <span style="width: 170px;">
                                                <div class="kt-user-card-v2">
                                                    <div class="kt-user-card-v2__pic">
                                                        <img width="40" height="40" src={{Request::is(!empty($b["profile_pic"]))? $b["profile_pic"] :''}} alt="">
                                                    </div>
                                                    <div class="kt-user-card-v2__details">
                                                        <a class="kt-user-card-v2__name" style="font-family: 'SolaimanLipi', sans-serif;" href="{{route('message-view-senior-executive', [$all["id"], $all["unread_count"]])}}">
                                                            @if ($all["unread_count"]>0)
                                                            <b>
                                                                {{$all["senders"]["data"][0]["name"]}}
                                                            </b>
                                                            @else
                                                                {{$all["senders"]["data"][0]["name"]}}
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        <td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 200px;">
                                                @if ($all["unread_count"]>0)
                                                <b>
                                                @if ($all["messages"]["data"][0]["from"]["name"]!=="Master Design")
                                                    <span style="padding-right: 10px; color: slateblue;font-weight: bold;">
                                                        {{$b["last_name"].":  "}}
                                                    </span>
                                                @else
                                                <span style="padding-right: 10px padding-right: 10px;color: #b502c1;font-weight: bold;">
                                                    Me :
                                                </span>
                                                @endif
                                                {{Request::is(!empty($all["messages"]["data"][0]["message"]))? Str::limit($all["messages"]["data"][0]["message"],50) :''}}
                                                @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["image_data"]))
                                                    <i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px"> sent photo</span>
                                                @endif
                                                @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["video_data"]))
                                                    <img width="10" height="10" alt=" sent video">
                                                @endif
                                                @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["file_url"]))
                                                    <img width="10" height="10" alt=" sent attachment">
                                                @endif
                                                @if (!empty($all["messages"]["data"][0]["sticker"]))
                                                    <img width="10" height="10" src="{{$all["messages"]["data"][0]["sticker"]}}">
                                                @endif
                                                @if (!empty($all["messages"]["data"][0]["shares"]) || empty($all["messages"]["data"][0]["sticker"]))
                                                    <img width="10" height="10" alt=" shared link">
                                                @endif
                                            </b>
                                            @else
                                            @if ($all["messages"]["data"][0]["from"]["name"]!=="Master Design")
                                            <span style="padding-right: 10px;color: slateblue;font-weight: bold;">
                                                {{$b["last_name"].":  "}}
                                            </span>
                                        @else
                                        <span style="padding-right: 10px;color: #b502c1;font-weight: bold;">
                                            Me :
                                        </span>
                                        @endif
                                        {{Request::is(!empty($all["messages"]["data"][0]["message"]))? Str::limit($all["messages"]["data"][0]["message"],50) :''}}
                                        @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["image_data"]))
                                        <i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px">sent photo</span>
                                        @endif
                                        @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["video_data"]))
                                            <img width="10" height="10" alt=" sent video">
                                        @endif
                                        @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["file_url"]))
                                            <img width="10" height="10" alt=" sent attachment">
                                        @endif
                                        @if (!empty($all["messages"]["data"][0]["sticker"]))
                                            <img width="10" height="10" src="{{$all["messages"]["data"][0]["sticker"]}}">
                                        @endif
                                        @if (!empty($all["messages"]["data"][0]["shares"]) || empty($all["messages"]["data"][0]["sticker"]))
                                            <img width="10" height="10" alt=" shared link">
                                        @endif
                                            @endif
                                            </span>
                                        </td>
                                        <td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 130px;">
                                                @foreach ($mess as $messs)
                                                    @if ($messs->mess_id==$all['id'])
                                                        @if (!empty($messs->e_id))
                                                            {{$messs->employee->name}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </td>
										<td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 50px;">
                                                @if ($all["unread_count"]>0)
												<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger"><b>
												@if ($all["unread_count"]<=99)
												{{$all["unread_count"]}}
												@else
													99+
												@endif
												</b></span></span>
												@endif
                                            </span>
                                        </td>
                                    </tr>
                                    @endforeach
                                    @endif
                                </tbody>
                            </table>
						</div>
						<!--end: Datatable -->
					</div>
                </div>
			</div>
        </div>
    </div>
    <!--End:: App Content-->
</div>
<!--End::App-->	</div>
<!-- end:: Content -->				
</form>			
@endsection