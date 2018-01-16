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
                Status kepemilikan: <br/>
                <select name="building_status" v-model="buildingStatus">
                    <option value="1">Pribadi</option>
                    <option value="2">Sewa</option>
                </select><br/><br/>
            </div>

            <div>
                Kode Pos: <br/>
                <select name="zipcode">
                    @foreach($zipcodes as $zipcode)
                    <option value="{!! $zipcode->id !!}">{!! $zipcode->zipcode !!}</option>
                    @endforeach
                </select><br/><br/>
            </div>

            <div>
                Jenis Bangunan: <br/>
                <select name="building_type" @change="changeType">
                    <option value="1">Apartment</option>
                    <option value="2">Rumah Tinggal</option>
                </select><br/><br/>
            </div>

            <div v-if="type == 2">
                Penggunaan Bangunan: <br/>
                <select name="house_type">
                    <option value="6">2976 - Rumah Tinggal, < 4 Lantai, Bukan Ruko</option>
                    <option value="7">29761 - Kos-Kosan</option>
                    <!-- <option value="8">2977 - House floating on sea/ river shore</option>
                    <option value="9">2978 - Independent analytical laboratories</option>
                    <option value="4">2974 - Convention halls Or other multi purpose building</option> -->
                </select><br/><br/>

                Jenis Konstruksi bangunan:<br/>
                <select name="wood_element">
                    <option value="1">Kayu (> 20% dari total konstruksi)</option>
                    <option value="0">Tembok/Beton</option>
                </select><br/><br/>
            </div>

            <div v-if="type == 1">
                Lantai:<br/>
                <input type="text" name="floor" /><br/><br/>
            </div>

            <!-- <div>
                Do you have any surrounding buildings except residential purpose within 3m? <br/>
                <select name="surrounding_by_building">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select><br/><br/>
            </div> -->

            <div>
                Dalam 5 Tahun terakhir, apakah pernah terjadi kebakaran atau ledakan pada bangunan anda ?<br/>
                <select name="been_fire">
                    <option value="1">Yes</option>
                    <option value="0" selected>No</option>
                </select><br/><br/>
            </div>

            <hr/>
            <div>
                Pilih perlindungan yang anda inginkan : <br/>
                <select name="package" v-if="buildingStatus == 1" v-model="package">
                    <option value="both">Bangunan + Isi</option>
                    <option value="building">Bangunan Saja</option>
                    <option value="content">Isi Saja</option>
                </select>
                <select name="package" v-if="buildingStatus == 2">
                    <option value="content">Isi Saja</option>
                </select>
                <br/><br/>
            </div>

            <div>
                <span v-if="buildingStatus == 1">Berapa Harga Bangunan Anda ?</span>
                <span v-if="buildingStatus == 2">Berapa Harga Bangunan Anda ?</span> <br/>
                <input type="text" name="building_value"
                    v-model="building_value"><br/><br/>
            </div>

            <div v-if="package == 'both' || package == 'content'">
                Berapa Harga Isi Bangunan Anda (maksimal 10% dari harga bangunan) ? <br/>
                <input type="text" name="content_value"
                    v-model="content_value"
                    ref="content_value"
                    @blur="checkContentValue"><br/><br/>
            </div>

            <hr/>

            <p>Paket standar hanya melindungi anda dari kerusakan karena kebakaran, Petir, Ledakan, Akibat dari Pesawat jatuh, dan asap. Pilih paket perluasan yang ingin anda tambahkan</p>
            <!-- <ul>
                <li>RSMDCC - Riot, Strike, Malicious Damage & Civil Commotion</li>
                <li>DLV - Removal of Debris, Landslide/Landslip, Vehicle Impact</li>
                <li>Typhoon, storm, flood and water damage</li>
                <li>Earthquake – additional Policy applicable</li>
            </ul>
            Do you want to add additional package ?
            </p> -->

            <input type="checkbox" name="rsmdcc" value="1"> Kerusuhan, Pemogokan, Perbuatan jahat dan Huru-hara<br/><br/>
            <input type="checkbox" name="dlv" value="1"> Pembersihan puing, Longsor, Properti tertabrak kendaraan<br/><br/>
            <input type="checkbox" name="flood" value="1"> Taifun, Badai, dan Kerusakan akibat air<br/><br/>
            <input type="checkbox" name="earthquake" value="1" v-model="earthquake"> Gempa Bumi<br/><br/>

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
