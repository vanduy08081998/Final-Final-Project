        <!-- Bình luận đầu tiên-->
        <div class="form-comment">
            <div class="b-block">
                <textarea class="form-control form-validated" id="form-one" cols="4" rows="4"
                    placeholder="Nhập bình luận và câu hỏi của bạn vào đây ......"></textarea>
            </div>

            <div class="b-block mt-2">
                <button class="btn-submit-text save-comment"
                    data-url="{{ url('/comment/saveComment/' . $product->id) }}" style="float: right" disabled>Bình
                    luận</button>
            </div>
        </div>


        <style>
            .form-comment {
                display: block;
                background: #DDDDDD;
                height: 170px;
                padding: 20px
            }

            /* .btn-submit-text {
                background: #fe696a;
                color: white
            } */

        </style>
