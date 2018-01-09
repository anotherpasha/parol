
    <script>
        var $baseUrl = '{!! url('/') !!}';
        var $token = '{!! csrf_token() !!}';
    </script>
    @section('page-level-scripts')
    @show

    </body>
</html>
