<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    //
    public function add()
    {
        return view ('admin.profile.create');
    }
    
    public function create()
    {
        return redirect('admin/profile/create');
    }
    
    public function edit()
    {
        return view('admin.profile.edit');
    }
    
    public function update()
    {
        return redirect('admin/profile/edit');
    }
}


// 1.ControllerとRoutingについてわからないこと
// →そもそも詳細な説明への言及がないので、今のところなし
// 2.Controllerの役割
// →Routingからデータを受け取り、ModelやViewとやりとりをして、データを取得・保存したり、表示データを作成したりする。
// 3.ControllerとRoutingの役割
// →Routingはユーザーからアクセスされたデータを受け取り、そのデータをControllerの中に作成されたActionに渡す。その後2.で記載したとおり。
