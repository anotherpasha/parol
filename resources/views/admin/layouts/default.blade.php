@include('admin.includes.header')
@include('admin.includes.nav')
@include('admin.includes.sidenav')

<div class="k-container">
    <main class="k-main">
        @yield('content')
    </main>
    <footer class="k-footer uk-flex uk-flex-between">
        <div>
            Copyright &copy; <?php echo date('Y'); ?> <a class="" href="{!! url('/') !!}" target="_blank" title="Site Name">Site Name</a> | Powered by <a class="" href="http://kleur.id" target="_blank" title="Kleur CMS">Kleur CMS</a>
        </div>
        <div>
            <a title="back to top" uk-totop uk-scroll uk-tooltip="pos: top-right"></a>
        </div>
    </footer>
</div>

@include('admin.includes.footer')
