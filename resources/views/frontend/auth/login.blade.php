@extends('frontend.layout')
@section('title', 'Login')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg mt-5">
                <div class="card-header text-center">
                    <h3>Login</h3>
                </div>
                <div class="card-body">
                    <form id="login-form">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" placeholder="Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" placeholder="Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </form>

                    <div id="error-message" class="mt-3 text-center text-danger" style="display: none;"></div>

                  
                    <div class="mt-3 text-center">
                        <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>

document.addEventListener("DOMContentLoaded", function () {
    sessionStorage.clear();
    localStorage.clear();
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();
       
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;

        fetch('/api/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'  
            },
            body: JSON.stringify({ email: email, password: password })  
        })
        .then(response => response.json())
        .then(data => {
            if (data.token) {
                sessionStorage.setItem('api_token', data.token);  
              
                window.location.href = '/';  
            } else {
                displayError('Invalid credentials');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            displayError('Login failed. Please try again.');
        });
    });

    function displayError(message) {
        const errorMessageDiv = document.getElementById('error-message');
        errorMessageDiv.textContent = message;
        errorMessageDiv.style.display = 'block';
    }
});
</script>
