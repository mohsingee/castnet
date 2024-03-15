<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function feedback(Request $request){
        $validatedData = $request->validate([
            'radioNumber' => 'required|integer',
            'selected_option' => 'required|string',
            'flexRadioDefault' => 'required|string',
            'feedback' => 'nullable|string',
            'flexRadioDefault1' => 'required|string',
        ]);

        $mappedData = [
            'ratting' => $validatedData['radioNumber'],
            'purpose' => $validatedData['selected_option'],
            'primary_purpose' => $validatedData['flexRadioDefault'],
            'feedback' => $validatedData['feedback'],
            'clarification' => $validatedData['flexRadioDefault1'],
        ];

        Feedback::create($mappedData);

        return redirect()->route('web.index')->with('success', 'Feedback submitted successfully!');
    }
}
