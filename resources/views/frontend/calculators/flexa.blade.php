<!DOCTYPE html>
<html>
<head>
    <title>Flexa Calculator</title>
</head>
<body>
    <form method="post" action="{!! url('/calculator/flexa') !!}">
        {!! csrf_field() !!}
        <div>
            <label>TSI</label><br/>
            <input type="text" name="tsi" /><br/>
            <label>Construction Class</label><br/>
            <select name="construction_class">
                @foreach($classes as $class)
                <option value="{!! $class->id !!}">{!! $class->code !!} - {!! $class->description_id !!}</option>
                @endforeach
            </select><br/>
            <label>Construction Type</label><br/>
            <select name="construction_type">
                @foreach($types as $type)
                <option value="{!! $type->id !!}">{!! $type->code !!} - {!! $type->description_en !!}</option>
                @endforeach
            </select><br/>
            <input type="checkbox" name="rsmdcc" value="1"> RSMDCC -Riot, Strike, Malicious Damage, Civil Commotion ?<br/>
            <input type="checkbox" name="dlv" value="1"> DLV - Removal of Debris, Landslide/Landslip, Vehicle Impact ?<br/>
            <button type="submit">Calculate</button>
        </div>
    </form>
</body>
</html>
