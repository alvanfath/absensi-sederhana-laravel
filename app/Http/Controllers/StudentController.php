<?php

namespace App\Http\Controllers;

use App\Models\user;
use App\Models\rayon;
use App\Models\rombel;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $students = User::where('level', 'like', '%student%')->paginate(5);
    
        return view('admin.student.index',compact('students'))
            ->with('i', (request()->input('page', 1) - 1) * 5); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rayons = rayon::all(); 
        $rombels = rombel::all();
        return view('admin.student.create',compact('rayons','rombels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $image = $request->foto->getClientOriginalName();
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
            'level' => 'required',
            'email' => 'required',
            'password' => 'required',
        ]);
        $request['password'] = bcrypt($request['password']);
        $request->foto->storeAs('post-foto',$image);

        // User::create($request->all());
        User::create([
            'nis' => $request->nis,
            'name' => $request->name,
            'rombel' => $request->rombel,
            'rayon' => $request->rayon,
            'level' => $request->level,
            'email' => $request->email,
            'password' => $request->password,
            'foto' => $image
        ]);

        return redirect()->route('student.index')
                        ->with('succes','Berhasil menambah murid !');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function show(student $student)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit(User $student)
    {
        $rayons = rayon::all(); 
        $rombels = rombel::all();
        return view('admin.student.edit',compact('student', 'rayons', 'rombels'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $student)
    {
        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'rombel' => 'required',
            'rayon' => 'required',
        ]);
        $student->update($request->all());
        return redirect()->route('student.index')
                         ->with('succes','Berhasil Update');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $student)
    {
        $student->delete();
     
        return redirect()->route('student.index')
                        ->with('success','Berhasil Hapus !');
    }
}
