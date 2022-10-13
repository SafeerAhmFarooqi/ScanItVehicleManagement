<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\RentalCompany;
use Illuminate\Support\Facades\Session;

class RentalCompanyListing extends Component
{
    public $searchRentalCompany='';
    public $selectedName=[];
  

    public function edit($id)
    {
        $rentalCompany=RentalCompany::find($id);

        $rentalCompany->update([
            'name' => $this->selectedName[$rentalCompany->id],
        ]);

        Session::flash('success', __('Rental Company Updated Successfully'));
    }

    public function delete($id)
    {
        $rentalCompany=RentalCompany::find($id)->delete();

        Session::flash('error', __('Rental Company Deleted Successfully'));
    }
    public function render()
    {
        $rentalCompanies=RentalCompany::
        when($this->searchRentalCompany,function($query){
            return $query->where('name','like','%'.$this->searchRentalCompany.'%');
        })
        ->get();

        foreach ($rentalCompanies as  $rentalCompany) {
            $this->selectedName[$rentalCompany->id]=$rentalCompany->name;
        }
        return view('livewire.rental-company-listing',[
            'rentalCompanies' => $rentalCompanies, 
        ]);
    }
}
