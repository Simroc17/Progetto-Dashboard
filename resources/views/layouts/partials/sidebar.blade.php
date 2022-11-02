<?php
$menuJson = '{
    "menuList": [
      {
        "title": "Andamento",
        "filterTag": "application intel",
        "icon": "",
        "i18n": "nav.application_intel",
        "child": [
          
          {
            "link": "/dashboard/intel_marketing_dashboard",
            "title": "Home",
            "filterTag": "application intel marketing dashboard",
            "i18n": "nav.application_intel_marketing_dashboard"
          }
          
         
        ]
      },
     
      
      {
        "title": "Promozioni",
        "link": "/promozioni",
        "icon": "",
        "filterTag": "Promozioni",
        "i18n": "nav.laravel"
      },
     
      
     
     
      
          
      
      
      
     {
        "title": "Datatables",
        "filterTag": "datatables datagrid",
        "icon": "",
        "i18n": "nav.datatables",
        "spanText": "235 KB",
        "spanClass": "dl-ref bg-primary-500 hidden-nav-function-minify hidden-nav-function-top",
        "child": [
          {
            "link": "/datatables/datatables_basic",
            "title": "Basic",
            "filterTag": "datatables datagrid basic",
            "i18n": "nav.datatables_basic"
          },
         
          {
            "link": "/datatables/datatables_buttons",
            "title": "Buttons",
            "filterTag": "datatables datagrid buttons",
            "i18n": "nav.datatables_buttons"
          }
          
        ]
      }
      
       
    ]
  }';
?>

<!-- BEGIN Left Aside -->
<aside class="page-sidebar" style="background-color: #343a40;">
  <div class="page-logo" style="background-color: white !important;">
  <img src="{{ URL::asset('/img/volantinopiu_logo.png') }}" alt="SmartAdmin Laravel" aria-roledescription="logo" style="width: 150px;
    height: 40px; background-color: white;" >
    <!-- <a href="#" class="page-logo-link press-scale-down d-flex align-items-center position-relative" data-toggle="modal" data-target="#modal-shortcut">
      
      
      <span class="position-absolute text-white opacity-50 small pos-top pos-right mr-2 mt-n2">Laravel 9.0</span>
      <i class="fal fa-angle-down d-inline-block ml-1 fs-lg color-primary-300"></i>
    </a> -->
  </div>
  <!-- BEGIN PRIMARY NAVIGATION -->
  <nav id="js-primary-nav" class="primary-nav" role="navigation">
    <div class="nav-filter">
      <div class="position-relative">
        <input type="text" id="nav_filter_input" placeholder="Filter menu" class="form-control" tabindex="0">
        <a href="#" onclick="return false;" class="btn-primary btn-search-close js-waves-off" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar">
          <i class="fal fa-chevron-up"></i>
        </a>
      </div>
    </div>
    <div class="info-card">
      <!-- <img src="{{ URL::asset('/img/demo/avatars/avatar-admin.png') }}" class="profile-image rounded-circle" alt="Dr. Codex Lantern"> -->
      <!-- <div class="info-card-text">
        <a href="#" class="d-flex align-items-center text-white">
          <span class="text-truncate text-truncate-sm d-inline-block">
            
          </span>
        </a>
        <span class="d-inline-block text-truncate text-truncate-sm">Toronto, Canada</span>
      </div> -->
      <!-- <img src="{{ URL::asset('/img/card-backgrounds/cover-1-lg.png') }}" class="cover" alt="cover"> -->
      <a href="#" onclick="return false;" class="pull-trigger-btn" data-action="toggle" data-class="list-filter-active" data-target=".page-sidebar" data-focus="nav_filter_input">
        <i class="fal fa-angle-down"></i>
      </a>
    </div>
    <?php
    $decodedMenu = json_decode($menuJson);
    ?>
    <ul id="js-nav-menu" class="nav-menu">
      @foreach ($decodedMenu->{'menuList'} as $key => $value)
      @if(isset($value->onlyLi) && $value->onlyLi === "true")
      <li class="nav-title @if(isset($value->liClass)) {{$value->liClass}} @endif">{{ $value->title }}</li>
      @elseif(!isset($value->child))
      <li class="@if(isset($value->liClass)) {{$value->liClass}} @endif">
        <a href="{{ $value->link }}" title="{{ $value->title }}" data-filter-tags="{{ $value->filterTag }}">
          <i class="{{ $value->icon }}"></i>
          <span class="nav-link-text" data-i18n="{{ $value->i18n }}">
            {{ $value->filterTag }}
          </span>
        </a>
      </li>
      @else
      <li class="@if(isset($value->liClass)) {{$value->liClass}} @endif">
        <a href="javascript:void(0);" title="{{ $value->title }}" data-filter-tags="{{ $value->filterTag }}">
          <i class="{{ $value->icon }}"></i>
          <span class="nav-link-text" data-i18n="{{ $value->i18n }}">{{ $value->title }}
          </span>
        </a>
        <ul id="{{ $value->i18n }}">
          @for ($i=0; $i < sizeof($value->child); $i++)
            <li class="@if(isset($value->child[$i]->liClass)) {{$value->child[$i]->liClass}} @endif">
              <?php
              $i18Var = "";
              $i18Var = $value->child[$i]->{'i18n'};  ?>
              <a href="{{ $value->child[$i]->{'link'} }}" title="{{ $value->child[$i]->{'title'} }}" data-filter-tags="{{ $value->child[$i]->{'filterTag'} }}">
                <span class="nav-link-text" data-i18n="{{ $value->child[$i]->{'i18n'} }}">
                  {{ $value->child[$i]->{'title'} }}
                </span>
                @if(isset($value->child[$i]->{'spanText'}))
                <span class="{{ isset(($value->child[$i]->{'spanClass'})) ? $value->child[$i]->{'spanClass'} : '' }}">{{ $value->child[$i]->{'spanText'} }}</span>
                @endif
              </a>
              @if(isset($value->child[$i]->{'subChild'}))
              <ul id="{{ $i18Var }}">
                @for ($k=0; $k < sizeof($value->child[$i]->{'subChild'}); $k++)
                  <li class="@if(isset($value->child[$i]->{'subChild'}[$k]->liClass)) {{$value->child[$i]->{'subChild'}[$k]->liClass}} @endif">
                    <a href="{{ $value->child[$i]->{'subChild'}[$k]->link }}" title="{{ $value->child[$i]->{'subChild'}[$k]->title }}" data-filter-tags="{{ $value->child[$i]->{'subChild'}[$k]->filterTag }}">
                      <span class="nav-link-text" data-i18n="{{ $value->child[$i]->{'subChild'}[$k]->i18n }}">{{ $value->child[$i]->{'subChild'}[$k]->title }}</span>
                    </a>
                  </li>
                  @endfor
              </ul>
              @endif
            </li>
            @endfor
        </ul>
      </li>
      @endif
      @endforeach
    </ul>
    <div class="filter-message js-filter-message bg-success-600"></div>
  </nav>
  <!-- <div class="nav-footer shadow-top">
    <a href="#" onclick="return false;" data-action="toggle" data-class="nav-function-minify" class="hidden-md-down">
      <i class="ni ni-chevron-right"></i>
      <i class="ni ni-chevron-right"></i>
    </a>
    <ul class="list-table m-auto nav-footer-buttons">
      <li>
        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Chat logs">
          <i class="fal fa-comments"></i>
        </a>
      </li>
      <li>
        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Support Chat">
          <i class="fal fa-life-ring"></i>
        </a>
      </li>
      <li>
        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="top" title="Make a call">
          <i class="fal fa-phone"></i>
        </a>
      </li>
    </ul>
  </div>  -->
</aside>
<!-- END Left Aside -->