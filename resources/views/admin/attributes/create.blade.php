@extends('layouts.admin_master')

@section('title', 'Thêm thuộc tính')


@section('content')
    <div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Forms</div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Input Groups</li>
                            </ol>
                        </nav>
                    </div>
                    <div class="ml-auto">
                        <div class="btn-group">
                            <button type="button" class="btn btn-primary">Settings</button>
                            <button type="button"
                                class="btn btn-primary bg-split-primary dropdown-toggle dropdown-toggle-split"
                                data-toggle="dropdown"> <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-left"> <a class="dropdown-item"
                                    href="javascript:;">Action</a>
                                <a class="dropdown-item" href="javascript:;">Another action</a>
                                <a class="dropdown-item" href="javascript:;">Something else here</a>
                                <div class="dropdown-divider"></div> <a class="dropdown-item" href="javascript:;">Separated
                                    link</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--end breadcrumb-->

                <div class="card radius-15">
                    <div class="card-body">

                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form action="{{ route('attribute.store') }}" method="post" enctype="multipart/form-data"
                            autocomplete="off">
                            @csrf
                            <!-- INput Group -->
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="name">Tên thuộc tính</label>
                                    <input class="form-control" name="name"
                                        value="{{ old('name') }}" type="text">
                                </div>

                            </div>
                            <!-- End -->


                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary radius-30"> <i class="bx bx-cog"></i> Thêm
                                    thuộc tính</button>
                            </div>


                        </form>

                    </div>
                </div>

            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>

@endsection

