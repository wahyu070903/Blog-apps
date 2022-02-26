<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function showHome(){
    	$query_result_all = DB::table('content')->get();
    	$content_total = count($query_result_all);
    	$content_per_page = 8;
    	$paginate_num = ceil($content_total/$content_per_page);
    	$query_result = DB::table('content')->skip(0)->take(8)->get(); 
    	return view('home')->with('query_data',$query_result)->with('pagination',$paginate_num)->with("query_all",$query_result_all);
    }
    public function showArticle($id){
    	$query_result = DB::table('content')->where('id',$id)->get()[0];
    	return view('article',['query_data' => $query_result]);
    }
    public function updateNewPost($page){
    	$content_per_page = 8;
    	$start_paginate = ($content_per_page * $page) - $content_per_page;
    	$query_result = DB::table('content')->skip($start_paginate)->take($content_per_page)->get();
    	$html_array = "";

    	// don't touch code below (can cause an error)
    	foreach($query_result as $item){
    		$html_element = "<a href='article/".$item->id."'><div class='card'><img src='" . asset($item->thumbnail_path). "'class='card-img-top' alt='...'><div class='card-body'><h5 class='card-title'>" . $item->title ."</h5><p class='card-text'>" . $item->description."</p></div></div></a>";
			$html_array = $html_array.$html_element;
    	}
    	

    	return response()->json(["success" => $html_array]);
    }
    public function liveSearch($keyword){
        $query_result = DB::table("content")->where("title","LIKE","%".$keyword."%")->get();
        $html_array = "";
        foreach ($query_result as $key => $item) {
            $html_element = "<a href='article/".$item->id."'><div class='card card-popup'><img src='" . asset($item->thumbnail_path). "'class='card-img-top card-img-popup' alt='...'><div class='card-body card-body-popup'><h5 class='card-title card-title-popup'>" . $item->title ."</h5><p class='card-text card-text-popup'>" . $item->description."</p></div></div></a>";
            $html_array = $html_array.$html_element;
        }
        return response()->json(["success" => $html_array]);
    }
    public function getCategories($category){
        $query_result = DB::table("content")->where("categories",$category)->get();
        return view("categories",["data_by_category" => $query_result]);
    }
}
