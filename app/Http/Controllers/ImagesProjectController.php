<?php

namespace App\Http\Controllers;

use App\Models\images_project;

use App\Http\Resources\ImagesProjectResource;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ImagesProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        # Get All Data 
        return images_project::all();
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
    public function store(Request $request)
    {
        # debug check error
        // dd($request->hasFile('imagesPath'));

        # Check validater
        $validater = Validator::make($request->all(), [
            'imagesPath' => 'required|image|mimes:jpeg,jpg,png,gif,svg|max:2048',
            'imagesType' => 'required|string',
        ]);
        # If validater falls
        if ($validater->fails()) {
            # Return valideter error massage
            return response()->json($validater->errors());
        }
        # Uplode Image
        if ($request->hasFile('imagesPath')) {
            // $fileName = time() . $request->file('imagesPath')->getClientOriginalName();
            // $fileName = $request->file('imagesPath')->store('image_test', 'public');

            $file = $request->file('imagesPath');
            $file_name = time() . $file->getClientOriginalName();
            $file->move(public_path('image_test'), $file_name);

            # Created data
            $imagesProject = images_project::create([
                'imagesPath' =>  $file_name,
                'imagesType' => $request->imagesType
            ]);

            # Return message and data
            return response()->json(['New_at created successfully', new ImagesProjectResource($imagesProject)]);
        } else {
            # Return error massage
            return response()->json($request->errors());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\images_project  $images_project
     * @return \Illuminate\Http\Response
     */
    public function show(images_project $images_project)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\images_project  $images_project
     * @return \Illuminate\Http\Response
     */
    public function edit(images_project $images_project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\images_project  $images_project
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, images_project $images_project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\images_project  $images_project
     * @return \Illuminate\Http\Response
     */
    public function destroy(images_project $images_project)
    {
        //
    }
}
