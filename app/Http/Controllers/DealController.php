<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Image;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class DealController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('show', 'catDeals', 'search');
    }

    public function isAdmin(){
        isAdmin();
    }

    private function handleImgDeal($request, $deal)
    {
        if ($request->has('images')) {
            foreach ($request->file('images') as $image) {
                $imageName = $deal->title . '-image-' . time() . rand(1, 100) . '.' . $image->extension();
                $image->storeAs('uploads/deals_pics', $imageName, 'public');
                Image::create([
                    'deal_id' => $deal->id,
                    'image' => $imageName
                ]);
            }
        }
    }

    private function updateImgDeal($request, $deal, $imgId)
    {
        $request->validate([
            'updateImage'=>'max:2000',
        ]);
        $imageName = $deal->title . '-image-' . time() . rand(1, 100) . '.' . $request->file('updateImage')->extension();
        $request->file('updateImage')->storeAs('uploads/deals_pics', $imageName, 'public');
        Image::Find($imgId)->update([
            'id' => $imgId,
            'deal_id' => $deal->id,
            'image' => $imageName
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function index()
    {
        return redirect('/');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->isAdmin();

        $categories = Category::all()->pluck('title', 'id');
        $merchants = Merchant::all()->sortBy('name');;
        return view('deals.create', compact('categories', 'merchants'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->isAdmin();

        $request->validate([
            'title' => 'min:3|max:50|required|unique:deals,title',
            'categories' => 'required',
            'merchant_id' => 'required',
            'start_at'=>'after_or_equal:today|nullable',
            'end_at'=>'after_or_equal:today|nullable',
            'images.*'=>'max:2000',
        ]);

        $user = Auth::user();
        $categories = array_values($request->categories);
        $deal = $user->deals()->create($request->except('categories'));
        $deal->categories()->attach($categories);
        $this->handleImgDeal($request, $deal);
        $deal->map = str_replace('height="450"', 'height="auto"', $deal->map);
        $deal->map = str_replace('width="600"', 'width="100%"', $deal->map);

        $deal->save();
        return redirect("admin_dashboard")->with('status', 'The Deal Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Deal $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        return view('deals.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Deal $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        $this->isAdmin();

        $categories = Category::all()->pluck('title', 'id');
        $merchants = Merchant::all()->sortBy('name');
        $dealCategories = $deal->categories()->pluck('id')->toArray();
        return view('deals.edit', compact('categories', 'merchants', 'deal', 'dealCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Deal $deal
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Http\Response|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Deal $deal)
    {
        $this->isAdmin();

        $request->validate([
            'title' => 'min:3|max:50|required|unique:deals,title,'.$deal->id,
            'categories' => 'required',
            'merchant_id' => 'required',
            'start_at'=>'after_or_equal:today|nullable',
            'end_at'=>'after_or_equal:today|nullable',
            'images.*'=>'max:2000',
        ]);
        $this->handleImgDeal($request, $deal);
        $request->map = str_replace('height="450"', 'height="auto"', $request->map);
        $request->map = str_replace('width="600"', 'width="100%"', $request->map);
        $deal->map = $request->map;
        $deal->update((array)'map');
        $deal->update($request->except('map'));
        $deal->categories()->sync($request->categories);
        return redirect('admin_dashboard')->with('status', 'The deal updated successfully');

    }

    public function update_image(Request $request)
    {
        $this->isAdmin();

        $image = Image::findOrFail($request->id);
        $imgId = $image->id;
        $destination = 'uploads/deals_pics/'.$image->image;
        Storage::delete($destination);
        File::delete($destination);
        if ($request->has('updateImage')) {
            $deal = Deal::find($request->deal_id);
            $this->updateImgDeal($request, $deal, $imgId);
            return redirect()->back()->with('status', 'The image updated successfully');
        } else {
            $image->delete();
            return redirect()->back()->with('status', 'The image Deleted successfully');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        $this->isAdmin();

        $deal->status="Deleted";
        $deal->update();
        return redirect()->back()->with('status','The Deal Deleted Successfully');
    }

    function search(Request $request){
        $search = $request->search;

        return view('pages.search', compact('search',));
    }

}
