@extends('admin.layouts.mainLayout')

@section('content')
    <div class="w-[100%] h-[70px] border-[2px] border-gray-300 px-3 py-3 mb-5 rounded-[8px] flex">
        <div class="menuSetting w-[100%] flex items-center justify-center bg-blue-400 text-white rounded-[8px] gap-6">
            <span class="font-bold text-2xl">Menu Settings</span>
            <i class="fa-solid fa-screwdriver-wrench text-2xl"></i>
        </div>
    </div>

    <div class="w-[200px] text-gray-700 flex justify-between my-4 p-4 bg-blue-50 rounded-lg shadow-md"><a
            href="{{ route('admin.Menu') }}"><span class="underline hover:text-blue-400">Menu</span></a><span
            class="font-bold">></span><span>Menu
            Settings</span>
    </div>

    <div class="w-full bg-white rounded-lg shadow-md p-6">
        <table id='dataTable' class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4">Menu Name</th>
                    <th scope="col" class="px-6 py-4">Menu URL</th>
                    <th scope="col" class="px-6 py-4">Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finalMenuData as $menu)
                    <tr class="bg-white border-b hover:!bg-blue-50 transition-all duration-200 ease-in-out cursor-pointer">
                        <td class="px-6 py-[90px] font-medium text-gray-900 leading-relaxed">
                            {{ $menu['menu_name'] ?? $menu['title'] }}</td>
                        <td class="px-6 py-[90px] leading-relaxed">{{ $menu['url'] }}</td>
                        <td class="px-6 py-[90px]">
                            <span
                                class="px-2 py-1 text-xs font-semibold rounded-full {{ $menu['status'] === 'active' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                {{ $menu['status'] }}
                            </span>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@push('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable({
                responsive: true,
                pageLength: 10,
                lengthMenu: [
                    [10, 25, 50, -1],
                    [10, 25, 50, "All"]
                ],
                language: {
                    search: "Search menus:",
                    info: "Showing _START_ to _END_ of _TOTAL_ entries",
                    infoEmpty: "Showing 0 to 0 of 0 entries",
                    infoFiltered: "(filtered from _MAX_ total entries)"
                },
                dom: '<"flex items-center gap-4 mb-4"<"flex items-center gap-2"l><"flex items-center gap-2"f>>rtip'
            });
        });
    </script>
@endpush
