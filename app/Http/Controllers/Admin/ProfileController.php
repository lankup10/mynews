<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Profile;
use App\ProfileHistory;

use Carbon\Carbon;

class ProfileController extends Controller
{
    public function add()
    {
        return view ('admin.profile.create');
    }
    
    public function create(Request $request)
    {
        $this->validate($request, Profile::$rules);
        
        $profile = new Profile;
        $form = $request->all();
        
        unset($form['_token']);
        
        $profile->fill($form);
        $profile->save();
        
        return redirect('admin/profile/create');
    }
    
    public function edit(Request $request)
    {
        $profile = Profile::find($request->id);
        if (empty($profile)) {
            abort(404);
        }
        return view('admin.profile.edit', ['profile_form' => $profile]);
    }
    
    public function update(Request $request)
    {
        // Validationをかける
        $this->validate($request, Profile::$rules);
        // Profile Modelからデータを取得する
        $profile = Profile::find($request->id);
        // 送信されてきたフォームデータを格納する
        $profile_form = $request->all();
        // if($request->remove == 'true') {
        //     $profile_form['image_path'] = null;
        // } elseif ($request->file('image')) {
        //     $path = $request->file('image')->store('public/image');
        //     $profile_form['image_path'] = basename($path);
        // } else {
        //     $profile_form['image_path'] = $profile->image_path;
        // }
        
        // unset($profile_form['image']);
        // unset($profile_form['remove']);
        unset($profile_form['_token']);
        // 該当するデータを上書きして保存する
        $profile->fill($profile_form)->save();
        
        $profile_history = new ProfileHistory;
        $profile_history->profile_id = $profile->id;
        $profile_history->edited_at = Carbon::now();
        $profile_history->save();

        // $profile_histories = new CreateProfileHistory;
        // $profile_histories->profile_id = $profile->id;
        // $profile_histories->edited_at = Carbon::now();
        // $profile_histories->save();

        // return view('admin.profile.edit', ['profile_form' => $profile]);
        // return redirect('admin/profile/edit');
        return redirect('admin/profile/');
    }
    
    
    public function index(Request $request)
    {
        $cond_title = $request->cond_title;
        if($cond_title != '') {
            // 検索されたら検索結果を取得する
            $posts = Profile::where('title', $cond_title)->get();
        } else {
            // それ以外はすべてのプロフィールを取得する
            $posts = Profile::all();
        }
        return view('admin.profile.index', ['posts' => $posts, 'cond_title' => $cond_title]);
    }
    
    public function delete(Request $request)
    {
        // 該当するProfile Modelを取得
        $profile = Profile::find($request->id);
        // 削除する
        $profile->delete();
        return redirect('admin/profile/');
    }
}


// 【10/13 再提出】
// 1.ControllerとRoutingについてわからないこと
// →そもそも詳細な説明への言及がないので、今のところなし
// 2.Controllerの役割
// →Routingからデータを受け取り、ModelやViewとやりとりをして、データを取得・保存したり、表示データを作成したりする。
// 3.ControllerとRoutingの役割
// →Routingはユーザーからアクセスされたデータを受け取り、そのデータをControllerの中に作成されたActionに渡す。その後2.で記載したとおり。
?>