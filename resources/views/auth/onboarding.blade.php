<x-app-layout>
 

  






  <main class="main-content position-relative mt-7  h-100 mb-10 border-radius-lg ">

      
  





    
    <div class="container-fluid mb-4 py-4">


          <!-- Wizard -->
    <div class="row mt-5 mb-4">
      <div class="col-12 col-lg-12 m-auto">
      <div class="card">
      <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
      <div class="bg-gradient-success shadow-success border-radius-lg pt-4 pb-3">
      <div class="multisteps-form__progress">
       <button class="multisteps-form__progress-btn js-active" type="button" title="Personal Info">
      <span>Personal Info</span>
      </button>
      <button class="multisteps-form__progress-btn" type="button" title="Address">Address</button>
      <button class="multisteps-form__progress-btn" type="button" title="Contact Info">Contact Info</button>
     
      </div>
      </div>
      </div>
      <div class="card-body">
      <form method="POST" action="{{ route('save-user-info',['user'=>$user]) }}" class="multisteps-form__form" autocomplete="off" >
        @csrf 
        
      <div class="multisteps-form__panel border-radius-xl bg-white js-active" data-animation="FadeIn">
      <h5 class="font-weight-bolder mb-0">Personal Info</h5>
      <p class="mb-0 text-sm">Mandatory information</p>
      <div class="multisteps-form__content">

        <div class="row mt-3">
          
          <div class="col-12 col-sm-6 mx-auto pe-7 mt-sm-0">
          
          {{-- <div class="form-check  form-switch col d-flex justify-content-center align-items-center mt-0 mb-0">
            <label class="form-check-label mb-0 me-2" for="language">Language:</label>
                <label class="form-check-label mb-0 me-6" for="language">English</label>
              <input class="form-check-input" type="checkbox" id="language" name="language">
              <label class="form-check-label mb-0 ms-3" for="language">Afrikaans</label>
            </div> --}}

          

          </div>
          </div>

      <div class="row mt-3">
      <div class="col-12 col-sm-6">
        <div  class="input-group input-group-outline  @error('Name') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                    
          <input type="text" class="multisteps-form__input form-control" name="Name" id="Name"  value="{{ $user->name }}" placeholder="Name">
        </div>
        @error('Name')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
        <div  class="input-group input-group-outline  @error('Surname') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                  
          <input type="text" class="multisteps-form__input form-control" name="Surname" id="Surname"  value="{{ old('Surname') }}" placeholder="Surname">
        </div>
        @error('Surname')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      </div>
      <div class="row mt-3">
      <div class="col-12 col-sm-6">
        <div id="IDNumber" class="input-group input-group-outline  @error('IDNumber') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                  
          <input type="text" class="multisteps-form__input form-control" name="IDNumber" id="IDNumber"  value="{{ old('IDNumber') }}" placeholder="Identity Number"  maxlength="13" size="13" onchange="getDOB(this.value)">
        </div>
        <span class="invalid-feedback" role="alert" id="error"></span>
        @error('IDNumber')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-12 col-sm-6 pt-3 mt-sm-0" style=" margin-top: 25px;">
        <div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">

          <input type="radio" class="btn-check form-check-input" name="radioGender" id="Male" value="M"  checked  />
          <label class="btn btn-secondary" for="Male">Male</label>

          <input type="radio" class="btn-check form-check-input" name="radioGender" id="Female" value="F"  />
          <label class="btn btn-secondary" for="Female">Female</label>

        </div>
      </div>
      </div>
      <div class="row mt-3">
      <div class="col-12 col-sm-6">
        <div  class=" py-2  pt-4  col d-flex justify-content-center align-items-center mx-auto">
          <div style="white-space:nowrap;" class="px-4">
         <label class="form-label">Date Of Birth</label>
     
            </div>
         <div id="inputDayDiv" class="input-group input-group-outline @error('inputDay') is-invalid @enderror">
           
           <input type="text" onkeypress="return isNumberKey(event)" class="multisteps-form__input form-control" name="inputDay" id="inputDay" value="{{ old('inputDay') }}" placeholder="DD" maxlength="2" size="2">
           @error('inputDay')
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
           </span>
          @enderror
          </div>
         <span class="px-2">/</span>
          <div id="inputMonthDiv" class="input-group input-group-outline @error('inputMonth') is-invalid @enderror">
           
           <input type="text" onkeypress="return isNumberKey(event)" class="multisteps-form__input form-control" name="inputMonth" id="inputMonth" value="{{ old('inputMonth') }}" placeholder="MM" maxlength="2" size="2" >
           
          </div>
          @error('inputMonth')
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
           </span>
          @enderror
         <span class="px-2">/</span>
         <div id="inputYearDiv" class="input-group input-group-outline @error('inputYear') is-invalid @enderror">
           
           <input type="text" onkeypress="return isNumberKey(event)" class="multisteps-form__input form-control" name="inputYear" id="inputYear" value="{{ old('inputYear') }}" placeholder="YYYY" maxlength="4" size="4">
           @error('inputYear')
           <span class="invalid-feedback" role="alert">
                   <strong>{{ $message }}</strong>
           </span>
          @enderror
          </div>
     
     
     
                           </div>
      </div>
      <div class="col-12 col-sm-6 mt-3 mt-sm-0">
        <div  class=" pb-2 ">
          <label class="form-label col d-flex justify-content-center mx-auto">Marital status</label>
          <div class="btn-group  col d-flex justify-content-center align-items-center mx-auto">

              <input type="radio" class="btn-check form-check-input" name="marital_status" id="Married" value="1"  checked  />
              <label class="btn btn-secondary" for="Married">Married</label>

              <input type="radio" class="btn-check form-check-input" name="marital_status" id="Single" value="2"  />
              <label class="btn btn-secondary" for="Single">Single</label>

              <input type="radio" class="btn-check form-check-input" name="marital_status" id="Widowed" value="3"  />
              <label class="btn btn-secondary" for="Widowed">Widowed</label>

              <input type="radio" class="btn-check form-check-input" name="marital_status" id="Divorced" value="4"/>
              <label class="btn btn-secondary" for="Divorced">Divorced</label>
            </div>
            
      </div>
      </div>
      </div>
      <div class="button-row d-flex mt-4">
      <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
      </div>
      </div>
      </div>
      







      <div class="multisteps-form__panel border-radius-xl bg-white" data-animation="FadeIn">
      <h5 class="font-weight-bold mb-0">Location</h5>
      <p class="mb-0 text-sm">Tell us where you live</p>
      <div class="multisteps-form__content">
      <div class="row mt-3">
      <div class="col">
        <div  class="input-group input-group-outline  @error('Line1') is-invalid focused is-focused  @enderror  mb-0" >
                    
          <input type="text" class="multisteps-form__input form-control" name="Line1" id="Line1"  value="{{ old('Line1') }}">
        </div>
        @error('Line1')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      </div>
      <div class="row mt-3">
      <div class="col-6 col-sm-6">
        <div  class="input-group input-group-outline  @error('Line2') is-invalid focused is-focused  @enderror  mb-0" >
                      
          <input type="text" class="multisteps-form__input form-control" name="Line2" id="Line2"  value="{{ old('Line2') }}" placeholder="Add Line 2">
        </div>
        @error('Line2')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-6 col-sm-6">
        <div  class="input-group input-group-outline  @error('TownSuburb') is-invalid focused is-focused  @enderror  mb-0" >
                    
          <input type="text" autocomplete="off" class="multisteps-form__input form-control" name="TownSuburb" id="TownSuburb"  value="{{ old('TownSuburb') }}" placeholder="Town/Suburb">
        </div>
        @error('TownSuburb')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      </div>
      <div class="row mt-3">
      <div class="col-12 col-sm-6">
        <div  class="input-group input-group-outline  @error('City') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                      
          <input type="text" class="multisteps-form__input form-control" name="City" id="City"  value="{{ old('City') }}" placeholder="City">
        </div>
        @error('City')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-6 col-sm-4 mt-3 mt-sm-0">
        <div  class="input-group input-group-outline  @error('Province') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                                  
          <input type="text" class="form-control" name="Province" id="Province"  value="{{ old('Province') }}" placeholder="Province">
        </div>
        @error('Province')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-6 col-sm-2 mt-3 mt-sm-0">
        <div  class="input-group input-group-outline  @error('PostalCode') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                      
          <input type="text" class="multisteps-form__input form-control" name="PostalCode" id="PostalCode"  value="{{ old('PostalCode') }}" placeholder="Postal Code">
        </div>
        @error('PostalCode')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      </div>
      <div class="row">

        <div class="col-6 col-sm-4 mt-3 mt-sm-0 mx-auto">
          <div  class="input-group input-group-outline  @error('Country') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                                    
            <input type="text" class="form-control" name="Country" id="Country"  value="{{ old('Province') }}" placeholder="Country">
          </div>
          @error('Country')
                    <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                    </span>
            @enderror
        </div>
        </div>
       
        </div>
      <div class="button-row d-flex mt-4">
      <button class="btn btn-outline-dark mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
      <button class="btn bg-gradient-dark ms-auto mb-0 js-btn-next" type="button" title="Next">Next</button>
      </div>
      </div>
      
      
      <div class="multisteps-form__panel border-radius-xl bg-white" data-animation="FadeIn">
      <h5 class="font-weight-bolder mb-0">Contact Details</h5>
      <p class="mb-0 text-sm">Please provide at least one</p>
      <div class="multisteps-form__content">
      <div class="row mt-3">
      <div class="col-12">
        <div  class="input-group input-group-outline  @error('Telephone') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                  
          <input type="number" class="form-control" name="Telephone" id="Telephone"  value="{{ old('Telephone') }}" placeholder="Telephone (Cell)"  maxlength="10">
        </div>
        @error('Telephone')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-12 mt-3">
        <div  class="input-group input-group-outline  @error('WorkTelephone') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                  
          <input type="number" class="form-control" name="WorkTelephone" id="WorkTelephone"  value="{{ old('WorkTelephone') }}" placeholder="Telephone (Work)">
        </div>
        @error('WorkTelephone')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      <div class="col-12 mt-3">
        <div  class="input-group input-group-outline  @error('Email') is-invalid focused is-focused  @enderror mt-3 mb-0" >
                  
          <input type="email" class="form-control" name="Email" id="Email"  value="{{ $user->email}}" placeholder="Email">
        </div>
        @error('Email')
                  <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                  </span>
          @enderror
      </div>
      </div>
      <div class="row">
      <div class="button-row d-flex mt-4 col-12">
      <button class="btn btn-outline-dark mb-0 js-btn-prev" type="button" title="Prev">Prev</button>
      <button class="btn bg-gradient-success ms-auto mb-0" type="submit" title="Add">Add</button></div>
      </div>
      </div>
      </div>
      
   

      </form>



      </div>
      </div>
      </div>
      
      </div>

  <!-- End Wizard -->




    </div>
    
  </main>
 





</x-app-layout>

