<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\ServiceOwnershipRequest;
use App\Service;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->search){
            $search=$request->search;
        }else{
            $search="";
        }

        $services = Service::where('state', '=','A')
            ->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%'.$search.'%');
                //->orWhere('last_name', 'LIKE', '%'.$search.'%');
            })
            ->paginate(10);
        return view('services.index')->with(compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('services.create');
    }

    public function create_category_services($category_id)
    {
        $category=Category::find($category_id);
        return view('services.create')->with(compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function store_category_services(Request $request, $category_id)
    {
        $service_request = $request->only('name');
        $service_request['category_id']=$category_id;
        $service = Service::create($service_request);

        return redirect()->route('category_services',$category_id);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit($category_id,$service_id)
    {
        $category = Category::find($category_id);
        $service = Service::find($service_id);
        return view('services.edit')->with(compact('service','category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(ServiceOwnershipRequest $request, $category_id, $service_id)
    {
        $service = Service::find($service_id);
        $service -> fill($request->all())->save();

        return redirect()->route('category_services',$category_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(ServiceOwnershipRequest $request, $service_id)
    {
        $service = Service::find($request->service_id);
        $service->delete();
        return back();
    }
}
