@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('dashboard.List_teachers') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">{{ trans('dashboard.Teachers') }}</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item">{{ trans('dashboard.Teachers') }}</li>
                <li class="breadcrumb-item active">{{ trans('dashboard.List_teachers') }}</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                <a href="{{ route('Teachers.create') }}">
                    <button type="button" class="button x-small" data-toggle="modal" data-target="#addExampleModal">
                        {{ trans('teacher.Add_Teacher') }}
                    </button></a>
                <br>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>{{ trans('teacher.Name_Teacher') }}</th>
                                <th>{{ trans('teacher.Gender') }}</th>
                                <th>{{ trans('teacher.Joining_Date') }}</th>
                                <th>{{ trans('teacher.Specialization') }}</th>
                                <th>{{ trans('section.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $i = 0; ?>
                            @foreach ($Teachers as $Teacher)
                                <tr>
                                    <?php $i++; ?>
                                    <td>{{ $i }}</td>
                                    <td>{{ $Teacher->Name }}</td>
                                    <td>{{ $Teacher->Gender }}</td>
                                    <td>{{ $Teacher->Joining_Date }}</td>
                                    <td>{{ $Teacher->specializations->Name }}</td>
                                    <td>
                                        <a href="{{ route('Teachers.edit', $Teacher->id) }}"
                                            class="btn btn-info btn-sm" role="button" aria-pressed="true"><i
                                                class="fa fa-edit"></i></a>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete_Teacher{{ $Teacher->id }}"
                                            title="{{ trans('Grades_trans.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>
                                <!-- Delete modal -->
                                <div class="modal fade" id="delete_Teacher{{ $Teacher->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <form action="{{ route('Teachers.destroy', 'test') }}" method="post">
                                            {{ method_field('delete') }}
                                            {{ csrf_field() }}
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                        id="exampleModalLabel">
                                                        {{ trans('teacher.Delete_Teacher') }}</h5>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <p> {{ trans('section.Warning_Section') }} {{ $Teacher->Name }} ?</p>
                                                    <input type="hidden" name="id" value="{{ $Teacher->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('section.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('section.Submit') }}</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection
