@extends('layouts.admin_master')
@section('content')
<div class="page-wrapper">
        <!--page-content-wrapper-->
        <div class="page-content-wrapper">
            <div class="page-content">
                <!--breadcrumb-->
                <div class="page-breadcrumb d-none d-md-flex align-items-center mb-3">
                    <div class="breadcrumb-title pr-3">Quản lý biến thể cho thuộc tính: <strong>{{$name}}</strong></div>
                    <div class="pl-3">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 p-0">
                                <li class="breadcrumb-item"><a href="javascript:;"><i class='bx bx-home-alt'></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">Biến thể</li>
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
                <div class="row">
                <div class="card radius-15 col-md-5 mr-4">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0 text-primary">Thêm mới biển thể</h4>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif

                        <form>
                            <!-- INput Group -->                       
                                <div class="form-group">
                                    <label for="name">Tên biến thể</label>
                                    <input class="form-control name" name="name" onkeyup="ChangeToSlug();" id="slug"
                                        value="{{ old('name') }}" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="name">Slug</label>
                                    <input class="form-control slug" name="slug" id="convert_slug"
                                        value="{{ old('slug') }}" type="text">
                                </div>
      
                            <!-- End -->
                                <button type="reset" data-url="{{route('add_variants')}}" class="add_variants btn btn-primary radius-30"> <i class="bx bx-cog"></i> Thêm
                                </button>

                        </form>

                    </div>
                </div>


                <div data-url="{{route('list_variants')}}" data-delete="{{route('delete_variants')}}" data-id="{{$id}}" class="route card radius-15 col-md-6">
                    <div class="card-body">
                        <div class="card-title">
                            <h4 class="mb-0 text-danger">Danh sách biển thể</h4>
                        </div>
                        @if (session('message'))
                            <div class="alert alert-success" role="alert">
                                {{ session('message') }}
                            </div>
                        @endif
                        <table class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tên biến thể</th>
                                        <th>Slug</th>
                                        <th></th>

                                    </tr>
                                </thead>
                                <tbody id="list_variants">
                                     
                                </tbody>
                            </table>

                    </div>
                </div>

                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>


@endsection
@push('script')
    <script>
        list_variants();
    </script>
@endpush