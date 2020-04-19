@extends('layouts.admin')
@section('admin')

@if(Session::has('success_user_insert'))
                    <script>
                        swal({
                            title: "Success!",
                            text: "User registration Success !",
                            icon: "success",
                            timer: 5000
                        });

                    </script>
                    @endif

                    @if(Session::has('error_user_insert'))
                    <script>
                        swal({
                            title: "Opps!",
                            text: "Upload failed! Please try again.",
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
                                            New User                               
                </h3>
                       

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                                            Enter user details and submit                                    </span>
                
                            </div>

                    </div>        
        
        <div class="kt-subheader__toolbar">
            <a href="../../index-2.html#.html" class="btn btn-default btn-bold">Back</a>
		</div>
    </div>
</div>
<!-- end:: Content Head -->					
<!-- begin:: Content -->
	<div class="kt-container  kt-container--fluid  kt-grid__item kt-grid__item--fluid">
		<!--Begin::App-->
<div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
	<!--Begin:: App Aside-->
    <div class="kt-grid__item kt-app__toggle kt-app__aside kt-app__aside--sm kt-app__aside--fit" id="kt_users_aside">
        <div class="kt-portlet">
            <div class="kt-portlet__body">
                <div class="kt-widget kt-widget--general-1">
                    <div class="kt-media kt-media--brand kt-media--lg kt-media--circle">
                        @if (Auth::user()->role_id==1)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->superAdmin->photo)}}">
						@endif
                        @if (Auth::user()->role_id==2)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->director->photo)}}">
						@endif
                        @if (Auth::user()->role_id==3)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->executive->photo)}}">
						@endif
                        @if (Auth::user()->role_id==4)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->employee->photo)}}">
						@endif
                        @if (Auth::user()->role_id==5)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->author->photo)}}">
						@endif
                        @if (Auth::user()->role_id==6)
						<img alt="user" src="{{asset('masterdesign/public/uploads/users/'.Auth::user()->editor->photo)}}">
						@endif
                    </div>
                    <div class="kt-widget__wrapper">
                        <div class="kt-widget__label">
                            <a href="#" class="kt-widget__title">
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
                            </a>
                            <span class="kt-widget__desc">
                                {{Auth::user()->roleName->role}}
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
		<div class="kt-portlet">
	<div class="kt-portlet__body kt-portlet__body--fit">
		<div class="kt-wizard-v3" id="kt_wizard_v3" data-ktwizard-state="step-first">
			<!--begin:Nav -->
			<div class="kt-wizard-v3__nav">
				<div class="kt-wizard-v3__nav-line"></div>

				<!--doc: Remove "kt-wizard-v1__nav-items--clickable" class and also set 'clickableSteps: false' in the JS init to disable manually clicking step titles -->
				<div class="kt-wizard-v3__nav-items kt-wizard-v3__nav-items--clickable">
					<!--doc: Replace A tag with SPAN tag to disable the step link click -->
					<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step" data-ktwizard-state="current">
						<span>1</span>
						<i class="fa fa-check"></i>
						<div class="kt-wizard-v3__nav-label">Create Account</div>
					</div>
					<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
						<span>2</span>
						<i class="fa fa-check"></i>
						<div class="kt-wizard-v3__nav-label">Setup Profile</div>
					</div>
					<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
						<span>3</span>
						<i class="fa fa-check"></i>
						<div class="kt-wizard-v3__nav-label">Business Details</div>
					</div>
					<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
						<span>4</span>
						<i class="fa fa-check"></i>
						<div class="kt-wizard-v3__nav-label">Billing Details</div>
					</div>
					<div class="kt-wizard-v3__nav-item" data-ktwizard-type="step">
						<span>5</span>
						<i class="fa fa-check"></i>
						<div class="kt-wizard-v3__nav-label">Finalize</div>
					</div>
				</div>
			</div>
			<!--end:Nav -->

			<!--begin:Form-->
			<form class="kt-form" id="kt_form" enctype="multipart/form-data">
				@csrf
				<!--begin:Step 1-->
				<div class="kt-wizard-v3__content" data-ktwizard-type="step-content" data-ktwizard-state="current">
					<div class="kt-heading kt-heading--md">Create New Account</div>
					<div class="kt-separator kt-separator--height-xs"></div>

					<div class="kt-form__section kt-form__section--first">
						<div class="form-group">
							<span style="color: red; font-size: 16px;">&lowast;</span>
							<label>Username:</label>
							<input type="text" class="form-control" name="user_name" placeholder="Enter username" value="{{old('user_name')}}" required autocomplete="user_name">
							@if ($errors->has('user_name'))
                                <span class="feedback mb-0 text-danger" role="alert">
                                    <strong>{{ $errors->first('user_name') }}</strong>
                                </span>
                            @endif
							<span class="form-text text-muted">Please enter your username</span>
						</div>
						<div class="form-group">
							<span style="color: red; font-size: 16px;">&lowast;</span>
							<label>Email address:</label>
							<input type="email" class="form-control" name="email" placeholder="Enter email" value="{{old('email')}}" required autocomplete="email">
							@if ($errors->has('email'))
                                <span class="feedback mb-0 text-danger" role="alert">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
							<span class="form-text text-muted">We'll never share your email with anyone else</span>
						</div>
						<div class="form-group">
							<span style="color: red; font-size: 16px;">&lowast;</span>
							<label>Password:</label>
							<input type="password" class="form-control password" name="password" placeholder="Enter password" required autocomplete="password">
							@if ($errors->has('password'))
                                <span class="feedback mb-0 text-danger" role="alert">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
							<span class="form-text text-muted">Enter your password. Min 8 characters long.</span>
						</div>
						<div class="form-group">
							<label>Confirm Password:</label>
							<input type="password" id="password-confirm" class="form-control" name="password_confirmation" placeholder="Enter password" required autocomplete="confirm_password">
							<span class="form-text text-muted">Confirm your password.</span>
						</div>
					</div>
				</div>
				<!--end:Step 1-->

				<!--begin:Step 2-->
				<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
                    <div class="kt-form__section kt-form__section--first">
						<div class="kt-heading kt-heading--md">Setup Your Profile</div>

                        <div class="row">
                            <div class="col-xl-6">
                                <div class="form-group">

                                    <div class="kt-avatar kt-avatar--outline" id="kt_user_avatar">
										<span style="color: red; font-size: 16px;">&lowast;</span>
                                        <div class="kt-avatar__holder" style="background-image: url('{{asset('masterdesign/public/contents/admin')}}/assets/media/users/300_13.jpg');"></div>
                                        <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                            <i class="fa fa-pen"></i>
                                            <input type="file" name="profile_avatar" required >
                                        </label>
                                        <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                            <i class="fa fa-times"></i>
                                        </span>
                                    </div>
									@if ($errors->has('profile_avatar'))
                                	<span class="feedback mb-0 text-danger" style="display: block;" role="alert">
                                    	<strong>{{ $errors->first('profile_avatar') }}</strong>
                                	</span>
                            		@endif
                                    <span class="form-text text-muted">Appected file formats: .png, .jpg, .jpeg</span>
                                </div>
                            </div>
                        </div>

						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<span style="color: red; font-size: 16px;">&lowast;</span>
									<label>Name:</label>
									<input type="text" class="form-control" name="name" placeholder="Enter your name" value="{{old('name')}}" required autocomplete="name">
									@if ($errors->has('name'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('name') }}</strong>
                                	</span>
                            		@endif
									<span class="form-text text-muted">Please enter your full name</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-12">
								<div class="form-group">
									<label>Contact Number:</label>
									<input type="text" class="form-control" name="phone" placeholder="Enter your phone number" value="{{old('phone')}}" autocomplete="phone">
									
									<span class="form-text text-muted">Enter your contact number</span>
								</div>
							</div>
						</div>

						<div class="kt-heading kt-heading--md">Mailing Address</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<span style="color: red; font-size: 16px;">&lowast;</span>
									<label>Present Address:</label>
									<input type="tet" class="form-control" name="address1" placeholder="Enter Present address" value="{{old('address1')}}" required autocomplete="address1">
									@if ($errors->has('address1'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('address1') }}</strong>
                                	</span>
									@endif
									<span class="form-text text-muted">Enter your present address</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-12">
								<div class="form-group">
									<label>Permanent Address:</label>
									<input type="text" class="form-control" name="address2" placeholder="Enter Permanent address" value="{{old('address2')}}" autocomplete="address2">
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>City:</label>
									<input type="text" class="form-control" name="city" placeholder="" value="{{old('city')}}" autocomplete="city">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Zip Code:</label>
									<input type="number" class="form-control" name="zip" placeholder="" value="{{old('zip')}}" autocomplete="zip">
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end:Step 2-->

				<!--begin:Step 3-->
				<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
					<div class="kt-heading kt-heading--md">Your Company Details(optional)</div>
					<div class="kt-separator kt-separator--height-xs"></div>
					<div class="kt-form__section kt-form__section--first">
						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label>Company Name:</label>
									<input type="text" class="form-control" name="company_name" placeholder="Enter company name" value="{{old('company_name')}}">
									<span class="form-text text-muted">Please enter your company name</span>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label>Company Registered ID:</label>
									<input type="text" class="form-control" name="company_id" placeholder="Enter your company registered ID" value="{{old('company_id')}}">
									<span class="form-text text-muted">Please enter your company registered ID</span>
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label>Company Email:</label>
									<input type="text" class="form-control" name="company_email" placeholder="Enter company email" value="{{old('company_email')}}">
									<span class="form-text text-muted">Please enter your company email</span>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label>Company Contact:</label>
									<input type="tel" class="form-control" name="company_tel" placeholder="Enter comapny contact" value="{{old('company_tel')}}">
									<span class="form-text text-muted">Please enter your comapny contact</span>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Communication:</label>
							<div class="kt-checkbox-list">
								<label class="kt-checkbox">
		                           	<input type="checkbox" name="account_communication[]" value="email" checked> Email
		                            <span></span>
		                        </label>
		                        <label class="kt-checkbox">
		                           	<input type="checkbox" name="account_communication[]" value="sms"> SMS
		                            <span></span>
		                        </label>
		                        <label class="kt-checkbox">
		                           	<input type="checkbox" name="account_communication[]" value="phone"> Phone
		                            <span></span>
		                        </label>
		                    </div>
		                </div>
					</div>
				</div>
				<!--end:Step 3-->

				<!--begin:Step 4-->
				<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
					<div class="kt-form__section kt-form__section--first">
						<div class="kt-heading kt-heading--md">Setup Billing Account(optional)</div>

						<div class="row">
							<div class="col-xl-6">
								<div class="form-group">
									<label>Cardholder Name:</label>
									<input type="text" class="form-control" name="billing_card_name" placeholder="" value="{{old('billing_card_name')}}">
									<span class="form-text text-muted">Please enter the cardholder name</span>
								</div>
							</div>
							<div class="col-xl-6">
								<div class="form-group">
									<label>Card number:</label>
									<input type="number" class="form-control" name="billing_card_number" placeholder="" value="{{old('billing_card_number')}}">
									<span class="form-text text-muted">Enter the card number</span>
								</div>
							</div>
						</div>

						<div class="row">
							<div class="col-xl-4">
								<div class="form-group">
									<label>Exp Month:</label>
									<select class="form-control" name="billing_card_exp_month">
										<option value="" selected>Select</option>
										<option value="01">01</option>
										<option value="02">02</option>
										<option value="03">03</option>
										<option value="04">04</option>
										<option value="05">05</option>
										<option value="06">06</option>
										<option value="07">07</option>
										<option value="08">08</option>
										<option value="09">09</option>
										<option value="10">10</option>
										<option value="11">11</option>
										<option value="12">12</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="form-group">
									<label>Exp Year:</label>
									<select class="form-control" name="billing_card_exp_year">
										<option value="" selected>Select</option>
										<option value="2018">2018</option>
										<option value="2019">2019</option>
										<option value="2020">2020</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
									</select>
								</div>
							</div>
							<div class="col-xl-4">
								<div class="form-group">
									<label>CVV:</label>
									<input type="password" class="form-control" name="billing_card_cvv" placeholder="" >
								</div>
							</div>
						</div>

						<div class="kt-heading kt-heading--md">Billing Address</div>
						<div class="row">
							<div class="col-lg-6">
								<div class="form-group">
									<label>Address Line 1:</label>
									<input type="text" class="form-control" name="billing_address1" placeholder="" value="{{old('billing_address1')}}">
								</div>
								<div class="form-group">
									<label>City:</label>
									<input type="text" class="form-control" name="billing_city" placeholder="" value="{{old('billing_city')}}" >
								</div>
								<div class="form-group">
									<label>State:</label>
									<input type="text" class="form-control" name="billing_state" placeholder="" value="{{old('billing_state')}}">
								</div>
							</div>
							<div class="col-lg-6">
								<div class="form-group">
									<label>Address Line 2:</label>
									<input type="text" class="form-control" name="billing_address2" placeholder="" value="{{old('billing_address2')}}">
								</div>
								<div class="form-group">
									<label>Zip Code:</label>
									<input type="number" class="form-control" name="billing_zip" placeholder="" value="{{old('billing_zip')}}">
								</div>
								<div class="form-group">
									<label>Country:</label>
									<select name="billing_country" class="form-control">
										<option value="" selected>Select</option>
										<option value="AF">Afghanistan</option>
										<option value="AX">Åland Islands</option>
										<option value="AL">Albania</option>
										<option value="DZ">Algeria</option>
										<option value="AS">American Samoa</option>
										<option value="AD">Andorra</option>
										<option value="AO">Angola</option>
										<option value="AI">Anguilla</option>
										<option value="AQ">Antarctica</option>
										<option value="AG">Antigua and Barbuda</option>
										<option value="AR">Argentina</option>
										<option value="AM">Armenia</option>
										<option value="AW">Aruba</option>
										<option value="AU">Australia</option>
										<option value="AT">Austria</option>
										<option value="AZ">Azerbaijan</option>
										<option value="BS">Bahamas</option>
										<option value="BH">Bahrain</option>
										<option value="BD">Bangladesh</option>
										<option value="BB">Barbados</option>
										<option value="BY">Belarus</option>
										<option value="BE">Belgium</option>
										<option value="BZ">Belize</option>
										<option value="BJ">Benin</option>
										<option value="BM">Bermuda</option>
										<option value="BT">Bhutan</option>
										<option value="BO">Bolivia, Plurinational State of</option>
										<option value="BQ">Bonaire, Sint Eustatius and Saba</option>
										<option value="BA">Bosnia and Herzegovina</option>
										<option value="BW">Botswana</option>
										<option value="BV">Bouvet Island</option>
										<option value="BR">Brazil</option>
										<option value="IO">British Indian Ocean Territory</option>
										<option value="BN">Brunei Darussalam</option>
										<option value="BG">Bulgaria</option>
										<option value="BF">Burkina Faso</option>
										<option value="BI">Burundi</option>
										<option value="KH">Cambodia</option>
										<option value="CM">Cameroon</option>
										<option value="CA">Canada</option>
										<option value="CV">Cape Verde</option>
										<option value="KY">Cayman Islands</option>
										<option value="CF">Central African Republic</option>
										<option value="TD">Chad</option>
										<option value="CL">Chile</option>
										<option value="CN">China</option>
										<option value="CX">Christmas Island</option>
										<option value="CC">Cocos (Keeling) Islands</option>
										<option value="CO">Colombia</option>
										<option value="KM">Comoros</option>
										<option value="CG">Congo</option>
										<option value="CD">Congo, the Democratic Republic of the</option>
										<option value="CK">Cook Islands</option>
										<option value="CR">Costa Rica</option>
										<option value="CI">Côte d'Ivoire</option>
										<option value="HR">Croatia</option>
										<option value="CU">Cuba</option>
										<option value="CW">Curaçao</option>
										<option value="CY">Cyprus</option>
										<option value="CZ">Czech Republic</option>
										<option value="DK">Denmark</option>
										<option value="DJ">Djibouti</option>
										<option value="DM">Dominica</option>
										<option value="DO">Dominican Republic</option>
										<option value="EC">Ecuador</option>
										<option value="EG">Egypt</option>
										<option value="SV">El Salvador</option>
										<option value="GQ">Equatorial Guinea</option>
										<option value="ER">Eritrea</option>
										<option value="EE">Estonia</option>
										<option value="ET">Ethiopia</option>
										<option value="FK">Falkland Islands (Malvinas)</option>
										<option value="FO">Faroe Islands</option>
										<option value="FJ">Fiji</option>
										<option value="FI">Finland</option>
										<option value="FR">France</option>
										<option value="GF">French Guiana</option>
										<option value="PF">French Polynesia</option>
										<option value="TF">French Southern Territories</option>
										<option value="GA">Gabon</option>
										<option value="GM">Gambia</option>
										<option value="GE">Georgia</option>
										<option value="DE">Germany</option>
										<option value="GH">Ghana</option>
										<option value="GI">Gibraltar</option>
										<option value="GR">Greece</option>
										<option value="GL">Greenland</option>
										<option value="GD">Grenada</option>
										<option value="GP">Guadeloupe</option>
										<option value="GU">Guam</option>
										<option value="GT">Guatemala</option>
										<option value="GG">Guernsey</option>
										<option value="GN">Guinea</option>
										<option value="GW">Guinea-Bissau</option>
										<option value="GY">Guyana</option>
										<option value="HT">Haiti</option>
										<option value="HM">Heard Island and McDonald Islands</option>
										<option value="VA">Holy See (Vatican City State)</option>
										<option value="HN">Honduras</option>
										<option value="HK">Hong Kong</option>
										<option value="HU">Hungary</option>
										<option value="IS">Iceland</option>
										<option value="IN">India</option>
										<option value="ID">Indonesia</option>
										<option value="IR">Iran, Islamic Republic of</option>
										<option value="IQ">Iraq</option>
										<option value="IE">Ireland</option>
										<option value="IM">Isle of Man</option>
										<option value="IL">Israel</option>
										<option value="IT">Italy</option>
										<option value="JM">Jamaica</option>
										<option value="JP">Japan</option>
										<option value="JE">Jersey</option>
										<option value="JO">Jordan</option>
										<option value="KZ">Kazakhstan</option>
										<option value="KE">Kenya</option>
										<option value="KI">Kiribati</option>
										<option value="KP">Korea, Democratic People's Republic of</option>
										<option value="KR">Korea, Republic of</option>
										<option value="KW">Kuwait</option>
										<option value="KG">Kyrgyzstan</option>
										<option value="LA">Lao People's Democratic Republic</option>
										<option value="LV">Latvia</option>
										<option value="LB">Lebanon</option>
										<option value="LS">Lesotho</option>
										<option value="LR">Liberia</option>
										<option value="LY">Libya</option>
										<option value="LI">Liechtenstein</option>
										<option value="LT">Lithuania</option>
										<option value="LU">Luxembourg</option>
										<option value="MO">Macao</option>
										<option value="MK">Macedonia, the former Yugoslav Republic of</option>
										<option value="MG">Madagascar</option>
										<option value="MW">Malawi</option>
										<option value="MY">Malaysia</option>
										<option value="MV">Maldives</option>
										<option value="ML">Mali</option>
										<option value="MT">Malta</option>
										<option value="MH">Marshall Islands</option>
										<option value="MQ">Martinique</option>
										<option value="MR">Mauritania</option>
										<option value="MU">Mauritius</option>
										<option value="YT">Mayotte</option>
										<option value="MX">Mexico</option>
										<option value="FM">Micronesia, Federated States of</option>
										<option value="MD">Moldova, Republic of</option>
										<option value="MC">Monaco</option>
										<option value="MN">Mongolia</option>
										<option value="ME">Montenegro</option>
										<option value="MS">Montserrat</option>
										<option value="MA">Morocco</option>
										<option value="MZ">Mozambique</option>
										<option value="MM">Myanmar</option>
										<option value="NA">Namibia</option>
										<option value="NR">Nauru</option>
										<option value="NP">Nepal</option>
										<option value="NL">Netherlands</option>
										<option value="NC">New Caledonia</option>
										<option value="NZ">New Zealand</option>
										<option value="NI">Nicaragua</option>
										<option value="NE">Niger</option>
										<option value="NG">Nigeria</option>
										<option value="NU">Niue</option>
										<option value="NF">Norfolk Island</option>
										<option value="MP">Northern Mariana Islands</option>
										<option value="NO">Norway</option>
										<option value="OM">Oman</option>
										<option value="PK">Pakistan</option>
										<option value="PW">Palau</option>
										<option value="PS">Palestinian Territory, Occupied</option>
										<option value="PA">Panama</option>
										<option value="PG">Papua New Guinea</option>
										<option value="PY">Paraguay</option>
										<option value="PE">Peru</option>
										<option value="PH">Philippines</option>
										<option value="PN">Pitcairn</option>
										<option value="PL">Poland</option>
										<option value="PT">Portugal</option>
										<option value="PR">Puerto Rico</option>
										<option value="QA">Qatar</option>
										<option value="RE">Réunion</option>
										<option value="RO">Romania</option>
										<option value="RU">Russian Federation</option>
										<option value="RW">Rwanda</option>
										<option value="BL">Saint Barthélemy</option>
										<option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
										<option value="KN">Saint Kitts and Nevis</option>
										<option value="LC">Saint Lucia</option>
										<option value="MF">Saint Martin (French part)</option>
										<option value="PM">Saint Pierre and Miquelon</option>
										<option value="VC">Saint Vincent and the Grenadines</option>
										<option value="WS">Samoa</option>
										<option value="SM">San Marino</option>
										<option value="ST">Sao Tome and Principe</option>
										<option value="SA">Saudi Arabia</option>
										<option value="SN">Senegal</option>
										<option value="RS">Serbia</option>
										<option value="SC">Seychelles</option>
										<option value="SL">Sierra Leone</option>
										<option value="SG">Singapore</option>
										<option value="SX">Sint Maarten (Dutch part)</option>
										<option value="SK">Slovakia</option>
										<option value="SI">Slovenia</option>
										<option value="SB">Solomon Islands</option>
										<option value="SO">Somalia</option>
										<option value="ZA">South Africa</option>
										<option value="GS">South Georgia and the South Sandwich Islands</option>
										<option value="SS">South Sudan</option>
										<option value="ES">Spain</option>
										<option value="LK">Sri Lanka</option>
										<option value="SD">Sudan</option>
										<option value="SR">Suriname</option>
										<option value="SJ">Svalbard and Jan Mayen</option>
										<option value="SZ">Swaziland</option>
										<option value="SE">Sweden</option>
										<option value="CH">Switzerland</option>
										<option value="SY">Syrian Arab Republic</option>
										<option value="TW">Taiwan, Province of China</option>
										<option value="TJ">Tajikistan</option>
										<option value="TZ">Tanzania, United Republic of</option>
										<option value="TH">Thailand</option>
										<option value="TL">Timor-Leste</option>
										<option value="TG">Togo</option>
										<option value="TK">Tokelau</option>
										<option value="TO">Tonga</option>
										<option value="TT">Trinidad and Tobago</option>
										<option value="TN">Tunisia</option>
										<option value="TR">Turkey</option>
										<option value="TM">Turkmenistan</option>
										<option value="TC">Turks and Caicos Islands</option>
										<option value="TV">Tuvalu</option>
										<option value="UG">Uganda</option>
										<option value="UA">Ukraine</option>
										<option value="AE">United Arab Emirates</option>
										<option value="GB">United Kingdom</option>
										<option value="US">United States</option>
										<option value="UM">United States Minor Outlying Islands</option>
										<option value="UY">Uruguay</option>
										<option value="UZ">Uzbekistan</option>
										<option value="VU">Vanuatu</option>
										<option value="VE">Venezuela, Bolivarian Republic of</option>
										<option value="VN">Viet Nam</option>
										<option value="VG">Virgin Islands, British</option>
										<option value="VI">Virgin Islands, U.S.</option>
										<option value="WF">Wallis and Futuna</option>
										<option value="EH">Western Sahara</option>
										<option value="YE">Yemen</option>
										<option value="ZM">Zambia</option>
										<option value="ZW">Zimbabwe</option>
									</select>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!--end:Step 4-->

				<!--begin:Step 5-->
				<div class="kt-wizard-v3__content" data-ktwizard-type="step-content">
					<div class="kt-form__section kt-form__section--first">

						<div class="kt-heading kt-heading--md">Finalize your account</div>

						<div class="form-group">
							<span style="color: red; font-size: 16px;">&lowast;</span>
							<label>User Role: </label>
							<select name="role" class="form-control" id="role" required>
								<option>Select Role</option>
								@foreach ($role as $roles)									
								<option  value="{{$roles->role_id}}">{{$roles->role}}</option>
								@endforeach
							</select>
							
							<span class="form-text text-muted">Enter your role.</span>
						</div>
						<div class="md" style="display: none">
							<div class="form-group">
								<span style="color: red; font-size: 16px;">&lowast;</span>
								<label>Department: </label>
								<select name="department" class="form-control" id="department" required>
									<option>Select Department</option>
									@foreach ($dep as $deps)									
									<option  value="{{$deps->id}}">{{$deps->department}}</option>
									@endforeach
								</select>
								@if ($errors->has('department'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('department') }}</strong>
                                	</span>
									@endif
								<span class="form-text text-muted">Enter your department.</span>
							</div>
						</div>
						<div class="se" style="display: none">
							<div class="form-group">
								<span style="color: red; font-size: 16px;">&lowast;</span>
								<label>Managing Director: </label>
								<select name="director" class="form-control" id="director" required>
									<option>Select Managing Director</option>
									@foreach ($md as $mds)									
									<option  value="{{$mds->id}}">{{$mds->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('director'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('director') }}</strong>
                                	</span>
									@endif
								<span class="form-text text-muted">Enter your Managing Director.</span>
							</div>
						</div>
						<div class="e" style="display: none">
							<div class="form-group">
								<span style="color: red; font-size: 16px;">&lowast;</span>
								<label>Senior Executive: </label>
								<select name="executive" class="form-control" id="executive" required>
									<option>Select Senior Executive</option>
									@foreach ($se as $ses)									
									<option  value="{{$ses->id}}">{{$ses->name}}</option>
									@endforeach
								</select>
								@if ($errors->has('executive'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('executive') }}</strong>
                                	</span>
									@endif
								<span class="form-text text-muted">Enter your Senior Executive.</span>
							</div>
							<div class="form-group">
								<span style="color: red; font-size: 16px;">&lowast;</span>
								<label>Employment Type: </label>
								<select name="employee" class="form-control" id="employee" required>
									<option>Select Employment Type</option>
									@foreach ($em as $ems)									
									<option  value="{{$ems->id}}">{{$ems->employment}}</option>
									@endforeach
								</select>
								@if ($errors->has('employee'))
                                	<span class="feedback mb-0 text-danger" role="alert">
                                    	<strong>{{ $errors->first('employee') }}</strong>
                                	</span>
									@endif
								<span class="form-text text-muted">Enter your type.</span>
							</div>
						</div>
					</div>
				</div>
				<!--end:Step 5-->

				<!--begin:Form Actions -->
				<div class="kt-form__actions">
					<button class="btn btn-outline-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-prev">
						Previous
					</button>
					<button formaction="{{route('user-add')}}" formmethod="POST" class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-submit">
						Submit
					</button>
					<button class="btn btn-brand btn-md btn-tall btn-wide btn-bold btn-upper" data-ktwizard-type="action-next">
						Next Step
					</button>
				</div>
				<!--end:Form Actions -->
			</form>
			<!--end:Form-->
		</div>
	</div>
</div>
</div>
<!--End:: App Content-->
</div>
	</div>
	
	
	<!-- end:: Content -->

@endsection