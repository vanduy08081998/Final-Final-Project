@extends('admin.layouts.master')

@section('title')
    Quản lý đánh giá
@endsection

@section('content')
    <!-- Page Wrapper -->

    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card mb-0">
                    <div class="card-header">
                        <h4 class="card-title mb-0 d-flex align-items-center">Đánh giá <i
                                class="mr-2 ml-2 fas fa-caret-right"></i> <strong class="text-info">Phản hồi đánh
                                giá</strong>
                        </h4>
                    </div>
                    <div class="card-body">
                        @livewire('admin.reply-review',['review' => $review])
                    </div>

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

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            let checkAll = $('#checkAll')
            let checkItem = $('.checkItem')
            let _token = $('input[name="_token"]').val();
            let formTrash = document.forms['form-trash']

            // Checked
            checkAll.change(function() {
                let isCheckAll = $(this).prop('checked')
                checkItem.prop('checked', isCheckAll)
                handle()
            })

            checkItem.change(function() {
                let isAllCheck = checkItem.length === $('.checkItem:checked').length
                checkAll.prop('checked', isAllCheck)
                handle()
            })

            function handle() {
                if ($('.checkItem:checked').length) {
                    $('.handle').attr('disabled', false)
                }
            }
            // Thùng rác
            $('.trash').click(function() {
                let id = $(this).data('id')
                let url = $(this).data('url')
                formTrash.action = url
                formTrash.submit()
            })

            // Hành động chung
            $('.handle-all').click(function() {
                let url = $('.url-handle').val()
                let handle = $(this).data('handle')
                $.ajax({
                    url: url,
                    type: 'post',
                    data: {
                        handle: handle,
                        _token: _token
                    },
                    success: function() {
                        window.location.href = 'http://127.0.0.1:8000/admin/review/';
                    }
                })
            });
        });
    </script>

@endpush
