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
					@if(Session::has('success_update_assign'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "Assign Update Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_update_assign'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Assign Update failed! Please try again.",
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
                                            Users                               
                </h3>
                       

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                                            450 Total                                    </span>
                
                                    
                        <div class="input-group">
							<input type="text" class="form-control" placeholder="Search..." id="generalSearch">
							<div class="input-group-append">
                                <span class="input-group-text" id="basic-addon2">
                                    <i class="flaticon2-search-1"></i>
                                </span>
                            </div>
                        </div>
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
		<select name="multi_md" class="form-control" id="md">
			<option>Select MD</option>
			@foreach (Auth::user()->director->executive as $mds)									
			<option  value="{{$mds->id}}">{{$mds->name}}</option>
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
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::App-->
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
    <!--Begin:: App Aside Mobile Toggle-->
    <button class="kt-app__aside-close" id="kt_users_aside_close">
        <i class="la la-close"></i>
    </button>
    <!--End:: App Aside Mobile Toggle-->

    <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
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
                                            <span style="width: 140px;">Assign To</span>
                                        </th>
										<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 110px;"></span>
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
                                                        <a class="kt-user-card-v2__name" href="{{route('message-view', [$all["id"], $all["unread_count"]])}}">
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
                                                    <span style="padding-right: 10px">
                                                        {{$b["last_name"].":  "}}
                                                    </span>
                                                @else
                                                <span style="padding-right: 10px">
                                                    You :
                                                </span>
                                                @endif
                                                {{Request::is(!empty($all["messages"]["data"][0]["message"]))? Str::limit($all["messages"]["data"][0]["message"],50) :''}}
                                                @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["image_data"]))
                                                    <img width="10" height="10" alt=" sent photo">
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
                                                @if (!empty($all["messages"]["data"][0]["shares"]))
                                                    <img width="10" height="10" alt=" shared link">
                                                @endif
                                            </b>
                                            @else
                                            @if ($all["messages"]["data"][0]["from"]["name"]!=="Master Design")
                                            <span style="padding-right: 10px">
                                                {{$b["last_name"].":  "}}
                                            </span>
                                        @else
                                        <span style="padding-right: 10px">
                                            You :
                                        </span>
                                        @endif
                                        {{Request::is(!empty($all["messages"]["data"][0]["message"]))? Str::limit($all["messages"]["data"][0]["message"],50) :''}}
                                        @if (!empty($all["messages"]["data"][0]["attachments"]["data"][0]["image_data"]))
                                            <img width="10" height="10" alt=" sent photo">
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
                                        @if (!empty($all["messages"]["data"][0]["shares"]))
                                            <img width="10" height="10" alt=" shared link">
                                        @endif
                                            @endif
                                            </span>
                                        </td>
										<td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 140px;">
                                                <select name="md{{$all["id"]}}" class="form-control">
													<option>Select Executive</option>
													@foreach (Auth::user()->director->executive as $mds)									
													<option 
													@foreach ($mds->message as $mess)
													@if($mess->mess_id == $all["id"])
													{{"selected"}}
													@endif
													@endforeach
													value="{{$mds->id}}">{{$mds->name}}</option>
													@endforeach
												</select>
												@if ($errors->has('md{{$all["id"]}}'))
												<span class="feedback mb-0 text-danger" role="alert">
													<strong>{{ $errors->first('md'.$all["id"]) }}</strong>
												</span>
												@endif
                                            </span>
                                        </td>
										<td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 110px;">
											<button type="submit" formaction="{{route('facebook-page-message-assign', [$all["id"]])}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper">
												Submit
											</button>
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
				{{--
                @if (!empty($paging["previous"]))
                <a href="{{route('facebook-page-message-prev-pagination', [$paging["cursors"]["before"]])}}" class="btn btn-brand btn-bold" style="border-radius: 30px;margin-bottom: 15px;margin-top: -10px;position: relative;left: 44%;">Prev</a>
                @endif
                <a href="{{route('facebook-page-message-next-pagination', [$paging["cursors"]["after"]])}}" class="btn btn-brand btn-bold" style="border-radius: 30px;margin-bottom: 15px;margin-top: -10px;transform: translate(-50%, 0);position: relative;left: 50%;">Next</a>
				--}}
			</div>
        </div>
    </div>
    <!--End:: App Content-->
</div>
<!--End::App-->	</div>
<!-- end:: Content -->	
</form>			

@endsection