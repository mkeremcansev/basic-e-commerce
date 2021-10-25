<?php

namespace App\Http\Controllers\Back;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function detail($id)
    {
        $contact = Contact::findOrFail($id);
        return view('Back.detail.contact', compact('contact'));
    }
    public function delete($id)
    {
        Contact::findOrFail($id)->delete();
        toastr()->success(__('keywords.event-success'));
        return redirect()->route('Back.main');
    }
}
