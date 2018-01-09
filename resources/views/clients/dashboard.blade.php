<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div id="dashboard">
        <button @click="getUser">Get User</button>

        <pre>@{{ user }}</pre>
    </div>

    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>
</html>
