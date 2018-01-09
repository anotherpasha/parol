<!DOCTYPE html>
<html>
<head>
    <title>Earthquake - Result</title>
</head>
<body>
    <h3> Your earthquake result is {!! number_format(ceil($result), 0, ',', '.'); !!} </h3>
    <div><a href="{!! url('/calculators') !!}">Back</a></div>
</body>
</html>
