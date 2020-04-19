@extends('layouts.admin')
@section('admin')

											<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
                            <button class="kt-subheader__mobile-toggle" id="kt_subheader_mobile_toggle"><span></span></button>
            
                            <div class="kt-user-card-v2__pic" style="padding-right: 10px;">
                                <img width="40" height="40" style="border-radius: 50%;" src={{Request::is(!empty($b["profile_pic"]))? $b["profile_pic"] :''}} alt="">
                            </div>

                            <h3 class="kt-subheader__title">
                                            {{$graphNode['senders']['data']['0']['name']}}                               
                </h3>
                       

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">Total Conversation    {{$graphNode["message_count"]}}</span>
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
                        @if (!empty($paging["next"]))
                        <a href="@if (Auth::user()->role_id<=2){{route('message-view-next', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["after"]])}}@endif @if (Auth::user()->role_id==3){{route('message-view-next-senior-executive', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["after"]])}}@endif @if (Auth::user()->role_id==4){{route('message-view-next-employee', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["after"]])}}@endif" class="btn btn-bold" style="background: #fff; border-radius: 30px; position: relative; left: 10%; transform: scale(0.85); box-shadow: 0px 0px 3px rgba(0, 0, 5, .3); color: #424040;">Prev</a>
                        @endif
                        @if (!empty($paging["previous"]))
                        <a href="@if (Auth::user()->role_id<=2){{route('message-view-prev', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["before"]])}}@endif @if (Auth::user()->role_id==3){{route('message-view-prev-senior-executive', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["before"]])}}@endif @if (Auth::user()->role_id==4){{route('message-view-prev-employee', [$graphNode["id"], $graphNode["unread_count"], $paging["cursors"]["before"]])}}@endif" class="btn btn-bold" style="background: #fff; border-radius: 30px; position: relative; left: 10%; transform: scale(0.85); box-shadow: 0px 0px 3px rgba(0, 0, 5, .3); color: #424040;">Next</a>
                        @endif
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
            <div class="col-3">
				<div class="kt-portlet kt-portlet--mobile">
					<div class="kt-portlet__body kt-portlet__body--fit">
						<!--begin: Datatable -->
						<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
							<table class="kt-datatable__table" style="display: block; height:60vh; overflow-y:scroll;">
                                <thead class="kt-datatable__head">
                                    <tr class="kt-datatable__row" style="left: 0px;">
                                        <th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 150px;">Name</span>
                                        </th>
										<th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 50px;"></span>
                                        </th>
                                    </thead>
                                <tbody class="kt-datatable__body" style="">

                                    @foreach ($f as $fll)

                                    @php
                                        try {
                                            $response = $fb->get(
                                                '/'.$fll["senders"]["data"][0]["id"],
                                                'EAAGgwI3pjNsBANSXqQ7Ozl0x1aUQwRpZB8IgFIPFNUbkZB9ONjZCg9AiVxKjYQAsx1skNnv4dEt2niaF3gNjfXr61INZCnAuETnshIAIysEAjGuScqqmiwajDNA27aZCQZCLjRtkmBXb75cIOZB7MqUv0AQLqOZAb1BDbxoWcFy9lKEJo0G863H4Ms9fY07zlfIZD'
                                            );
                                        } catch(FacebookExceptionsFacebookResponseException $e) {
                                            echo 'Graph returned an error: ' . $e->getMessage();
                                            exit;
                                        } catch(FacebookExceptionsFacebookSDKException $e) {
                                            echo 'Facebook SDK returned an error: ' . $e->getMessage();
                                            exit;
                                        }
                                    
                                        $graphNode4 = json_decode($response->getGraphNode(), true);
                                        
                                        $b= $graphNode4;
                                    @endphp
                                     @if ($graphNode['senders']['data']['0']['id']==$fll["senders"]["data"][0]["id"])
                                    
                                    <tr data-row="0" class="kt-datatable__row" style="background: #d6d6d6; left: 0px;">
                                    
                                    @else
                                        
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                    
                                    @endif   
                                        <td data-field="first_name" class="kt-datatable__cell">
                                            <span style="width: 150px;">
                                                <div class="kt-user-card-v2">
                                                    <div class="kt-user-card-v2__pic">
                                                        <img width="40" height="40" src={{Request::is(!empty($b["profile_pic"]))? $b["profile_pic"] :''}} alt="">
                                                    </div>
                                                    <div class="kt-user-card-v2__details">
                                                        <a class="kt-user-card-v2__name" style="font-family: 'SolaimanLipi', sans-serif;" href="@if (Auth::user()->role_id<=2){{route('message-view', [$fll["id"], $fll["unread_count"]])}}@endif @if (Auth::user()->role_id==3){{route('message-view-senior-executive', [$fll["id"], $fll["unread_count"]])}}@endif @if (Auth::user()->role_id==4){{route('message-view-employee', [$fll["id"], $fll["unread_count"]])}}@endif">
                                                            @if ($fll["unread_count"]>0)
                                                            <b>
                                                                {{$fll["senders"]["data"][0]["name"]}}
                                                            </b>
                                                            @else
                                                                {{$fll["senders"]["data"][0]["name"]}}
                                                            @endif
                                                        </a>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
										<td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 50px;">
                                                @if ($fll["unread_count"]>0)
												<span class="kt-menu__link-badge"><span class="kt-badge kt-badge--danger"><b>
												@if ($fll["unread_count"]<=99)
												{{$fll["unread_count"]}}
												@else
													99+
												@endif
												</b></span></span>
												@endif
                                            </span>
                                        </td>
                                    </tr>
                                    
                                    @endforeach
                                </tbody>
                            </table>
						</div>
						<!--end: Datatable -->
					</div>
                </div>
                @if(Auth::user()->role_id<=2)
                @if (!empty($paging2["previous"]))
                <a href="{{route('message-prev-pagination', [$graphNode["id"], $graphNode["unread_count"], $paging2["cursors"]["before"]])}}" class="btn btn-bold" style="background: #fff; border-radius: 30px;margin-bottom: 15px;margin-top: -10px;position: relative;left: 25%; transform: scale(0.85); box-shadow: 0px 0px 3px rgba(0, 0, 5, .2);">Prev</a>
                @endif
                @if (!empty($paging2["next"]))
                <a href="{{route('message-next-pagination', [$graphNode["id"], $graphNode["unread_count"], $paging2["cursors"]["after"]])}}" class="btn btn-bold" style="background: #fff; border-radius: 30px; margin-bottom: 15px; margin-top: -10px; position: relative; left: 30%; transform: scale(0.85); box-shadow: 0px 0px 3px rgba(0, 0, 5, .2);">Next</a>
                @endif
            @endif
			</div>
			
            <div class="col-9">
				<div class="kt-portlet kt-portlet--mobile">
					<div class="kt-portlet__body kt-portlet__body--fit" style="height: 60vh; position: fixed; width: 59%;">
						<!--begin: Datatable -->
						<div class="kt-datatable kt-datatable--default kt-datatable--brand kt-datatable--loaded" id="kt_apps_user_list_datatable" style="">
							<div class="kt-datatable__table" style="display: block;overflow-y: auto; height: 60vh; padding: 25px; padding-right: 0;" id="message">
                                @foreach (array_reverse($a) as $all)
									@if ($all["from"]["name"]!=="Master Design")
                                <div class="card-body text-left" style="max-width:70%; margin-right: auto; white-space: pre-line;">
                                    Client :
											@if(!empty($all["message"]))
                                        <span style="display: inline-table; background-color: #0084ff; color: #fff; font-family: 'SolaimanLipi', sans-serif; font-size: 15px; margin: 1px 0; margin-right: auto; border-radius: 1.3em;">
											<span style="display: inline-block; padding: 6px 12px 7px;">
												{{$all["message"]}}
										</span>
										</span>
											@endif
										@if(!empty($all["attachments"]))
									@foreach ($all["attachments"]["data"] as $att)
										@if($att["mime_type"]=="image/jpeg" || $att["mime_type"]=="image/gif")
										<div style="max-width: 100%; margin: 15px 0; margin-right: auto; border-radius: 1.3em;  class="d-inline-block">
											<a href="{{$att["image_data"]["preview_url"]}}" target="blank">
											<img src="{{$att["image_data"]["url"]}}" style="border-radius: 1.3em;" class="img-fluid">
											</a>
										</div>
										@endif
										@if($att["mime_type"]=="video/mp4")
										<div style="margin: 15px 0; margin-right: auto; border-radius: 1.3em; box-shadow: 0 0 2px #000;" class="d-inline-block">
											<video width="320" height="240" style="border-radius: 1.3em;" controls>
											  <source src="{{$att["video_data"]["url"]}}" type="video/mp4">
											</video>
										</div>
										@endif
										@if($att["mime_type"]=="audio/mpeg")
										<div style="margin: 15px 0; margin-right: auto; border-radius: 1.3em;" class="d-inline-block">
											<audio controls>
											  <source src="{{$att["file_url"]}}" type="audio/mpeg">
											</audio>
										</div>
										@endif
										@if($att["mime_type"]!="audio/mpeg" && $att["mime_type"]!="image/jpeg" && $att["mime_type"]!="image/gif" && $att["mime_type"]!="video/mp4")
										<span style="display: inline-table; background-color: #0084ff; color: rgba(0, 0, 0, 1); margin: 1px 0; margin-right: auto; max-width: 90%; border-radius: 1.3em;">
                                            <span style="display: inline-block; padding: 6px 12px 7px;">
												<a href="{{$att["file_url"]}}" style="color: #fff;" downloaded>
												<u>{{$att["name"]}}</u>
												</a>
										</span>
										</span>
										@endif
									@endforeach
								@endif	
								@if(!empty($all["sticker"]))
									<div style="max-width: 30%;margin: 1px 0; margin-right: auto; border-radius: 1.3em;">
									<img src="{{$all["sticker"]}}" class="img-fluid">
									</div>
                                @endif
								</div>
                                    @endif
									@if ($all["from"]["name"]=="Master Design")
                                <div class="card-body text-right" style="max-width:70%; margin-left: auto; white-space: pre-line;">
											@if(!empty($all["message"]))
                                        <span style="display: inline-table; background-color: #f1f0f0; color: rgba(0, 0, 0, 1); font-family: 'SolaimanLipi', sans-serif; font-size: 15px; margin: 1px 0; margin-left: auto; max-width: 90%; border-radius: 1.3em;">
                                            <span style="display: inline-block; padding: 6px 12px 7px;">
												{{$all["message"]}}
										</span>
										</span>
											@endif
								
								@if(!empty($all["attachments"]))
									@foreach ($all["attachments"]["data"] as $att)
										@if($att["mime_type"]=="image/jpeg" || $att["mime_type"]=="image/gif")
										<div style="max-width: 100%; margin: 15px 0; margin-left: auto; border-radius: 1.3em;" class="d-inline-block">
											<a href="{{$att["image_data"]["preview_url"]}}" target="blank">
											<img src="{{$att["image_data"]["url"]}}" style="border-radius: 1.3em;" class="img-fluid">
											</a>
										</div>
										@endif
										@if($att["mime_type"]=="video/mp4")
										<div style="margin: 1px 0; margin-left: auto; border-radius: 1.3em; box-shadow: 0 0 2px #000;" class="d-inline-block">
											<video width="320" height="240" style="border-radius: 1.3em;" controls>
											  <source src="{{$att["video_data"]["url"]}}" type="video/mp4">
											</video>
										</div>
										@endif
										@if($att["mime_type"]=="audio/mpeg")
										<div style="margin: 1px 0; margin-left: auto; border-radius: 1.3em;" class="d-inline-block">
											<audio controls>
											  <source src="{{$att["file_url"]}}" type="audio/mpeg">
											</audio>
										</div>
										@endif
										@if($att["mime_type"]!="audio/mpeg" && $att["mime_type"]!="image/jpeg" && $att["mime_type"]!="image/gif" && $att["mime_type"]!="video/mp4")
										<span style="display: inline-table; background-color: #f1f0f0; color: rgba(0, 0, 0, 1); font-family: 'SolaimanLipi', sans-serif; font-size: 15px; margin: 1px 0; margin-left: auto; max-width: 90%; border-radius: 1.3em;">
                                            <span style="display: inline-block; padding: 6px 12px 7px;">
												<a href="{{$att["file_url"]}}" style="color: rgba(0, 0, 0, 1);" downloaded>
												<u>{{$att["name"]}}</u>
												</a>
										</span>
										</span>
										@endif
										@endforeach
										@endif
										@if(!empty($all["sticker"]))
									<div style="max-width: 30%; margin: 1px 0; margin-left: auto; border-radius: 1.3em;">
									<img src="{{$all["sticker"]}}" class="img-fluid">
									</div>
                                @endif
                                : Me
								</div>
                                @endif
                                @endforeach
                                    <script>
                                        function textAreaAdjust(o) {
                                            o.style.height = "1px";
                                            o.style.height = (0+o.scrollHeight)+"px";
                                        }
                                    </script>
                                    <style>
                                        .uiTextareaAutogrow:focus{
                                            outline: none;
                                        }
                                    </style>
                                    {{-- <script>
                                        $(document).ready(function(){
                                            $('input[type="file"]').change(function(e){
                                                $('input[type="file"]').each(function() {
                                                var fileName = e.target.files[0].name;
                                                document.getElementById('attach').innerHTML += '<div class="_4dv-" style="display: block;margin: 0;min-height: 30px;vertical-align: middle;width: 100%;border: 1px solid #dadde1;"><i class="flaticon2-image-file" style="font-size:15px;"></i><span style="padding-left: 5px">'+fileName+'</span></div>';
                                                });
                                            });
                                        });
                                    </script> --}}
                                    <form action="{{route('send-message', [$graphNode["id"], $graphNode["unread_count"], $graphNode['senders']['data']['0']['id']])}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                <div class="card-body" id="attach" style="position: fixed;bottom: 45px;width: 59.2%;background: #fff;border-top: 1px solid #dadde1;min-height: 56px;padding: 10px;left: 40%;">
                                    <div class="_4dw0" style="display: inline-block;width: 4%;margin: -9px 0;">
                                        <img class="_1cjc img" src="https://scontent.fdac39-1.fna.fbcdn.net/v/t1.0-1/cp0/p60x60/69599328_2459209297644184_5306316662666952704_n.jpg?_nc_cat=100&amp;_nc_sid=1eb0c7&amp;_nc_ohc=gF6wmks3WxYAX9VLIWV&amp;_nc_ht=scontent.fdac39-1.fna&amp;oh=f268ea49ebbefb3aeb81697ba5dfb305&amp;oe=5EF78FEA" alt="" style="border: 1px solid rgba(0, 0, 0, .10);display: block;height: 28px;width: 28px;">
                                    </div>

                                    <div class="_4dv-" style="display: inline-block;margin: 0;min-height: 30px;vertical-align: middle;width: 84%;">
                                        <label for="reply" class="_1p7p _5id1 _4dv_ _58ak _3ct8" style="border: 0;min-height: 24px;padding-bottom: 4px;padding-top: 4px;background-color: #fff;line-height: 16px;vertical-align: middle;width: 100%;box-sizing: border-box;cursor: default;display: inline-block;font-weight: normal;margin: 0;position: relative;font-size: 12px;">
                                            <textarea name="text_message" id="reply" onkeyup="textAreaAdjust(this)" type="text" class="_1p7p _5id1 _4dv_ _58al uiTextareaAutogrow" data-testid="inbox_composer_text_input" placeholder="Write a reply..." style="height: 32px;color: rgb(28, 28, 28);font-size: 14px;max-height: 50vh;min-height: 16px;box-sizing: border-box;line-height: 16px;padding: 7px 8px;resize: none;vertical-align: middle;background: transparent;overflow: hidden;width: 100%;border: none;"></textarea>
                                        </label>
                                    </div>
                                    <label for="attach" class="flaticon2-clip-symbol" style="font-size: 18px;width: 3%;display: inline-block;position: relative;">
                                        <input type="file" name="attach[]" multiple style="width: 100%;position: absolute;right: 0px;opacity: 0;top: 0px;"> 
                                    </label>
                                    <button type="submit" style="font-size: 16px;color: #4080ff;margin-left: 5px;cursor: pointer;display: inline-block;line-height: 22px;transition: 200ms cubic-bezier(.08,.52,.52,1) background-color, 200ms cubic-bezier(.08,.52,.52,1) box-shadow, 200ms cubic-bezier(.08,.52,.52,1) transform;font-weight: bold;padding: 0 8px;border: 0;background: transparent;">
                                        <svg class="svgIcon" height="25px" width="25px" version="1.1" viewBox="0 0 16 16" x="0px" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xml:space="preserve" y="0px" style="">
                                            <path d="M11,8.3L2.6,8.8C2.4,8.8,2.3,8.9,2.3,9l-1.2,4.1c-0.2,0.5,0,1.1,0.4,1.5C1.7,14.9,2,15,2.4,15c0.2,0,0.4,0,0.6-0.1l11.2-5.6 C14.8,9,15.1,8.4,15,7.8c-0.1-0.4-0.4-0.8-0.8-1L3,1.1C2.5,0.9,1.9,1,1.5,1.3C1,1.7,0.9,2.3,1.1,2.9L2.3,7c0,0.1,0.2,0.2,0.3,0.2 L11,7.7c0,0,0.3,0,0.3,0.3S11,8.3,11,8.3z" fill="#0084ff"></path>
                                        </svg>
                                    </button>
                                </div>
                            </form>
                            </div>
						</div>
						<script>
						var d = document.getElementById('message');

						if(d.scrollHeight > d.clientHeight) {
						  d.scrollTop = d.scrollHeight - d.clientHeight;
						}
						</script>
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

@endsection