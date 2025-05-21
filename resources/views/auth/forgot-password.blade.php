<!-- resources/views/auth/forgot-password.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password | ObesityCheck</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Poppins', sans-serif;
        }
        
        body {
            background-color: #f7f9fc;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        
        .container {
            width: 100%;
            max-width: 450px;
            padding: 1rem;
        }
        
        .brand {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .brand a {
            color: #4CAF50;
            font-size: 32px;
            font-weight: 600;
            text-decoration: none;
        }
        
        .card {
            background: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 25px rgba(0, 0, 0, 0.05);
            padding: 2rem;
        }
        
        .card-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        
        .card-header h1 {
            color: #333;
            font-size: 22px;
            font-weight: 600;
        }
        
        .card-description {
            text-align: center;
            margin-bottom: 2rem;
            color: #666;
            font-size: 14px;
            line-height: 1.5;
        }
        
        .form-group {
            margin-bottom: 1.5rem;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 500;
            color: #555;
            font-size: 14px;
        }
        
        .form-control {
            width: 100%;
            padding: 0.75rem 1rem;
            border: 1px solid #e0e0e0;
            border-radius: 5px;
            font-size: 14px;
            background-color: #fafafa;
            transition: all 0.3s ease;
        }
        
        .form-control:focus {
            border-color: #4CAF50;
            background-color: #fff;
            outline: none;
            box-shadow: 0 0 0 3px rgba(76, 175, 80, 0.1);
        }
        
        .btn {
            display: block;
            width: 100%;
            padding: 0.75rem 1rem;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-primary {
            background-color: #4CAF50;
            color: white;
        }
        
        .btn-primary:hover {
            background-color: #3d9140;
        }
        
        .login-prompt {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 14px;
            color: #666;
        }
        
        .login-prompt a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .login-prompt a:hover {
            text-decoration: underline;
        }
        
        .alert {
            padding: 0.75rem 1rem;
            margin-bottom: 1.5rem;
            border-radius: 5px;
            font-size: 14px;
        }
        
        .alert-danger {
            background-color: #fee;
            color: #e53935;
            border-left: 4px solid #e53935;
        }
        
        .alert-success {
            background-color: #e8f5e9;
            color: #4CAF50;
            border-left: 4px solid #4CAF50;
        }
        
        .alert ul {
            margin-left: 1rem;
            margin-bottom: 0;
        }
        
        .invalid-feedback {
            color: #e53935;
            font-size: 12px;
            margin-top: 0.25rem;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="brand">
            <a href="{{ url('/') }}">ObesityCheck</a>
        </div>
        
        <div class="card">
            <div class="card-header">
                <h1>Reset Your Password</h1>
            </div>
            
            <div class="card-description">
                <p>Enter your email address, and we'll send you a link to reset your password.</p>
            </div>
            
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            
            <form action="{{ route('password.email') }}" method="POST">
                @csrf
                
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                
                <div class="form-group">
                    <label for="email">Email Address</label>
                    <input 
                        name="email" 
                        type="email" 
                        class="form-control" 
                        id="email" 
                        placeholder="Enter your registered email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <button type="submit" class="btn btn-primary">Send Password Reset Link</button>
                
                <div class="login-prompt">
                    <p>Remember your password? <a href="{{ route('login') }}">Back to Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>