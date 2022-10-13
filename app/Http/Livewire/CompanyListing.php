<?php

namespace App\Http\Livewire;

use Livewire\Component;

use App\Models\Driver;
use App\Models\Company;
use Illuminate\Support\Facades\Session;

class CompanyListing extends Component
{
    public $searchCompany='';
    public $selectedName=[];
    public $selectedAddress=[];
    public $selectedPhone=[];  

    public function edit($id)
    {
        $company=Company::find($id);

        $company->update([
            'name' => $this->selectedName[$company->id],
            'address' => $this->selectedAddress[$company->id],
            'phone' => $this->selectedPhone[$company->id],
        ]);

        Session::flash('success', __('Company Updated Successfully'));
    }

    public function delete($id)
    {
        $company=Company::find($id)->delete();

        Session::flash('error', __('Company Deleted Successfully'));
    }
    public function render()
    {
        $companies=Company::
        when($this->searchCompany,function($query){
            return $query->where('name','like','%'.$this->searchCompany.'%')->orWhere('address','like','%'.$this->searchCompany.'%')->orWhere('phone','like','%'.$this->searchCompany.'%');
        })
        ->get();

        foreach ($companies as  $company) {
            $this->selectedName[$company->id]=$company->name;
            $this->selectedAddress[$company->id]=$company->address;
            $this->selectedPhone[$company->id]=$company->phone;
        }
        return view('livewire.company-listing',[
            'companies' => $companies, 
        ]);
    }
}
