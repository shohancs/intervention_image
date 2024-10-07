<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Student;
use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

use Image;
use File;

class StudentPagesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $readStudents = Student::orderby('name', 'asc')->where('status', 1)->get();
        return view('backend.student.manage', compact('readStudents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('backend.student.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $addStudent = new Student;

        $addStudent->name        = $request->name;
        $addStudent->status      = $request->status;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $img = time() . '-student.' . $image->getClientOriginalExtension();
            $location = public_path('uploads/students/' . $img);

            $manager = new ImageManager(new Driver());
            $manager->read($image)->save($location);

            $addStudent->image = $img;
        }

        $addStudent->save();

        return redirect()->route('student.manage');
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $editStudent = Student::find($id);

        if ( !is_null($editStudent) ) {
            return view('backend.student.edit', compact('editStudent'));
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $updateStudent = Student::find($id);

        if ( !is_null($updateStudent) ) {
            $updateStudent->name        = $request->name;
            $updateStudent->status      = $request->status;

            if ($request->hasFile('image')) {

                if ( File::exists('uploads/students/' . $updateStudent->image  ) ) {
                    File::delete('uploads/students/' . $updateStudent->image);
                }

                $image = $request->file('image');
                $img = time() . '-student.' . $image->getClientOriginalExtension();
                $location = public_path('uploads/students/' . $img);

                $manager = new ImageManager(new Driver());
                $manager->read($image)->save($location);

                $updateStudent->image = $img;
            }

            $updateStudent->save();
            return redirect()->route('student.manage');
        }
    }

    /**
     * Remove the Trash specified resource from storage.
     */
    public function trash(string $id)
    {
        $trash = Student::find($id);

        if ( !is_null($trash) ) {

            $trash->status=0;
            $trash->save();            
            return redirect()->route('student.manage');
        }
    }


    /**
     * Display the Trash Manage specified resource.
     */
    public function trashManage()
    {
        $readStudents = Student::orderby('name', 'asc')->where('status', 0)->get();
        return view('backend.student.trash', compact('readStudents'));
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $delete = Student::find($id);

        if ( !is_null($delete) ) {

            $delete->delete();           
            return redirect()->route('student.trashManage');
        }
    }
}
