<?php

namespace App\Http\Controllers;

use App\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index(){
        $slider = Slider::paginate(5);
        return view('backend.v2.slider.index', compact('slider', $slider));
    }
    public function create(){
        return view('backend.v2.slider.create');
    }
    public function store(Request $request)
    {
        $data = $request->all();
        if($request->hasfile('avatar'))
        {
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/sliders/', $filename);
            $data['avatar'] = 'public/uploads/sliders/' . $filename;
        }
        $slider = Slider::create($data);

        return redirect()->route('sliders.index')->with('message', 'Thêm Thành Công Slider Có Id = '.$slider->id);
    }
    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('backend.v2.slider.update', compact('slider'));
    }
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $slider = Slider::findOrFail($id);
        if($request->hasfile('avatar'))
        {
            if ($slider->avatar) {
                $old_image = $slider->avatar;
                unlink($old_image);
            }
            $file = $request->file('avatar');
            $extension = $file->getClientOriginalExtension();
            $filename =time().'.'.$extension;
            $file->move('public/uploads/sliders/', $filename);
            $data['avatar'] = 'public/uploads/sliders/' . $filename;
        }
        $slider->update($data);
        return redirect()->route('sliders.index')->with('message', 'Cập nhật thành công Slider có Id = '.$slider->id);;
    }
    public function detail(Request $request){
        $slider = Slider::where('id', $request->id)->get();
        return view('backend.v2.slider.detail', compact('slider'));
    }
    public function delete($id)
    {
        $slider = Slider::findOrFail($id);
        $slider->delete();
        return redirect()->back()->with('message', 'Xóa thành công Slider có Id = '.$slider->id);
    }
}
