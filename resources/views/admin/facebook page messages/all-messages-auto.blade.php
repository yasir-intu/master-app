
                                    @foreach ($a as $all)

                                    @php
                                        try {
                                            $response = $fb->get(
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
                                    
                                        $graphNode = json_decode($response->getGraphNode(), true);
                                        
                                        $b= $graphNode;
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
                                                        <a class="kt-user-card-v2__name" style="font-family: 'SolaimanLipi', sans-serif;" href="{{route('message-view', [$all["id"], $all["unread_count"]])}}">
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
                                                        @if (!empty($messs->md_id))
                                                            {{$messs->director->name}}
                                                        @endif
                                                    @endif
                                                @endforeach
                                            </span>
                                        </td>
                                        <td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 130px;">
                                                @foreach ($mess as $messs)
                                                @if ($messs->mess_id==$all['id'])
                                                    @if (!empty($messs->se_id))
                                                        {{$messs->executive->name}}
                                                    @endif
                                                @endif
                                            @endforeach
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