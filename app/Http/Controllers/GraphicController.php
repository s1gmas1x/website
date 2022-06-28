<?php

namespace App\Http\Controllers;
use App\Models\Graphic;
use Illuminate\Http\Request;

class GraphicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Graphic::orderBy('created_at', 'DESC')->paginate(5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category' => 'required',
            'name' => 'required', 
            'alt' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpg,png,jpeg|max:5048'
        ]);

        //$newImageName = request()->file('image')->store('images', 'do');

        
        $request->image->move(public_path('storage'), $newImageName);
        
        $graphic = new Graphic;
        $graphic->type = $request->input('category');
        $graphic->name = $request->input('name');
        $graphic->alt = $request->input('alt');
        $graphic->description = $request->input('description');
        $graphic->image_path = $newImageName;
        $graphic->user_id = auth()->user()->id;
        $graphic->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Graphic::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $graphic = Graphic::find($id);
        $graphic->update($request->all());
        return $graphic;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $graphic = Graphic::find($id);
        $graphic->delete();
    }
}
