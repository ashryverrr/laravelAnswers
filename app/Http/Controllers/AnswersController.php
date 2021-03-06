<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Answer;
use App\Question;
use Auth;

class AnswersController extends Controller
{
    public function __construct()
    {
        $this-> middleware('auth');
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
            'content' => 'required|min:15',    
            'question_id' => 'required|integer'
        ]);
        // process
        $answer = new Answer();
        $answer->content = $request->content;
        $question = Question::findOrFail($request->question_id);
        $answer->user()->associate(Auth::user()->id);    
        $question->answers()->save($answer);    
        
        // redirect      
        return redirect()->route('questions.show', $question->id);
       
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
        $answer = Answer::findOrFail($id);

        if($answer->user->id != Auth::id()){
            return abort(403);
        }
        
        return view('answers.edit')->with('answer', $answer);
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
