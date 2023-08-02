<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreMetaAppRequest;
use App\Http\Requests\UpdateMetaAppRequest;
use App\Models\MetaApp;


use App\Models\Webhook;


use Response;
class MetaAppController extends Controller
{
    
      public function __construct()
    {
        $this->middleware('auth');
        
        $this->middleware(['role:Super Admin' ]);
    }
    
    
      
     
    public function webhook_report()
    {
        
        
    
 
  
      $webhook_reports = Webhook::orderBy('created_at',"desc")
               ->take(50)
               ->get();
               
               
               
    
  return view('webhook_report',compact('webhook_reports' ));
  
  
    }
      public function enable_disable_app(StoreMetaAppRequest $request)
    {
        
        $meta_app=MetaApp::where( 'id'  ,$request->id)->first();
        
        
        if($request->status==0) 
        $status="Disable";
        else 
        $status="Enable";
        
        
        $meta_app->status=$status;
        
        $meta_app->save();
        
       // MetaApp::find($request->id)->update(["status",$request->status]); 
        
       $meta_apps=MetaApp::all();
       
       
      
           return Response::json($meta_apps);
           
    }
    
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function delete_meta_app(StoreMetaAppRequest $request)
    {
        
   $meta_app=MetaApp::where( 'id'  ,$request->id)->where('delete_protected','Free')->first();
        
        
    
        $meta_app->delete();
        
       
        
       $meta_apps=MetaApp::all();
       
       
      
           return Response::json($meta_apps);
           
    }
    
    
    
    
    public function meta_apps_list()
    {
       $meta_apps=MetaApp::all();
       
       
      
           return Response::json($meta_apps);
           
    }

    
  
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreMetaAppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function create_meta_app(StoreMetaAppRequest $request)
    {
         $meta_app   =   MetaApp::create( 
                    ['name' =>$request->name,
                   'from_phone_number' =>$request->from_phone_number,
                   'from_phone_number_id' =>$request->from_phone_number_id,
                   'access_token' =>$request->access_token,
                   'status' => "Enable" ,
                       'delete_protected' =>$request->delete_protected ,
                   ]);
                   
                $ar=array();
        
        $ar['error']=false;
        $ar['id']=$meta_app->id;
        $ar['message']= "Task completed successfully";
                    
                         return Response::json($ar);   
                   
    }

    

 
 
}
