<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
 

use App\Models\User;

use Illuminate\Support\Facades\Auth;

use Validator;


class AuthSystemController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAuthSystemRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAuthSystemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AuthSystem  $authSystem
     * @return \Illuminate\Http\Response
     */
    public function show(AuthSystem $authSystem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AuthSystem  $authSystem
     * @return \Illuminate\Http\Response
     */
    public function edit(AuthSystem $authSystem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAuthSystemRequest  $request
     * @param  \App\Models\AuthSystem  $authSystem
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAuthSystemRequest $request, AuthSystem $authSystem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AuthSystem  $authSystem
     * @return \Illuminate\Http\Response
     */
    public function destroy(AuthSystem $authSystem)
    {
        //
    }
    
    
        public function getMe(StoreUserRequest $request)

    {

       
    

   $user=Auth::User();
 
 
 
 

 $success=array();
         
        $success['user'] =   $user;

            
    $success['error']=false;
 

        return response()->json($success );
        

    }
    
    
    
    
        public function register(StoreUserRequest $request)

    {

        $validator = Validator::make($request->all(), [

            'name' => 'required',

            'email' => 'required|email',

            'password' => 'required',

            'c_password' => 'required|same:password',

        ]);

   

        if($validator->fails()){

            return $this->sendError('Validation Error.', $validator->errors());       

        }

   

        $input = $request->all();

        $input['password'] = bcrypt($input['password']);

        $user = User::create($input);

$success=array();
        $success['authToken'] =  $user->createToken('MyApp')->plainTextToken;

        $success['name'] =  $user->name;

//     $success['name'] =  $user->name;
       $success['refreshToken'] =  "";
         $success['expiresIn'] =  "";
         
         

        return response()->json($success );
        

    }

   
       public function login(StoreUserRequest $request)

    {

$success=array();


        if(Auth::attempt(['email' => $request->email, 'password' => $request->password])){ 

            $user = Auth::user(); 

            $success['token'] =  $user->createToken('MyApp')->plainTextToken; 

            $success['name'] =  $user->name;
   $success['authToken'] =  $user->createToken('MyApp')->plainTextToken;

        $success['name'] =  $user->name;

//     $success['name'] =  $user->name;
       $success['refreshToken'] =  "";
         $success['expiresIn'] =  "";
         
    $success['error']=false;
 return response()->json($success );

        } 

        else{ 

            $success['error']=true;
            
           
             return response()->json($success );
             
             

        } 

    }
   
}
