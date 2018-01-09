<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>
    <form method="post" action="/registration">
        {!! csrf_field() !!}
        <input type="text" name="name" placeholder="Name"><br/>
        <input type="email" name="email" placeholder="Email"><br/>
        <input type="text" name="phone" placeholder="Phone"><br/>
        <button type="submit">Register</button>
    </form>
</body>
</html>
