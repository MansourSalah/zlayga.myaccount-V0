@include('comun.nav.css')
<div class="site-navbar py-2" style="box-shadow: 0px -3px 12px 5px rgb(0 0 0 / 61%);">
    <div class="container">
        <div class="d-flex align-items-center justify-content-between">
            <div class="logo">
                <div class="site-logo">
                <a href="/" class="js-logo-clone">R.<span style="color:#3329cc">Account</span></a>
                </div>
            </div>
            <div class="main-nav d-none d-lg-block" style="margin-left: auto;">
                <nav class="site-navigation text-right text-md-center" role="navigation">
                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                        <li name="informations"><a href="{{route('informations')}}" onclick="navig(event,this)">{{__('personalInfo')}}</a></li>
                        <li name="security"><a href="{{route('security')}}" onclick="navig(event,this)">{{__('security')}}</a></li>
                        <li><a href="https://policies.rancho.ma?lang={{Session::get('lang')}}" target="_blank">{{__('conditions')}}</a></li>
                        <li class="has-children"><a href="#">{{__('setting')}}</a>
                            <ul class="dropdown">  
                                <li class="has-children"><a href="#">{{__('language')}}</a>
                                    <ul class="dropdown">
                                        <li><a href="/api/lang?lang=ar" onclick=setLang(event,this)>العربية</a></li>
                                        <li><a href="/api/lang?lang=en" onclick=setLang(event,this)>English</a></li>
                                    
                                    </ul>
                                </li>
                                <hr>
                                <li><a href="#">{{__('logout')}}</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="icons">
                <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span
                    class="icon-menu"></span></a>
            </div>

        </div>
    </div><!--container-->
</div><!--site navbar-->
@include('comun.nav.js')

