<!-- Trigger Button -->
    <button id="openModalBtn" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg flex items-center gap-2 transition-all duration-200 shadow-lg hover:shadow-xl ml-auto">
        <i class="fas fa-plus"></i>
        Add Menu Item
    </button>

    <!-- Modal Overlay -->
    <div id="menuModal" class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4 hidden">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-2xl max-h-[90vh] overflow-hidden">
            <!-- Modal Header -->
            <div class="flex items-center justify-between p-6 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                <div class="flex items-center gap-3">
                    <i class="fas fa-bars text-blue-600 text-xl"></i>
                    <h2 class="text-xl font-semibold text-gray-800">Add Menu Item</h2>
                </div>
                <button id="closeModalBtn" class="text-gray-400 hover:text-gray-600 transition-colors p-1">
                    <i class="fas fa-times text-xl"></i>
                </button>
            </div>

            <!-- Tabs -->
            <div class="flex border-b border-gray-200 bg-gray-50">
                <button id="mainMenuTab" class="tab-btn flex-1 py-4 px-6 text-sm font-medium transition-all duration-200 text-blue-600 border-b-2 border-blue-600 bg-white">
                    Main Menu
                </button>
                <button id="subMenuTab" class="tab-btn flex-1 py-4 px-6 text-sm font-medium transition-all duration-200 text-gray-500 hover:text-gray-700">
                    Sub Menu
                </button>
            </div>

            <!-- Modal Content -->
            <div class="p-6 max-h-[60vh] overflow-y-auto">
                
                <!-- Main Menu Form -->
                <div id="mainMenuForm" class="tab-content">
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-[55px] mt-[55px]">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Menu Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="mainMenuName"
                                    name="menu_name"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter menu name"
                                    required
                                />
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    URL <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="mainMenuUrl"
                                    name="url"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="/dashboard"
                                    required
                                />
                            </div>

                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                Status
                            </label>
                            <select 
                                id="mainMenuStatus"
                                name="status"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            >
                                <option value="active">Active</option>
                                <option value="inactive">Inactive</option>
                            </select>
                        </div>

                        <div class="flex justify-end gap-3 pt-4 mb-[55px]">
                            <button id="cancelMainBtn" class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                Cancel
                            </button>
                            <button id="submitMainBtn" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center gap-2">
                                <i class="fas fa-plus"></i>
                                Add Main Menu
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sub Menu Form -->
                <div id="subMenuForm" class="tab-content hidden">
                    <div class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Sub Menu Name <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="subMenuName"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="Enter sub menu name"
                                    required
                                />
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    URL <span class="text-red-500">*</span>
                                </label>
                                <input 
                                    type="text" 
                                    id="subMenuUrl"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    placeholder="/products/list"
                                    required
                                />
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Parent Menu <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="subMenuParent"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    required
                                >
                                    <option value="">Select Parent Menu</option>
                                    <option value="1">Dashboard</option>
                                    <option value="2">Products</option>
                                    <option value="3">Users</option>
                                    <option value="4">Settings</option>
                                </select>
                            </div>
                            
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-700 mb-2">
                                    Status
                                </label>
                                <select 
                                    id="subMenuStatus"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                >
                                    <option value="active">Active</option>
                                    <option value="inactive">Inactive</option>
                                </select>
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-4">
                            <button id="cancelSubBtn" class="px-6 py-3 text-gray-700 bg-gray-100 hover:bg-gray-200 rounded-lg transition-colors duration-200">
                                Cancel
                            </button>
                            <button id="submitSubBtn" class="px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-colors duration-200 flex items-center gap-2">
                                <i class="fas fa-chevron-right"></i>
                                Add Sub Menu
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
           jQuery(document).ready(function($) {
            // Modal controls
            $('#openModalBtn').click(function() {
                $('#menuModal').removeClass('hidden');
                $('body').addClass('overflow-hidden');
                loadParentMenus();
            });

            function closeModal() {
                $('#menuModal').addClass('hidden');
                $('body').removeClass('overflow-hidden');
                resetForms();
            }

            $('#closeModalBtn, #cancelMainBtn, #cancelSubBtn').click(closeModal);

            // Close modal when clicking outside
            $('#menuModal').click(function(e) {
                if (e.target === this) {
                    closeModal();
                }
            });

            // Tab switching
            $('.tab-btn').click(function() {
                // Remove active class from all tabs
                $('.tab-btn').removeClass('text-blue-600 border-b-2 border-blue-600 bg-white').addClass('text-gray-500 hover:text-gray-700');
                
                // Add active class to clicked tab
                $(this).removeClass('text-gray-500 hover:text-gray-700').addClass('text-blue-600 border-b-2 border-blue-600 bg-white');

                // Hide all tab content
                $('.tab-content').addClass('hidden');

                // Show corresponding tab content
                if ($(this).attr('id') === 'mainMenuTab') {
                    $('#mainMenuForm').removeClass('hidden');
                } else {
                    $('#subMenuForm').removeClass('hidden');
                }
            });

            // Form submission handlers
            $('#submitMainBtn').click(function() {
                $(document).find('.spinner-block').removeClass('hidden');
                if (validateMainMenuForm()) {
                    var formData = {
                        _token: "{{csrf_token()}}",
                        menu_name: $('#mainMenuName').val(),
                        url: $('#mainMenuUrl').val(),
                        status: $('#mainMenuStatus').val()
                    };
                    
                    $.ajax({
                        url: '/admin/menu',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            toastr.success('Main menu added successfully!');
                            closeModal();
                            location.reload();
                        },
                        error: function(xhr, status, error) {
                            $(document).find('.spinner-block').addClass('hidden');
                            toastr.error('Error adding menu: ' + xhr.responseJSON.message);
                            closeModal();
                        }
                    });
                }
            });

            $('#submitSubBtn').click(function() {
                if (validateSubMenuForm()) {
                    var formData = {
                        name: $('#subMenuName').val(),
                        url: $('#subMenuUrl').val(),
                        parentId: $('#subMenuParent').val(),
                        order: $('#subMenuOrder').val(),
                        status: $('#subMenuStatus').val()
                    };
                    
                    console.log('Sub Menu Data:', formData);
                    
                    // Replace this with your AJAX call
                    /*
                    $.ajax({
                        url: '/api/submenu/create',
                        method: 'POST',
                        data: formData,
                        success: function(response) {
                            alert('Sub menu added successfully!');
                            closeModal();
                        },
                        error: function(xhr, status, error) {
                            alert('Error adding sub menu: ' + error);
                        }
                    });
                    */
                    
                    alert('Sub menu added successfully!');
                    closeModal();
                }
            });

            // Form validation functions
            function validateMainMenuForm() {
                var name = $('#mainMenuName').val().trim();
                var url = $('#mainMenuUrl').val().trim();
                
                if (!name) {
                    alert('Please enter menu name');
                    $('#mainMenuName').focus();
                    return false;
                }
                
                if (!url) {
                    alert('Please enter URL');
                    $('#mainMenuUrl').focus();
                    return false;
                }
                
                return true;
            }

            function validateSubMenuForm() {
                var name = $('#subMenuName').val().trim();
                var url = $('#subMenuUrl').val().trim();
                var parentId = $('#subMenuParent').val();
                
                if (!name) {
                    alert('Please enter sub menu name');
                    $('#subMenuName').focus();
                    return false;
                }
                
                if (!url) {
                    alert('Please enter URL');
                    $('#subMenuUrl').focus();
                    return false;
                }
                
                if (!parentId) {
                    alert('Please select parent menu');
                    $('#subMenuParent').focus();
                    return false;
                }
                
                return true;
            }

            // Reset forms
            function resetForms() {
                $('#mainMenuName, #mainMenuUrl').val('');
                $('#mainMenuStatus').val('active');
                $('#subMenuName, #subMenuUrl').val('');
                $('#subMenuParent').val('');
                $('#subMenuStatus').val('active');
                
                // Reset to main menu tab
                $('.tab-btn').removeClass('text-blue-600 border-b-2 border-blue-600 bg-white').addClass('text-gray-500 hover:text-gray-700');
                $('#mainMenuTab').removeClass('text-gray-500 hover:text-gray-700').addClass('text-blue-600 border-b-2 border-blue-600 bg-white');
                $('.tab-content').addClass('hidden');
                $('#mainMenuForm').removeClass('hidden');
            }

            // Function to load parent menus dynamically
            function loadParentMenus() {
                // Replace this with your AJAX call to fetch parent menus
                $.ajax({
                    url: 'admin/menu/list',
                    method: 'GET',
                    success: function(response) {
                        console.log('Parent Menus:', response);
                        var select = $('#subMenuParent');
                        select.find('option:not(:first)').remove();
                        response.forEach(function(menu) {
                            select.append('<option value="' + menu.id + '">' + menu.name + '</option>');
                        });
                    }
                });
            }
        });
    </script>