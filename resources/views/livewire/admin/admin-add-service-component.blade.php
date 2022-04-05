<div>
    <h1>Add new service</h1>
    <form wire.submit.prevent="">
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" wire:model="name" wire:keyup="generateSlug" />
            @error('name') <p>{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="slug">Slug</label>
            <input type="text" name="slug" wire:model="slug" wire:keyup="generateSlug" />
            @error('slug') <p>{{ $message }}</p> @enderror
        </div>
        <div class="form-group">
            <label for="discount_type">Discount type</label>
            <select name="discount_type" wire:model="discount_type">
                <option value="">Select</option>
                <option value="fixed">fixed</option>
                <option value="percent">percent</option>
            </select>
            @error('discount_type') <p>{{ $message }}</p> @enderror
        </div>

        <div class="form-group">
            <label for="service_category">Service category</label>
            <select name="service_category" wire:model="service_category">
                @foreach ($categories as $category )
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
            @error('service_category') <p>{{ $message }}</p> @enderror
        </div>

    </form>
</div>