<!-- resources/views/auth/reset-password.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password | ObesityCheck</title>
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
        
        .form-row {
            display: flex;
            gap: 15px;
            margin-bottom: 1.5rem;
        }
        
        .form-row .form-group {
            flex: 1;
            margin-bottom: 0;
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
                <h1>Create New Password</h1>
            </div>
            
            <form action="{{ route('password.update') }}" method="POST">
                @csrf
                
                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">
                
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
                        value="{{ old('email', $request->email) }}"
                        autocomplete="email"
                        readonly
                    >
                    @error('email')
                        <span class="invalid-feedback">{{ $message }}</span>
                    @enderror
                </div>
                
                <div class="form-row">
                    <div class="form-group">
                        <label for="password">New Password</label>
                        <input 
                            name="password" 
                            type="password" 
                            class="form-control" 
                            id="password" 
                            placeholder="Enter new password"
                            autocomplete="new-password"
                            required
                        >
                        @error('password')
                            <span class="invalid-feedback">{{ $message }}</span>
                        @enderror
                    </div>
                    
                    <div class="form-group">
                        <label for="password_confirmation">Confirm Password</label>
                        <input 
                            name="password_confirmation" 
                            type="password" 
                            class="form-control" 
                            id="password_confirmation" 
                            placeholder="Confirm new password"
                            autocomplete="new-password"
                            required
                        >
                    </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Reset Password</button>
                
                <div class="login-prompt">
                    <p>Remember your password? <a href="{{ route('login') }}">Back to Login</a></p>
                </div>
            </form>
        </div>
    </div>
</body>
</html>