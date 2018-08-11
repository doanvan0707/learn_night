<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slide;
use App\Product;
use App\ProductType;

class PageController extends Controller
{
    public function getIndex()
    {
    	// Lay tat ca du lieu o bang slide
    	$slide = Slide::all();

    	// Lay du lieu o bang product voi new = 1
    	$new_product = Product::where('new', 1)->paginate(4);

    	// Lay du lieu tu bang product voi gia khuyen mai khac 0
    	$sanpham_khuyenmai = Product::where('promotion_price', '<>', 0)->paginate(8);

    	// return view('page.trangchu',['slide' => $slide]);
    	return view('page.trangchu', compact('slide', 'new_product', 'sanpham_khuyenmai'));
    }

    public function getLoaiSp($type)
    {
        // Loc san pham theo loai bang cach lay san pham
        // theo id_type = $type truyen vao
        $sp_theoloai = Product::where('id_type', $type)->get();
        $sp_khac = Product::where('id_type', '<>', $type)->paginate(3);
        $loai = ProductType::all();
        $loai_sp = ProductType::where('id', $type)->first();
    	return view('page.loai_sanpham', compact('sp_theoloai', 'sp_khac', 'loai', 'loai_sp'));
    }	

    public function getChitiet()
    {
    	return view('page.chitiet_sanpham');
    }

    public function getLienHe()
    {
    	return view('page.lienhe');
    }

    public function getGioiThieu()
    {
    	return view('page.gioithieu');
    }
}
