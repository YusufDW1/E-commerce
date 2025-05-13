<x-layouts.app :title="__('Edit Product')">
    <flux:heading size="xl">Edit Product</flux:heading>

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

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
        @csrf
        @method('PUT')

        <flux:input label="Name" name="name" :value="$product->name" />
        <flux:input label="Slug" name="slug" :value="$product->slug" />
        <flux:input label="SKU" name="sku" :value="$product->sku" />
        <flux:input type="number" step="0.01" label="Price" name="price" :value="$product->price" />
        <flux:input type="number" label="Stock" name="stock" :value="$product->stock" />
        <flux:textarea label="Description" name="description">{{ $product->description }}</flux:textarea>
        <flux:input label="Image URL" name="image_url" :value="$product->image_url" />
        <flux:checkbox label="Active" name="is_active" :checked="$product->is_active" />

        <flux:select label="Category" name="product_category_id">
            <option value="">-- Select Category --</option>
            @foreach($categories as $cat)
                <option value="{{ $cat->id }}" @selected($product->product_category_id == $cat->id)>
                    {{ $cat->name }}
                </option>
            @endforeach
        </flux:select>

        <flux:button type="submit" color="primary">Update</flux:button>
    </form>
</x-layouts.app>