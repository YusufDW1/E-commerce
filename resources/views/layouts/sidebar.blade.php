

<ul class="space-y-2">

    {{-- Menu Dashboard --}}
    <li>
        <a href="{{ route('dashboard') }}"
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">
            <i class="fas fa-home mr-2"></i>
            <span>Dashboard</span>
        </a>
    </li>

    {{-- Menu Categories --}}
    <li>
        <a href="{{ route('categories.index') }}"
           class="flex items-center p-2 text-gray-900 rounded-lg hover:bg-gray-200 dark:text-white dark:hover:bg-gray-700">
            <i class="fas fa-tags mr-2"></i> {{-- Ganti dengan icon sesuai selera --}}
            <span>Categories</span>
        </a>
    </li>

</ul>
