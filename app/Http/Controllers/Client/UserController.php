<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    //
    public function index(User $user){
        $user = Auth::user();
        $list = DB::table('categories')
        ->get();
        return view("client.index",compact("user",'list'));
    }
    public function edit(User $user){
        $list = DB::table('categories')
        ->get();
        return view('client.edit',compact('user','list'));
    }
    public function update(Request $request, User $user){
        $data = $request->validate([
            'fullname' => ['required', 'min:3'],
            'username' => ['required', 'min:3'],
            'email' => ['required', 'email', Rule::unique('users')->ignore($user)],
            'avatar'=> ['mimes:jpeg,png,jpg,gif', 'max:2048'],
        ]);
        $data = $request->except('avatar');
        $avatar_old = $user->avatar;
        $data['avatar'] = $avatar_old;
        // Kiểm tra xem có file hình ảnh không
        if ($request->hasFile('avatar')) {
            // Lưu file hình ảnh vào thư mục 'products' và lưu đường dẫn vào mảng $data
            $files_avatars = $request->file('avatar')->store('avatars');
            $data['avatar'] = $files_avatars;
                        // $data['image'] = $request->file('image')->store('products', 'public');
        }
        $user->update($data);
        return redirect()->back()->with('message', 'Cập nhập thành công');
    }
    public function showChange(User $user){
        $list = DB::table('categories')
        ->get();
        return view('client.changepassword',compact('user','list'));
    }
  
   

    // Xử lý yêu cầu đổi mật khẩu
    public function changePassword(Request $request, User $user){
    
        // Xác thực dữ liệu đầu vào
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:6|confirmed',
        ]);

        // Kiểm tra xem mật khẩu hiện tại có khớp không
        if (!Hash::check($request->current_password, Auth::user()->password)) {
            return back()->withErrors(['current_password' => 'Mật khẩu hiện tại không chính xác.']);
        }
        /**
         * @var \App\Models\User $user
         */
        // Cập nhật mật khẩu mới cho người dùng
        $user = Auth::user();
        $user->password = Hash::make($request->new_password);
        $user->save();

        return redirect()->back()->with('success', 'Mật khẩu đã được đổi thành công.');
    }
}
