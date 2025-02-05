<form>

    <input type="hidden" wire:model="employees_id">

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

    <button wire:click.prevent="update()" class="btn btn-dark">Update</button>

    <button wire:click.prevent="cancel()" class="btn btn-danger">Cancel</button>

</form>