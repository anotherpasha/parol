<!DOCTYPE html>
<html>
<head>
    <title>Calculator</title>
</head>
<body>
    <div id="calculator">
        <form method="post" action="{!! url('/calculator') !!}">
            {!! csrf_field() !!}
            <!-- <div>
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
            <hr /> -->
            <div>
                Building Status: <br/>
                <select name="building_status" v-model="buildingStatus">
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
                    <option value="2">Dwelling / Landed House</option>
                </select><br/><br/>
            </div>

            <div v-if="type == 2">
                House detail: <br/>
                <select name="house_type">
                    <option value="6">2976 - Less than 4 stores, non- shophouse</option>
                    <option value="7">29761 - Kos-Kosan</option>
                    <option value="8">2977 - House floating on sea/ river shore</option>
                    <option value="9">2978 - Independent analytical laboratories</option>
                    <option value="4">2974 - Convention halls Or other multi purpose building</option>
                </select><br/><br/>

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
                <select name="package" v-if="buildingStatus == 1">
                    <option value="both">Both (Building + Contents)</option>
                    <option value="building">Building</option>
                    <option value="content">Contents</option>
                </select>
                <select name="package" v-if="buildingStatus == 2">
                    <option value="content">Contents</option>
                </select>
                <br/><br/>
            </div>

            <div>
                <span v-if="buildingStatus == 1">How much is your building value?</span>
                <span v-if="buildingStatus == 2">How much is your rented building value?</span> <br/>
                <input type="text" name="building_value" v-model="building_value"><br/><br/>
            </div>

            <div>
                How much is your content value? <br/>
                <input type="text" name="content_value"
                    v-model="content_value"
                    ref="content_value"
                    @blur="checkContentValue"><br/><br/>
            </div>

            <hr/>

            <p>The standard coverage covers the damage from Fire, Lightning, Explosion, Impact of Falling Aircraft, Smoke. Please select below options to add extended coverage.
            <!-- <ul>
                <li>RSMDCC - Riot, Strike, Malicious Damage & Civil Commotion</li>
                <li>DLV - Removal of Debris, Landslide/Landslip, Vehicle Impact</li>
                <li>Typhoon, storm, flood and water damage</li>
                <li>Earthquake – additional Policy applicable</li>
            </ul>
            Do you want to add additional package ?
            </p> -->

            <input type="checkbox" name="rsmdcc" value="1"> Riot, Strike, Malicious Damage & Civil Commotion<br/><br/>
            <input type="checkbox" name="dlv" value="1" v-model="earthquake"> Removal of Debris, Landslide/Landslip, Vehicle Impact<br/><br/>
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
