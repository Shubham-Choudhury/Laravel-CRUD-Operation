<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = DB::table('students')->get();
        $data = compact('students');
        return view('index', $data);
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
            'email' => 'required|email',
            'city' => 'required',
        ]);

        DB::table('students')->insert([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'city' => $request->city,
        ]);

        return redirect()->route('index')->with('success', 'Student added successfully.');

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        if($student){
            $data = compact('student');
            return view('show', $data);
        }else{
            return redirect()->route('index')->with('error', 'Student not found.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = DB::table('students')->where('id', $id)->first();
        if($student){
            $data = compact('student');
            return view('edit', $data);
        }else{
            return redirect()->route('index')->with('error', 'Student not found.');
        }
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
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'city' => 'required',
        ]);

        if(DB::table('students')->where('id', $id)->first()){
            DB::table('students')->where('id', $id)->update([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'city' => $request->city,
            ]);
            return redirect()->route('index')->with('update', 'Student updated successfully.');
        }else{
            return redirect()->route('index')->with('error', 'Student not found.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $student = DB::table('students')->where('id', $id)->first();

        if(!is_null($student)){
            DB::table('students')->where('id', $id)->delete();
            return redirect()->route('index')->with('delete', 'Student deleted successfully.');
        }else{
            return redirect()->route('index')->with('error', 'Student not found.');
        }

        // if(DB::table('students')->where('id', $id)->first()){
        //     DB::table('students')->where('id', $id)->delete();
        //     return redirect()->route('index')->with('delete', 'Student deleted successfully.');
        // }else{
        //     return redirect()->route('index')->with('error', 'Student not found.');
        // }
    }
}
