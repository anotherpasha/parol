<!DOCTYPE html>
<html>
<head>
    <title>Claim</title>
</head>
<body>
    <form method="post" action="/claim">
        {!! csrf_field() !!}
        <input type="text" name="policy_number" placeholder="Policy Number"><br/>
        <textarea name="description" cols="30" rows="4" placeholder="Enter your description"></textarea><br/>
        <input type="file" /><br/>
        <button type="submit">Claim</button>
    </form>
</body>
</html>
