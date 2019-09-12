<?php

namespace App\Http\Controllers;

use App\Exam;
use Illuminate\Http\Request;

class ExamController extends Controller
{
    //

    public function index(){

        return view('exam.index',[
            'exams' => Exam::all()
        ]);
    }

    public function show(Exam $exam){
        return view('exam.show', [
            'exam' => $exam
        ]);
    }

    public function create(){

        return view('exam.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|min:3|max:100'
        ]);

        $exam = Exam::create($request->only(['name']));
        session()->flash('notify', 'Successfully created "' . $exam->name . '" exam. You can manage exam questions
         by visiting the edit page.');

        return redirect()->route('exam.index');
    }

    public function edit(Exam $exam){
        return view('exam.edit',[
            'exam' => $exam
        ]);
    }

    public function update(Request $request, Exam $exam){

        return redirect()->route('exam.index');

    }

    public function destroy(Exam $exam){
        $exam->delete();
        session()->flash('notify', 'Successfully deleted exam.');
        return redirect()->route('exam.index');
    }


}
