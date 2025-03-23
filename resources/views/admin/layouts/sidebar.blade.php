<aside id="sidebar" class="relative top-0 left-0 z-40 w-[63px] h-screen pt-5 border-r border-gray-200 -translate-x-full sm:-translate-x-full transition-all ease-in-out duration-700 hover:w-[256px] group">
    <div id="sidebar-info-container" class="sidebar-info-container mb-10 flex items-center justify-center">
        <div id="info-wrapper" class="info-wrapper flex items-center">
            <div id="imagebox" class="imagebox">
                <img src="{{ asset('images/logo.jpg')}}" alt="">
            </div>
            <div id="owner-name" class="owner-name ml-3">
                <span>Admin</span>
            </div>
        </div>
        <div id="expand-collapse" class="expand-collapse cursor-pointer">
            <i id="expand" class="ti ti-layout-sidebar-left-expand text-3xl" title="expand"></i>
        </div>
    </div>
    <div class="w-[90%] m-auto">
        <ul class="vertical-menu ">
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-home-2 text-[22px]"></i> <span class="item ml-2"> Dashboard</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href="menu"><i class="ti ti-menu-deep text-[22px]"></i> <span class="item ml-2"> Menus</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px] active"><a href=""><i class="ti ti-layout-dashboard text-[22px]"></i><span class="item ml-2"> Pages</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item ml-2"> Blogs</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item ml-2"> hello</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item ml-2"> hello</span></a></li>
        </ul>
    </div>

    {{-- <div class="absolute top-[50%] left-[80%]">
        <i class="ti ti-braille text-3xl"></i>
    </div> --}}
</aside>