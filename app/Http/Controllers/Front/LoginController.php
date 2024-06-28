<?php
namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\PageOtherItem;

class LoginController extends Controller
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
        return view('front.login', compact('other_page_item'));
    }

    public function company_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        if(Auth::guard('company')->attempt($credentials)) {
            return redirect()->route('company_dashboard')->with('success', 'You have logged in successfully.');
        } else {
            return redirect()->route('login')->with('error', 'Incorrect credentials or account not activated.');
        }
    }

    public function company_logout()
    {
        Auth::guard('company')->logout();
        return redirect()->route('login')->with('success', 'You have logged out successfully.');
    }

    public function candidate_login_submit(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'username' => $request->username,
            'password' => $request->password,
            'status' => 1
        ];

        Log::info('Attempting login for candidate:', $credentials);

        if(Auth::guard('candidate')->attempt($credentials)) {
            Log::info('Candidate login successful');
            return redirect()->route('candidate_dashboard')->with('success', 'You have logged in successfully.');
        } else {
            Log::info('Candidate login failed');
            return redirect()->route('login')->with('error', 'Incorrect credentials or account not activated.');
        }
    }

    public function candidate_logout()
    {
        Auth::guard('candidate')->logout();
        return redirect()->route('login')->with('success', 'You have logged out successfully.');
    }
}
