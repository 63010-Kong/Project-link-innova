<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SinglePageController extends Controller
{
  //
  public function index(Request $request)
  {
    // phpinfo();
    if (preg_match('/^admin/', $request->path())) {
      if ($request->path() == 'admin') {
        return redirect('/admin/login');
      } else {
        return view('appAdmin');
      }
    } else {
      return view('app');
    }
  }
}
