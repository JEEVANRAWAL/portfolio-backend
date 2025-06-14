@extends('admin.layouts.mainLayout')

@section('content')

    <div class="w-[100%] border-[2px] border-gray-300 px-3 py-3 mb-5 rounded-[8px] flex">
        <div class="w-[50%] flex items-center justify-center bg-blue-400 text-white rounded-[8px] gap-15"><span
                class="font-bold text-2xl">Menu Settings</span> <i class="fa-solid fa-screwdriver-wrench text-2xl"></i></div>
        @include('admin.menus.popup-models.addMenuItem')
    </div>

    <div class="menu-page-wrapper w-full grid grid-cols-4 gap-5">

        @if ($menus)
            <div id="menuBlock-1" class="mainMenuList w-[100%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
                <div class="mb-5">
                    <span class="font-bold">Main Menu</span>
                </div>
                <ul id="sortableList" class="sortable-list mainMenu-sortable-list">
                    @foreach ($menus as $menu)
                        <li class="sortable-item" data-itemId="{{ $menu->id }}">{{ $menu->menu_name }}</li>
                    @endforeach
                </ul>
            </div>
        @else
            <span>No menu found</span>
        @endif
    </div>
@endsection
@push('script')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>

    <script>
        var getMenuItems = "{{ route('admin.showMenuITems', '__placeholder__') }}"

        // Initialize SortableJS
        const sortable = new Sortable(document.getElementById('sortableList'), {
            animation: 500,
            ghostClass: 'sortable-ghost',
            onEnd: function(evt) {
                const items = document.querySelectorAll('.mainMenu-sortable-list .sortable-item');
                const positions = Array.from(items).map((item, index) => ({
                    name: item.textContent.trim(),
                    position: index + 1
                }));

                $(function() {
                    $(document).find('.spinner-block').removeClass('hidden');
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        }
                    });

                    $.ajax({
                        url: "{{ route('admin.updateMainMenuOrder') }}",
                        method: 'POST',
                        data: {
                            _token: "{{ csrf_token() }}",
                            positions: positions
                        },
                        success: function(response) {
                            $(document).find('.spinner-block').addClass('hidden');
                            toastr.success(response.message);
                        },
                        error: function(xhr, status, error) {
                            $(document).find('.spinner-block').addClass('hidden');
                            toastr.error(error);
                        }
                    });
                });
            }
        });

        //Jquery code section
        $(document).ready(function() {

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
                function() {
                    $(this).css('cursor', 'pointer');
                }
            );

            $(document).on('click', '.sortable-item', function() {
                $(document).find('.spinner-block').removeClass('hidden');

                var grandparent = $(this).parent().parent();
                var grandparentId = grandparent.attr('id');
                var nextblockId = generateNextMenuBlockId(grandparentId);
                $('#' + grandparentId).find('.sortable-item').removeClass('active');
                $(this).addClass('active');
                let itemId = $(this).data('itemid');
                let data = {
                    _token: "{{ csrf_token() }}",
                    type: grandparentId == 'menuBlock-1' ? 'menuItems' : 'subMenuItems'
                };

                $.ajax({
                    url: getMenuItems.replace('__placeholder__', itemId),
                    method: 'GET',
                    data: data,
                    dataType: 'json',
                    success: function(response) {
                        var HtmlHead = `<div id="${nextblockId}" class="subMenuList w-[100%] border-[2px] border-gray-300 px-3 py-3 rounded-[8px]">
                                  <div class="mb-5">
                                    <span class="font-bold">Sub Menu ${grandparentId.split('-')[1]}</span>
                                  </div>
                                  <ul id="sortableList2" class="sortable-list ${nextblockId}-sortable-list">`;
                        var htmlfoot = `</ul>
                                </div>`;
                        var ulList = ``;

                        response.data.forEach(element => {
                            ulList = ulList +
                                `<li class="sortable-item submenu-sortable-item" data-itemId="${element.id}">${element.title}</li>`
                        });

                        var finalHtml = HtmlHead + ulList + htmlfoot;

                        var submenu = $('#' + nextblockId);
                        $(document).find('.spinner-block').addClass('hidden');

                        if (submenu.length == 0) {
                            $('#' + grandparentId).after(finalHtml);

                            // Initialize Sortable for the new submenu block
                            new Sortable(document.querySelector(
                                `.${nextblockId}-sortable-list`), {
                                    animation: 500,
                                    ghostClass: 'sortable-ghost',
                                    onEnd: function(evt) {
                                        const items = document.querySelectorAll(
                                            `.${nextblockId}-sortable-list .sortable-item`
                                            );
                                        const positions = Array.from(items).map((item,
                                            index) => ({
                                            name: item.textContent.trim(),
                                            position: index + 1
                                        }));
                                        $(document).find('.spinner-block').removeClass(
                                            'hidden');

                                        $.ajaxSetup({
                                            headers: {
                                                'X-CSRF-TOKEN': $(
                                                    'meta[name="csrf-token"]'
                                                    ).attr('content')
                                            }
                                        });

                                        $.ajax({
                                            url: "{{ route('admin.updateMenuItemOrder') }}",
                                            method: 'POST',
                                            data: {
                                                _token: "{{ csrf_token() }}",
                                                positions: positions
                                            },
                                            success: function(response) {
                                                $(document).find(
                                                        '.spinner-block')
                                                    .addClass('hidden');
                                                toastr.success(response
                                                    .message);
                                            },
                                            error: function(xhr, status,
                                            error) {
                                                $(document).find(
                                                        '.spinner-block')
                                                    .addClass('hidden');
                                                toastr.error(error);
                                            }
                                        });
                                    }
                                });
                        } else {
                            $('.' + nextblockId + '-sortable-list').html(ulList);

                            // Remove nested submenus
                            var grandparentIdExtractedLastValue = parseInt(grandparentId.split(
                                '-')[1], 10);
                            grandparentIdExtractedLastValue++;
                            var nextSubmenu;
                            do {
                                grandparentIdExtractedLastValue++;
                                nextSubmenu = $('#menuBlock-' +
                                grandparentIdExtractedLastValue);
                                if (nextSubmenu.length > 0) {
                                    nextSubmenu.remove();
                                }
                            } while (nextSubmenu.length > 0);
                        }
                    },
                    error: function(xhr, status, error) {
                        $(document).find('.spinner-block').addClass('hidden');

                        toastr.error(xhr.responseJSON.message);
                    }
                });
            });
        });
    </script>
@endpush
