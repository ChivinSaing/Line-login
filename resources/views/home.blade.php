<!-- resources/views/home.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home - LINE Login</title>
    
    @vite('resources/css/app.css')


</head>
<body>
<h1>Welcome to Home Page</h1>

@if($user)
    <p class="text-red-500">Welcome, {{ $user->name }}!</p>
    <p>Email: {{ $user->email }}</p>
    <img src="{{ $user->avatar }}" alt="User Avatar">
@else
    <p class="text-6xl text-red-500">You are not logged in. Please log in with LINE.</p>
    <a href="/login/line">Log in with LINE</a>
@endif

<a href="/logout">Logout</a>
</body>
</html>
