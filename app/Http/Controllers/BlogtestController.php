<?php

namespace App\Http\Controllers;
use App\Category;
use App\Blogtest;
use Illuminate\Http\Request;

class BlogtestController extends Controller
{
    public function index()
    {
        $blogtest = Blogtest::all();
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.blogtest.index', ['blogtest'=>$blogtest])->with('cate_category', $cate_category);
    }
    public function create(){
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.blogtest.create')->with('cate_category', $cate_category);
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/blogtests/', $filename);
            $data['avatar'] = 'public/uploads/blogtests/'. $filename;
        }
        $blogtest = Blogtest::create($data);
        return redirect()->route('blogtest.index')->with('message', 'Thêm Thành Công Tin Tức Có Id = !'.$blogtest->id);
    }

    public function edit($id)
    {
        $blogtest = Blogtest::findOrFail($id);
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.blogtest.update', compact('blogtest'))->with('cate_category', $cate_category);
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $blogtest = Blogtest::findOrFail($id);
        if($request->hasfile('avatar'))
        {
            if ($blogtest->avatar) {
                $old_image = $blogtest->avatar;
                unlink($old_image);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/blogtests/', $filename);
            $data['avatar'] = 'public/uploads/blogtests/' . $filename;
        }
        $blogtest->update($data);
        return redirect()->route('blogtest.index')->with('message', 'Cập nhật thành công Tin Tức có Id = '.$blogtest->id);;
    }

    public function detail(Request $request){
        $blogtest = Blogtest::where('id', $request->id)->get();
        $cate_category = Category::orderByDesc('id')->get();
        return view('backend.v2.blogtest.detail', compact('blogtest'))->with('cate_category', $cate_category);
    }
    public function delete($id)
    {
        $blogtest = Blogtest::findOrFail($id);
        $blogtest->delete();
        return redirect()->back()->with('message', 'Xóa thành công Tin Tức có Id = '.$blogtest->id);
    }

}
