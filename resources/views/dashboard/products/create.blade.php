<x-layouts.app :title="__('Add Product')">
    <flux:heading size="xl">Add Product</flux:heading>

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

    <form action="{{ route('products.store') }}" method="POST" class="space-y-4">
        @csrf

        <flux:input label="Name" name="name" />
        <flux:input label="Slug" name="slug" />
        <flux:input label="SKU" name="sku" />
        <flux:input type="number" step="0.01" label="Price" name="price" />
        <flux:input type="number" label="Stock" name="stock" />
        <flux:textarea label="Description" name="description" />
        <flux:input label="Image URL" name="image_url" />
        <flux:checkbox label="Active" name="is_active" checked />

        <flux:select label="Category" name="product_category_id">
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}">{{ $cat->name }}</option>
            @endforeach
        </flux:select>

        <flux:button type="submit" color="primary">Create</flux:button>
    </form>
</x-layouts.app>