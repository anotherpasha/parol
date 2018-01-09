<!DOCTYPE html>
<html>
<head>
    <title>Earthquake Calculator</title>
</head>
<body>
    <form method="post" action="{!! url('/calculator/earthquake') !!}">
        {!! csrf_field() !!}
        <div>
            <label>TSI</label><br/>
            <input type="text" name="tsi" /><br/>
            <br/>
            <label>Construction Type</label><br/>
            <select name="construction_type">
                @foreach($types as $type)
                <option value="{!! $type->id !!}">{!! $type->name_en !!}</option>
                @endforeach
            </select><br/>
            <br/>
            <label>Zipcode</label><br/>
            <select name="zipcode">
                @foreach($zipcodes as $zipcode)
                <option value="{!! $zipcode->id !!}">{!! $zipcode->zipcode !!}</option>
                @endforeach
            </select><br/>
            <br/>
            <button type="submit">Calculate</button>
        </div>
    </form>
</body>
</html>
