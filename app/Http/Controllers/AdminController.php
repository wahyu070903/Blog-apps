<?php

namespace App\Http\Controllers;

use App\Admin;  //include model admin
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function show(){
    	$query_data = Admin::where('deleted_at',NULL)->get();
    	return view('admin-pages/home-panel',['query_data' => $query_data]);
    }
    public function uploadtoDB(Request $request){
        if($request->hasFile('thumbnail-image')){
            $fullname = $request->file('thumbnail-image')->getClientOriginalName();
            $filename = explode('.',$fullname)[0];
            $file_extension = $request->file('thumbnail-image')->getClientOriginalExtension();
            $filename = $filename. '_' . time() . '.' . $file_extension;
            $request->file('thumbnail-image')->move(public_path('images/content-thumbnail/'),$filename);
        }
    	DB::table('content')->insert(
    		[
    			'title' => $request['content-title'],
                'thumbnail_path' => 'images/content-thumbnail/'.$filename,
    			'categories' => $request['content-categories'],
    			'description' => $request['content-description'],
    			'text' => $request['content']
    		]
    	);
        return redirect("admin/add")->with('status','data berhasil ditambahkan!');
    }
    public function softDeleteItem($id){
        Admin::where('id',$id)->delete();

        return redirect("admin")->with('status','data berhasil dihilangkan sementara!');
    }

    public function trash(){
        $query_data = Admin::onlyTrashed()->get(); 
        return view('admin-pages\trash-panel',['query_data' => $query_data]);
    }
    public function delete($id){
        Admin::onlyTrashed()->where('id',$id)->forceDelete();
        return redirect("admin/trash")->with('status','data berhasil dihilangkan permanen!');
    }
    public function restore($id){
        Admin::onlyTrashed()->where('id',$id)->restore();
        return redirect("admin/trash")->with('status','data berhasil dihilangkan dikembalikan!');
    }
    public function updatePost($id){
        $query_data = Admin::where("id",$id)->get()[0];
        return view("admin-pages/update-panel",['query_data' => $query_data]);
    }
    public function sendUpdate(Request $request,$id){
        Admin::where("id",$id)->update([
            'title' => $request['content-title'],
            'categories' =>$request["content-categories"],
            'description' => $request["content-description"],
            'text' => $request['content']
        ]);
        return redirect("admin")->with('status','data berhasil diubah!');
        
    }

}
