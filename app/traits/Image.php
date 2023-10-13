<?php

namespace App\traits;

use Illuminate\Support\Facades\File;

trait Image
{
    public function singel_image($folder,$sub_folder,$image)
    {
        $file_name =time().$image->hashName();
        $image->storeAs(str_replace(" ","_",$folder.'/'.$sub_folder),$file_name);
        return str_replace(" ", "_",$sub_folder.'/'.$file_name);
    }

    public function delete_singel_image($folder,$image,$del_folder = 1)
    {
        if(File::exists(public_path().'/system/images/'.$folder.'/'.$image))
        {
            File::delete(public_path().'/system/images/'.$folder.'/'.$image);
            if($del_folder != 0)
            {
                File::deleteDirectory(public_path().'/system/images/'.$folder.'/'.substr($image,0,strpos($image,"/")));
            }
        }
    }
}
