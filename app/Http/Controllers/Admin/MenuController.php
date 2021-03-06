<?php

namespace App\Http\Controllers\Admin;
use App\Models\Menu;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\MenuStoreRequest;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    $menus= Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {    
        $categories = Category::all();
        return view('admin.menus.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MenuStoreRequest $request)
    {
        $image= $request->file('image')->store('public/menus');

        $menu=Menu::create([
            'name' =>$request->name,
            'description' =>$request->description,
            'price' =>$request->price,
            'quantity' => $request->quantity,
            'image' =>$image

        ]);
        if ($request->has('categories')) {
            $menu->categories()->attach($request->categories);
        }
        return redirect()->route('admin.menus.index')->with('message', 'Menu Created Successfully');
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
    public function edit(Menu $menu)
    {   $categories = Category::all();
        return view('admin.menus.edit', compact('menu','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Menu $menu)
    {
        $request -> validate([
            'name' => 'required',
            'price' => 'required',
            'quantity' => 'required',
            'description' => 'required'

        ]);
        $image=$menu->image;
        if($request->hasFile('image')){
            Storage::delete($category->image);
            $image = $request->file('image')->store('public/menus');
        }
        $menu->update([
            'name'=> $request->name,
            'description' =>$request->description,
            'price' =>$request->price,
            'quantity' => $request->quantity,
            'image' => $image
        ]);
        if ($request->has('categories')) {
            $menu->categories()->sync($request->categories);
        }
        return redirect()->route('admin.menus.index')->with('message', 'Menus Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Menu $menu)
    {
        Storage::delete($menu->image);
        $menu->categories()->detach();
        $menu->delete();
        return redirect()->route('admin.menus.index')->with('message', 'Menus Deleted Successfully');
    }
}
