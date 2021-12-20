@extends('admin.layouts.master')

@section('title')
    Quản lý bình luận
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-flex align-items-center">Bình luận <i
                                class="mr-2 ml-2 fas fa-caret-right"></i>
                            <span class="text-warning">Mức độ hài lòng</span>

                        </h4>
                        <p class="card-text">
                            Danh sách
                        </p>
                    </div>
                    <form action="{{ route('comment.handle') }}" method="POST">
                        @csrf
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="datatable table table-stripped mb-0">
                                    <thead>
                                        <tr>
                                            <td>{{ trans('Quản trị viên') }}</td>
                                            <td class="text-center">{{ trans('Hài lòng') }} <i
                                                    class="fas fa-thumbs-up"></i></td>
                                            <td class="text-center">{{ trans('Không hài lòng') }} <i
                                                    class="fas fa-thumbs-down"></i></td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userAdmin as $user)
                                            <tr>
                                                <td class="text-left">

                                                    <strong class="text-info">{{ $user->name }}</strong>

                                                </td>

                                                <td class="text-center">
                                                    <button class="btn btn-info">{{ $user->likeComments->count() }} <i
                                                            class="fas fa-thumbs-up"></i></button>
                                                </td>
                                                <td class="text-center">
                                                    <button class="btn btn-danger">{{ $user->unsatisfied->count() }} <i
                                                            class="fas fa-thumbs-down"></i>
                                                    </button>
                                                </td>


                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- /Page Wrapper -->
@endsection
@push('script')
    @if (Session::has('message'))
        <script>
            toastr.options = {
                "closeButton": true,
                "progressBar": true,
            }
            toastr.options.newestOnTop = false;
            toastr.error("{!! Session::get('message') !!}");
        </script>
    @endif
@endpush
