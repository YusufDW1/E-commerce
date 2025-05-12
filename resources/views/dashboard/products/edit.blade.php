<x-layouts.app :title="__('Edit Product')">
    <flux:heading size="xl">Edit Product</flux:heading>

    <form action="{{ route('products.update', $product) }}" method="POST" class="space-y-4">
        @csrf @method('PUT')

        <flux:input label="Name" name="name" :value="$product->name" />
        <flux:input label="Slug" name="slug" :value="$product->slug" />
        <flux:input label="SKU" name="sku" :value="$product->sku" />
        <flux:input type="number" step="0.01" label="Price" name="price" :value="$product->price" />
        <flux:input type="number" label="Stock" name="stock" :value="$product->stock" />
        <flux:textarea label="Description" name="description">{{ $product->description }}</flux:textarea>

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
