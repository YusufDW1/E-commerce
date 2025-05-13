<x-layouts.app :title="__('Add Category')">
    <div class="relative mb-6 w-full">
        <flux:heading size="xl">Add New Product Category</flux:heading>
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

    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <flux:input label="Name" name="name" class="mb-3" />
        <flux:input label="Slug" name="slug" class="mb-3" />
        <flux:textarea label="Description" name="description" class="mb-3" />
        <flux:input type="file" label="Image" name="image" class="mb-3" />

        <flux:separator />

        <div class="mt-4">
            <flux:button type="submit" variant="primary">Save</flux:button>
            <flux:link href="{{ route('categories.index') }}" variant="ghost" class="ml-3">Back</flux:link>
        </div>
    </form>
</x-layouts.app>