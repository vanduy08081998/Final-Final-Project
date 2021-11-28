@extends('admin.layouts.master')

@section('title', 'Thêm thuộc tính')


@section('content')
    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
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
                                    <input class="form-control" name="name" onkeyup="ChangeToSlug();" id="slug"
                                        value="{{ old('name') }}" type="text" required>
                                </div>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div class="form-group">
                                    <label for="name">Slug</label>
                                    <input class="form-control" name="slug" id="convert_slug" value="{{ old('slug') }}"
                                        type="text">
                                </div>
                            </div>
                            <!-- End -->
                            <div class="col-md-12 mb-3">
                                <button type="submit" class="btn btn-primary radius-30"> <i class="bx bx-cog"></i> Thêm
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!--end page-content-wrapper-->
    </div>

@endsection
