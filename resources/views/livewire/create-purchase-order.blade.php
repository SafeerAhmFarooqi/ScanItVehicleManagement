<div>
    {{-- Be like water. --}}
    <div class="card mb-5 mb-xl-10">
        @include('common.validation')
        <div class="alert alert-danger">
            <h3>Note All Fields Are Required Empty field form will not be stored</h3>
        </div>
        <!--begin::Card header-->
        <div class="card-header">
            <!--begin::Heading-->
           
            <!--end::Heading-->
            <!--begin::Toolbar-->
            <form wire:submit.prevent="submitPurchaseOrder">
        
                <div class="card-toolbar">
                    <div class="my-1 me-4">
                       
                    
                
                    <!--begin::Repeater-->
      <div id="kt_docs_repeater_basic">
        <!--begin::Form group-->
    @foreach ($forms as $key => $value)
    <div class="form-group">
        <div data-repeater-list="kt_docs_repeater_basic">
            <div data-repeater-item>
                <div class="form-group row">
                    <div class="col-md-2">
                        <label class="form-label">Date Of Purchase</label>
                        <input type="date" class="form-control mb-2 mb-md-0" placeholder="Date" wire:model="selectedDateOfPurchase.{{$key}}"/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Invoice Number</label>
                        <input type="text" class="form-control mb-2 mb-md-0" placeholder="Invoice Number" wire:model="selectedInvoiceNumber.{{$key}}"/>
                   
                      </div>
                    <div class="col-md-2">
                        <label class="form-label">Supplier Name</label>
                        {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                        
                        <select class="form-control mb-2 mb-md-0" placeholder="Expense Group" id="sel1" wire:model="selectedSupplier.{{$key}}">
                          <option value="" selected>Supplier Name</option>
                        @foreach ($suppliers as $supplier)
                            <option value="{{$supplier->id}}">{{$supplier->name}}</option>
                        @endforeach
                           
                      </select>
                     
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Product Category</label>
                        {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                        
                        <select class="form-control mb-2 mb-md-0" placeholder="Product Category" id="sel1" wire:model="selectedProductCategory.{{$key}}">
                          <option value="" selected>Product Category</option>
                        @foreach ($productCategories as $productCategory)
                            <option value="{{$productCategory->id}}">{{$productCategory->name}}</option>
                        @endforeach
                           
                      </select>
                     
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Product Name</label>
                        {{-- <input type="email" class="form-control mb-2 mb-md-0" placeholder="Enter full name" name="name1" id="check1"/> --}}
                        
                        <select class="form-control mb-2 mb-md-0" placeholder="Product Name" id="sel1" wire:model="selectedProduct.{{$key}}">
                          <option value="" selected>Product Name</option>
                          @foreach ($products[$key] as $product)
                          <option value="{{$product->id}}">{{$product->name}}</option>
                      @endforeach
                           
                      </select>
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Specification</label>
                        <input type="text" class="form-control mb-2 mb-md-0" placeholder="Specification" wire:model="selectedSpecification.{{$key}}" disabled/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Rate</label>
                        <input type="text" class="form-control mb-2 mb-md-0" placeholder="Rate" wire:model="selectedRate.{{$key}}" disabled/>
                   
                      </div>
                   
                      <div class="col-md-2">
                        <label class="form-label">Quantity</label>
                        <input type="number" class="form-control mb-2 mb-md-0" placeholder="Quantity"  id="quantity" wire:model="selectedQuantity.{{$key}}" />
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Amount</label>
                        <input type="number" class="form-control mb-2 mb-md-0" placeholder="Amount" id="amount" wire:model="selectedAmount.{{$key}}" disabled/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Delivery Date</label>
                        <input type="date" class="form-control mb-2 mb-md-0" placeholder="Delivery Date" wire:model="selectedDeliveryDate.{{$key}}"/>
                   
                      </div>
                      <div class="col-md-2">
                        <label class="form-label">Notes</label>
                        <input type="text" class="form-control mb-2 mb-md-0" placeholder="Notes" wire:model="selectedNote.{{$key}}"/>
                   
                      </div>
                      
                      
                    
                    <div class="col-md-2">
                        <a href="javascript:;" data-repeater-delete class="btn btn-sm btn-light-danger mt-3 mt-md-8" wire:click="deleteForm({{$key}})">
                            <i class="la la-trash-o"></i>Delete
                        </a>
                    </div>
                </div>
                <hr>
            </div>
        </div>
    </div>
    @endforeach
        
        
        <!--end::Form group-->
    
        <!--begin::Form group-->
        <div class="form-group mt-5">
            <a href="javascript:;" data-repeater-create class="btn btn-light-primary" wire:click="addForm">
                <i class="la la-plus"></i>Add
            </a>
        </div>
        <!--end::Form group-->
    </div>
    
    <!--end::Repeater-->
    <div class="my-1 me-4 mt-8">
        <!--begin::Select-->
        <button type="submit" class="btn btn-primary">Save</button>    <!--end::Select-->
    </div>
                    {{-- <a href="#" class="btn btn-sm btn-primary my-1">View All</a> --}}
                </div>
            </form>
           
            
            <!--end::Toolbar-->
        </div>
        <!--end::Card header-->
        <!--begin::Card body-->
        



        
        <!--end::Card body-->
    </div>
</div>
