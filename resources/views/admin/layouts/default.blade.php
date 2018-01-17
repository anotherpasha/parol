@include('admin.includes.header')
@include('admin.includes.nav')
@include('admin.includes.sidenav')

<div class="k-container">
    <main class="k-main">
        @yield('content')
    </main>
    <footer class="k-footer uk-flex uk-flex-between">
        <div>
            Copyright &copy; <?php echo date('Y'); ?> <a class="" href="{!! url('/') !!}" target="_blank" title="Site Name">{{ config('app.name', 'Laravel') }}</a>
        </div>
        <div>
            <a title="back to top" uk-totop uk-scroll uk-tooltip="pos: top-right"></a>
        </div>
    </footer>
</div>

@include('admin.includes.footer')
