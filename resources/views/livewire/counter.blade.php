<div>
    {{-- The best athlete wants his opponent at his best. --}}
	<h2>{{$msg}} </h2>
	<h2>{{$name}} </h2>
	<h2>{{$counter}} </h2>
		<button wire:click="update('hello welcome code')">Update content</button>
		<input type="text" wire:model="name">
</div>
