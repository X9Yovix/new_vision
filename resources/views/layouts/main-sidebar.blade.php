<div class="container-fluid">
    <div class="row">
        <div class="side-menu-fixed">
            <div class="scrollbar side-menu-bg">
                <ul class="nav navbar-nav side-menu" id="sidebarnav">
                    <li>
                        <a href="{{ route('dashboard') }}">
                            <div class="pull-left"><i class="ti-home"></i><span
                                    class="right-nav-text">{{ trans('dashboard.Dashboard') }}</span>
                            </div>
                            <div class="clearfix"></div>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#elements">
                            <div class="pull-left">
                                <i class="ti-palette"></i>
                                <span class="right-nav-text">{{ trans('dashboard.Grades') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="elements" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Grade.index') }}">{{ trans('dashboard.Grade_list') }}</a></li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#classes-menu">
                            <div class="pull-left">
                                <i class="fa fa-building"></i>
                                <span class="right-nav-text">{{ trans('dashboard.Classes') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="classes-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Classrooms.index') }}">{{ trans('dashboard.List_classes') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#section-menu">
                            <div class="pull-left">
                                <i class="ti-blackboard"></i>
                                <span class="right-nav-text">{{ trans('dashboard.Sections') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="section-menu" class="collapse" data-parent="#sidebarnav">
                            <li><a href="{{ route('Sections.index') }}">{{ trans('dashboard.List_sections') }}</a>
                            </li>
                        </ul>
                    </li>

                    <li>
                        <a href="javascript:void(0);" data-toggle="collapse" data-target="#Teachers-menu">
                            <div class="pull-left">
                                <i class="ti-user"></i>
                                <span class="right-nav-text">{{ trans('dashboard.Teachers') }}</span>
                            </div>
                            <div class="pull-right"><i class="ti-plus"></i></div>
                            <div class="clearfix"></div>
                        </a>
                        <ul id="Teachers-menu" class="collapse" data-parent="#sidebarnav">
                            <li> <a
                                    href="{{ route('Teachers.index') }}">{{ trans('dashboard.List_teachers') }}</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
