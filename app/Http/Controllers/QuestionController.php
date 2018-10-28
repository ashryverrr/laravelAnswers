<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Question;
use Auth;

class QuestionController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // go to model and get groups
        $questions = Question::orderBy('id', 'desc')->paginate(10);
        // returm the view
        return view('questions.index')->with('questions', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('questions.create');    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);
        // process
        $question = new Question();
        $question->title = $request->title;
        $question->description = $request->description;
        // $question->user_id = $request->;
        $question->user()->associate(Auth::user()->id);
        
        // redirect
        if($question->save()){
            return redirect()->route('questions.show', $question->id)->with('success', 'Successfully posted your question!');
        } else {
            return redirect()->route('questions.create');
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // Use the model to get record from DB
        $question = Question::findOrFail($id);
        
        // show the view and pass the record to the view
        return view('questions.show')->with('question', $question);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $question = Question::findOrFail($id);

        if($question->user->id != Auth::id()){
            return abort(403);
        }
        
        return view('questions.edit')->with('question', $question);
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
        //
        $question = Question::findOrFail($id);

        if($question->user->id != Auth::id()){
            return abort(403);
        }

        // validate
        $this->validate($request, [
            'title' => 'required|max:255',
            'description' => 'required'
        ]);

        //process the data

        //find the existing post
        $question = Question::find($id);       
        //get the items
        $question->title = $request->title;
        $question->description = $request->description;        
        
        
        // redirect
        if($question->save()){
            return redirect()->route('questions.show', $question->id)->with('success', 'Successfully updated your question!');
        } else {
            return redirect()->route('questions.update', $question->id)->with('fail', 'Successfully updated your question!');
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
        //
    }
}
