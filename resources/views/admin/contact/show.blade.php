@extends('admin.layouts.app')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Contact Details <i class="feather icon-film"></i></h4>
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
                                	<div class="col-6">
                                		<p><h5>Contact Name: </h5>{!! $Contact->name !!}</p>
                                	</div>

                                	<div class="col-6">
                                		<p><h5>Contact Email: </h5>{!! $Contact->email !!}</p>
                                	</div>

                                    <div class="col-6">
                                		<p><h5>Contact Company: </h5>{!! $Contact->company ?? '' !!}</p>
                                	</div>
                                    <div class="col-6">
                                        <p><h5>Contact Message: </h5>{!! $Contact->message ?? '' !!}</p>
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