@extends('admin.layouts.master')
@section('content')
    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">

                <div class="row">
                    <div class="card radius-15 col-md-5 mr-4">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 text-primary">Thêm mới thông số</h4>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif

                            <form>
                                <!-- INput Group -->
                                <div class="form-group">
                                    <label for="name">Thông số</label>
                                    <input class="form-control name" name="name" onkeyup="ChangeToSlug();" id="slug"
                                        value="{{ old('name') }}" type="text">
                                </div>

                                <div class="form-group">
                                    <label for="name">Slug</label>
                                    <input class="form-control slug" name="slug" id="convert_slug"
                                        value="{{ old('slug') }}" type="text">
                                </div>

                                <!-- End -->
                                <button type="reset" data-url="{{ route('add_variants') }}" style="float: right;"
                                    class="add_variants btn btn-primary radius-30"> <i class="bx bx-cog"></i> Thêm
                                </button>

                            </form>

                        </div>
                    </div>


                    <div data-url="{{ route('list_variants') }}" data-delete="{{ route('delete_variants') }}"
                        data-id="{{ $id }}" class="route card radius-15 col-md-6">
                        <div class="card-body">
                            <div class="card-title">
                                <h4 class="mb-0 text-danger">Thông số thuộc tính</h4>
                            </div>
                            @if (session('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('message') }}
                                </div>
                            @endif
                            <table class="table table-bordered" style="width:100%; text-align: center">
                                <thead class="thead-light">
                                    <tr>
                                        <th>Tthông số</th>
                                        <th>Slug</th>
                                        <th>Công cụ</th>
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
