<?php

namespace App\Http\Controllers\clients;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index(){
        return view('clients.contact');
    }

    public function contactPost(Request $req){
        $req->validate([
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'description' => 'nullable'
        ]);

        
        if($contact = Contact::create([
            'name' => $req->name,
            'email' => $req->email,
            'phone' => $req->phone,
            'description' => $req->description,
            'status' => 0
        ])){
            $data = [
                'name' => $req->name,
                'email' => $req->email,
                'phone' => $req->phone,
                'description' => $req->description,
            ];
            Mail::send('clients.mailContact', compact('contact'), function ($email) use ($contact){
                $email->subject('Test - Phản Hồi Liên Hệ');
                $email->to($contact->email);
            });
        }
        return redirect()->route('contact')->with('success', 'Liên hệ thành công, hãy check maill quý khách có trải nghiệm tốt nhất');
    }
}
