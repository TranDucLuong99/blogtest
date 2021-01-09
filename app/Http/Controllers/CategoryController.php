<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use  App\Category;
class CategoryController extends Controller
{
    public function index(){
        $category = Category::paginate(2);
        return view('backend.v2.category.index', compact('category', $category));
    }
    public function create(){
        return view('backend.v2.category.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/categories/', $filename);
            $data['avatar'] = 'public/uploads/categories/' . $filename;
        }
        $category = Category::create($data);

        return redirect()->route('category.index')->with('message', 'Thêm Thành Công Sản Phẩm Có Id = '.$category->id);
    }
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.v2.category.update', compact('category'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $category = Category::findOrFail($id);
        if($request->hasfile('avatar'))
        {
            if ($category->avatar) {
                $old_image = $category->avatar;
                unlink($old_image);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/categories/', $filename);
            $data['avatar'] = 'public/uploads/categories/' . $filename;
        }
        $category->update($data);
        return redirect()->route('category.index')->with('message', 'Cập nhật thành công danh mục có Id = '.$category->id);;
    }
    public function detail(Request $request){
        $category = Category::where('id', $request->id)->get();
        return view('backend.v2.category.detail', compact('category'));
    }
    public function delete($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();
        return redirect()->back()->with('message', 'Xóa thành công danh mục có Id = '.$category->id);
    }
}
