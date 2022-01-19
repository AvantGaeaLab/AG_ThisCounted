<?php

namespace App\Http\Controllers;

use App\Category;
use App\Merchant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use function PHPUnit\Framework\returnSelf;

class CategoryController extends Controller
{

    public function __construct(){
        $this->middleware('auth')-> except('show');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $category=new Category();
        $category->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request){
        if(Auth::id() >= 3){
            return abort(401);
        }

        $category = new Category;
        $category->title = $request->title;
        $category->save();
        return redirect()-> back()->with('status','Category Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category){
        /*
        if(Auth::id() >= 3){
            return abort(401);
        }
        $categories = Category::all()->pluck('title', 'id');
        return redirect('admin_dashboard', compact('categories'));
        */
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category){
        if(Auth::id() > 3){
            return abort(401);
        }
        $category->update($request->all());
        return redirect()->back()->with('status','Category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        if(Auth::id() >= 3){
            return abort(401);
        }

        $category->delete();
        return redirect()->back()->with('status','The category Deleted Successfully');

    }
}
