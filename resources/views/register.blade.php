@extends('layouts.master')

@section('title','Delivery Portal')

@section('content')
<section class="page_breadcrumb">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/">Home</a></li>
                                    
                                    <li class="breadcrumb-item active" aria-current="page">Sign Up</li>
                                </ol>
                            </nav>
                        </div>
                        
                    </div>
                </div>
            </section>
    </div>

        <section class="login border-top-1" style="margin-bottom: 30px;">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5 col-md-8 align-item-center">
                            <div class="border border">
                                <h3 class="p-4 text-center" style="color: white; background-color: #910118;">Sign Up Now</h3>
                                <form action="#">
                                    <fieldset class="p-4">
                                        <input type="text" placeholder="User Name*" class="border p-3 w-100 my-2">
                                        <input type="email" placeholder="Email*" class="border p-3 w-100 my-2">
                                        <input type="password" placeholder="Password*" class="border p-3 w-100 my-2">
                                        <input type="password" placeholder="Confirm Password*" class="border p-3 w-100 my-2">
                                        <div class="loggedin-forgot d-inline-flex my-3">
                                                <input type="checkbox" id="registering" class="mt-1">
                                                <label for="registering" class="px-2">By registering, you accept our <a class="text-primary font-weight-bold" href="terms-condition.html">Terms & Conditions</a></label>
                                        </div>
                                        <button type="submit" class="d-block py-3 px-4 text-white border-0 rounded font-weight-bold align-item-center" style="background-color: #910118;margin-left: 120px;">Sign Up
                                    </fieldset>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        </section>
@endsection