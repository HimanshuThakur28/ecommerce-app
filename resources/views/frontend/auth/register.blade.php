@extends('frontend.layout')
@section('title', 'Register')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-lg mt-5">
                <div class="card-header text-center">
                    <h3>Register</h3>
                </div>
                <div class="card-body">
                    <form id="register-form">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" id="name" class="form-control" name="name" placeholder="Your Name" required>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" id="email" class="form-control" name="email" placeholder="Your Email" required>
                        </div>

                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" id="password" class="form-control" name="password" placeholder="Password" required>
                        </div>

                        <div class="form-group">
                            <label for="password_confirmation">Confirm Password</label>
                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Register</button>
                    </form>

                    <div id="error-message" class="mt-3 text-center text-danger" style="display: none;"></div>
                    <div id="success-message" class="mt-3 text-center text-success" style="display: none;"></div>

                    <div class="mt-3 text-center">
                        <p>Already have an account? <a href="{{ route('login') }}">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


<script>

document.addEventListener("DOMContentLoaded", function () {
    document.getElementById('register-form').addEventListener('submit', function(e) {
        e.preventDefault();

        var name = document.getElementById('name').value;
        var email = document.getElementById('email').value;
        var password = document.getElementById('password').value;
        var password_confirmation = document.getElementById('password_confirmation').value;

     
        const formData = {
            name: name,
            email: email,
            password: password,
            password_confirmation: password_confirmation
        };

        fetch('/api/register', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'  
            },
            body: JSON.stringify(formData)  
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
           
                document.getElementById('success-message').textContent = 'Registration successful! You can now log in.';
                document.getElementById('success-message').style.display = 'block';

               
                // window.location.href = '/login'; 
            } else {
                displayError(data.message || 'Registration failed. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            displayError('Registration failed. Please try again.');
        });
    });

    function displayError(message) {
        const errorMessageDiv = document.getElementById('error-message');
        errorMessageDiv.textContent = message;
        errorMessageDiv.style.display = 'block';
    }
});
</script>
