@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Testimonial Details <i class="feather icon-message-circle"></i></h4>
                <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="list-inline mb-0">
                        <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                        <li><a data-action="expand"><i class="feather icon-maximize"></i></a></li>
                        <li><a data-action="reload"><i class="feather icon-rotate-cw"></i></a></li>
                        <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="table-responsive">
                                <div class="row" style="width: 100%;">
                                    <div class="col-12 pr-0">
                                		<p>
                                            <h5>Testimonial Profile Image: </h5>
                                            @if(isset($Testimonial->image) && $Testimonial->image !== '')
                                                <img id="preview" src="{{ asset(uploadsDir('testimonials') . $Testimonial->image) }}" alt="Background Picture Preview" class="img-fluid d-inline-flex rounded-lg">
                                            @else
                                                <img id="preview" src="{{ asset('assets/images/placeholder-image.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                            @endif
                                        </p>
                                	</div>
                                	<div class="col-6">
                                		<p><h5>Name: </h5>{!! $Testimonial->name !!}</p>
                                	</div>
                                	<div class="col-6">
                                		<p><h5>Designation: </h5>{!! $Testimonial->designation !!}</p>
                                	</div>
                                    <div class="col-6">
                                        <p><h5>Description: </h5>{!! $Testimonial->description ?? '' !!}</p>
                                    </div>
                                    <div class="col-6">
                                		<p><h5>Is Active: </h5>{{ $Testimonial->is_active == 1 ? 'Yes' : 'No' }}</p>
                                	</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection