<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use Mail;
use App\Mail\DemoMail;
  
class MailController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */
    public function index()
    {
        $mailData = [
            'title' => 'jihad Store',
            'body' => ''
        ];
         
        Mail::to('soukainaauargui@gmail.com')->send(new DemoMail($mailData));
           
        return redirect()->route('produits');
    }
}