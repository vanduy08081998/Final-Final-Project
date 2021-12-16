<?php

namespace App\Services;
use App\Models\Notification;
class NotificationService
{
    public function store($user_id, $id_type, $type, $content_name){
        if($type == 'comment'){
            $data = array(
                'id_user' => $user_id, // Người nhận bình luận
                'id_type' => $id_type, // Lấy id của sản phẩm nơi bình luận
                'type' => $type, // Thể loại
                'content' => '<strong>'.$content_name.'</strong> đã phản hồi bình luận của bạn trong Hỏi & Đáp' // phần bình luận chỉ có tên của người trả lời . Mấy cái khác thì tùy.
            );
        }
        Notification::create($data);
    }
}