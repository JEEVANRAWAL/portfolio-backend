@extends('admin.layouts.mainLayout')

@section('content')
<div class="menu-page-wrapper w-full flex">
  @if($menus)
    <div id="menuBlock-1" class="mainMenuList w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
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
          animation: 500, 
          ghostClass: 'sortable-ghost', 
          onEnd: function (evt) {
            const items = document.querySelectorAll('.sortable-item');
            const positions = Array.from(items).map((item, index) => ({
              name: item.textContent.trim(),
              position: index + 1
            }));

            console.log('Updated positions:', positions);
          }
        });

        //Jquery code section
        $(document).ready(function(){

          function generateNextMenuBlockId(grandparentId) {
            var numericPart = parseInt(grandparentId.split('-')[1], 10);
            if (!isNaN(numericPart)) {
                var nextblockId = `menuBlock-${numericPart + 1}`;
                return nextblockId;
            } else {
              try {
                throw new Error('Invalid parent element ID format. Expected "menuBlock-{number}"');
              } catch (error) {
                return swal.fire({
                  icon: 'error',
                  title: 'Error',
                  text: error.message,
                })
              }
            }
          }

          $(document).on(
            'mouseenter',
            '.sortable-item', 
            function(){
              $(this).css('cursor', 'pointer');
            }
          );

          $(document).on('click', '.sortable-item', function(){
            var grandparent = $(this).parent().parent();
            var grandparentId = grandparent.attr('id');
            var nextblockId = generateNextMenuBlockId(grandparentId);
            $('#'+grandparentId).find('.sortable-item').removeClass('active');
            $(this).addClass('active');
            let itemId = $(this).data('itemid');
            let data = {
                        _token: document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        type: grandparentId == 'menuBlock-1' ? 'menuItems' : 'subMenuItems'
                        };

            $.ajax({
              url: getMenuItems.replace('__placeholder__', itemId),    
              method: 'GET',     
              data: data,
              dataType: 'json',        
              success: function(response) {  
                var HtmlHead = `<div id="${nextblockId}" class="subMenuList w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
                                  <div class="mb-5">
                                    <span class="font-bold">Sub Menu</span>
                                  </div>
                                  <ul id="sortableList2" class="sortable-list ${nextblockId}-sortable-list">`;
                var htmlfoot = `</ul>
                                </div>`;
                var ulList = ``;

                response.data.forEach(element => {
                  ulList = ulList+`<li class="sortable-item submenu-sortable-item" data-itemId="${element.id}">${element.title}</li>`
                });

                var finalHtml = HtmlHead+ulList+htmlfoot;

                var submenu = $('#'+nextblockId);
                if(submenu.length == 0){
                  $('#'+grandparentId).after(finalHtml);
                } else{ 
                  $('.'+nextblockId+'-sortable-list').html(ulList);
                  // Remove nested submenus
                  var grandparentIdExtractedLastValue = parseInt(grandparentId.split('-')[1], 10);
                  grandparentIdExtractedLastValue++;
                  var nextSubmenu;
                  do {
                    grandparentIdExtractedLastValue++;
                    console.log(grandparentIdExtractedLastValue);
                      nextSubmenu = $('#menuBlock-' + grandparentIdExtractedLastValue);
                      if (nextSubmenu.length > 0) {
                          nextSubmenu.remove();
                      }
                  } while (nextSubmenu.length > 0);
                }
              },
              error: function(xhr, status, error) {  
                console.log(xhr.responseJSON.message);
                Swal.fire(xhr.responseJSON.message);
              }
            });
          });           
      });
      </script>
@endpush