@extends('layouts.master')
@section('css')
    <link rel="stylesheet" type="text/css"
        href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    @toastr_css
@section('title')
    {{ trans('classroom.title_page') }}
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{ trans('classroom.title_page') }}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">

    <div class="col-xl-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">

                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('Filter_Classes') }}" method="POST">
                    {{ csrf_field() }}
                    <select class="selectpicker" data-style="btn-info" name="Grade_id" required
                        onchange="this.form.submit()">
                        <option value="" selected disabled>{{ trans('classroom.Search_By_Grade') }}</option>
                        @foreach ($Grades as $Grade)
                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}</option>
                        @endforeach
                    </select>
                </form>

                {{-- <br><br> --}}
                <button type="button" class="button x-small" id="btn_delete_all">
                    {{ trans('classroom.delete_checkbox') }}
                </button>
                <button type="button" class="button x-small" data-toggle="modal" data-target="#exampleModal">
                    {{ trans('classroom.add_class') }}
                </button>

                <div class="table-responsive">
                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
                        style="text-align: center">
                        <thead>
                            <tr>
                                <th><input name="select_all" id="example-select-all" type="checkbox"
                                        onclick="CheckAll('box1', this)" /></th>
                                <th>#</th>
                                <th>{{ trans('classroom.Name_class') }}</th>
                                <th>{{ trans('classroom.Name_Grade') }}</th>
                                <th>{{ trans('classroom.Processes') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (isset($details))

                                <?php $List_Classes = $details; ?>
                            @else

                                <?php $List_Classes = $My_Classes; ?>
                            @endif
                            <?php $i = 0; ?>
                            @foreach ($List_Classes as $My_Class)
                                <tr>
                                    <?php $i++; ?>
                                    <td><input type="checkbox" value="{{ $My_Class->id }}" class="box1">
                                    </td>
                                    <td>{{ $i }}</td>
                                    <td>{{ $My_Class->Name_Class }}</td>
                                    <td>{{ $My_Class->Grades->Name }}</td>
                                    <td>
                                        <button type="button" class="btn btn-info btn-sm" data-toggle="modal"
                                            data-target="#edit{{ $My_Class->id }}"
                                            title="{{ trans('grade_page.Edit') }}"><i
                                                class="fa fa-edit"></i></button>
                                        <button type="button" class="btn btn-danger btn-sm" data-toggle="modal"
                                            data-target="#delete{{ $My_Class->id }}"
                                            title="{{ trans('grade_page.Delete') }}"><i
                                                class="fa fa-trash"></i></button>
                                    </td>
                                </tr>

                                <!-- edit_modal_Grade -->
                                <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('classroom.edit_class') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- edit_form -->
                                                <form action="{{ route('Classrooms.update', 'test') }}"
                                                    method="post">
                                                    {{ method_field('patch') }}
                                                    @csrf
                                                    <div class="row">
                                                        <div class="col">
                                                            <label for="Name_fr"
                                                                class="mr-sm-2">{{ trans('classroom.Name_class_fr') }}
                                                                :</label>
                                                            <input id="Name_fr" type="text" name="Name_fr"
                                                                class="form-control"
                                                                value="{{ $My_Class->getTranslation('Name_Class', 'fr') }}"
                                                                required>
                                                            <input id="id" type="hidden" name="id"
                                                                class="form-control" value="{{ $My_Class->id }}">
                                                        </div>
                                                        <div class="col">
                                                            <label for="Name_en"
                                                                class="mr-sm-2">{{ trans('classroom.Name_class_en') }}
                                                                :</label>
                                                            <input type="text" class="form-control"
                                                                value="{{ $My_Class->getTranslation('Name_Class', 'en') }}"
                                                                name="Name_en" required>
                                                        </div>
                                                    </div><br>
                                                    <div class="form-group">
                                                        <label
                                                            for="exampleFormControlTextarea1">{{ trans('classroom.Name_Grade') }}
                                                            :</label>
                                                        <select class="form-control form-control-lg"
                                                            id="exampleFormControlSelect1" name="Grade_id">
                                                            <option value="{{ $My_Class->Grades->id }}">
                                                                {{ $My_Class->Grades->Name }}
                                                            </option>
                                                            @foreach ($Grades as $Grade)
                                                                <option value="{{ $Grade->id }}">
                                                                    {{ $Grade->Name }}
                                                                </option>
                                                            @endforeach
                                                        </select>

                                                    </div>
                                                    <br><br>

                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('grade_page.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-success">{{ trans('grade_page.submit') }}</button>
                                                    </div>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                {{-- <div class="modal fade" id="edit{{ $My_Class->id }}" tabindex="-1" role="dialog"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                id="exampleModalLabel">
                                                {{ trans('grade_page.edit_Grade') }}
                                            </h5>
                                            <button type="button" class="close" data-dismiss="modal"
                                                aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <!-- add_form -->
                                            <form action="{{ route('Classrooms.update', 'test') }}" method="post">
                                                {{ method_field('patch') }}
                                                @csrf
                                                <div class="row">
                                                    <div class="col">
                                                        <label for="Name_fr"
                                                            class="mr-sm-2">{{ trans('grade_page.stage_name_fr') }}
                                                            :</label>
                                                        <input id="Name_fr" type="text" name="Name_fr"
                                                            class="form-control"
                                                            value=""
                                                            required>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                            value="{{ $My_Class->id }}">
                                                    </div>
                                                    <div class="col">
                                                        <label for="Name_en"
                                                            class="mr-sm-2">{{ trans('grade_page.stage_name_en') }}
                                                            :</label>
                                                        <input type="text" class="form-control"
                                                            value=""
                                                            name="Name_en" required>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label
                                                        for="exampleFormControlTextarea1">{{ trans('grade_page.Notes') }}
                                                        :</label>
                                                    <textarea class="form-control" name="Notes"
                                                        id="exampleFormControlTextarea1"
                                                        rows="3"></textarea>
                                                </div>
                                                <br><br>

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">{{ trans('grade_page.Close') }}</button>
                                                    <button type="submit"
                                                        class="btn btn-success">{{ trans('grade_page.submit') }}</button>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>
                            </div> --}}

                                <!-- delete_modal_Grade -->
                                <div class="modal fade" id="delete{{ $My_Class->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title"
                                                    id="exampleModalLabel">
                                                    {{ trans('grade_page.delete_Grade') }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="{{ route('Classrooms.destroy', 'test') }}"
                                                    method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    {{ trans('grade_page.Warning_Grade') }}
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $My_Class->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-dismiss="modal">{{ trans('grade_page.Close') }}</button>
                                                        <button type="submit"
                                                            class="btn btn-danger">{{ trans('grade_page.submit') }}</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>


    <!-- add_modal_class -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                        {{ trans('classroom.add_class') }}
                    </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <form class=" row mb-30" action="{{ route('Classrooms.store') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="repeater">
                                <div data-repeater-list="List_Classes">
                                    <div data-repeater-item>
                                        <div class="row">

                                            <div class="col">
                                                <label for="Name_class_fr"
                                                    class="mr-sm-2">{{ trans('classroom.Name_class_fr') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_fr" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_class_en"
                                                    class="mr-sm-2">{{ trans('classroom.Name_class_en') }}
                                                    :</label>
                                                <input class="form-control" type="text" name="Name_class_en" />
                                            </div>


                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classroom.Name_Grade') }}
                                                    :</label>

                                                <div class="box">
                                                    <select class="fancyselect" name="Grade_id">
                                                        @foreach ($Grades as $Grade)
                                                            <option value="{{ $Grade->id }}">{{ $Grade->Name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                            </div>

                                            <div class="col">
                                                <label for="Name_en"
                                                    class="mr-sm-2">{{ trans('classroom.Processes') }}
                                                    :</label>
                                                <input class="btn btn-danger btn-block" data-repeater-delete
                                                    type="button" value="{{ trans('classroom.delete_row') }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row mt-20">
                                    <div class="col-12">
                                        <input class="button" data-repeater-create type="button"
                                            value="{{ trans('classroom.add_row') }}" />
                                    </div>

                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-dismiss="modal">{{ trans('Grades_trans.Close') }}</button>
                                    <button type="submit"
                                        class="btn btn-success">{{ trans('Grades_trans.submit') }}</button>
                                </div>


                            </div>
                        </div>
                    </form>
                </div>


            </div>

        </div>

    </div>
</div>
</div>


<div class="modal fade" id="delete_all" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 style="font-family: 'Cairo', sans-serif;" class="modal-title" id="exampleModalLabel">
                    {{ trans('classroom.delete_class') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="{{ route('delete_all') }}" method="POST">
                {{ csrf_field() }}
                <div class="modal-body">
                    {{ trans('grade_page.Warning_Grade') }}
                    <input class="text" type="text" id="delete_all_id" name="delete_all_id" value=''>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary"
                        data-dismiss="modal">{{ trans('classroom.Close') }}</button>
                    <button type="submit" class="btn btn-danger">{{ trans('classroom.submit') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>


</div>

<!-- row closed -->
@endsection
@section('js')
@toastr_js
@toastr_render

<script type="text/javascript">
    function CheckAll(className, elem) {
        var elements = document.getElementsByClassName(className);
        var l = elements.length;
        if (elem.checked) {
            for (var i = 0; i < l; i++) {
                elements[i].checked = true;
            }
        } else {
            for (var i = 0; i < l; i++) {
                elements[i].checked = false;
            }
        }
    }

    $(function() {
        $("#btn_delete_all").click(function() {
            var selected = new Array();
            $("#datatable input[type=checkbox]:checked").each(function() {
                selected.push(this.value);
            });
            if (selected.length > 0) {
                $('#delete_all').modal('show')
                $('input[id="delete_all_id"]').val(selected);
            }
        });
    });
</script>
@endsection
