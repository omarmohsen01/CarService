@extends('layouts.front')
@section('content')
<header>
    <a href="/" class="home-button">BoardMe</a>
</header>
<style>
    @import url("https://fonts.googleapis.com/css?family=Catamaran");

* { box-sizing: border-box; }

:root {
    --primary: rgb(52, 87, 220);
    --secondary: rgb(255, 255, 255);
}

body {
    font-family: "Catamaran", sans-serif;
    margin: 0;
    margin-top: 110px
}

/* Header */
header {
    position: absolute;
    top: 0.5em;
    left: 1em;
    z-index: 1;
}
.home-button {
    color: var(--primary);
    font-weight: bold;
    text-decoration: none;
    transition: color 0.15s;
}
.signup-open .home-button {
    color: var(--secondary);
}

/* Form styling */
.login-section {
    position: relative;
    min-height: 100vh;
}

.login-section button {
    width: 100%;
    background-color: #dc1515;
    color: var(--secondary);
    border-radius: 5px;
    border: none;
    padding: 1.3em 6em;
    text-transform: uppercase;
    cursor: pointer;
}

.login-section input {
    margin-bottom: 1.5em;
    width: 100%;
    padding: 0.5em;
}
.login-section .checkbox input {
    width: auto;
}

.login-section label:not(.checkbox) {
    font-weight: bold;
}

/* Left and right section styling */
.login-container,
.signup-container {
    padding: 0.5em;
}

h3,
.explanatory-text {
    text-align: center;
}

.login-section > section {
    width: 50%;
    position: absolute;
    top: 0;
    left: 0;
    padding: 2em 1em 0 2em;
}

.signup-container.signup-container {
    left: 50%;
    padding: 2em 2em 0 1em;
}

form > *:not(.checkbox) {
    display: block;
}

.forgot-link {
    float: right;
}

.name-container.name-container {
    display: flex;
    flex-direction: row;
}
.name-container > div {
    width: 50%;
}
.name-container input {
    max-width: 100%;
}

/* Overlay styling */
.switcher-overlay.switcher-overlay {
    color: var(--secondary);
    text-align: center;

    position: absolute;
    top: 0;
    left: 0;
    transition: transform 0.2s;
    height: 100%;
    width: 50%;
    padding: 0 5em 0 1em;
    overflow: hidden;
}

.switcher-overlay svg {
    width: 100%;
    height: 100%;
    fill: white;
    position: absolute;
    left: 0;
    top: 0;
}

.switcher-overlay > div {
    position: relative;
    top: 45%;
    transform: translateY(-50%);
}

.switcher-overlay button {
    width: auto;
    border: 1px solid var(--secondary);
}

.login-open .switcher-overlay  {
    transform: translateX(100%);
    padding: 0 1em 0 5em;
}
.login-open .switcher-overlay path {
    d: path('M 0,0 L 100,0 L 100,100 L 20,100 z');
}
.login-open .login-text,
.signup-open .signup-text {
    display: none;
}

/* Handle small screens */
@media (max-width: 623px) {
    .login-section.login-section > section {
        width: 100%;
        position: static;
    }

    .switcher-overlay.switcher-overlay {
        height: auto !important;
        position: static;
        color: black;
        transform: none;
        padding: 0 1em;
    }

    .switcher-overlay > div {
        transform: none;
    }

    .switcher-overlay svg {
        display: none;
    }

    .signup-open .home-button {
        color: var(--primary);
    }
}

/* Little animation for the diagonal line */
@keyframes bounceRight {
    0%, 100% { transform: translateX(0%); }
    30% { transform: translateX(5px); }
}
@keyframes bounceLeft {
    0%, 100% { transform: translateX(0%); }
    30% { transform: translateX(-5px); }
}
</style>
<section class="login-section">
    <section class="login-container">
        <h3>Login to Your Account</h3>
        <p class="explanatory-text">Log in to your account so you can continue.</p>


        <form method="POST" action="{{ route('login.store') }}" >
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @csrf
            <label for="login-email">Email</label>
            <input name="email" type="email" id="login-email" size="30" placeholder="Enter your email address" required>

            <label for="login-password">Password</label>
            <input name="password" type="password" id="login-password" size="30" placeholder="Enter your password" required>

            {{-- <label class="checkbox"><input type="checkbox" name="save" value="" />Remember me</label> --}}

            {{-- <a href="/forgot-password" class="forgot-link">Forgot password</a> --}}

            <button id="login-submit" value="" type="submit">Log in</button>
        </form>
    </section><!--

 --><section class="signup-container">
        <h3>Sign Up for an Account</h3>
        <p class="explanatory-text">Let's get you all set up so you can start .</p>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form method="POST" action="{{ route('register.store') }}">
            @csrf
            <div class="name-container">
                <div>
                    <label for="first-name">First name</label>
                    <input name="first_name" type="text" id="first-name" size="30" placeholder="Your first name" required>
                </div>

                <div>
                    <label for="last-name">Last name</label>
                    <input name="last_name" type="text" id="last-name" size="30" placeholder="Your last name" required>
                </div>
            </div>

            <label for="signup-email">Email</label>
            <input name="email" type="email" id="singup-email" size="30" placeholder="Enter your email address" required>
            <div class="name-container">
                <div>
                    <label for="phone">Phone</label>
                    <input name="phone" type="number" id="singup-email" size="30" placeholder="Enter your Phone Number" required>
                </div>
                <div>
                    <label for="brnad" style="margin-right: 800px">brand</label>
                    <select name="brand_id">
                        <option value="">Select Your Car Brand</option>
                        @foreach ($brands as $brand)
                            <option value="{{ $brand->id }}">{{ $brand->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <label for="signup-password">Password</label>
            <input name="password" type="password" id="signup-password" size="30" placeholder="Enter a strong password" required>


            <button id="signup-submit" value="" type="submit">Sign up</button>
        </form>
    </section>

    <section class="switcher-overlay">
        <svg viewBox="0 0 100 100" preserveAspectRatio="none">
            <path d="M 0,0 L 100,0 L 80,100 L 0,100 z"></path>
        </svg>
        <div class="signup-text">
            <h3>Don't have an account yet?</h3>
            <p class="explanatory-text">Let's get you all set up so you can start creating your first onboarding experience.</p>
            <button class="switch">Sign up</button>
        </div>

        <div class="login-text">
            <h3>Already signed up?</h3>
            <p class="explanatory-text">Log in to your account so you can continue building and editing your onboarding flows.</p>
            <button class="switch">Log in</button>
        </div>
    </section>

</section>
<script>
    // Switch layouts
var signup = document.querySelector(".signup-container"),
    login = document.querySelector(".login-container");
function toggleScreen() {
    document.body.classList.toggle("login-open");
    document.body.classList.toggle("signup-open");

    if(document.body.classList.contains("login-open")) {
        fadeIn(login);
        fadeOut(signup);
    } else {
        fadeIn(signup);
        fadeOut(login);
    }
}

// Subtle SVG line animation
var svg = document.querySelector(".switcher-overlay svg")
function sublteMoveSVG(right) {
    if(right) {
        svg.style.animation = "bounceRight 0.15s";
    } else {
        svg.style.animation = "bounceLeft 0.15s";
    }
}

// Fade out for sections
function fadeOut(elem) {
    (elem.style.opacity -= .1) < 0 ?
        elem.style.display = "none"
        : requestAnimationFrame(function() { fadeOut(elem); });
}
function fadeIn(elem) {
    elem.style.opacity = 1;
    elem.style.display = "block";
}

// Size our overlay (necessary for some edge cases)
var overlay = document.querySelector(".switcher-overlay");
function sizeOverlay() {
    overlay.style.height = Math.max(window.innerHeight, signup.clientHeight) + "px";
}

// Apply our animations and listeners
document.querySelector(".switcher-overlay").addEventListener("transitionend", function() {
    if(document.body.classList.contains("login-open")) {
        sublteMoveSVG(true);
    } else {
        sublteMoveSVG(false);
    }
});
document.querySelectorAll(".switch").forEach(btn => {
    btn.addEventListener("click", toggleScreen);
});
document.body.classList.add("login-open");
toggleScreen();

window.addEventListener("resize", sizeOverlay);
sizeOverlay();
</script>
@endsection
