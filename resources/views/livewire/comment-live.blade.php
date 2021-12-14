<div wire:ignore.self>
    {{-- If you look to others for fulfillment, you will never truly be fulfilled. --}}
    <div class="container pt-lg-2 pb-5 mb-md-3" id="div_id">

        @include('clients.comments.inc.form-comment')
        <!-- Comment-->
        <div class="col-lg-12 pt-3">

            <div class="b-block pb-1">
                <h5>{{ $commentAll->count() }} bình luận</h5>
            </div>

            <div class="infocomment">
                <!-- Nếu id đăng nhập tồn tại thì get xem nó có bằng id đã bình luận không! để đưa lên đầu tiên-->
                @if ($userLogin)

                    @include('clients.comments.inc.first-comment-user', ['commentAll' => $commentAll])

                @else

                    @foreach ($commentAll as $key => $comment)
                        @include('clients.comments.inc.comment-body', ['comment' => $comment])
                    @endforeach

                @endif

            </div>
            {{ $commentAll->links('clients.comments.inc.page-link') }}

        </div>
    </div>

</div>
