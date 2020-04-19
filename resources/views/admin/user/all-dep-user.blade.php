@extends('layouts.admin')
@section('admin')

											<!-- begin:: Content Head -->
<div class="kt-subheader   kt-grid__item" id="kt_subheader">
    <div class="kt-container  kt-container--fluid ">
        <div class="kt-subheader__main">
                            <button class="kt-subheader__mobile-toggle" id="kt_subheader_mobile_toggle"><span></span></button>
            
                            <h3 class="kt-subheader__title">
                                {{Request::is('admin/all/super-admin')? 'All Super Admin' : ''}}                         
                                {{Request::is('admin/all/managing-director')? 'All Managing Director' : ''}}                         
                                {{Request::is('admin/all/seniour-executive')? 'All Senior Executive' : ''}}                         
                                {{Request::is('admin/all/employee')? 'All Super Employee' : ''}}                         
                                {{Request::is('admin/all/author')? 'All Super Author' : ''}}                         
                                {{Request::is('admin/all/editor')? 'All Super Editor' : ''}}                         
                </h3>
                       

            <span class="kt-subheader__separator kt-subheader__separator--v"></span>
            
            <div class="kt-subheader__toolbar" id="kt_subheader_search">
                <span class="kt-subheader__desc" id="kt_subheader_total">
                                            {{count($all)}}                                    </span>
                            </div>    
        
        <div class="kt-subheader__toolbar">
                                        
                            
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
                                            <span style="width: 20px;">
                                                <label class="kt-checkbox kt-checkbox--single kt-checkbox--all kt-checkbox--solid">
                                                    <input type="checkbox">&nbsp;<span></span>
                                                </label>
                                            </span>
                                        </th>
                                        <th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 200px;">Name</span>
                                        </th>
                                        <th data-field="first_name" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 200px;">User Name</span>
                                        </th>
                                        <th data-field="email" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 182px;">Email</span>
                                        </th>
                                        <th data-field="Action" class="kt-datatable__cell kt-datatable__cell--sort">
                                            <span style="width: 80px;">Action</span>
                                        </th>
                                    </thead>
                                <tbody class="kt-datatable__body" style="">
                                    
                                    @foreach ($deps as $dep)
                                    <tr data-row="0" class="kt-datatable__row" style="left: 0px;">
                                        <td class="kt-datatable__cell">
                                            {{$dep->department}}
                                        </td>
                                    </tr>

                                    @foreach ($all as $data)
                                    
                                    @if ($dep->id == $data->dep_id)
                                        
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
                                						<img alt="user" src="{{asset('uploads/users/'.$data->photo)}}">
                                                    </div>
                                                    <div class="kt-user-card-v2__details">
                                                        <a class="kt-user-card-v2__name" href="#">
                                                            {{$data->name}}
                                                            </a>
                                                        <span class="kt-user-card-v2__desc">{{$data->user->roleName->role}}</span>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        <td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 182px;">{{$data->user->user_name}}</span>
                                        </td>
                                        <td data-field="email" class="kt-datatable__cell">
                                            <span style="width: 182px;">{{$data->user->email}}</span>
                                        </td>
                                        <td data-field="Actions" data-autohide-disabled="false" class="kt-datatable__cell text-center">
                                            <span style="overflow: visible; position: relative; width: 80px;">
                                                <div class="dropdown">
                                                    <a data-toggle="dropdown" class="btn btn-sm btn-clean btn-icon btn-icon-md">
                                                        <i class="flaticon-more-1"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="kt-nav">
                                                            <li class="kt-nav__item">
                                                                <a class="kt-nav__link" href="#">
                                                                    <i class="kt-nav__link-icon flaticon2-expand"></i>
                                                                    <span class="kt-nav__link-text">View</span>
                                                                </a>
                                                            </li>
                                                        <ul>
                                                    </div>
                                                </div>
                                            </span>
                                        </td>
                                        {{-- <td data-field="Actions" class="kt-datatable__cell">
                                            <span style="width: 182px;">
                                                <a href="/keen/preview/demo1/custom/users/add1.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-info-circle" style="padding: 0;" aria-hidden="true"></i></a>
                                                <a href="/keen/preview/demo1/custom/users/add.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-pencil-square" style="padding: 0;" aria-hidden="true"></i></a>
                                                <a href="/keen/preview/demo1/custom/users/add3.html" class="btn btn-brand btn-bold" style="padding: 2px 7px;"><i class="fa fa-eraser" style="padding: 0;" aria-hidden="true"></i></a>
                                            </span>
                                        </td> --}}
                                    </tr>
                                    
                                    @endif
                                    @endforeach
                                    @endforeach
                                </tbody>
                            </table>
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