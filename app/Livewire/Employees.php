<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Emp;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
class Employees extends Component
{
	public  $name, $salary, $employees_id;
	public $updateMode = false;
	public $filterValue = null;
	use WithFileUploads;
	public $file;
	
	private function resetInputFields(){
		$this->name = '';
		$this->salary = '';
		$this->file = '';
    }
	
	/*  public function mount()
    {
        // Initial load of employees without filter
        $this->employees = Emp::all();
    }
	  
    public function render()
    {
		//$this->employees = Emp::all();
        return view('livewire.employees');
    } */
	
	
   // public $employees;	
	// Method to apply filter
   /*  public function filter()
    {
        $this->employees = Emp::query()
            ->when($this->filterValue, function ($query) {
                return $query->where('salary', 'like', '%' . $this->filterValue . '%');
            })
            ->get();
			//dd($this->items);
			//$this->employees = $this->items;
			//return view('livewire.employees');
    } */
	
 	public function filter()
	{
		$employees = Emp::query()
			->when($this->filterValue, function ($query) {
				// Filter by name
				$query->where(function ($query) {
					$query->where('name', 'like', '%' . $this->filterValue . '%')
						  ->orWhere('salary', 'like', '%' . $this->filterValue . '%');
				});
			})
			->get();
	} 
	
	 public function render()
    {
      /*   $employees = Emp::query()
            ->when($this->filterValue, function ($query) {
                $query->where('name', 'like', '%' . $this->filterValue . '%')
                      ->orWhere('salary', 'like', '%' . $this->filterValue . '%');
            })
            ->get(); */
			
		// If filterValue is empty, load all employees
		
		if (empty($this->filterValue)) {
			$employees = Emp::all();
		} else {
			$employees = Emp::query()
				->where('name', 'like', '%' . $this->filterValue . '%')
				->orWhere('salary', 'like', '%' . $this->filterValue . '%')
				->get();
		}

        return view('livewire.employees', compact('employees'));
    }	
	
	 public function store()
	{
		$validatedData = $this->validate([
			'name' => 'required',
			'salary' => 'required',
			'file' => 'required'
		]);
		
		// Generate a unique file name
        $fileName = time() . '.' . $this->file->getClientOriginalExtension();

        // Move file to `public/userImage/`
        $image = $this->file->storeAs('Image', $fileName, 'public_uploads');
		
		// Save the data along with the file path
		Emp::create([
			'name' => $this->name,
			'salary' => $this->salary,
			//'file' => asset('public/'.$image), // Store the file path in the database
			'file' => $image, // Store the file path in the database
		]);

		session()->flash('message', 'Employee Created Successfully.');

		$this->resetInputFields();
	}
	
   public function edit($id)
    {

		$employees = Emp::findOrFail($id);

		$this->employees_id = $id;

		$this->name = $employees->name;

		$this->salary = $employees->salary;

		$this->updateMode = true;

    }
	
    public function cancel()
    {
        $this->updateMode = false;

        $this->resetInputFields();

    }
	
	public function update()
    {
        $validatedDate = $this->validate([

            'name' => 'required',

            'salary' => 'required',

        ]);  

        $employees = Emp::find($this->employees_id);

        $employees->update([

            'name' => $this->name,

            'salary' => $this->salary,

        ]);    

        $this->updateMode = false;  

        session()->flash('message', 'Employees Updated Successfully.');

        $this->resetInputFields();

    }
	public function delete($id)
    {
        Emp::find($id)->delete();

        session()->flash('message', 'Employees Deleted Successfully.');
    }
}
