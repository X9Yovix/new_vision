@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{ trans('teacher.Edit_Teacher') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('teacher.Edit_Teacher') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session()->get('error') }}</strong>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <br>
                        <form action="{{ route('Teachers.update', 'test') }}" method="post">
                            {{ method_field('patch') }}
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('teacher.Email') }}</label>
                                    <input type="hidden" value="{{ $Teachers->id }}" name="id">
                                    <input type="email" name="Email" value="{{ $Teachers->Email }}"
                                        class="form-control">
                                    @error('Email')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col">
                                    <label for="title">{{ trans('teacher.Password') }}</label>
                                    <input type="password" name="Password" value="{{ $Teachers->Password }}"
                                        class="form-control">
                                    @error('Password')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>


                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('teacher.Name') }}</label>
                                    <input type="text" name="Name" value="{{ $Teachers->Name }}"
                                        class="form-control">
                                    @error('Name')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col">
                                    <label for="inputCity">{{ trans('teacher.specialization') }}</label>
                                    <select class="custom-select my-1 mr-sm-2" name="Specialization_id">
                                        <option value="{{ $Teachers->Specialization_id }}">
                                            {{ $Teachers->specializations->Name }}</option>
                                        @foreach ($specializations as $specialization)
                                            <option value="{{ $specialization->id }}">{{ $specialization->Name }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('Specialization_id')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-row">
                                    <div class="col">
                                        <label for="title">{{ trans('teacher.Gender') }}</label>
                                        <input type="text" name="Gender" class="form-control" value="{{ $Teachers->Gender }}">
                                        @error('Gender')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <br>

                            <div class="form-row">
                                <div class="col">
                                    <label for="title">{{ trans('teacher.Joining_Date') }}</label>
                                    <div class='input-group date'>
                                        <input class="form-control" type="text" id="datepicker-action"
                                            value="{{ $Teachers->Joining_Date }}" name="Joining_Date"
                                            data-date-format="yyyy-mm-dd" required>
                                    </div>
                                    @error('Joining_Date')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <br>

                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">{{ trans('teacher.Address') }}</label>
                                <textarea class="form-control" name="Address" id="exampleFormControlTextarea1"
                                    rows="4">{{ $Teachers->Address }}</textarea>
                                @error('Address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>

                            <button class="btn btn-success btn-sm nextBtn btn-lg pull-right"
                                type="submit">{{ trans('Parent_trans.Next') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render
@endsection