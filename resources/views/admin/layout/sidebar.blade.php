<aside id="sidebar" class="fixed top-0 left-0 z-40 w-[63px] h-screen pt-5 border-r border-gray-200 -translate-x-full sm:translate-x-0 transition-all ease-in-out duration-700 hover:w-[256px] group">
    <div id="sidebar-info-container" class="sidebar-info-container mb-10 bg-red-500 flex items-center justify-center">
        <div class="imagebox">
            <img src="{{ asset('images/logo.jpg')}}" alt="">
        </div>
        <div id="expand-collapse" class="expand-collapse">
            <i class="ti ti-layout-sidebar-left-expand text-3xl"></i>
        </div>
    </div>
    <div class="w-[90%] m-auto">
        <ul class="vertical-menu ">
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-home-2 text-[22px]"></i> <span class="item"> Dashboard</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-menu-deep text-[22px]"></i> <span class="item"> Menus</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px] active"><a href=""><i class="ti ti-layout-dashboard text-[22px]"></i><span class="item"> Pages</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item"> Blogs</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item"> hello</span></a></li>
            <li class="hover:bg-red-100 px-4 py-2 mb-1 rounded-[8px]"><a href=""><i class="ti ti-article text-[22px]"></i> <span class="item"> hello</span></a></li>
        </ul>
    </div>

    {{-- <div class="absolute top-[50%] left-[80%]">
        <i class="ti ti-braille text-3xl"></i>
    </div> --}}
</aside>