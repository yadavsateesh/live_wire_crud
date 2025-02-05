<div>
    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
	<div>  
    @if (session()->has('message'))

        <div class="alert alert-success">

            {{ session('message') }}

        </div>
    @endif  

    @if($updateMode)

        @include('livewire.update')

    @else

        @include('livewire.create')

    @endif  

    <table class="table table-bordered mt-5"></br>
			<input type="text" wire:model="filterValue" placeholder="Enter filter value"/>
			<!-- Filter Button -->
			<button wire:click="filter">Filter</button>
			<thead>
				<tr>
					<th>No.</th>
					<th>name</th>
					<th>salary</th>
					<th width="150px">Action</th>
				</tr>
			</thead>
			<tbody>
		@if($employees->isEmpty())
                    <tr>
					<td colspan="4" class="text-center">No data found.</td>
				</tr>
					@else

            @foreach($employees as $data)

            <tr>
					<td>{{ $data->id }}</td>
					<td>{{ $data->name }}</td>
					<td>{{ $data->salary }}</td>
					<td>
						<button wire:click="edit({{ $data->id }})" class="btn btn-primary btn-sm">Edit</button>
						<button wire:click="delete({{ $data->id }})" class="btn btn-danger btn-sm">Delete</button>
					</td>
				</tr>
            @endforeach
			 @endif
        </tbody>
		</table>
	</div>
</div>
