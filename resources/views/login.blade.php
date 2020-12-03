@extends('layouts.master')

@section('title', 'Delivery Protal')

@section('content')
<section class="page_breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>

                        <li class="breadcrumb-item active" aria-current="page">Login</li>
                    </ol>
                </nav>
            </div>

        </div>
    </div>
</section>
</div>
<section class="login border-top-1 " style="margin-bottom: 30px;">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-8 align-item-center">
                <div class="border">
                    <h2 class="p-4" style="color:white; background-color: #910118; text-align: center;">Login Now</h2>
                    <form action="#">
                        <fieldset class="p-4">
                            <input type="text" placeholder="Enter Username!" class="border p-3 w-100 my-2">
                            <input type="password" placeholder="Enter Password" class="border p-3 w-100 my-2">
                            <div class="loggedin-forgot">
                                <input type="checkbox" id="keep-me-logged-in">
                                <label for="keep-me-logged-in" class="pt-3 pb-2">Keep me logged in</label>
                            </div>
                            <div>
                                <button type="submit" class="d-block py-3 px-5 text-white border-0 rounded font-weight-bold mt-3 pl-2 pr-2" style="background-color: #910118; text-align: center;margin-left: 100px; margin-right: 100px;">Login</button>
                            </div>
                            <div class="row">
                                <a class="mt-3 d-block  text-primary" style="margin-left: 15px;" href="#">Forget Password?</a> &nbsp; &nbsp;&nbsp;
                                <a class="mt-3 d-block text-primary" style="margin-right: 15px;" href="register">Sign Up</a>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection