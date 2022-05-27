<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ApplicationController;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

Auth::routes();


Route::get('/', function () {
    return view('auth.login');
});

// Route::group(['middleware' => 'admin'] , function(){


Route::get('/index', function () {
    return view('admin.index');
});



    





    // Employee
    

    
    Route::get('employeelist',[EmployeeController::class,'index'])->middleware('auth');
    Route::get('employee-add',[EmployeeController::class,'add_index'])->middleware('auth');
    
    Route::get('/occupation-add', function () {
        return view('admin.occupation-add');
    });
    
    Route::Post('add-occupation',[EmployeeController::class,'store'])->middleware('auth'); 
    Route::Post('add-new-employee',[EmployeeController::class,'add'])->middleware('auth');
    Route::get('employee-edit/{id}',[EmployeeController::class,'edit'])->middleware('auth');
    Route::post('update-employee/{id}',[EmployeeController::class,'update'])->middleware('auth');
    
    // Application  
    
    
    Route::get('/applicationlistadd', function () {
        return view('admin.applicationlistadd');
    });
    
    
    
    
    Route::get('applicationlist',[ApplicationController::class,'index'])->middleware('auth');
    
    Route::get('applicationinlab/{id}',[ApplicationController::class,'edit_index'])->middleware('auth');
    
    Route::get('applicationinadmin/{id}',[ApplicationController::class,'action'])->middleware('auth');
    
    Route::get('applicationprintviwe/{id}',[ApplicationController::class,'view_index'])->middleware('auth');
    
    Route::get('applicationincashier/{id}',[ApplicationController::class,'cashier_view'])->middleware('auth');
    
    Route::post('application-action/{id}',[ApplicationController::class,'edit_action'])->middleware('auth');
    
    Route::post('edit-application/{id}',[ApplicationController::class,'edit'])->middleware('auth');
    
    Route::post('add-application',[ApplicationController::class,'create'])->middleware('auth');
    
    Route::post('update-p-status/{id}',[ApplicationController::class,'pstatus'])->middleware('auth');
    
    // Users
    
    Route::get('/user-profile', function () {
        return view('admin.user-profile');
    });
    Route::get('/user-profile-edit', function () {
        return view('admin.user-profile-edit');
    });
    
// });