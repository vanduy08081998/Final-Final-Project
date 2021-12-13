@extends('admin.layouts.master')

@section('title')
    Thêm danh mục
@endsection


@section('content')
    <div class="content container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    @include('admin.inc.card-header', ['table_title' => 'Phản hồi bình luận' , 'table_content' =>
                    'Chỉnh sửa'])
                    <div class="card-body">

                        <div class="row">

                            <!-- INput Group -->
                            <div class="col-md-12 mb-3">
                                <div class="d-block user-comment">
                                    <div class="avt">
                                        <img src="{{ url('uploads/Users/' . $commentId->replyParent->user->avatar) }}"
                                            alt="">
                                    </div>
                                    <strong class="name">{{ $commentId->replyParent->user->name }}
                                        <i class="fa fa-caret-right" aria-hidden="true"></i>
                                        <a href="">{{ $commentId->product->product_name }}</a>
                                    </strong>

                                    <div class="body-comment">
                                        <div class="body">
                                            {{ $commentId->replyParent->comment_content }}
                                        </div>
                                    </div>
                                    <div class="footer-comment">
                                        <em>{{ $commentId->replyParent->created_at->diffForHumans() }}</em>
                                    </div>

                                    <style>
                                        .user-comment {
                                            font-size: 15px;
                                            margin-bottom: 20px;
                                        }

                                        .user-comment>.avt {
                                            float: left;
                                            width: 27px;
                                            height: 27px;
                                            margin-right: 5px;
                                            text-align: center;
                                            color: #666;
                                            text-transform: uppercase;
                                            font-size: 12px;
                                            line-height: 26px;
                                            font-weight: 600;
                                            text-shadow: 1px 1px 0 rgb(255 255 255 / 20%);
                                        }

                                        .user-comment>.avt img {
                                            margin-top: -5px;
                                            height: 100%;
                                            width: 100%;
                                            border-radius: 10px;
                                        }

                                        .user-comment .body-comment {
                                            display: block;
                                            margin-top: 10px;
                                            padding-left: 30px;
                                        }

                                        .user-comment .body-comment .body {
                                            background: #E9E9E9;
                                            border-radius: 5px;
                                            padding: 15px;
                                            color: black;
                                        }

                                        .footer-comment {
                                            margin-top: 5px;
                                            font-size: 13px;
                                            display: block;
                                            padding-left: 30px;
                                        }

                                        .form-feedback {
                                            padding-left: 30px;
                                        }

                                        .form-feedback button {
                                            float: right;
                                            margin-top: 5px;
                                        }

                                    </style>
                                </div>
                                <div class="form-feedback">
                                    <form action="{{ route('comment.update', $commentId->id) }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        @method('PUT')
                                        <textarea name="comment_content" class="form-control" cols="3"
                                            rows="3">{{ $commentId->comment_content . ' ' }}</textarea>
                                        <input type="hidden" name="comment_product_id"
                                            value="{{ $commentId->comment_id_product }}" />
                                        <input type="hidden" name="comment_id_user" value="{{ Auth::user()->id }}">

                                        <button class="btn btn-primary" type="submit">
                                            Phản hồi
                                        </button>
                                    </form>
                                </div>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection

@push('script')
    <script>
        ClassicEditor
            .create(document.querySelector('#meta_desc'))
    </script>
@endpush
