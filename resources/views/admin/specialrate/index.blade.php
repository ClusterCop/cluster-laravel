@extends('admin.layout.base')

@section('title', 'Special Rates ')

@section('content')

    <div class="content-area py-1">
        <div class="container-fluid">
            
            <div class="box box-block bg-white">
                @if(Setting::get('demo_mode') == 1)
                    <div class="col-md-12" style="height:50px;color:red;">
                        ** Demo Mode : @lang('admin.demomode')
                    </div>
                @endif
                <h5 class="mb-1">@lang('admin.specialrate.specialrates')</h5>
                <a href="{{ route('admin.specialrate.create') }}" style="margin-left: 1em;" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> @lang('admin.specialrate.add_specialrate')</a>

                <table class="table table-striped table-bordered dataTable" id="table-2">
                    <thead>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.name') </th>
                            <th>@lang('admin.specialrate.description') </th>
                            <th>@lang('admin.specialrate.source') </th>
                            <th>@lang('admin.specialrate.radius') </th>
                            <th>@lang('admin.specialrate.destination') </th>
                            <th>@lang('admin.specialrate.radius') </th>
                            <th>@lang('admin.specialrate.price') </th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach($specialrates as $index => $specialrate)
                        <tr>
                            <td>{{$index + 1}}</td>
                            <td>{{$specialrate->name}}</td>
                            <td>{{$specialrate->description}}</td>
                            <td>{{$specialrate->source}}</td>
                            <td>{{$specialrate->s_radius}}</td>
                            <td>{{$specialrate->destination}}</td>
                            <td>{{$specialrate->d_radius}}</td>
                            <td>{{currency($specialrate->price)}}</td>
                            <td>{{$specialrate->status}}</td>
                            <td>
                                <form action="{{ route('admin.specialrate.destroy', $specialrate->id) }}" method="POST">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="_method" value="DELETE">
                                    @if( Setting::get('demo_mode') == 0)
                                    <a href="{{ route('admin.specialrate.edit', $specialrate->id) }}" class="btn btn-info"><i class="fa fa-pencil"></i> Edit</a>
                                    <button class="btn btn-danger" onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i> Delete</button>
                                    @endif
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>@lang('admin.id')</th>
                            <th>@lang('admin.name') </th>
                            <th>@lang('admin.specialrate.description') </th>
                            <th>@lang('admin.specialrate.source') </th>
                            <th>@lang('admin.specialrate.radius') </th>
                            <th>@lang('admin.specialrate.destination') </th>
                            <th>@lang('admin.specialrate.radius') </th>
                            <th>@lang('admin.specialrate.price') </th>
                            <th>@lang('admin.status')</th>
                            <th>@lang('admin.action')</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
            
        </div>
    </div>
@endsection