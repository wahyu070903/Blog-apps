<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CkeditorController extends Controller
{
    public function uploadImages(Request $request){
    	if($request->hasFile('upload')){
    		//get image attribute (filename,extension)
    		$fullname = $request->file('upload')->getClientOriginalName();
    		
    		//$filename = pathinfo($fullname, PATHINFO_FILENAME);
    		$filename = explode('.',$fullname)[0];
    		
    		$file_extension = $request->file('upload')->getClientOriginalExtension();
    		// make new filename
    		$filename = $filename. '_' . time() . '.' . $file_extension;
    		
    		$request->file('upload')->move(public_path('images/content-images/'),$filename);

    		$CKEditorFuncNum = $request->input('CKEditorFuncNum');
        
    		$url = asset('images/content-images/'.$filename); 
            $msg = 'Image successfully uploaded'; 
            $response = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg');</script>";
            @header('Content-type: text/html; charset=utf-8'); 
            echo $response;
    	}
    }
}
