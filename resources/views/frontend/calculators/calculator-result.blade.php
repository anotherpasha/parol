<!DOCTYPE html>
<html>
<head>
    <title>Result</title>
</head>
<body>
    <h3>Thank you for choosing {!! $package !!} package</h3>

    <p>Here is your detail</p>

    <p>Flexa : {!! $flexa !!}</p>
    @if ($flood > 0)
    <p>Flood : {!! $flood !!}</p>
    @endif
    @if ($eq > 0)
    <p>Earthquake : {!! $eq !!}</p>
    @endif
    <p><b>Your estimated premium per annum will be IDR {!! number_format($flexa + $flood + $eq, 0, ',', '.'); !!}</b></p>


</body>
</html>
