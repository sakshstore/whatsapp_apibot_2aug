<?php

namespace App\Http\Controllers;

use App\Models\MassMessage;
use Illuminate\Http\Request;

use App\Models\ChatRequest;


use App\Models\User;

use Illuminate\Support\Facades\Auth;


/**
 * Class MassMessageController
 * @package App\Http\Controllers
 */
class MassMessageController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware(['role:Super Admin' ]);
    }
    
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $massMessages = MassMessage::paginate();
        
        
      
        return view('mass-message.index', compact('massMessages'))
            ->with('i', (request()->input('page', 1) - 1) * $massMessages->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
    
    
    $tags=$this->get_customer_tag();
    
   
       
        $massMessage = new MassMessage();
        return view('mass-message.create', compact('massMessage','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(MassMessage::$rules);
        
        
       $user_id=Auth::user()->id;
       
       $massMessage = new MassMessage();
       
       $massMessage->message=$request->message;
       
       
       
    $tags=array();
  $tags_array=json_decode($request->customer_tags);
 foreach ($tags_array as $tag_element) {
 	array_push($tags,$tag_element->value);
}

$customer_tags=implode(",",$tags);



       
       $massMessage->customer_tags=$customer_tags;
       
       $massMessage->scheduled_at=$request->scheduled_at;
       
       $massMessage->user_id= $user_id;
       
       $massMessage->save();
       
         
        
        

        return redirect()->route('mass-messages.index')
            ->with('status', 'MassMessage created successfully.');
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $massMessage = MassMessage::find($id);
         
    $tags=$this->get_customer_tag();

        return view('mass-message.edit', compact('massMessage','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  MassMessage $massMessage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, MassMessage $massMessage)
    {
        request()->validate(MassMessage::$rules);

         
        
        
         
       $massMessage->message=$request->message;
       
       $massMessage->customer_tags=$request->customer_tags;
       
       $massMessage->scheduled_at=$request->scheduled_at;
       
    
       
       $massMessage->save();
       
       
       

        return redirect()->route('mass-messages.index')
            ->with('status', 'MassMessage updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $massMessage = MassMessage::find($id)->delete();

        return redirect()->route('mass-messages.index')
            ->with('status', 'MassMessage deleted successfully');
    }
    
    
    
    public function get_customer_tag()
    {
         $customer_tags=ChatRequest::select("customer_tags")->get();
    
    $tags=array();
    
        foreach(  $customer_tags as $customer_tag)
        {
      if(!is_null($customer_tag->customer_tags))
      {
        $customer_tag_array=explode(",",$customer_tag->customer_tags);
        
        foreach($customer_tag_array as $tag)
        {
            array_push($tags ,$tag);
            
        }
      }
        
        
        
        }
        
        return $tags;
        
    }
}
