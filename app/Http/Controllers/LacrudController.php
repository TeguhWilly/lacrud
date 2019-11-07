<?php

namespace App\Http\Controllers;
use App\Lacrud;
use Illuminate\Http\Request;

class LacrudController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Lacrud::latest()->paginate(5);
        return view('index', compact('data'))
                ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'image' => 'required|image|max:2048'
        ]);

        $image = $request->file('image');

        $new_name = rand() . '.' . $image->
            getClientOriginalExtension();
        $image->move(public_path('images'), $new_name);
        $form_data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $new_name
        );

        Lacrud::create($form_data);
        return redirect('lacrud')->with('success','Data added successfully');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data = Lacrud::findOrFail($id);
        return view('view', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Lacrud::findOrFail($id);
        return view('edit', compact('data'));
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
        $image_name = $request->hidden_image;
        $image = $request->file('image');
        if($image != '')
        {

            $request->validate([
                  'first_name' => 'required',
                  'last_name' => 'required',
                  'image' => 'image|max:2048'
            ]);




            $image_name = rand() . '.' . $image->
                getClientOriginalExtension();
            $image->move(public_path('images'), $image_name);
        }
        else
        {
            $request->validate([
                'first_name' => 'required',
                'last_name' => 'required'
            ]);
        }

        $form_data = array(
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'image' => $image_name
        );

        Lacrud::whereId($id)->update($form_data);
        return redirect('lacrud')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Lacrud::findOrFail($id);

        $image_name = $data->image;
        if (file_exists(public_path('images/'.$image_name))) {
            unlink(public_path('images/'.$image_name));
        }

        $data->delete();

        return redirect('lacrud')->with('success','Data is successfully deleted');
    }
}
