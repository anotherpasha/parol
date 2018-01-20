@extends('admin.layouts.default')

@section('page-level-styles')
{{-- <link rel="stylesheet" href="//cdn.datatables.net/1.10.7/css/jquery.dataTables.min.css"> --}}
<link rel="stylesheet" href="{!! asset('assets/css/lib/dataTables.uikit.min.css') !!}" />
@endsection

@section('content')

    <h3>
        @if(isset($pageTitle)) {!! $pageTitle !!}@endif
    </h3>
    <table class="uk-table" id="thetable">
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Call Date</th>
                <th>Call Time</th>
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
            ajax: '{!! action('ContactController@datatableList') !!}',
            columns: [
                {data: 'id', name: 'id', width: '10%'},
                {data: 'name', name: 'name', width: '15%'},
                {data: 'email', name: 'email', width: '10%'},
                {data: 'phone', name: 'phone', width: '10%'},
                {data: 'date', name: 'date', width: '15%'},
                {data: 'time', name: 'time', width: '10%'},
                {data: 'message', name: 'message', width: '30%'}
                // {data: 'status', name: 'status', width: '10%'},
                // {data: 'action', name: 'action', orderable: false, searchable: false, width: '20%'}
            ]
        });
    });
</script>
@endsection
