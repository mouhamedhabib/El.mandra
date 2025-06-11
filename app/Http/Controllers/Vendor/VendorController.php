<?php

namespace App\Http\Controllers\Vendor;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class VendorController extends Controller
{
    public function index ()
    {
        return View('vendor.index');
        $vendors = User::where('role', 'vendor')->get();
    }

    

    public function login(): View
    {
        return View('vendor.vendor_login');
    }
}
