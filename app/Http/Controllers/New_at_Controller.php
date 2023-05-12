<?php

namespace App\Http\Controllers;

use App\Http\Resources\New_at_Resource;
use App\Models\New_at;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class New_at_Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getNewAndActivities()
    {
        # fetch data
        //$new_ats = New_at::latest()->get();
        // return message and data
        //return response()->json(New_at_Resource::collection($new_ats));
        // return response()->json(['New_at fetch successfully', New_at_Resource::collection($new_ats)]);
        return New_at::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function createNewAndActivities(Request $request)
    {
        # Check validater
        $validater = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'videoName' => 'string|nullable',
            'videoLink' => 'string|nullable',
            'description' => 'string|nullable',
            'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg'
        ]);
        # If validater falls
        if ($validater->fails()) {
            //Return valideter error massage
            return response()->json($validater->errors());
        }

        # Uplode Image
        //if($request->hasFile('image')){
        $file = $request->file('image');
        $file_name = time() . $file->getClientOriginalName();
        $file->move(public_path('images/images-news-and-activities'), $file_name);

        # Created data
        $new_at = New_at::create([
            'title' => $request->title,
            'videoName' => $request->videoName,
            'videoLink' => $request->videoLink,
            'description' => $request->description,
            'image' => $file_name
        ]);

        # Return message and data
        return response()->json(['New_at created successfully', new New_at_Resource($new_at)]);
        // }else{
        //     return response()->json('Please include a Image.'->errors());
        // }
        // return response()->json(['New_at created successfully', new New_at_Resource($new_at)]);
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\New_at  $new_at
     * @return \Illuminate\Http\Response
     */
    public function getNewAndActivitiesDetail(New_at $id)
    {
        return response()->json($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\New_at  $new_at
     * @return \Illuminate\Http\Response
     */
    public function updateNewAndActivitiesDetail(Request $request, New_at $new_at, $id)
    {
        # Check validater
        $validater = Validator::make($request->all(), [
            'title' => 'required|string|max:255',
            'videoName' => 'string|nullable',
            'videoLink' => 'string|nullable',
            'description' => 'string|nullable',
            // 'image' => 'required|image|mimes:jpeg,jpg,png,gif,svg'
        ]);
        # If validater falls
        if ($validater->fails()) {
            # Return valideter error massage
            return response()->json($validater->errors());
        }

        # Uplode Image
        // $file = $request->file('image');
        // $file_name = time() . $file->getClientOriginalName();
        // $file->move(public_path('images/images-news-and-activities'), $file_name);

        # Set data
        $new_at = New_at::find($id);
        $new_at->title = $request->title;
        $new_at->videoName = $request->videoName;
        $new_at->videoLink = $request->videoLink;
        $new_at->description = $request->description;
        // $new_at->image = $file_name;
        # Update data
        $new_at->save();
        # Return message and data
        return response()->json(['New_at updated successfully', new New_at_Resource($new_at)]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\New_at  $new_at
     * @return \Illuminate\Http\Response
     */
    public function deleteNewAndActivitiesDetail(New_at $id)
    {
        # Delete data 
        $id->delete();
        # Return message 
        return response()->json('New_at delete successfully');
    }
}
