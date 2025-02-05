<div>
    {{-- Be like water. --}}
	<h1>Welcom new user :-</h1>
	@foreach($name as $user)
	@livewire('user-list',['user'=>$user])
	@endforeach
</div>
