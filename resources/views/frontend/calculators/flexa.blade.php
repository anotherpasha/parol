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
            <br/>
            <label>Construction Class</label><br/>
            @foreach($classes as $class)
                <input type="radio" name="construction_class" value="{!! $class->id !!}" @if($class->id == 1) checked @endif />{!! $class->code !!} - {!! $class->description_id !!}<br/>
            @endforeach
            <br/>
            <label>Construction Type</label><br/>
            <select name="construction_type">
                @foreach($types as $type)
                <option value="{!! $type->id !!}">{!! $type->code !!} - {!! $type->description_en !!}</option>
                @endforeach
            </select><br/>
            <br/>
            <input type="checkbox" name="rsmdcc" value="1"> RSMDCC -Riot, Strike, Malicious Damage, Civil Commotion ?<br/>
            <input type="checkbox" name="dlv" value="1"> DLV - Removal of Debris, Landslide/Landslip, Vehicle Impact ?<br/>
            <br/>
            <button type="submit">Calculate</button>
        </div>
    </form>
</body>
</html>
