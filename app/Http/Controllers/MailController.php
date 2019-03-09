<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail; //Jangan lupa import Mail di paling atas

class MailController extends Controller
{
    public function index()
    {
    	return view('mail.index');
    }

	public function sendEmail(Request $request)
	{
 		$conn = @fsockopen("www.google.com", 80); //website, port  (try 80 or 443)
	    if ($conn){
	    	Mail::send('mail.email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
	        {
	            $message->subject($request->judul);
	            $message->from('aboutfebri24@gmail.com', 'Me-mail');
	            $message->to($request->email);
	        });
	        $is_conn = "Berhasil Kirim Email"; //action when connected
	    }else{
	        $is_conn = "Gagal Kirim Email"; //action in connection failure
	    }
	    return back()->with('alert-success', $is_conn);

	    // try{
	    //     Mail::send('mail.email', ['nama' => $request->nama, 'pesan' => $request->pesan], function ($message) use ($request)
	    //     {
	    //         $message->subject($request->judul);
	    //         $message->from('aboutfebri24@gmail.com', 'Me-mail');
	    //         $message->to($request->email);
	    //     });
	    //     return back()->with('alert-success','Berhasil Kirim Email');
	    // }
	    // catch (Exception $e){
	    //     return response (['status' => false,'errors' => $e->getMessage()]);
	    // }
	}
}
