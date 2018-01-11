<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <div id="calculator">
        <form method="post" action="{!! url('/calculator') !!}">
            {!! csrf_field() !!}
            <div>
                Name : <br/>
                <input type="text" name="name" /><br/><br/>
            </div>
            <div>
                Phone Number: <br/>
                <input type="text" name="phone" /><br/><br/>
            </div>
            <div>
                How do you hear about us: <br/>
                <input type="text" name="how_do_you_hear" /><br/><br/>
            </div>
            <hr />
            <div>
                Building Status: <br/>
                <select name="building_status">
                    <option value="1">Own</option>
                    <option value="2">Rental</option>
                </select><br/><br/>
            </div>

            <div>
                Zipcode: <br/>
                <select name="zipcode">
                    @foreach($zipcodes as $zipcode)
                    <option value="{!! $zipcode->id !!}">{!! $zipcode->zipcode !!}</option>
                    @endforeach
                </select><br/><br/>
            </div>

            <div>
                Type: <br/>
                <select name="building_type" @change="changeType">
                    <option value="1">Apartment</option>
                    <option value="2">Landed House</option>
                </select><br/><br/>
            </div>

            <div v-if="type == 2">
                Wood element more than 20% / Your wall made of concrete or wood ?<br/>
                <select name="wood_element">
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select><br/><br/>
            </div>

            <div v-if="type == 1">
                Floor Number:<br/>
                <input type="text" name="floor" /><br/><br/>
            </div>

            <div>
                Do you have any surrounding buildings except residential purpose within 3m? <br/>
                <select name="surrounding_by_building">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select><br/><br/>
            </div>

            <div>
                Is there were ever been a fire or explosion on your property within the last 5 years?<br/>
                <select name="been_fire">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select><br/><br/>
            </div>

            <hr/>
            <div>
                Choose Package <br/>
                <select name="package" @change="changePackage">
                    <option value="both">Both (Building + Contents)</option>
                    <option value="building">Building</option>
                    <option value="content">Contents</option>
                </select><br/><br/>
            </div>

            <div v-if="package == 'both' || package == 'building'">
                How much is your building value? <br/>
                <input type="text" name="building_value"><br/><br/>
            </div>

            <div v-if="package == 'both' || package == 'content'">
                How much is your content value? <br/>
                <input type="text" name="content_value"><br/><br/>
            </div>

            <hr/>

            <p>Standard Building & Contents coverage, does not cover such as
            <ul>
                <li>Riot, Strike, Malicious Damage & Civil Commotion</li>
                <li>Typhoon, storm, flood and water damage</li>
                <li>Earthquake</li>
            </ul>
            Do you want to add additional package ?
            </p>

            <input type="checkbox" name="rsmdcc" value="1"> Riot, Strike, Malicious Damage & Civil Commotion<br/><br/>
            <input type="checkbox" name="flood" value="1"> Typhoon, storm, flood and water damage<br/><br/>
            <input type="checkbox" name="earthquake" value="1" v-model="earthquake"> Earthquake<br/><br/>
            <div v-if="earthquake">
                Construction Type<br/>
                <select name="eq_type">
                    @foreach($types as $type)
                    <option value="{!! $type->id !!}">{!! $type->name_en !!}</option>
                    @endforeach
                </select><br/><br/>
            </div>

            <hr/>

            <button type="submit">Calculate</button>

        </form>
    </div>
    <script src="{{ mix('js/calculator.js') }}"></script>
</body>
</html>
