@extends('layouts.master')
@section('title', 'Help')

@endsection

@section('custom-css')
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="css/reset.css"> <!-- CSS reset -->
    <link rel="stylesheet" href="css/help.css"> <!-- Resource style -->
    <script src="{{ load_asset('js/modernizr.js') }}"></script> <!-- Modernizr -->
@endsection

@section('content')
    <header>
    <h1><a href="/">Pibbble</a> | Help Center </h1>
</header>
<section class="cd-faq">
    <ul class="cd-faq-categories">
        <li><a class="selected" href="#basics">Basics</a></li>
        <li><a href="#mobile">Mobile</a></li>
        <li><a href="#account">Account</a></li>
        <li><a href="#delivery">Miscellaneous</a></li>
    </ul> <!-- cd-faq-categories -->

    <div class="cd-faq-items">
        <ul id="basics" class="cd-faq-group">
            <li class="cd-faq-title"><h2>Basics</h2></li>
            <li>
                <a class="cd-faq-trigger" href="#0">How do I change my password?</a>
                <div class="cd-faq-content">
                    <p>Changing your password on Pibbble is quiet easy! You can simply do that by signing in into your account and making the necessary change in your profile page. Click on the account settings and select the change password menu.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">How do I sign up?</a>
                <div class="cd-faq-content">
                    <p>Signing up on Pibbble is very easy. Simply click  <a href="/">Pibbble</a> which takes you to the Homepage. Click on Signup button to fill few fields for quick registration. Also, you can register using your existing social media account on Github, Google or LinkedIn.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">Can I remove a post?</a>
                <div class="cd-faq-content">
                    <p>Only posts created by you can be deleted, ditto to comments posted by you. You can only vote a post depending on your desire.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">How do reviews work?</a>
                <div class="cd-faq-content">
                    <p>You are only allowed to like , share, or comment a shot of any side project you view on Pibbble as a registered user. But as a guest user , you can only view shots. Wouldn't you rather <a href="/auth/register">Signup</a> now?</p>
                </div> <!-- cd-faq-content -->
            </li>
        </ul> <!-- cd-faq-group -->

        <ul id="mobile" class="cd-faq-group">
            <li class="cd-faq-title"><h2>Mobile</h2></li>
            <li>
                <a class="cd-faq-trigger" href="#0">How do I upload files from my phone or tablet?</a>
                <div class="cd-faq-content">
                    <p>While Pibbble is yet to have a mobile app, it can be accessible on several devices as it is very responsive. It works pretty fine just like on a desktop system.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">What devices and browsers does it support?</a>
                <div class="cd-faq-content">
                    <p>Pibbble supports the latest versions of Safari (OS X and iOS), Chrome, Firefox, Edge and Internet Explorer. Internet Explorer 9-11 are also supported. Opera Mini and Android's native Browser are not officially supported.</p>
                </div> <!-- cd-faq-content -->
            </li>
        </ul> <!-- cd-faq-group -->

        <ul id="account" class="cd-faq-group">
            <li class="cd-faq-title"><h2>Account</h2></li>
            <li>
                <a class="cd-faq-trigger" href="#0">Can I have a username that is already taken?</a>
                <div class="cd-faq-content">
                    <p>Perhaps. Inactive Pibbble accounts may be renamed or removed at our discretion. We will not rename or remove an active account except in the case of name squatting, which is prohibited. You can request a username for an account that appears inactive, but please note that not all activity on Pibbble is publicly visible.

                    Pibbble usernames are provided on a first-come, first-served basis, and are intended for immediate and active use. Usernames may not be inactively held for future use.

                    Attempts to buy, sell, or solicit other forms of payment in exchange for Pibbble accounts or usernames are prohibited and may result in account suspension or removal.</p>
                </div> <!-- cd-faq-content -->
            </li>
            <li>
                <a class="cd-faq-trigger" href="#0">How do I delete my account?</a>
                <div class="cd-faq-content">
                    <p>You can deactivate your user account in your profile settings.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">How do I change my account settings?</a>
                <div class="cd-faq-content">
                    <p>A user can make changes to their account while on the dashboard or in the profile settings.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">I forgot my password. How do I reset it?</a>
                <div class="cd-faq-content">
                    <p>Simply click on the <a href="/password/email">Forgot password</a> link. Input your user email to reset your password through a link which will be sent to your email.</p>
                </div> <!-- cd-faq-content -->
            </li>
        </ul> <!-- cd-faq-group -->

        <ul id="delivery" class="cd-faq-group">
            <li class="cd-faq-title"><h2>Miscellaneous</h2></li>
            <li>
                <a class="cd-faq-trigger" href="#0">How do I upload my work?</a>
                <div class="cd-faq-content">
                    <p>Anyone can sign up to find, follow or hire designers at Pibbble. However, to upload shots or leave comments, an invitation from a member is required. Invited (drafted) members are called Players. If you wish to be drafted, be sure to check the box marking yourself as a Prospect in your account settings.</p>
                </div> <!-- cd-faq-content -->
            </li>

            <li>
                <a class="cd-faq-trigger" href="#0">How can I leave comments on shots?</a>
                <div class="cd-faq-content">
                    <p>Comments can be left on shots using the form at the bottom of each shot page. Currently, only Players are able to leave comments.</p>

                    <p>Comments can include some HTML tags for formatting and links, and you can mention other Pibbblers if you want them to know you’re talking about them.</p>
                </div> <!-- cd-faq-content -->
            </li>
        </ul> <!-- cd-faq-group -->
    </div> <!-- cd-faq-items -->
    <a href="#0" class="cd-close-panel">Close</a>
</section> <!-- cd-faq -->
<script src="{{ load_asset('js/jquery-2.1.1.js') }}"></script>
<script src="{{ load_asset('js/jquery.mobile.custom.min.js') }}"></script>
<script src="{{ load_asset('js/main.js') }}"></script> <!-- Resource jQuery -->
@endsection