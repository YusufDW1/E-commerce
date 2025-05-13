<x-layouts.app :title="__('Products')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Products</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage Products</flux:subheading>
        <flux:separator variant="subtle" />
    </div>

    @if (session('success'))
        <flux:badge color="lime" class="mb-3 w-full">{{ session('success') }}</flux:badge>
    @endif
    @if ($errors->any())
        <flux:badge color="red" class="mb-3 w-full">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </flux:badge>
    @endif

    <div class="flex justify-between items-center mb-4">
        <div>
            <form action="{{ route('products.index') }}" method="GET">
                @csrf
                <flux:input icon="magnifying-glass" name="q" placeholder="Search Products" class="w-64" />
            </form>
        </div>
        <div>
            <flux:button icon="plus">
                <flux:link href="{{ route('products.create') }}" variant="subtle">Add New Product</flux:link>
            </flux:button>
        </div>
    </div>

    <table class="min-w-full bg-white dark:bg-zinc-800 rounded-lg shadow-md overflow-hidden">
        <thead class="bg-gray-100 dark:bg-zinc-700">
            <tr>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Name</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Slug</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">SKU</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Price</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Stock</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Image</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Category</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Description</th>
                <th class="p-4 text-left text-sm font-semibold text-gray-700 dark:text-gray-200">Actions</th>
            </tr>
        </thead>
        <tbody class="text-sm">
            @foreach($products as $product)
            <tr class="border-t">
                <td class="p-4">{{ $product->name }}</td>
                <td class="p-4">{{ $product->slug }}</td>
                <td class="p-4">{{ $product->sku }}</td>
                <td class="p-4">Rp {{ number_format($product->price, 2, ',', '.') }}</td>
                <td class="p-4">{{ $product->stock }}</td>
                <td class="p-4">
                    @if($product->image_url)
                        <img src="{{ $product->image_url }}" alt="{{ $product->name }}" class="h-10 w-10 object-cover rounded">
                    @else
                        <div class="h-10 w-10 bg-gray-200 flex items-center justify-center rounded">
                            <span class="text-gray-500 text-sm">N/A</span>
                        </div>
                    @endif
                </td>
                <td class="p-4">{{ $product->category ? $product->category->name : 'N/A' }}</td>
                <td class="p-4">{{ $product->description }}</td>
                <td class="p-4">
                    <flux:dropdown>
                        <flux:button icon:trailing="chevron-down" class="bg-white text-black border border-gray-300 hover:bg-gray-100">
                            Actions
                        </flux:button>
                        <flux:menu>
                            <flux:menu.item icon="pencil" href="{{ route('products.edit', $product) }}">Edit</flux:menu.item>
                            <flux:menu.item icon="trash" variant="danger" onclick="event.preventDefault(); if(confirm('Are you sure?')) document.getElementById('delete-form-{{ $product->id }}').submit();">Delete</flux:menu.item>
                            <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product) }}" method="POST">
                                @csrf
                                @method('DELETE')
                            </form>
                        </flux:menu>
                    </flux:dropdown>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="mt-3">
        {{ $products->links() }}
    </div>
</x-layouts.app>