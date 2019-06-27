<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\CategoryOwnershipRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        //$user = User::find(Auth::user()->id);

        if($request->search){
            $search=$request->search;
        }else{
            $search="";
        }

        $categories = Category::where('state', '=','A')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
                    //->orWhere('last_name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(5);
        return view('categories.index')->with(compact('categories'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_category_services(Request $request,$category_id)
    {
        if($request->search){
            $search=$request->search;
        }else{
            $search="";
        }
        $category = Category::find($category_id);
        $services = Category::find($category_id)->services()
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(5);
        return view('categories.index_services')->with(compact('services','category'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $category_request = $request->only('name');
        //$user = User::find(Auth::user()->id);
        //$category_request['user_id']=$user->id;
        $category = Category::create($category_request);

        return redirect()->route('categories');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id)
    {
        $category = Category::find($category_id);
        return view('categories.edit')->with(compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $category_id)
    {
        $category = Category::find($category_id);
        $category -> fill($request->all())->save();

        return redirect()->route('categories');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(CategoryOwnershipRequest $request, $category_id)
    {
        $category = Category::find($request->category_id);
        $category->delete();
        return back();
    }
}
