@include('layouts.navbars.navs.guest')
<div class="wrapper wrapper-full-page">
  <div class="page-header login-page header-filter img.responsive" filter-color="orange" style="background-image: 
  url('https://scontent.ftru2-1.fna.fbcdn.net/v/t39.30808-6/272313623_5046744762023421_4200207471775584324_n.jpg?_nc_cat=105&ccb=1-5&_nc_sid=e3f864&_nc_eui2=AeHhsHip-9yfwd6iZVarWm2Ww9kIk2wO-vjD2QiTbA76-DWNMpzKONeM4qD-HPF9PlGyYrzueTrR7mCN1XXNWf4n&_nc_ohc=aPmiHrr1wYUAX9DHzgc&_nc_ht=scontent.ftru2-1.fna&oh=00_AT-fB4I10X_fEmBSqVgZT2oy2_4sqPb87gABvOV73GymAQ&oe=61FBBDE2'); 
  background-size: contain; background-position: top center;align-items: center;" data-color="blue">
    <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
    @yield('content')
    @include('layouts.footers.guest')
  </div>
</div>