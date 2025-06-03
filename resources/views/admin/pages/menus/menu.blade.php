@extends('admin.layouts.mainLayout')

@section('content')
<div class="menu-page-wrapper w-full flex">
  @if($menus)
    <div class="mainMenuList w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
        <div class="mb-5">
          <span class="font-bold">Main Menu</span>
        </div>
        <ul id="sortableList" class="sortable-list">
          @foreach ($menus as $menu)
          <li class="sortable-item" data-itemId="{{$menu->id}}">{{$menu->menu_name}}</li>
          @endforeach
        </ul>
    </div>
  @endif

  <div class="w-[30%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
    <form action="" method="post">
      <label for="ItemName">Item Name</label>
      <input type="text" name="itemName" id="ItemName">
      <label for="ParentItems">Parent Items</label>
      <select name="parentItem" id="ParentItems">
        <option value="demo1">demo1</option>
        <option value="demo2">demo2</option>
        <option value="demo3">demo3</option>
        <option value="demo4">demo4</option>
      </select>
    </form>
  </div>
    
</div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>

      <script>
        var getMenuItems = "{{route('admin.showMenuITems', '__placeholder__')}}"

        // Initialize SortableJS
        const sortable = new Sortable(document.getElementById('sortableList'), {
          animation: 500, // Animation duration in ms
          ghostClass: 'sortable-ghost', // Class added to the dragged item
          onEnd: function (evt) {
            const items = document.querySelectorAll('.sortable-item');
            const positions = Array.from(items).map((item, index) => ({
              name: item.textContent.trim(),
              position: index + 1
            }));

            console.log('Updated positions:', positions);
          }
        });



        $(document).ready(function(){

          $('.sortable-item').hover( 
            function(){
              $(this).css('cursor', 'pointer');
            }
          );

          $('.sortable-item').on('click', function(){
            $('.sortable-item').removeClass('active');
            $(this).addClass('active');
            let itemId = $(this).data('itemid');
            let data = {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    };

                $.ajax({
                  url: getMenuItems.replace('__placeholder__', itemId),          
                  method: 'GET',                 
                  data: data,      
                  dataType: 'json',              
                  success: function(response) {  
                    var HtmlHead = `<div class="subMenuList w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
                                      <div class="mb-5">
                                        <span class="font-bold">Sub Menu</span>
                                      </div>
                                      <ul id="sortableList2" class="sortable-list subMenu-sortable-list">
                                        `;
                    var htmlfoot = `</ul>
                                    </div>`;
                    var ulList = ``;

                    response.data.forEach(element => {
                      ulList = ulList+`<li class="sortable-item submenu-sortable-item">${element.title}</li>`
                    });

                    var finalHtml = HtmlHead+ulList+htmlfoot;

                    var submenu = $('.subMenuList');
                    if(submenu.length == 0){
                      $('.mainMenuList').after(finalHtml);
                    } else{ 
                      $('.subMenu-sortable-list').html(ulList);
                    }
                  },
                  error: function(xhr, status, error) {  
                    console.log(xhr.responseJSON.message);
                    Swal.fire(xhr.responseJSON.message);
                  }
                });
          });           

          $(document).on('mouseenter', '.submenu-sortable-item', function() {
            $(this).css('cursor', 'pointer');
          })
      });
      </script>
@endpush