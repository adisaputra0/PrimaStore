<!-- resources/views/home.blade.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    @vite('resources/css/app.css')
</head>
<body>
    <h1 class=" text-red-500">Welcome to Home Page!</h1>
    <a href="{{ route('payment.index') }}" class="text-blue-500">Payment</a>
</body>
</html>
