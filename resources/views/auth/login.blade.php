<!-- resources/views/auth/login.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | ObesityCheck</title>
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
        
        .form-options {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 1.5rem;
        }
        
        .checkbox-group {
            display: flex;
            align-items: center;
        }
        
        .checkbox-group input {
            margin-right: 0.5rem;
        }
        
        .checkbox-group label {
            font-size: 14px;
            color: #666;
        }
        
        .forgot-link {
            font-size: 14px;
            color: #666;
            text-decoration: none;
            transition: color 0.3s;
        }
        
        .forgot-link:hover {
            color: #4CAF50;
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
        
        .register-prompt {
            text-align: center;
            margin-top: 1.5rem;
            font-size: 14px;
            color: #666;
        }
        
        .register-prompt a {
            color: #4CAF50;
            text-decoration: none;
            font-weight: 500;
            transition: color 0.3s;
        }
        
        .register-prompt a:hover {
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
        
        .alert ul {
            margin-left: 1rem;
            margin-bottom: 0;
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
                <h1>Login to Your Account</h1>
            </div>
            
            <form action="{{ route('login.action') }}" method="POST">
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
                        placeholder="Enter your email"
                        value="{{ old('email') }}"
                        autocomplete="email"
                        required
                    >
                </div>
                
                <div class="form-group">
                    <label for="password">Password</label>
                    <input 
                        name="password" 
                        type="password" 
                        class="form-control" 
                        id="password" 
                        placeholder="Enter your password"
                        autocomplete="current-password"
                        required
                    >
                </div>
                
                <div class="form-options">
                    <div class="checkbox-group">
                        <input 
                            name="remember" 
                            type="checkbox" 
                            id="remember"
                        >
                        <label for="remember">Remember Me</label>
                    </div>
                    
                    <a href="{{ route('password.request') }}" class="forgot-link">Forgot Password?</a>
                </div>
                
                <button type="submit" class="btn btn-primary">Login</button>
                
                <div class="register-prompt">
                    <p>Don't have an account? <a href="{{ route('register') }}">Create one</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>