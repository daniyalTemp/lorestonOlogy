<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use function Symfony\Component\Translation\t;

class userController extends Controller
{

    public function list(Request $request)
    {
        $users = User::all();
        return view('back.user.list', compact('users'));
    }

    public function add(Request $request)
    {
        return view('back.user.form');
    }

    public function edit(Request $request, int $id)
    {
        $user = User::find($id);
        return view('back.user.form', compact('user'));

    }

    public function addSave(Request $request, int $id)
    {


        $valRules = [
            'name' => 'required',
            'password' => 'required|min:6|max:12',
            'email' => 'required|email',

            'image' => 'image',
        ];
        $valMassage = [
            'name.required' => 'ورود نام الزامیست',
            'email.required' => 'ورود ایمیل الزامیست',
            'email.email' => 'ایمیل وارد شده معتبر نیست',
            'password.required' => 'ورود رمز الزامیست',
            'password.min' => 'رمز عبور کمتر از 6 کاراکتر',
            'password.max' => 'رمز عبور بیشتر از 12 کاراکتر',
            'image.image' => 'عکس ارسالی معتبر نیست',
        ];
        if ($id == -1) {
            $valMassage = ['email.unique' => 'ایمیل وارد شده تکراری است'];
            $valRules = ['email' => 'required|email|unique:App\Models\User,email'];

        }
        $this->validate($request, $valRules, $valMassage);
        if ($id == -1) {
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password,
                'image' => $request->image ? $request->image : '',
                'admin' => ($request->has('admin') ? true : false),
            ]);
        } else {
            $user = User::find($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = $request->password;
            $user->image = $request->image ? $request->image : '';
            $user->admin = $request->has('admin') ? true : false;
            $user->save();
        }
        if ($request->files->count() > 0) {
            $user->image = $request->file('image')->getClientOriginalName();
            $user->save();
            $request->file('image')->move(storage_path('app/public/images/profile/'), $request->file('image')->getClientOriginalName());
        }

        return redirect()->route('dashboard.user.list');
    }

    public function delete(Request $request , int $id)
    {
        User::destroy([$id]);

    }
}
