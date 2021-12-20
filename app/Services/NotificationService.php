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
                'content' => $content_name // phần bình luận chỉ có tên của người trả lời . Mấy cái khác thì tùy.
            );
        }
        elseif($type == 'review'){
            $data = array(
                'id_user' => $user_id, // Người nhận bình luận
                'id_type' => $id_type, // Lấy id của sản phẩm nơi bình luận
                'type' => $type, // Thể loại
                'content' => $content_name // phần bình luận chỉ có tên của người trả lời . Mấy cái khác thì tùy.
            );
        }
        elseif($type == 'order'){
            $data = array(
                'id_user' => $user_id, 
                'id_type' => $id_type, 
                'type' => $type, 
                'content' => $content_name 
            );
        }else{
            $data = array(
                'id_user' => $user_id, 
                'id_type' => $id_type, 
                'type' => $type, 
                'content' => $content_name 
            );
        }
        Notification::create($data);
    }
}