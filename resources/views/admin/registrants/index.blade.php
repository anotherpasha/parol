@extends('admin.layouts.default')

@section('page-level-styles')
<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.uikit.min.css') !!}" />
@endsection

@section('content')
    <form action="{!! action('RegistrantsController@download') !!}" method="get">
    <h3>
        @if(isset($pageTitle)) {!! $pageTitle !!}@endif
        <button class="uk-button uk-button-primary uk-align-right uk-margin-small-top">Download Data</button>
    </h3>
    <table class="uk-table" id="thetable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Date</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Occupation</th>
                <th>Contact Date</th>
                <th>Contact Time</th>
                <th>Message</th>
                <!-- <th>Status</th> -->
                <!-- <th class="uk-text-center">Action</th> -->
            </tr>
        </thead>
    </table>

@endsection

@section('page-level-scripts')
<!-- DataTables -->
<script src="{!! asset('assets/js/lib/jquery.dataTables.min.js') !!}"></script>
<script src="{!! asset('assets/js/lib/dataTables.uikit.js') !!}"></script>

<script type="text/javascript">
    $(function() {
        $('#thetable').DataTable({
            processing: true,
            serverSide: true,
            ajax: '{!! action('RegistrantsController@datatableList') !!}',
            columns: [
                {data: 'id', name: 'id', width: '10%'},
                {data: 'created_at', name: 'created_at', width: '10%'},
                {data: 'name', name: 'name', width: '10%'},
                {data: 'email', name: 'email', width: '10%'},
                {data: 'phone', name: 'phone', width: '10%'},
                {data: 'occupation', name: 'occupation', width: '10%'},
                {data: 'date', name: 'date', width: '10%'},
                {data: 'time', name: 'time', width: '10%'},
                {data: 'message', name: 'message', width: '20%'}
                // {data: 'status', name: 'status', width: '10%'},
                // {data: 'action', name: 'action', orderable: false, searchable: false, width: '20%'}
            ]
        });
    });
</script>
@endsection
