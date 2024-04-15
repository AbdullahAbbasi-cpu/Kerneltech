@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Banner Details <i class="feather icon-film"></i></h4>
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
                                    <div class="col-6 pr-0">
                                		<p>
                                            <h5>Section Title: </h5>
                                            {!! $WorkingProcess->heading !!}
                                        </p>
                                	</div>
                                    <div class="col-6 pr-0">
                                		<p>
                                            <h5>Section Description: </h5>
                                            {!! $WorkingProcess->description !!}
                                        </p>
                                	</div>
                                    <div class="col-12 pr-0">
                                		<p>
                                            <h5>Is Active: </h5>
                                            {{ $WorkingProcess->is_active == 1 ? 'Yes' : 'No' }}
                                        </p>
                                	</div>
                                    {{-- <div class="col-12 pr-0">
                                		<p>
                                            <h5>Banner Background Image: </h5>
                                            @if(isset($WorkingProcess->image) && $WorkingProcess->image !== '')
                                                <img id="preview" src="{{ asset(uploadsDir('working-process') . $WorkingProcess->image) }}" alt="Background Picture Preview" class="img-fluid d-inline-flex rounded-lg">
                                            @else
                                                <img id="preview" src="{{ asset('assets/images/placeholder-image.png') }}" alt="Background Picture Preview" class="d-inline-flex rounded-lg" height="80" width="80">
                                            @endif
                                        </p>
                                	</div> --}}
                                    <div class="col-12">
                                        @for ($i = 1; $i <= $WorkingProcess->no_of_steps ; $i++)
                                            <h4 class="mt-3">Step {{ $i }} Data: </h4>
                                            @php
                                                $imageName = 'image_' . $i;
                                                $title = 'title_' . $i;
                                                $description = 'description_' . $i;
                                            @endphp

                                            <!-- For Image -->
                                            @if(isset($WorkingProcess->$imageName) && $WorkingProcess->$imageName !== '')
                                                <p class="mb-0 mt-2"><b>Image</b></p>
                                                <img id="preview_{{ $i }}" src="{{ asset(uploadsDir('working-process') . '/' . $WorkingProcess->$imageName) }}" alt="Background Picture Preview" class="img-fluid d-inline-flex rounded-lg">
                                            @else
                                                <img id="preview_{{ $i }}" src="{{ asset('assets/images/placeholder-image.png') }}" alt="Background Picture Preview" class="mt-1 d-inline-flex rounded-lg" height="80" width="80">
                                            @endif

                                            <!-- For Title -->
                                            @if(isset($WorkingProcess->$title))
                                                <p class="mb-0 mt-2"><b>Title</b></p>
                                                <p>{{ $WorkingProcess->$title }}</p>
                                            @else
                                                <p>No Title Found</p>
                                            @endif

                                            <!-- For Description -->
                                            @if(isset($WorkingProcess->$description))
                                                <p class="mb-0 mt-2"><b>Description</b></p>
                                                <p>{{ $WorkingProcess->$description }}</p>
                                            @else
                                                <p>No Description Found</p>
                                            @endif
                                        @endfor
                                    </div>



                                	{{-- <div class="col-6">
                                		<p><h5>Title: </h5>{!! $WorkingProcess->title !!}</p>
                                	</div>
                                	<div class="col-6">
                                		<p><h5>Page To Show Slider On: </h5>{!! $WorkingProcess->page_to_show_slider_on !!}</p>
                                	</div>
                                    <div class="col-6">
                                        <p><h5>Description: </h5>{!! $WorkingProcess->description ?? '' !!}</p>
                                    </div>
                                    <div class="col-6">
                                		<p><h5>Is Active: </h5>{{ $WorkingProcess->is_active == 1 ? 'Yes' : 'No' }}</p>
                                	</div> --}}
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