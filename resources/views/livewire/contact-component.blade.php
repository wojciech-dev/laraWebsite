<div>
    <h1>Contact</h1>

    @if (Session::has('message'))
    <div>{{ Session::get('message') }}</div>
    @endif

    <form method="post" wire:submit.prevent="sendMessage">
        name
        <input type="text" name="name" wire:model="name"><br>
        @error('name') <p>{{ $message }}</p> @enderror
        email
        <input type="email" name="email" wire:model="email"><br>
        @error('email') <p>{{ $message }}</p> @enderror
        phone
        <input type="text" name="phone" wire:model="phone"><br>
        @error('phone') <p>{{ $message }}</p> @enderror

        <textarea name="message" cols="30" rows="10" wire:model="message"></textarea><br>
        @error('message') <p>{{ $message }}</p> @enderror
        <input type="submit" value="Sen message" name="submit">
    </form>
    <div id="result"></div>
</div>
