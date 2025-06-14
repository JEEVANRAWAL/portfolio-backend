@extends('admin.layouts.mainLayout')

@section('content')
    <div class="w-[100%] border-[2px] border-gray-300 px-3 py-3 mb-5 rounded-[8px] flex">
        <div class="menuSetting w-[100%] flex items-center justify-center bg-blue-400 text-white rounded-[8px]"><span
                class="font-bold text-2xl">Menu Settings</span> <i class="fa-solid fa-screwdriver-wrench text-2xl"></i></div>
    </div>

    <div class="w-full">
        <table id='dataTable'>
            <thead>
                <tr>
                    <th>Menu Name</th>
                    <th>Menu URL</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($finalMenuData as $menu)
                    <tr>
                        <td>{{ $menu['menu_name'] ?? $menu['title'] }}</td>
                        <td>{{ $menu['url'] }}</td>
                        <td>{{ $menu['status'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#dataTable').DataTable();
        });
    </script>
@endpush
