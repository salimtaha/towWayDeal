 <!-- Page Sidebar Start-->
 <div class="page-sidebar">
    <div class="main-header-left d-none d-lg-block">
        <div class="logo-wrapper">
            <h3>لوحه  المسئول</h3>
            <a href="index.html">
                <img class="d-none d-lg-block blur-up lazyloaded"
                    src="{{ asset('icon.png') }}" alt="" width="100px" height="50px">
            </a>
        </div>
    </div>
    <div class="sidebar custom-scrollbar">
        <a href="javascript:void(0)" class="sidebar-back d-lg-none d-block"><i class="fa fa-times"
                aria-hidden="true"></i></a>
        <div class="sidebar-user">
            <div class="">
                <div class=" align-items-center text-center"><img class="" width="70px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg"><span class="font-weight-bold"></div>
            </div>            <div>
                <h6 class="f-14">{{ Auth::guard('admin')->user()->name }}</h6>
                <p>الادمن</p>
            </div>
        </div>
        <ul class="sidebar-menu">
            <li>
                <a class="sidebar-header" href="{{ route('admin.welcome') }}">
                    <i data-feather="home"></i>
                    <span>لوحه التحكم</span>
                </a>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="archive"></i>
                    <span>الاقسام</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.categories.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>قائمه الاقسام</span>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.subcategories.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>قائمه الاقسام الفرعيه </span>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.categories.trashed') }}">
                            <i class="fa fa-circle"></i>
                            <span>قائمه الاقسام المحذوفه </span>
                        </a>
                    </li>


                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="box"></i>
                    <span>المؤسسات الخيرية</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.charities.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>المؤسسات  الموثقه</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>

                    <li>
                        <a href="{{ route('admin.charities.wating') }}">
                            <i class="fa fa-circle"></i>
                            <span>  قائمه الانتظار</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.charities.trashed') }}">
                            <i class="fa fa-circle"></i>
                            <span> الارشيف </span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="archive"></i>
                    <span>الطلبات</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="">
                            <i class="fa fa-circle"></i>
                            <span>الاوردرات الحاليه</span>
                        </a>
                    </li>

                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="dollar-sign"></i>
                    <span>المبيعات</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="">
                            <i class="fa fa-circle"></i>الطلبات المكتمله
                        </a>
                    </li>
                    <li>
                        <a href="">
                            <i class="fa fa-circle"></i>العمليات
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="tag"></i>
                    <span>Coupons</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="coupon-list.html">
                            <i class="fa fa-circle"></i>List Coupons
                        </a>
                    </li>
                    <li>
                        <a href="coupon-create.html">
                            <i class="fa fa-circle"></i>Create Coupons
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="clipboard"></i>
                    <span> مسئولين السحب</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.mediators.index') }}">
                            <i class="fa fa-circle"></i> قائمه المسئولين
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mediators.trashed') }}">
                            <i class="fa fa-circle"></i>  الارشيف
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.mediators.create') }}">
                            <i class="fa fa-circle"></i>انشاء مسئول
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="">
                    <i data-feather="camera"></i>
                    <span>images</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="align-left"></i>
                    <span>Menus</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="menu-list.html">
                            <i class="fa fa-circle"></i>Menu Lists
                        </a>
                    </li>
                    <li>
                        <a href="create-menu.html">
                            <i class="fa fa-circle"></i>Create Menu
                        </a>
                    </li>
                </ul>
            </li>


            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                     <i data-feather="users"></i>
                    <span>المستخدمين</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.users.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>المستخدمين</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>

                        {{-- <ul class="sidebar-submenu">
                            <li>
                                <a href="">
                                    <i class="fa fa-circle"></i> المستخدمين
                                </a>
                            </li>
                            <li>
                                <a href="">
                                    <i class="fa fa-circle"></i>اضافه مستخدم جديد </a>
                            </li>
                        </ul> --}}
                    </li>
                    <li>
                        <a href="{{ route('admin.users.blocked.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>المحظورين</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.users.trashed') }}">
                            <i class="fa fa-circle"></i>
                            <span>الارشيف</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                </ul>
            </li>
            <li>


                <a class="sidebar-header" href="javascript:void(0)">
                     <i data-feather="shopping-bag"></i>
                    <span>المتاجر</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>

                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.stores.index') }}">
                            <i class="fa fa-circle"></i>
                            <span>المتاجر الموثقه</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.stores.wating') }}">
                            <i class="fa fa-circle"></i>
                            <span>قائمه الانتظار </span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.stores.trashed') }}">
                            <i class="fa fa-circle"></i>
                            <span>الارشيف</span>
                            <i class="fa fa-angle-right pull-right"></i>
                        </a>
                    </li>
                </ul>
            </li>



            <li>
                <a class="sidebar-header" href="javascript:void(0)">
                    <i data-feather="phone"></i>
                    <span> التواصل معنا</span>
                    <i class="fa fa-angle-right pull-right"></i>
                </a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.contacts.index') }}">
                            <i class="fa fa-circle"></i>لم يتم الرد عليها
                            <i class="fa fa-angle-right pull-right"></i>

                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.contacts.old') }}">
                            <i class="fa fa-circle"></i>تم الرد عليها
                            <i class="fa fa-angle-right pull-right"></i>

                        </a>
                    </li>
                </ul>
            </li>







            <li>
                <a class="sidebar-header" href="reports.html"><i
                        data-feather="bar-chart"></i><span>Reports</span>
                </a>
            </li>

            <li>
                <a class="sidebar-header" href="javascript:void(0)"><i
                        data-feather="settings"></i><span>الاعدادات</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.settings.index') }}"><i class="fa fa-circle"></i>تعديل اعدادات الموقع
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <a class="sidebar-header" href="javascript:void(0)"><i
                        data-feather="dollar-sign"></i><span>اداره السحب</span><i
                        class="fa fa-angle-right pull-right"></i></a>
                <ul class="sidebar-submenu">
                    <li>
                        <a href="{{ route('admin.withdrawal.setting') }}"><i class="fa fa-circle"></i> اعدادات السحب
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.withdrawal.index') }}"><i class="fa fa-circle"></i> طلبات السحب
                        </a>
                    </li>
                </ul>
            </li>

            <li>
                <a class="sidebar-header" href="invoice.html"><i
                        data-feather="archive"></i><span>Invoice</span></a>
            </li>

            <li>
                <a class="sidebar-header" href="{{ route('admin.profile.index') }}">
                    <i data-feather="user"></i>
                    <span> الملف الشخصي</span>
                </a>
            </li>
            <li>
                <a class="sidebar-header" href="{{ route('admin.password.forgot') }}">
                    <i data-feather="key"></i>
                    <span>نسيت كلمه السر</span>
                </a>
            </li>



            <li>
                <form action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <button type="submit" class="sidebar-header btn btn-sm btn-air-white">
                        <i data-feather="log-out"></i>
                        <span>تسجيل الخروج</span>
                    </button>
                </form>
            </li>
        </ul>
    </div>
</div>
<!-- Page Sidebar Ends-->

<!-- Right sidebar Start-->
<div class="right-sidebar" id="right_side_bar">
    <div>
        <div class="container p-0">
            <div class="modal-header p-l-20 p-r-20">
                <div class="col-sm-8 p-0">
                    <h6 class="modal-title font-weight-bold">FRIEND LIST</h6>
                </div>
                <div class="col-sm-4 text-end p-0">
                    <i class="me-2" data-feather="settings"></i>
                </div>
            </div>
        </div>
        <div class="friend-list-search mt-0">
            <input type="text" placeholder="search friend">
            <i class="fa fa-search"></i>
        </div>
        <div class="p-l-30 p-r-30 friend-list-name">
            <div class="chat-box">
                <div class="people-list friend-list">
                    <ul class="list">
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="assets/images/dashboard/user.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Vincent Porter</div>
                                <div class="status">Online</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="assets/images/dashboard/user1.jpg" alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">Ain Chavez</div>
                                <div class="status">28 minutes ago</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="assets/images/dashboard/user2.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Kori Thomas</div>
                                <div class="status">Online</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="assets/images/dashboard/user3.jpg" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Erica Hughes</div>
                                <div class="status">Online</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="assets/images/dashboard/user3.jpg" alt="">
                            <div class="status-circle offline"></div>
                            <div class="about">
                                <div class="name">Ginger Johnston</div>
                                <div class="status">2 minutes ago</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="{{ asset('assets/admin/images/dashboard/user5.jpg') }} alt="">
                            <div class="status-circle away"></div>
                            <div class="about">
                                <div class="name">Prasanth Anand</div>
                                <div class="status">2 hour ago</div>
                            </div>
                        </li>
                        <li class="clearfix">
                            <img class="rounded-circle user-image blur-up lazyloaded"
                                src="{{ asset('assets/admin/dashboard/designer.jpg') }}" alt="">
                            <div class="status-circle online"></div>
                            <div class="about">
                                <div class="name">Hileri Jecno</div>
                                <div class="status">Online</div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Right sidebar Ends-->
