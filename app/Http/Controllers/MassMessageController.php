<?php

namespace App\Http\Controllers;

use App\Models\MassMessage;
use Illuminate\Http\Request;

use App\Models\ChatRequest;
use App\Models\Template;
use Illuminate\Support\Facades\DB;
use App\Models\User;

use Illuminate\Support\Facades\Auth;


use Illuminate\Support\Facades\Storage;
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
    
    $templates = Template::get();
   
       
        $massMessage = new MassMessage();
        return view('mass-message.create', compact('massMessage','tags','templates'));
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
       
       $massMessage->title=$request->title;
       $massMessage->message_v1=$request->message_v1;
       $massMessage->message_v2=$request->message_v2;
       $massMessage->message_v3=$request->message_v3;
       $massMessage->message_v4=$request->message_v4;
       $massMessage->message_v5=$request->message_v5; 
       
       
       
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

         
        
        
         
       $massMessage->title=$request->title;
         
       $massMessage->message_v1=$request->message_v1;
       $massMessage->message_v2=$request->message_v2;
       $massMessage->message_v3=$request->message_v3;
       $massMessage->message_v4=$request->message_v4;
       $massMessage->message_v5=$request->message_v5; 
       
       
     
       
       
    $tags=array();
  $tags_array=json_decode($request->customer_tags);
 foreach ($tags_array as $tag_element) {
 	array_push($tags,$tag_element->value);
}

$customer_tags=implode(",",$tags);


       $massMessage->customer_tags=$customer_tags;
       
       
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
    /*
    function SendMessage(){
        
          $massMessage = MassMessage::find($id)->first();
        
        
        // user list
        $chats= $this->get_customer_list_by_tags($massMessage->customer_tags) ;
        
        // send message to each user 
        
           $seconds=60*60*24*1;
            
        $meta_app = Cache::remember('meta_app', $seconds, function () {
    return MetaApp::where("id",1)->first();
});

        
         $credential=[
    'from_phone_number_id' =>$meta_app->from_phone_number_id,
    'access_token' => $meta_app->access_token,
]; 




        foreach($chat_requests as $request){
            
            $random="message_v".rand(1,5);
            
            $message=$request->$random;
            $to =$request->from_number;
            
            // now send 
             
             
             send2WappV3($to,$message,$credential); 
        
            
            
            
            
        }
    }
  
     public function get_customer_list_by_tags()
    {
        
        

   
   
  
   $tags="tag1,tag2";
   $tag_array=explode(",",$tags);
   
   
         
           
           
           $query=" select * from chat_requests   where   ";
           
           
   $i=0;
   $query  .=" ( " ;
                foreach($tag_array as $tag)
                
                { 
                    if($i==0)
  $query=  $query . "  (  customer_tags like  '%".$tag."%' ) "  ;
  
  else
  {
      
      
  
  
  $query=  $query . " OR   (  customer_tags like  '%".$tag."%'  )"  ;
  
  }
  $i++;
  
                }
                
                
                 $query  .=" )  " ; 
            
             
            
             $chat_requests = DB::select($query);
 
        
        
      
    }
    
    
    
    
     
    */
    
    
    
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function add_image_in_mass_messages(MassMessage $massMessage)
    { 
    
   
        return view('mass-message.add_image',compact('massMessage') );
    }
    
    
    public function store_image_in_mass_messages(Request $request,MassMessage $massMessage)
    { 
    
    
      $image = $request->file('file');
         
         
      $imagefileName  = time().'__'.$image->getClientOriginalName();
      
      
   $image_storeas  = $image->storeAs('mass_message', $imagefileName, 'public');
    
$image_url = "https://api.vikkinbot.com/".Storage::url($image_storeas);

 
  $image_array=array();//json_decode($massMessage->images);
  
   
 	array_push($image_array,$image_url);
 
$massMessage->images=json_encode($image_array );
$massMessage->save();

 print_r($image_array);
 
 
        //return view('mass-message.add_image',compact('massMessage') );
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
