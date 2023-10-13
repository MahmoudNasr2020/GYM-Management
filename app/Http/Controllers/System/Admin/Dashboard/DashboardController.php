<?php

namespace App\Http\Controllers\System\Admin\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\Member;
use App\Models\Invoice;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $members        =     Member::limit(10)->latest()->get();
        $members_count  =     Member::count();
        $revenues           =     Invoice::sum('paid_up');
        $dues               =     Invoice::sum('remaining');
        $indebted_members  = Invoice::where('remaining','!=',0)->get()->unique('member_id')->count();
        return view('system.admin.pages.dashboard.index',['members_count'=>$members_count,'members'=>$members,
                                                        'revenues'=>$revenues,'dues'=>$dues,'indebted_members'=>$indebted_members]);
    }
}
