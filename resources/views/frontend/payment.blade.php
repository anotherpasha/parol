<!DOCTYPE html>
<html>
<head>
    <title>Payment Page</title>
</head>
<body>
    <form method="post" action="/payment">
        {!! csrf_field() !!}
        <input type="text" name="policy_number" placeholder="Policy Number" /><br/>
        <button type="submit">Get Billing Detail</button>
    </form>
</body>
</html>
