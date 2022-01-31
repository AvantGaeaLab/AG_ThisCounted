<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Deal;
use App\Models\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class DealController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth')->except('show', 'catDeals');
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
        if(Auth::id() > 3){
            return abort(401);
        }

        $categories = Category::all()->pluck('title', 'id');
        $merchants = Merchant::all();
        return view('deals.create', compact('categories', 'merchants'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        $request->validate([
            'title' => 'min:3|max:50|required',
            'categories' => 'required',
            'merchant_id' => 'required',
            'main_pic' => 'required',
        ]);

        $user = Auth::user();
        $categories = array_values($request->categories);
        $deal = $user->deals()->create($request->except('categories'));
        $deal->categories()->attach($categories);
        if($request->hasFile('main_pic')) {
            $file = $request->file('main_pic');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/deals_pics', $filename);
            $deal->main_pic = $filename;
        }
        $deal->save();
        return redirect("admin_dashboard")->with('status','The Deal Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function show(Deal $deal)
    {
        $title=$deal->title;
        return view('deals.show', compact('deal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function edit(Deal $deal)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        $categories = Category::all()->pluck('title', 'id');
        $merchants = Merchant::all();
        $dealCategories = $deal->categories()->pluck('id')->toArray();
        return view('deals.edit', compact('categories', 'merchants', 'deal','dealCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Deal $deal)
    {
        if(Auth::id() > 3){
            return abort(401);
        }

        $request->validate([
            'title' => 'min:3|max:50|required',
            'categories' => 'required',
            'merchant_id' => 'required',
        ]);

        $deal->title = $request->title;
        $deal->merchant_id = $request->merchant_id;
        $deal->status = $request->status;
        $deal->start_at = $request->start_at;
        $deal->end_at = $request->end_at;
        $deal->retails_price = $request->retails_price;
        $deal->price = $request->price;
        $deal->description = $request->description;
        $deal->more_info = $request->more_info;
        $deal->location = $request->location;

        if($request->hasFile('main_pic')) {
            $destination = 'uploads/deals_pics/'.$deal->main_pic;
            if(File::exists($destination)){
                File::delete($destination);
            }
            $file = $request->file('main_pic');
            $extension = $file->getClientOriginalExtension();
            $filename=time().'.'.$extension;
            $file->move('uploads/deals_pics', $filename);
            $deal->main_pic = $filename;
        }
        $deal->update();
        $deal->categories()->sync($request->categories);
        return redirect('admin_dashboard')->with('status','The deal updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Deal  $deal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Deal $deal)
    {
        if(Auth::id() > 3){
            return abort(401);
        }
        $deal->status="Deleted";
        $deal->update();
        return redirect()->back()->with('status','The Deal Deleted Successfully');
    }

    function search(Request $request){
        $title = $request->title;
        $searchDeals = Deal::where("title", "like", "%".$title."%")->ValidDeal()->latest()->get();
        return view('pages.search', compact('searchDeals', 'title'));
    }

}
