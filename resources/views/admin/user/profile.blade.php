@extends('layouts.admin')
@section('admin')

@if(Session::has('success_user_insert'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "Profile Update Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_user_insert'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Profile Update failed! Please try again.",
                            icon: "warning",
                            timer: 7000
                        });

                    </script>
                    @endif

<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
            
                            <h3 class="kt-subheader__title">
                                            Edit User                               
                </h3>
                       

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                <span class="kt-subheader__desc text-capitalize" id="kt_subheader_total">
                                            {{$view->name}}                                    </span>
                
                            </div>

                    </div>        
        
        <div class="kt-subheader__toolbar">
            <div class="btn-group">
                <form  id="kt_user_form">
                    @csrf
                <button type="submit" formaction="{{route('profile-update', [$view->user_id, $view->user->email, $view->slug, $view->user->user_name, $view->user->role_id])}}" formmethod="POST" class="btn btn-brand btn-bold">Save Changes</button>
            </div>                                    
        </div>
    </div>
</div>
<!-- end:: Content Head -->					
					<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid" style="padding: 0px">
       <!--Begin::App-->
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
    <!--Begin:: App Content-->
    <div class="kt-grid__item kt-grid__item--fluid kt-app__content" style="margin-left: 0;">
        <div class="kt-portlet kt-portlet--tabs">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-toolbar">
                    <ul class="nav nav-tabs nav-tabs-space-xl nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-brand" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#kt_users_edit_tab_1" role="tab">
                                <i class="flaticon2-calendar-3"></i> Profile
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_users_edit_tab_2" role="tab">
                                <i class="flaticon2-protected"></i> Account
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#kt_users_edit_tab_3" role="tab">
                                <i class="flaticon2-lock"></i> Change Password
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="kt-portlet__body">
                
                    <!--begin: Tab Content-->
                    <div class="tab-content kt-margin-t-20 kt-margin-b-20">
                        <!--begin: Tab-->
                        <div class="tab-pane active" id="kt_users_edit_tab_1" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Customer Info:</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_user_avatar">
                                                        <div class="kt-avatar__holder" style="background-size:cover;background-position:center center;background-image: url('{{asset('uploads/users/'.$view->photo)}}');"></div>
                                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                            <i class="fa fa-times"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
        
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">First Name</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="name" value="{{$view->name}}">
                                                    @if ($errors->has('name'))
                                                        <span class="feedback mb-0 text-danger" role="alert">
                                                            <strong>{{ $errors->first('name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Contact Phone</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                        <input type="text" class="form-control" name="phone" value="+880{{$view->mobile}}" placeholder="Phone" aria-describedby="basic-addon1">
                                                        @if ($errors->has('phone'))
                                                            <span class="feedback mb-0 text-danger" role="alert">
                                                                <strong>{{ $errors->first('phone') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <span class="form-text text-muted">We'll never share your email with anyone else.</span>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Present Address:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="add1" value="{{$view->address1}}">
                                                    @if ($errors->has('add1'))
                                                        <span class="feedback mb-0 text-danger" role="alert">
                                                            <strong>{{ $errors->first('add1') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Permanent Address:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="add2" value="{{$view->address2}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">City:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="city" value="{{$view->city}}">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Zip Code:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="number" name="zip" value="{{$view->zip}}">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Tab-->
                        
                        <!--begin: Tab-->
                        <div class="tab-pane" id="kt_users_edit_tab_2" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Account:</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Username</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input class="form-control" type="text" name="user_name" value="{{$view->user->user_name}}">
                                                    @if ($errors->has('user_name'))
                                                        <span class="feedback mb-0 text-danger" role="alert">
                                                            <strong>{{ $errors->first('user_name') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Email Address</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                        <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                        <input type="text" class="form-control" name="email" value="{{$view->user->email}}" placeholder="Email" aria-describedby="basic-addon1">
                                                        @if ($errors->has('email'))
                                                            <span class="feedback mb-0 text-danger" role="alert">
                                                                <strong>{{ $errors->first('email') }}</strong>
                                                            </span>
                                                        @endif
                                                    </div>
                                                    <span class="form-text text-muted">Email will not be publicly displayed. <a href="#" class="kt-link">Learn more</a>.</span>
                                                </div>
                                            </div>
                                            @if (Auth::user()->role_id <= 2)
                                                
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">User Role:</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <div class="input-group">
                                                            <select name="role" class="form-control">
                                                                <option value="{{--role_id--}}">{{--role_name--}}</option>
                                                                <option value="1">1</option>
                                                            </select>
                                                    </div>
                                                    <span class="form-text text-muted">Email will not be publicly displayed. <a href="#" class="kt-link">Learn more</a>.</span>
                                                </div>
                                            </div>
                                            
                                            @endif
                                        </div>
                                    </div>
        
                                    <div class="kt-separator kt-separator--border-dashed kt-separator--portlet-fit kt-separator--space-lg"></div>
                                    @if (Auth::user()->role_id <= 2)

                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="form-group row kt-margin-t-10 kt-margin-b-10">
                                                <label class="col-xl-3 col-lg-3 col-form-label"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <button type="button" class="btn btn-label-danger btn-bold btn-sm kt-margin-t-5 kt-margin-b-5">Deactivate your account ?</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!--end: Tab-->
        
                        <!--begin: Tab-->
                        <div class="tab-pane" id="kt_users_edit_tab_3" role="tabpanel">
                            <div class="kt-form kt-form--label-right">
                                <div class="kt-form__body">
                                    <div class="kt-section kt-section--first">
                                        <div class="kt-section__body">
                                            <div class="row">
                                                <label class="col-xl-3"></label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <h3 class="kt-section__title kt-section__title-sm">Change Or Recover Your Password:</h3>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Current Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" name="old_pass" placeholder="Current password">
                                                    <a href="#" class="kt-link kt-font-sm kt-font-bold kt-margin-t-5">Forgot password ?</a>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">New Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" name="new-pass" placeholder="New password">
                                                    @if ($errors->has('new-pass'))
                                                        <span class="feedback mb-0 text-danger" role="alert">
                                                            <strong>{{ $errors->first('new-pass') }}</strong>
                                                        </span>
                                                    @endif
                                                </div>
                                            </div>
                                            <div class="form-group form-group-last row">
                                                <label class="col-xl-3 col-lg-3 col-form-label">Verify Password</label>
                                                <div class="col-lg-9 col-xl-6">
                                                    <input type="password" class="form-control" id="password-confirm" name="password_confirmation" placeholder="Verify password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
        
                                <div class="kt-separator kt-separator--space-lg kt-separator--fit kt-separator--border-solid"></div>
        
                                <div class="kt-form__actions">
                                    <div class="row">
                                        <div class="col-xl-3"></div>
                                        <div class="col-lg-9 col-xl-6">
                                            <button type="submit" formaction="{{route('profile-update', [$view->user->password,$view->user_id, $view->user->email, $view->slug, $view->user->user_name, $view->user->role_id])}}" formmethod="POST" class="btn btn-label-brand btn-bold">Save changes</button>
                                            <a href="#" class="btn btn-clean btn-bold">Cancel</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!--end: Tab-->
                        
                        
                    </div>
                    <!--end: Tab Content-->
                </form>
            </div>
        </div>
    </div>
    <!--End:: App Content-->
</div>

</div>
<!-- end:: Content -->

@endsection