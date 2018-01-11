<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
</head>
<body>
    <h3>Hi {!! $name !!}, thank you for choosing {!! $package !!} package</h3>

    <p>Here is your detail</p>

    <p>Flexa : {!! $flexa !!}</p>
    @if ($flood > 0)
    <p>Flood : {!! $flood !!}</p>
    @endif
    @if ($eq > 0)
    <p>Earthquake : {!! $eq !!}</p>
    @endif
    <p><b>Total : {!! number_format($flexa + $flood + $eq, 0, ',', '.'); !!}</b></p>


</body>
</html>
