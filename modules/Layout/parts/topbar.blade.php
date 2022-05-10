<div class="bravo_topbar">
    <div class="container">
        <div class="content">
            <div class="topbar-left">

             


            </div>
            <div class="topbar-right">
                <ul class="topbar-items">
                    @include('Language::frontend.switcher')
                @if(!Auth::check())
                        <li class="login-item">
                            <a href="#login" data-toggle="modal" data-target="#login" class="login">{{__('Login')}}</a>
                        </li>
                        <li class="signup-item">
                            <a href="#register" data-toggle="modal" data-target="#register" class="signup">{{__('Sign Up')}}</a>
                        </li>
                    @else
                        @include('Layout::parts.notification')
                        <li class="login-item dropdown">
                            <a href="#" data-toggle="dropdown" class="login">{{__("Hi, :name",['name'=>Auth::user()->getDisplayName()])}}
                                <i class="fa fa-angle-down"></i>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-user text-left">
                                @if(is_vendor())
                                <li class="menu-hr"><a href="{{route('vendor.dashboard')}}" class="menu-hr"><i class=""></i> {{__("Vendor Dashboard")}}</a></li>
                                @endif
                                <li class="@if(is_vendor()) menu-hr @endif">
                                    <a href="{{route('user.profile.index')}}"><i class=""></i> {{__("My profile")}}</a>
                                </li>
                                @if(setting_item('inbox_enable'))
                                <li class="menu-hr">
                                    <a href="{{route('user.chat')}}"><i class=""></i> {{__("Messages")}}
                                        @if($count = auth()->user()->unseen_message_count)
                                            <span class="badge badge-danger">{{$count}}</span>
                                        @endif
                                    </a>
                                </li>
                                @endif
                                    <li class="menu-hr"><a href="{{route('user.booking_history')}}"><i class=""></i> {{__("Booking History")}}</a></li>

                                @if(is_admin())
                                    <li class="menu-hr"><a href="{{route('admin.index')}}"><i class=""></i> {{__("Admin Dashboard")}}</a></li>
                                @endif
                                <li class="menu-hr">
                                    <a  href="#" onclick="event.preventDefault(); document.getElementById('logout-form-topbar').submit();"><i class=""></i> {{__('Logout')}}</a>
                                </li>
                            </ul>
                            <form id="logout-form-topbar" action="{{ route('logout') }}" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>
