<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Service\ImageUploader;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $questions = null;
        if($request->has('category')){
            $questions = Question::where('category_id', $request->category)->get();
        }else{
            $questions = Question::all();
        }


        return view('question.index', [
            'questions' => $questions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $categories = Category::all();

        return view('question.create', [
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'body' => 'required|string|min:4',
            'score' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
            'image' => 'image'
        ]);

        $imagePath = null;
        if($request->has('image')){
            $uploader = new ImageUploader();
            $image = $uploader->upload($request->image);
            $imagePath = $image->getPathname();
        }


        Question::create([
            'body' => $request->body,
            'score' => $request->score,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        return redirect()->route('question.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Question $question)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        //
    }
}
