<?php

namespace App\Http\Controllers\System\Admin\Admin_Setting;

use App\Http\Controllers\Controller;
use App\Http\Requests\System\Admin\Admin_Setting\Admin_SettingRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\traits\Image;


class Admin_SettingController extends Controller
{
    use Image;
    public function index()
    {
        return view('system.admin.pages.admin_settings.admin_setting');
    }
    public function update(Admin_SettingRequest $request)
    {
       $admin = Admin::find($request->admin_id); //to search about admin in database
       $data = $request->all(); //to change all requests to array
       if($request->has('password') && $request->password !='')
       {
           $data['password']=Hash::make($request->password); //if request have password will hash this password
       }
       else
       {
            unset($data['password']); //reemove password from array
       }
       if($request->hasFile('image'))
           {
               if($admin->image != 'main/main.jpg')
               {
                  $this->delete_singel_image('Admin',$admin->image);
               }
                $data['image'] = $this->singel_image('Admin','admin',$request->file('image'));
           }

       if(!$admin)
       {
           return response()->json(['error'=>true]); //if admin not exists in database
       }

       $admin->update($data); //to update information of admin
        return response()->json(['erorr'=>false,'adminData'=>$admin]);

    }
}
