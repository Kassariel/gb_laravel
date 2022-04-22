<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Info;
use App\Http\Requests\Info\EditRequest;
use App\Http\Requests\Info\CreateRequest;

class InfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.info.index', ['infoList' => Info::query()->paginate(5)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.info.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateRequest $request)
    {
        
        $info = Info::create($request->validated());
        if($info) {
            return redirect()->route('admin.info.index')
                ->with('success', __('messages.admin.info.create.success'));
        }
        
        return back()->with('error', __('messages.admin.info.create.fail'));
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
    public function edit(Info $info)
    {
        return view('admin.info.edit', [
            'info' => $info
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditRequest $request, Info $info)
    {
        //$status = $info->fill($request->only(['author', 'tel', 'email', 'url', 'description']))->save();
        $status = $info->fill($request->validated())->save();
        
        if($status) {
            return redirect()->route('admin.info.index')
                ->with('success', __('messages.admin.info.update.success'));
        }
        
        return back()->with('error', __('messages.admin.info.update.fail'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Info $info)
    {
        try{
            $info->delete();
            
            return response()->json(['status' => 'ok']);
        }catch (\Exeption $e) {
            \Log::error("Category wasn't delete");
            return response()->json(['status' => 'error'], 400);
        }
    }
}
