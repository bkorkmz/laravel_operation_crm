<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ProfileController extends Controller
{

    public function index()
    {
        $user = auth()->user();
        $maskedTcNumber =  'Bilgi Yok';
        if (!blank($user->tcno)) {
            $maskedTcNumber = substr($user->tcno, 0, 2) . str_repeat('*', 7) . substr($user->tcno, -2);
        }

        $user_data = [
            'tcno' => $maskedTcNumber,
            'email' => $user->email,
            // 'gender' => $user->gender ?: 'Bilgi Yok',
            'phone' => $user->phone,
        ];

        return view('admin.profile', compact('user_data'));
    }
    public function update(Request $request)
    {

        $model = auth()->user();

        if ($model->email == $request->email) {
            $email_valid = 'required|email';
        } else {
            $email_valid = 'required|email|unique:users,email';
        }

        $validatedData = $request->validate([
            'name' => 'required',
            'email' => $email_valid,
            'phone' => 'required|numeric|digits:10',
            // 'status' => 'required|boolean',
            // 'country' => 'nullable',
            // 'city' => 'nullable',
            // 'county' => 'nullable',
            // 'about' => 'nullable',
            'gender' => 'nullable',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'name.required' => 'Ad alanı zorunludur.',
            'email.required' => 'E-posta alanı zorunludur.',
            'email.email' => 'Geçersiz bir e-posta adresi girdiniz.',
            'email.unique' => 'Bu e-posta adresi zaten kayıtlı.',
            'phone.required' => 'Telefon numarası alanı zorunludur.',
            'phone.numeric' => 'Telefon numarası sadece rakamlardan oluşmalıdır.',
            'phone.digits' => 'Telefon numarası 10 haneli olmalıdır.',
            // 'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            // 'password.confirmed' => 'Şifreler eşleşmiyor.',
            // 'status.required' => 'Durum alanı zorunludur.',
            // 'status.boolean' => 'Durum alanı sadece doğru veya yanlış değeri alabilir.',
            'avatar.image' => 'Profil resmi bir resim dosyası olmalıdır.',
            'avatar.mimes' => 'Profil resmi yalnızca jpeg, png, jpg, gif veya svg formatında olabilir.',
            'avatar.max' => 'Profil resmi en fazla 2 MB boyutunda olabilir.',
        ]);




        $data = $request->except('_token', 'avatar');
        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            if ($model->avatar != "") {
                deleteOldPicture($model->avatar);
            }
            $data['avatar'] = '/storage/' . $validatedData['avatar']->store('avatars', 'public');
        }
        // if ($request->password) {
        //     $data['password'] = Hash::make($request->password);
        // }
        auth()->user()->update($data);
        return response()->json(['message' => 'true', 'status' => 'success']);




        // dd($request->all());
    }
    public function passwordUpdate(Request $request)
    {

        $model = auth()->user();



        $validatedData = $request->validate([

            'password' => 'nullable|min:6|confirmed',

        ], [

            'password.min' => 'Şifre en az 6 karakter olmalıdır.',
            'password.confirmed' => 'Şifreler eşleşmiyor.',
        ]);




        $data = $request->except('_token', 'password');

        if ($request->password) {
            $data['password'] = Hash::make($request->password);
        }
        auth()->user()->update($data);
        return response()->json(['message' => 'true', 'status' => 'success']);
    }
    public function deleteAccount(Request $request)
    {

        $model = auth()->user();

        $data =[];

        $data['email'] = $model->email . "-" . bin2hex(random_bytes(2)); // random_bytes düzeltilmiş ve hexadecimal olarak çevrildi.
        $data['status'] = 0;
        $data['user_check'] = 0;
        // }
        $user = auth()->user(); // Kullanıcının örneği alındı.
        $user->update([
            "email" => $data['email'],
            "status" => $data['status'],
            "user_check" => $data['user_check']
        ]);
        
        // dd($user);

        Session::flush();
        Auth::logout();

        // return redirect('login');


        return response()->json(['message' => 'true', 'status' => 'success']);
    }
}
