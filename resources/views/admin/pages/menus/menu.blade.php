@extends('admin.layouts.mainLayout')

@section('content')
<div class="menu-page-wrapper w-full flex justify-between">
  @if($menus)
    <div class="w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
        <div class="mb-5">
          <span class="font-bold">Main Menu</span>
        </div>
        <ul id="sortableList" class="sortable-list">
          @foreach ($menus as $menu)
          <li class="sortable-item">{{$menu->menu_name}}</li>
          @endforeach
        </ul>
    </div>
  @endif

  <div class="w-[35%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
    <div class="mb-5">
      <span class="font-bold">Sub Menu</span>
    </div>
    <ul id="sortableList2" class="sortable-list">
      <li class="sortable-item">Item 1</li>
      <li class="sortable-item">Item 2</li>
      <li class="sortable-item">Item 3</li>
      <li class="sortable-item">Item 4</li>
    </ul>
  </div>

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
@push('script')
      <script>
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
            console.log('hello item clicked');
          });
        });
      </script>
@endpush
@endsection