<form>
	<div class="form-group">
		<label for="exampleFormControlInput1">Name:</label>
		<input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Enter Name" wire:model="name">

        @error('name') <span class="text-danger">{{ $message }}</span>@enderror

    </div>
		<div class="form-group">
			<label for="exampleFormControlInput2">Salary:</label>
			<input type="text" class="form-control" id="exampleFormControlInput2" placeholder="Enter Salary" wire:model="salary">

        @error('salary') <span class="text-danger">{{ $message }}</span>@enderror

    </div>
	<div class="form-group">
			<label for="exampleFormControlInput3">Salary:</label>
			<input type="file" class="form-control" id="exampleFormControlInput3" placeholder="Upload file" wire:model="file">

        @error('file') <span class="text-danger">{{ $message }}</span>@enderror

    </div>
		<button wire:click.prevent="store()" class="btn btn-success">Save</button></br>
	</form>
	