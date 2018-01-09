
    <script>
        var $baseUrl = '{!! url('/') !!}';
        var $token = '{!! csrf_token() !!}';
    </script>
    <script src="{!! asset('assets/js/lib/jquery/jquery-2.2.4.min.js') !!}"></script>
    @section('page-level-scripts')
    @show

    <script src="{!! asset('assets/js/lib/uikit.min.js') !!}"></script>
    <script src="{!! asset('assets/js/lib/uikit-icons.min.js') !!}"></script>
    </body>
</html>
