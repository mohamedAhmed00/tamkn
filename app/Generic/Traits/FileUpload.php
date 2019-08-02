<?php

namespace App\Generic\Traits;

use Illuminate\Support\Facades\File;

trait FileUpload
{
    /**
     * @param $image
     * @auther Nader Ahmed
     * @return string
     */
    public function imageUpload($image , $path):string
    {
        $name = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$image->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/'.$path);
        $image->move($destinationPath, $name);
        return '/uploads/'.$path . '/' . $name;
    }

    /**
     * @param string $path
     * @auther Nader Ahmed
     */
    public function removeImageFromDisk(string $path)
    {
        if(File::exists(public_path($path))) {
            File::delete(public_path($path));
        }
    }

    /**
     * @param $video
     * @param $path
     * @auther Nader Ahmed
     * @return string
     */
    public function videoUpload($video , $path):string
    {
        $name = pathinfo($video->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$video->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/video/'.$path);
        $video->move($destinationPath, $name);
        return '/uploads/video/'.$path . '/' . $name;
    }

    /**
     * @param $sound
     * @param $path
     * @auther Nader Ahmed
     * @return string
     */
    public function soundUpload($sound , $path):string
    {
        $name = pathinfo($sound->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$sound->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/sound/'.$path);
        $sound->move($destinationPath, $name);
        return '/uploads/sound/'.$path . '/' . $name;
    }

    /**
     * @param $sound
     * @param $path
     * @auther Nader Ahmed
     * @return string
     */
    public function fileUpload($file , $path):string
    {
        $name = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME) . time().'.'.$file->getClientOriginalExtension();
        $destinationPath = public_path('/uploads/file/'.$path);
        $file->move($destinationPath, $name);
        return '/uploads/file/'.$path . '/' . $name;
    }
}
