<?php

namespace App\Http\Controllers;

use App\Category;
use App\Question;
use App\Service\CreateAnswers;
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

        $question = Question::create([
            'body' => $request->body,
            'score' => $request->score,
            'category_id' => $request->category_id,
            'image' => $imagePath
        ]);

        # Create Answers

        $answerCreator = new CreateAnswers();
        $answerCreator->handle($question->id, $request->answer_body,
            ($request->is_correct == null ? array() : $request->is_correct),
            $request->answer_images == null ? array() : $request->answer_images);



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

        return view('question.show', [
            'question' => $question
        ]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit(Question $question)
    {
        $answers = $question->answers;
        return view('question.edit', [
            'question' => $question,
            'answers' => $answers,
            'categories' => Category::all()
        ]);
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

        $data = $request->validate([
            'body' => 'required|string|min:4',
            'score' => 'required|integer|min:1',
            'category_id' => 'required|exists:categories,id',
        ]);

        $question->update([
            'body' => $request->body,
            'score' => $request->score,
            'category_id' => $request->category_id
        ]);



        $correctness = ($request->is_correct != null ? $request->is_correct : []);
        foreach($question->answers as $i=>$answer){
            $answer->update([
                'body' => $request->answer_body[$i],
                'is_correct' => in_array($i, $correctness)
            ]);
        }

        session()->flash('notify', 'Successfully updated question #' . $question->id );
        return redirect()->back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        $question->answers()->delete();
        $question->delete();


        session()->flash('notify', 'Deleted question #' . $question->id);

        return redirect()->back();

    }
}
