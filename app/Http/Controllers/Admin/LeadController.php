<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\NewContact;
use App\Models\Lead;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class LeadController extends Controller
{

    public function create()
    {
        return view('admin.leads.create');
    }

    public function store(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|max:255|email',
            'message' => 'required|min:10',
            'privacy_policy' => 'required',
        ]);

        $data = $request->all();

        // $lead = new Lead();
        // $lead->fill($data);
        // $lead->save();
        $lead = Lead::create($data);

        Mail::to('info@boolflix.com')->send(new NewContact($lead));

        return redirect()->route('admin.leads.create');
    }
}
