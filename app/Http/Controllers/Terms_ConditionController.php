<?php

namespace App\Http\Controllers;

use App\Models\Terms_Condition;
use Illuminate\Http\Request;

class Terms_ConditionController extends Controller
{
    public function create()
    {
        return view('terms_conditions.create');
    }

    public function store(Request $request)
    {
        $data = $request->input('terms');

        foreach ($data as $item) {
            foreach ($item['questions'] as $question) {
                Terms_Condition::create([
                    'heading' => $item['heading'],
                    'question' => $question['question'],
                    'answer' => $question['answer']
                ]);
            }
        }

        return redirect()->back()->with('success', 'Terms & Conditions saved successfully.');
    }

    public function index()
    {
        $terms = Terms_Condition::all()->groupBy('heading');
        return view('terms_conditions.index', compact('terms'));
    }
}
