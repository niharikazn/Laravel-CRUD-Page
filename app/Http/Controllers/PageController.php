<?php

namespace App\Http\Controllers;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\File; 

class PageController extends Controller
{
    //
    public function index()
    {
        $pages= Page::all()->sortDesc();
        return view('page.index', ['pages' => $pages, 'lists' => Page::all()]);
    }
    public function create()
    {
        return view('page.create');
    }
    public function store(Request $request)
    {
        $page = new Page();
        $page->name = $request->name;
        $page->page_name = $request->page_name;
        $page->link = $request->link;
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = time().'.'.$request->image->extension();  
        $request->image->move(public_path('images'), $imageName);
        $page->image = $imageName;
        $page->save();
        return redirect()->route('page.index')->with('success', 'Page Data has been created successfully.');
    }
    public function show(Page $page)
    {
        return view('page.show', compact('page'));
    }
    public function destroy($id)
    {
        $page = Page::find($id);
        $page->delete();
        $imagename='images/'.$page->image;
        if(File::exists(public_path($imagename))){
            if(File::delete(public_path($imagename)))
            {
                return redirect()->route('page.index')->with('success', 'Page Data has been deleted successfully');
            }
            }
        return redirect()->route('page.index')->with('aborted', 'Page Data has been deleted successfully');
    }
    public function edit($id)
    {
        $pID = base64_decode($id);
        $page = Page::find($pID);    
        return view('page.edit', compact('page'));
    }
    public function update(Request $request, $id)
    {
        $pID = base64_decode($id);
        $page = Page::find($pID);
        $page->name = $request->name;
        $page->page_name = $request->page_name;
        $page->link = $request->link;
        if($request->image !=''){
            $request->validate([
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = time().'.'.$request->image->extension();  
            $request->image->move(public_path('images'), $imageName);
            $oldimage=$page->image;
            $oldimage='images/'.$oldimage;
            if(File::exists(public_path($oldimage))){
            File::delete(public_path($oldimage));
            }
            $page->image = $imageName;
        }
        else{
        $page->image = $page->image;}
        $page->save();
        return redirect()->route('page.index')->with('success', 'Author Data Has Been updated successfully');
    }
}
