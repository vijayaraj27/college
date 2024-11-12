<?php
namespace App\Traits;
use Illuminate\Http\Request;
//use Illuminate\Support\Facades\Storage;
use Image;
use File;
trait FileUploader {
    /**
     * @param Request $request
     */
    public function uploadMedia(Request $request, $attach, $directory) {
        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){
            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {
            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;
            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);
            }
            else {
                $fileNameToStore = Null;
            }
        }
        else{
            $fileNameToStore = Null;
        }
        return $fileNameToStore;
    }
    /*public function uploadMedia(Request $request, $attach, $directory) {
        // File upload, fit and store inside AWS S3
        if($request->hasFile($attach)){
            $file = $request->file($attach);
            // Valid extension check
            $valid_extensions = ['jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp'];
            $file_ext = $file->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true)) {
                // Upload file to S3
                $fileNameToStore = $file->getClientOriginalName();
                $path = $file->storeAs($directory, $fileNameToStore, 's3');
            } else {
                $fileNameToStore = null;
            }
        } else {
            $fileNameToStore = null;
        }
        return $fileNameToStore;
    }*/
    /**
     * @param Request $request
     */
    public function updateMedia(Request $request, $attach, $directory, $model) {
        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){
            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {
            $old_attach = public_path('uploads/'.$directory.'/'.$model->attach);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }
            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;
            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);
            }
            else {
                $fileNameToStore = $model->attach;
            }
        }
        else{
            $fileNameToStore = $model->attach;
        }
        return $fileNameToStore;
    }
    /**
     * @param Request $request
     */
    public function deleteMedia($directory, $model) {
        // Delete attach
        $attach = public_path('uploads/'.$directory.'/'.$model->attach);
        if(File::isFile($attach)){
            File::delete($attach);
        }
        return $deleted = true;
    }
    /**
     * @param Request $request
     */
    public function updateMultiMedia(Request $request, $attach, $directory, $model, $field) {
        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){
            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp','pdf','doc','docx','txt','zip','rar','csv','xls','xlsx','ppt','pptx','mp3','avi','mp4','mpeg','3gp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {
            $old_attach = public_path('uploads/'.$directory.'/'.$model->$field);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }
            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;
            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            // Move file inside public/uploads/ directory
            $request->file($attach)->move('uploads/'.$directory.'/', $fileNameToStore);
            }
            else {
                $fileNameToStore = $model->$field;
            }
        }
        else{
            $fileNameToStore = $model->$field;
        }
        return $fileNameToStore;
    }
    /**
     * @param Request $request
     */
    public function deleteMultiMedia($directory, $model, $field) {
        // Delete attach
        $attach = public_path('uploads/'.$directory.'/'.$model->$field);
        if(File::isFile($attach)){
            File::delete($attach);
        }
        return $deleted = true;
    }
    /**
     * @param Request $request
     */
    public function uploadImage(Request $request, $attach, $directory, $width, $height) {
        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){
            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {
            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;
            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            //Resize And Crop as Fit image here ($width width, $height height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file($attach)->getRealPath())->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); $constraint->upsize(); })->save($thumbnailpath);
            }
            else {
                $fileNameToStore = Null;
            }
        }
        else{
            $fileNameToStore = Null;
        }
        return $fileNameToStore;
    }
/**
 * 
 * 
 *  THE BELOW FUNCTION FOR Upload image to S3 bucket aws
 * 
 * 
 */

/*
 public function uploadImage(Request $request, $attach, $directory, $width, $height)
{
    // Check if the request has a file to upload
    if ($request->hasFile($attach)) {
        // Valid file extensions for images
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif', 'ico', 'svg', 'webp'];
        $file_ext = $request->file($attach)->getClientOriginalExtension();

        if (in_array($file_ext, $valid_extensions, true)) {
            // Prepare file name and path
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ', '-', '&', '#', '$', '%', '^', ';', ':'], '_', $filename) . '_' . time() . '.' . $extension;
            
            // Resize and crop the image to the specified width and height
            $img = Image::make($request->file($attach)->getRealPath())
                        ->resize($width, $height, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

            // Convert the resized image to a stream to upload to S3
            $imageStream = $img->stream()->__toString();

            // Upload the file to S3 under the specified directory
            $filePath = "uploads/{$directory}/{$fileNameToStore}";
            Storage::disk('s3')->put($filePath, $imageStream, 'public');

            // Return the file name or path to store in the database
            return Storage::disk('s3')->url($filePath);
        } else {
            return null; // Invalid extension
        }
    } else {
        return null; // No file uploaded
    }
}


public function updateImage(Request $request, $attach, $directory, $width, $height, $model, $field)
{
    // Check if the request has a file to upload
    if ($request->hasFile($attach)) {
        // Valid file extensions for images
        $valid_extensions = ['jpg', 'jpeg', 'png', 'gif', 'ico', 'svg', 'webp'];
        $file_ext = $request->file($attach)->getClientOriginalExtension();

        if (in_array($file_ext, $valid_extensions, true)) {
            // Delete the old image from S3 if it exists
            if ($model->$field) {
                $oldFilePath = "uploads/{$directory}/" . $model->$field;
                if (Storage::disk('s3')->exists($oldFilePath)) {
                    Storage::disk('s3')->delete($oldFilePath);
                }
            }

            // Prepare file name and path
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ', '-', '&', '#', '$', '%', '^', ';', ':'], '_', $filename) . '_' . time() . '.' . $extension;

            // Resize and crop the image to the specified width and height
            $img = Image::make($request->file($attach)->getRealPath())
                        ->resize($width, $height, function ($constraint) {
                            $constraint->aspectRatio();
                            $constraint->upsize();
                        });

            // Convert the resized image to a stream to upload to S3
            $imageStream = $img->stream()->__toString();

            // Upload the file to S3 under the specified directory
            $filePath = "uploads/{$directory}/{$fileNameToStore}";
            Storage::disk('s3')->put($filePath, $imageStream, 'public');

            // Update the model's field with the new file name
            $model->$field = $fileNameToStore;
        } else {
            $fileNameToStore = $model->$field; // Invalid extension; keep old file
        }
    } else {
        $fileNameToStore = $model->$field; // No new file uploaded; keep old file
    }

    return $fileNameToStore;
}

*/

    /**
     * @param Request $request
     */
    public function updateImage(Request $request, $attach, $directory, $width, $height, $model, $field) {
        // File upload, fit and store inside public folder 
        if($request->hasFile($attach)){
            // Valid extension check
            $valid_extensions = array('jpg','jpeg','png','gif','ico','svg','webp');
            $file_ext = $request->file($attach)->getClientOriginalExtension();
            if(in_array($file_ext, $valid_extensions, true))
            {
            $old_attach = public_path('uploads/'.$directory.'/'.$model->$field);
            if(File::isFile($old_attach)){
                File::delete($old_attach);
            }
            //Upload New File
            $filenameWithExt = $request->file($attach)->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME); 
            $extension = $request->file($attach)->getClientOriginalExtension();
            $fileNameToStore = str_replace([' ','-','&','#','$','%','^',';',':'],'_',$filename).'_'.time().'.'.$extension;
            //Crete Folder Location
            $path = public_path('uploads/'.$directory.'/');
            if (! File::exists($path)) {
                File::makeDirectory($path, 0777, true, true);
            }
            //Resize And Crop as Fit image here ($width width, $height height)
            $thumbnailpath = $path.$fileNameToStore;
            $img = Image::make($request->file($attach)->getRealPath())->resize($width, $height, function ($constraint) { $constraint->aspectRatio(); $constraint->upsize(); })->save($thumbnailpath);
            }
            else {
                $fileNameToStore = $model->$field;
            }
        }
        else{
            $fileNameToStore = $model->$field;
        }
        return $fileNameToStore;
    }
}