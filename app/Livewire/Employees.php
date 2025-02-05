<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Emp;

class Employees extends Component
{
	public $employees, $name, $salary, $employees_id;
	public $updateMode = false;
	public $filterValue = '';
    public $items;
	
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
		$this->employees = Emp::query()
			->when($this->filterValue, function ($query) {
				// Filter by name
				$query->where(function ($query) {
					$query->where('name', 'like', '%' . $this->filterValue . '%')
						  ->orWhere('salary', 'like', '%' . $this->filterValue . '%');
				});
			})
			->get();
	}

	 public function mount()
    {
        // Initial load of employees without filter
        $this->employees = Emp::all();
    }
	  
    public function render()
    {
		//$this->employees = Emp::all();
        return view('livewire.employees');
    }
	
	 
	
	private function resetInputFields(){

	$this->name = '';

	$this->salary = '';

    }
	
    public function store()
    {
        $validatedDate = $this->validate([

            'name' => 'required',

            'salary' => 'required',

        ]);
		
        Emp::create($validatedDate); 

        session()->flash('message', 'Employees Created Successfully.');  

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
