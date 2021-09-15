@extends('admin.layout.base')

@section('title', 'Provider Documents ')

@section('content')
<div class="content-area py-1">
    <div class="container-fluid">
        <div class="box box-block bg-white">
            @if(Setting::get('demo_mode') == 1)
                <div class="col-md-12" style="height:50px;color:red;">
                    <h1>** Demo Mode : No Permission to Edit and Delete.</h1>
                </div>
            @endif
            <h5 class="mb-1">@lang('admin.provides.type_allocation')</h5>
            <a href="{{$backurl}}" style="margin-left: 1em;margin-top: -30px" class="btn btn-primary pull-right"><i class="fa fa-arrow-left"></i> Back</a>
            <div class="row">
                <div class="col-xs-12">                    
                    @if($ProviderService->count() > 0)
                        <hr><h6>Allocated Services :  </h6>
                        <table class="table table-striped table-bordered dataTable" id="service_types">
                            <thead>
                                <tr>
                                    <th>@lang('admin.provides.service_name')</th>
                                    <th>@lang('admin.provides.service_number')</th>
                                    <th>@lang('admin.provides.service_model')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($ProviderService as $service)
                                    <tr>
                                        <td>{{ $service->service_type->name }}</td>
                                        <td>{{ $service->service_number }}</td>
                                        <td>{{ $service->service_model }}</td>
                                        <td>
                                            <div class="input-group-btn">
                                                <button class="btn btn-success btn-large" data-id="{{ $service->id }}" data-type="{{ $service->service_type->id }}" data-number="{{ $service->service_number }}" data-model="{{ $service->service_model }}">Edit</button>
                                                @if( Setting::get('demo_mode') == 0)
                                                    <form action="{{ route('admin.provider.document.service.delete', [$Provider->id, $service->id]) }}" method="POST" style="display: inline-block;">
                                                        {{ csrf_field() }}
                                                        {{ method_field('DELETE') }}
                                                        <button class="btn btn-danger btn-large">Delete</button>
                                                    </form>
                                                 @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>@lang('admin.provides.service_name')</th>
                                    <th>@lang('admin.provides.service_number')</th>
                                    <th>@lang('admin.provides.service_model')</th>
                                    <th>@lang('admin.action')</th>
                                </tr>
                            </tfoot>
                        </table>
                    @endif
                    <hr>
                </div>
                <div class="col-xs-12">
                    <button class="btn btn-primary pull-right btn-add"><i class="fa fa-plus"></i> Add</button>
                    <br>
                    <hr>
                </div>
                <form id="service_add" action="{{ route('admin.provider.document.store', $Provider->id) }}" method="POST">
                    {{ csrf_field() }}
                    <div class="col-xs-3">
                        <select class="form-control input" name="service_type" required>
                            @forelse($ServiceTypes as $Type)
                                <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                            @empty
                                <option>- @lang('admin.service_select') -</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_number" class="form-control" placeholder="Number (CY 98769)">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_model" class="form-control" placeholder="Model (Audi R8 - Black)">
                    </div>
                    @if( Setting::get('demo_mode') == 0)
                        <div class="col-xs-3">
                            <button class="btn btn-primary btn-block" type="submit">@lang('admin.add')</button>
                        </div>
                    @endif
                </form>
                <form id="service_update" action="{{ route('admin.provider.document.service.update', $Provider->id) }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                    <input type="hidden" required name="service_id" value="">
                    <div class="col-xs-3">
                        <select class="form-control input" name="service_type" required>
                            @forelse($ServiceTypes as $Type)
                                <option value="{{ $Type->id }}">{{ $Type->name }}</option>
                            @empty
                                <option>- @lang('admin.service_select') -</option>
                            @endforelse
                        </select>
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_number" class="form-control" placeholder="Number (CY 98769)">
                    </div>
                    <div class="col-xs-3">
                        <input type="text" required name="service_model" class="form-control" placeholder="Model (Audi R8 - Black)">
                    </div>
                    @if( Setting::get('demo_mode') == 0)
                        <div class="col-xs-3">
                            <button class="btn btn-primary btn-block" type="submit">@lang('admin.update')</button>
                        </div>
                    @endif
                </form>
            </div>
        </div>

        <div class="box box-block bg-white">
            <h5 class="mb-1">@lang('admin.provides.provider_documents')</h5>
            @if( Setting::get('demo_mode') == 0)
                @if(count($Provider->documents)>0)
                    <a href="{{route('admin.download', $Provider->id)}}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-download"></i> @lang('admin.provides.download')</a>
                @endif    
            @endif    
            <table class="table table-striped table-bordered dataTable" id="table-2">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.provides.document_type')</th>
                        <th>@lang('admin.status')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($Provider->documents as $Index => $Document)
                        @if($Document->document)
                            <tr>
                                <td>{{ $Index + 1 }}</td>
                                <td>@if($Document->document){{ $Document->document->name }}@endif</td>
                                <td>{{ $Document->status }}</td>
                                <td>
                                    <div class="input-group-btn">
                                        @if( Setting::get('demo_mode') == 0)
                                            <a href="{{ route('admin.provider.document.edit', [$Provider->id, $Document->id]) }}"><span class="btn btn-success btn-large">@lang('admin.view')</span></a>
                                            <button class="btn btn-danger btn-large" form="form-delete">@lang('admin.delete')</button>
                                            <form action="{{ route('admin.provider.document.destroy', [$Provider->id, $Document->id]) }}" method="POST" id="form-delete">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}
                                            </form>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>@lang('admin.provides.document_type')</th>
                        <th>@lang('admin.status')</th>
                        <th>@lang('admin.action')</th>
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>
@endsection

@section('scripts')
    <script type="text/javascript">
        $(function () {
            $("#service_types .btn.btn-success").click(function(){
                $("#service_add").hide();
                $("#service_update input[name=service_id]").val($(this).data("id"));
                $("#service_update select[name=service_type]").val($(this).data("type"));
                $("#service_update input[name=service_number]").val($(this).data("number"));
                $("#service_update input[name=service_model]").val($(this).data("model"));
                $("#service_update").show();
            });
            $(".btn-add").click(function(){
                $("#service_update").hide();
                $("#service_update input[name=service_id]").val('');
                $("#service_update select[name=service_type]").val('');
                $("#service_update input[name=service_number]").val('');
                $("#service_update input[name=service_model]").val('');
                $("#service_add").show();
            });
        });
    </script>
@endsection

