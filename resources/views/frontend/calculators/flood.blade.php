<!DOCTYPE html>
<html>
<head>
    <title>Flood Calculator</title>
</head>
<body>
    <form method="post" action="{!! url('/calculator/flood') !!}">
        {!! csrf_field() !!}
        <div>
            <label>TSI</label><br/>
            <input type="text" name="tsi" /><br/>
            <label>Zipcode</label><br/>
            <select name="zipcode">
                @foreach($zipcodes as $zipcode)
                <option value="{!! $zipcode->id !!}">{!! $zipcode->description !!}</option>
                @endforeach
            </select><br/>
            <button type="submit">Calculate</button>
        </div>
    </form>
</body>
</html>
