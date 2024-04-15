@extends('admin.layouts.app')

@section('content')
<section id="column-selectors">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Inquiries <i class="feather icon-film"></i></h4>
                        <a href="{{route('admin.export')}}">
                        <button type="button" class="export-csv btn btn-primary mr-1 mb-1 waves-effect waves-light">Export CSV</button></a>
                </div>
                
                <div class="card-content">
                    <div class="card-body card-dashboard">
                        <div class="table-responsive">
                            <table class="table table-striped dataex-html5-selectors">
                                <thead>
                                    <tr>
                                        <th>SNO</th>
                                        <th>NAME</th>
                                        <th>EMAIL</th>
                                        <th>PHONE</th>
                                        <th>ACTIONS</th>

                                    </tr>
                                </thead>
                                <tbody>
                                   @php
                                   $counter = 1;
                                   @endphp
                                   @foreach ($Inquiries as $Inquiry)
                                        <tr>
                                            <td>{{$counter}}</td>
                                            <td>{!! $Inquiry->name !!}</td>
                                            <td>{!! $Inquiry->email !!}</td>
                                            <td>{!! $Inquiry->phone !!}</td>
                                            <td>
                                                <a href="{!! route('admin.inquiry.show', $Inquiry->id) !!}" class="btn btn-info btn-sm waves-effect waves-light"><i class="feather icon-search"></i></a>
                                            </td>
                                        </tr>
                                    @php
                                        $counter++;
                                    @endphp
                                    @endforeach 
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection