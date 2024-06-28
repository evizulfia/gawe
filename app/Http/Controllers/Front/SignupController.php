<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PageOtherItem;
use App\Models\Company;
use App\Models\Candidate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SignupController extends Controller
{
    public function index() 
    {
        if(Auth::guard('candidate')->check()) {
            return redirect()->route('candidate_dashboard');
        }

        if(Auth::guard('company')->check()) {
            return redirect()->route('company_dashboard');
        }
        
        $other_page_item = PageOtherItem::where('id',1)->first();
        return view('front.signup', compact('other_page_item'));
    }

    public function company_signup_submit(Request $request)
    {
        $request->validate([
            'company_name' => 'required',
            'person_name' => 'required',
            'username' => 'required|unique:companies',
            'email' => 'required|email|unique:companies',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $obj = new Company();
        $obj->company_name = $request->company_name;
        $obj->person_name = $request->person_name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->status = 1; // Directly setting status to 1
        $obj->save();

        return redirect()->route('login')->with('success', 'Your account has been created successfully. You can now login.');
    }

    public function candidate_signup_submit(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'username' => 'required|unique:candidates',
            'email' => 'required|email|unique:candidates',
            'password' => 'required',
            'retype_password' => 'required|same:password'
        ]);

        $obj = new Candidate();
        $obj->name = $request->name;
        $obj->username = $request->username;
        $obj->email = $request->email;
        $obj->password = Hash::make($request->password);
        $obj->status = 1; // Directly setting status to 1
        $obj->save();

        return redirect()->route('login')->with('success', 'Your account has been created successfully. You can now login.');
    }
}
