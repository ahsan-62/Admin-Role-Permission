<?php

namespace App\Http\Controllers\Backend;

use App\Models\Page;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use App\Http\Requests\PageStoreRequest;
use App\Http\Requests\PageUpdateRequest;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $pages = Page::select(['id', 'page_title', 'page_slug', 'meta_title', 'meta_keywords', 'is_active', 'updated_at'])->paginate();
        return view('Admin.layouts.pages.page-builder.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.layouts.pages.page-builder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PageStoreRequest $request)
    {
        $page = Page::updateOrCreate([
            'page_title' => $request->page_title,
            'page_slug' => $request->page_slug ?? Str::slug($request->page_title),
            'page_short' => $request->page_short,
            'page_long' => $request->page_long,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        $this->image_upload($request,$page->id);

        Toastr::success('Page created successfully');
        return redirect()->route('page.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $page = Page::find($id);
        return view('Admin.layouts.pages.page-builder.edit', compact('page'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PageUpdateRequest $request, $id)
    {
        $page = Page::find($id);
        $page->update([
            'page_title' => $request->page_title,
            'page_slug' => $request->page_slug ?? Str::slug($request->page_title),
            'page_short' => $request->page_short,
            'page_long' => $request->page_long,
            'meta_title' => $request->meta_title,
            'meta_keywords' => $request->meta_keywords,
            'meta_description' => $request->meta_description,
        ]);

        $this->image_upload($request,$page->id);

        Toastr::success('Page updated successfully');
        return redirect()->route('page.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);
        if($page->page_image != null){
            // delete old photo
            $old_photo_path = 'public/uploads/page_images/'.$page->page_image;
            unlink(base_path($old_photo_path));
        }
        $page->delete();
        Toastr::success('page deleted Successfully');
        return redirect()->route('page.index');
    }

    public function checkActive($page_id)
    {
        $user = Page::find($page_id);
        // toogle the is-active
        if($user->is_active == 1){
            $user->is_active = 0;
        }else{
            $user->is_active = 1;
        }

        $user->update();
        return response()->json([
                'type' => 'success',
                'message' => 'Status Updated'
        ]);
    }

    public function image_upload($request, $page_id)
    {
        //check it image uploaeded
        if($request->hasFile('page_image')){
            $page = Page::find($page_id);

            //check if already exists previous image
            if($page->page_image != null){
                // delete old photo
                $old_photo_path = 'public/uploads/page_images/'.$page->page_image;
                unlink(base_path($old_photo_path));
            }


            $photo_location = 'public/uploads/page_images/';
            $uploaded_photo = $request->file('page_image');
            $new_photo_name = $page_id.'.'.$uploaded_photo->getClientOriginalExtension(); // 1.jpg
            $new_photo_location = $photo_location.$new_photo_name; //public/uploads/profile_images/1.jpg

            // Save image
            Image::make($uploaded_photo)->save(base_path($new_photo_location));

            $page->update([
                'page_image' => $new_photo_name,
            ]);

        }
    }
}
