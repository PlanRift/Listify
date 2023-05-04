<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Data;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DataController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {

        $sort_by = $request->query('sort_by', 'id');
        $sort_order = $request->query('sort_order', 'asc');

        $list = Data::orderBy($sort_by, $sort_order)->get();

        $data = [
            'list' => $list,
            'sort_by' => $sort_by,
            'sort_order' => $sort_order,
        ];

        return view('list.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        return view('list.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }

        Data::create([
            'title' => $request->input('title'),
            'description' =>  $request->input('description'),
        ]);

        return redirect('list');
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
    public function edit($slug)
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        $selected_table = Data::slugSelect($slug)
            ->first();

        $edit = [
            'edit' => $selected_table
        ];

        return view('list.edit', $edit);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        
        Data::slugSelect($slug)->update([
            'title' => $request->input('title'),
            'description' => $$request->input('description')
        ]);


        return redirect("list");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        // if (!Auth::check()) {
        //     return redirect('login');
        // }
        Data::slugSelect($slug)->delete();

        return redirect('list');
    }
}
