<?php

namespace App\Http\Controllers\Admin;
use App\Models\Table;
use App\Http\Requests\TableStoreRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TableController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
        $tables = Table::all();
        return view('admin.tables.index', compact('tables'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tables.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TableStoreRequest $request)
    {
        Table::create([
            'name'=>$request->name,
            'status'=>$request->status,
            'location'=>$request->location,
            'guest_number'=>$request->guest_number,
        ]);
        return redirect()->route('admin.tables.index')->with('message', 'Table Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Table $table)
    {
        return view('admin.tables.edit',compact('table'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Table $table)
    {
        $request -> validate([
            'name' => 'required',
            'location' => 'required',
            'guest_number' => 'required',
            'status' => 'required'

        ]);
        $table->update([
            'name'=> $request->name,
            'location' =>$request->location,
            'status' =>$request->status,
            'guest_number' =>$request->guest_number,
            
        ]);
        return redirect()->route('admin.tables.index')->with('message', 'Table Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy( Table $table)
    {
        $table->delete();
        $table->reservations()->delete();
        return redirect()->route('admin.tables.index')->with('message', 'Table Deleted Successfully');
    }
    
}
