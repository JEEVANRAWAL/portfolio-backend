var side_bar = document.getElementById("sidebar");
var items = document.getElementsByClassName("item");
var expand_collapse = document.getElementById("expand-collapse");
var sidebar_info_container = document.getElementById("sidebar-info-container");

var itemsArray = Array.from(items); // Converting NodeList to an array


var resizeObserver = new ResizeObserver(() => {
    if (side_bar.offsetWidth > 140) {
        itemsArray.forEach((item) => {
            item.classList.remove("hidden");
        })
        expand_collapse.classList.remove("hidden");
        sidebar_info_container.classList.remove("justify-center");
        
    } else {
        itemsArray.forEach((item) => {
            item.classList.add("hidden");
        }) 
        expand_collapse.classList.add("hidden");
        sidebar_info_container.classList.add("justify-center");
    }
});

resizeObserver.observe(side_bar);