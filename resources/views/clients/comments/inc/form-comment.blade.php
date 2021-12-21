        <!-- Bình luận đầu tiên-->
        <div class="form-comment">
            <div class="title-comment">
                <h4>Hỏi & Đáp</h4>
            </div>
            <div class="b-block">
                <textarea class="form-control form-validated" id="form-one" cols="4" rows="4" maxlength="300"
                    placeholder="Nhập bình luận và câu hỏi của bạn vào đây ......"></textarea>
            </div>

            <div class="b-block mt-2">
                <button class="btn-submit-text save-comment"
                    data-url="{{ url('/comment/saveComment/' . $product->id) }}" style="float: right" disabled>Bình
                    luận</button>
            </div>
        </div>

        <div class="content-handle">
            <div class="select-comment">
                <select wire:model="selectComment" name="" id="" class="form-select">
                    <option value="">Mới nhất</option>
                    <option value="lastComment">Cũ nhất</option>
                    <option value="likeComment">Lượt thích</option>
                </select>
            </div>
            <div class="search-comment">
                <input type="search" id="mySearch" wire:model="search" placeholder="Tìm kiếm .....">
                <span>
                    <i class="fas fa-search"></i>
                </span>
            </div>
        </div>
