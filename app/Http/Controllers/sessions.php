<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class sessions extends Controller
{
    public function login() {
      return view('login');
    }

    public function checkSignin() {
      include "/var/www/html/web/resources/views/md5.php";
      $name = $_POST['name'];
      $tai_khoan = tai_khoan::where('name', $name)->first();

      if($tai_khoan == NULL) {
        return view('signin');
      }

      $password = encryptIt($_POST['password']);
      if($tai_khoan->password == $password) {
        session(['userid' => $tai_khoan->id]);
      }

      return view('welcome');
    }

    public function logout() {
      session()->forget('userid');

      return view('welcome');
    }

    public function update() {
      $tai_khoan = tai_khoan::where('id', session('userid'))->first();
      $loai_tai_khoan = $tai_khoan->loai_tai_khoan;
      return view('update')->with("loai_tai_khoan", $loai_tai_khoan);
    }
}
