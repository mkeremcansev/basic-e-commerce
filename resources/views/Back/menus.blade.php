<aside class="left-sidebar">
    <ul id="slide-out" class="sidenav">
        <li class="side-wrap">
            <ul class="collapsible">
                <li>
                    <a href="{{ route('Back.main') }}" class="collapsible-header"><i
                            class="material-icons">home</i><span class="hide-menu">@lang('keywords.home')</span></a>
                    <div class="collapsible-body">
                    </div>
                </li>
                 <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">settings</i><span class="hide-menu"> @lang('keywords.settings')</span></a>
                        <div class="collapsible-body">
                            <ul>
                                    <li><a href="{{ route('Back.settings') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.general-settings')</span></a></li>
                                    <li><a href="{{ route('Back.payment') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.payment-method')</span></a></li>
                                    
                            </ul>
                        </div>
                </li>

                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">assignment</i><span class="hide-menu"> @lang('keywords.general')</span></a>
                        <div class="collapsible-body">
                            <ul>
                                    <li><a href="{{ route('Back.list.slider') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.slider-list')</span></a></li>
                                    <li><a href="{{ route('Create.slider.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.slider-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.contract') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.contract-list')</span></a></li>
                                    <li><a href="{{ route('Create.contract.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.contract-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.faq') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.faq-list')</span></a></li>
                                    <li><a href="{{ route('Create.faq.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.faq-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.about') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.about-list')</span></a></li>
                                    <li><a href="{{ route('Create.about.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.about-create')</span></a></li>
                            </ul>
                        </div>
                </li>

                <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">shopping_cart</i><span class="hide-menu"> @lang('keywords.product')</span></a>
                        <div class="collapsible-body">
                            <ul>
                                    <li><a href="{{ route('Back.list.product') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.product-list')</span></a></li>
                                    <li><a href="{{ route('Create.product.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.product-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.category') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.category-list')</span></a></li>
                                    <li><a href="{{ route('Create.category.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.category-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.brand') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.brand-list')</span></a></li>
                                    <li><a href="{{ route('Create.brand.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.brand-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.color') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.color-list')</span></a></li>
                                    <li><a href="{{ route('Create.color.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.color-create')</span></a></li>
                                    <li><a href="{{ route('Back.list.size') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.size-list')</span></a></li>
                                    <li><a href="{{ route('Create.size.get') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.size-create')</span></a></li>
                            </ul>
                        </div>
                </li>

               <li>
                    <a href="javascript: void(0);" class="collapsible-header has-arrow"><i class="material-icons">autorenew</i><span class="hide-menu"> @lang('keywords.actions')</span></a>
                        <div class="collapsible-body">
                            <ul>
                                    <li><a href="{{ route('Back.list.order') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.orders')</span></a></li>
                                    <li><a href="{{ route('Back.list.user') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.users')</span></a></li>
                                    <li><a href="{{ route('Back.list.review') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.reviews')</span></a></li>
                                    <li><a href="{{ route('Back.log') }}"><i class="material-icons">arrow_forward</i><span class="hide-menu">@lang('keywords.log-view')</span></a></li>
                                    
                            </ul>
                        </div>
                </li>
                <li>
                    <a target="_blank" href="{{ route('Front.main') }}" class="collapsible-header"><i
                            class="material-icons">visibility</i><span class="hide-menu">@lang('keywords.preview')</span></a>
                    <div class="collapsible-body">
                    </div>
                </li>

                <li>
                    <a href="{{ route('Back.logout') }}" class="collapsible-header"><i
                            class="material-icons">power_settings_new</i><span class="hide-menu">@lang('keywords.logout')</span></a>
                    <div class="collapsible-body">
                    </div>
                </li>

                
            </ul>
        </li>
    </ul>
</aside>