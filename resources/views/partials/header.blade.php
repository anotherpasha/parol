<header>
  <div class="container">
    <nav class="navbar-primary">
        <a class="toggle-menu">
          <span class="glyphicon glyphicon-align-justify"></span>
        </a>
        <div class="left-content">
            <a href="{{url('/')}}" class="brand">
              <img src="{{url('/images/logo-parolamas.png')}}" alt="">
            </a>
        </div>
        <div class="right-content"  id="menu-mobile">
            <a href="javasript:;" class="close-toggle">x</a>
            <div class="wrapper">
                <ul class="undotted-list inline  header-info ">
                    <li>
                      <form method="post" class="search-box">
                          <span class="glyphicon glyphicon-search"></span>
                          <input class="rounded" type="text" name="" value="">
                      </form>
                    </li>
                    <li class="color-white"><span class="icon-call-small"></span><a href="tel:1500554" class="color-white">&nbsp;&nbsp;1500 - 554</a></li>
                </ul>

            </div>
            <div class="wrapper">
                <ul class="undotted-list inline  nav-link ">
                    <li><a href="{{url('/')}}">Beranda</a></li>
                    <li><a href="{{url('/about')}}">Tentang Parolamas</a></li>
                    <li><a href="{{url('/product')}}">Info Produk</a></li>
                    <li><a href="{{url('/claim')}}">Klaim</a></li>
                    <li><a href="{{url('/pembayaran')}}">Pembayaran</a></li>
                    <li><a href="{{url('/faq')}}">FAQ</a></li>
                    <li><a href="{{url('/contact-us')}}">Hubungi Kami</a></li>
                </ul>
            </div>
        </div>
    </nav>
  </div>

</header>
