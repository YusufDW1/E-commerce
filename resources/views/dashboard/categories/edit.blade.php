<x-layouts.app :title="__('Edit Category')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Update Product Category</flux:heading>
        <flux:subheading size="lg" class="mb-6">Manage Product Categories</flux:subheading>
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

    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PATCH')

        <flux:input label="Name" name="name" value="{{ $category->name }}" class="mb-3" />
        <flux:input label="Slug" name="slug" value="{{ $category->slug }}" class="mb-3" />
        <flux:textarea label="Description" name="description" class="mb-3">{{ $category->description }}</flux:textarea>

        @if($category->image)
            <div class="mb-3">
                <img src="{{ \Storage::url($category->image) }}" alt="{{ $category->name }}" class="w-32 h-32 object-cover rounded">
            </div>
        @endif
        <flux:input type="file" label="Image" name="image" class="mb-3" />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Update</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>