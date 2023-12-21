<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    //Membuat fitur Register

    public function register(Request $request) {

    #Menangkap inputan
    
    $input = [
    
    'name' => $request->name,    
    'email' => $request->email,    
    'password' => Hash::make($request->password)   
    ];
    
    #Menginsert data ke table user 
    $user = User::create($input);
    
    $data = [   
    'message' => 'User is created successfully'
    ];
    
    #Mengirim 'response JSON 
    return response()->json($data, 200);

   
    
     }
     public function login(Request $request) {

        #Menangkap input user
        
        $input = [
        
        'email' => $request->email,
        'password' => $request->password
        
        ];
        
        #Mengambil data user (DB) 
        
        $user = User::where('email', $input['email'])->first();
        
        #Membandingkan input user dengan data user (DB)
        
        $isLoginSuccessfully = ( $input['email'] == $user->email 
        &&  
        Hash::check($input['password'], $user->password) );
        
        if ($isLoginSuccessfully) {
        
        #Membuat token
        
        $token = $user->createToken('auth_token');
        
        $data = [
            'message' => 'Login successfully',   
            'token! => $token->plainTextToken
        
        ];
            
            'message' => 'Login successfully',  
            'token! => $token->plainTextToken
        
        ];
        
        Mengembalikan response JSON 
        
        return response()->json($data, 200);
        
        } else {
        
        $data = [
            'message' => 'Username or Password is wrong'
        ]; 
        
        return response()->json($data, 401); }
    
}
