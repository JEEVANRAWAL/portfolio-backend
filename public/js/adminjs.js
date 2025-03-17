var side_bar = document.getElementById("sidebar");
var items = document.getElementsByClassName("item");
var expand_collapse = document.getElementById("expand-collapse");
var sidebar_info_container = document.getElementById("sidebar-info-container");
var owner_name = document.getElementById("owner-name");
var info_wrapper = document.getElementById("info-wrapper");
var expand = document.getElementById("expand");
var collapse = document.getElementById("collapse");
var expand_collapses_two = document.getElementById("expand-collapses-two");

var itemsArray = Array.from(items); // Converting NodeList to an array

setInterval(() => {
    side_bar.classList.add("sm:translate-x-0");
}, 500);

var resizeObserver = new ResizeObserver(() => {
    if (side_bar.offsetWidth > 155) {
        itemsArray.forEach((item) => {
            item.classList.remove("hidden");
        });
        expand_collapse.classList.remove("hidden");
        sidebar_info_container.classList.remove("justify-center");
        sidebar_info_container.classList.add("justify-between");
        owner_name.classList.remove("hidden");
        info_wrapper.classList.add("ml-2.5");
        sidebar_info_container.classList.add("pr-3");
    } else {
        itemsArray.forEach((item) => {
            item.classList.add("hidden");
        });
        expand_collapse.classList.add("hidden");
        sidebar_info_container.classList.add("justify-center");
        owner_name.classList.add("hidden");
        info_wrapper.classList.remove("ml-2.5");
        sidebar_info_container.classList.remove("pr-3");
    }
});

resizeObserver.observe(side_bar);

expand_collapse.addEventListener("click", () => {
    side_bar.classList.toggle("w-[256px]");

    const expandIcon = document.getElementById("expand");
    const collapseIcon = document.getElementById("collapse");

    if (expandIcon) {
        expandIcon.outerHTML = `<i id="collapse" class="ti ti-layout-sidebar-left-collapse-filled text-3xl" title="collapse"></i>`;
    } else if (collapseIcon) {
        collapseIcon.outerHTML = `<i id="expand" class="ti ti-layout-sidebar-left-expand text-3xl" title="expand"></i>`;
    }
});

expand_collapses_two.addEventListener("click", () => {
    var nav_wrapper = document.getElementById("nav-wrapper");
    var top_nav = document.getElementById("top-nav");
    nav_wrapper.classList.toggle("hidden");
    // top_nav.classList.toggle("h-[65px]");
    // top_nav.classList.toggle("pb-[50px]");
});
