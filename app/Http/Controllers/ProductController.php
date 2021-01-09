<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Category;

class ProductController extends Controller
{
    public function index()
    {
        $product = Product::all();
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.product.index', ['product'=>$product])->with('cate_category', $cate_category);
    }
    public function create(){
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.product.create')->with('cate_category', $cate_category);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/products/', $filename);
            $data['avatar'] = 'public/uploads/products/' . $filename;
        }
        $product = Product::create($data);
        return redirect()->route('product.index')->with('message', 'Thêm Thành Công Sản Phẩm Có Id = !'.$product->id);
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.product.update', compact('product'))->with('cate_category', $cate_category);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $product = Product::findOrFail($id);
        if($request->hasfile('avatar'))
        {
            if ($product->avatar) {
                $old_image = $product->avatar;
                unlink($old_image);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/categories/', $filename);
            $data['avatar'] = 'public/uploads/categories/' . $filename;
        }
        $product->update($data);
        return redirect()->route('product.index')->with('message', 'Cập nhật thành công sản phẩm có Id = '.$product->id);;
    }

    public function detail(Request $request){
        $product = Product::where('id', $request->id)->get();
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.product.detail', compact('product'))->with('cate_category', $cate_category);
    }
    public function delete($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        return redirect()->back()->with('message', 'Xóa thành công Sản Phẩm có Id = '.$product->id);
    }

}
