<?php

namespace App\Http\Controllers\Clients;

use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function wishlist() {
        $wishlist = Wishlist::orderByDESC('id')->where('id_user', Auth::user()->id)->get();
        // dd($wishlist->product()->get('brand_name'));
        return view('clients.account.account-wishlist', [
            'wishlist' => $wishlist,
        ]);
    }

    public function addToWish(Request $request) {
        $id = $request->input('id');
        $product  = Product::find($id)->toArray();
        if (Auth::user()) {
            $user = Auth::user()->id;
            $wishlist = Wishlist::orderByDESC('id')->where('id_prod', $product['id'])->where('id_user', $user)->first();
            if($wishlist != NULL) {
                Wishlist::orderByDESC('id')->where('id_prod', $product['id'])->where('id_user', $user)->delete();
                return response()->json([
                    'icon' => 'warning',
                    // 'title' => 'Chúc mừng',
                    'text' => 'Đã xóa ' . $product['product_name'] . ' khỏi Yêu thích của bạn!',
                    'confirm' => false,
                    'cancel' => false,
                ]);
            } else {
                Wishlist::create([
                    'id_user' => $user,
                    'id_prod' => $product['id']
                ]);
                return response()->json([
                    'icon' => 'success',
                    'text' => 'Đã thêm ' . $product['product_name'] . ' vào Yêu thích của bạn!',
                    'confirm' => false,
                    'cancel' => false,
                ]);
            }
        } else {
            return response()->json([
                'icon' => 'warning',
                'title' => 'Thất bại',
                'text' => 'Bạn cần đăng nhập trước khi thêm!',
                'confirm' => true,
                'cancel' => true,
                // 'link' => 'http://127.0.0.1:8000/Custommers/login'
            ]);
        }
    }

    public function deleteWishlist(Request $request) {
        $id = $request->input('id');
        $product  = Product::find($id)->toArray();
        $user = Auth::user()->id;
        Wishlist::orderByDESC('id')->where('id_prod', $product['id'])->where('id_user', $user)->delete();
        return response()->json([
            'icon' => 'warning',
            'text' => 'Đã xóa ' . $product['product_name'] . ' khỏi Yêu thích của bạn!',
            'confirm' => false,
            'cancel' => false,
        ]);
    }
}
