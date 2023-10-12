

<x-guest-layout>
    <main class="main-content  mt-0">

        <div class="page-header align-items-start min-vh-100 pb-8" style="background-image: url('https://images.unsplash.com/photo-1627850991511-fd5640f0b472?ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&ixlib=rb-1.2.1&auto=format&fit=crop&w=1951&q=80');">
        {{-- <span class="mask bg-gradient-dark opacity-6"></span> --}}
          <div class="container my-auto">
            <div class="d-flex align-items-center mb-6">
                {{-- <img src="/img/GBA-LOGO-white.png"  alt="GBA Logo"  class="col-lg-2 col-md-4 col-4 mx-auto"> --}}
                <x-application-logo class="col-lg-2 col-md-4 col-4 mx-auto" />
            </div>
          <div class="row">
              <div class="col-lg-4 col-md-8 col-12 mx-auto">
                <div class="card z-index-0 fadeIn3 fadeInBottom">
                  <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                    <div class="bg-gradient-success shadow-success border-radius-lg py-3 pe-1 text-center">
                      <h4 class="text-white font-weight-bolder text-center mt-2 mb-0">Set Password</h4>
                      
                      <div class="row mt-3">
    
                    <!-- Session Status -->
                        <x-auth-session-status class="text-white mt-2 text-sm text-center" :status="session('status')" />

                       
                    <!-- Validation Errors -->
                        <x-auth-validation-errors class="text-white mt-2 text-sm text-center" :errors="$errors" />
    
                    </div>
    
                    </div>
                  </div>

                  <div class="row px-xl-5 px-sm-4 px-3 ">
                    <div class="mt-2 position-relative text-center">
                    <p class="text-sm font-weight-bold mb-2 text-secondary text-border d-inline z-index-2 bg-white px-3">
                    {{-- or --}}
                    </p>
                    </div>
                    </div>

                  <div class="card-body">
        <form method="POST">
            @csrf

            <input type="hidden" name="email" value="{{ $user->email }}"/>

            

            <!-- Password -->
            <div class="input-group input-group-dynamic mb-3">
              
                <input id="password" type="password" name="password" class="form-control" required autocomplete="new-password" placeholder="Password" aria-label="Password">
                
            </div>
            

            <!-- Confirm Password -->
            <div class="input-group input-group-dynamic mb-3">
               
                <input id="password_confirmation" type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" required autocomplete="new-password" >
            </div>
            
            <div class="text-center">
                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Save password and login</button>
            </div>
            
                
            
        </form>
    </div>
</div>
</div>
</div>
</div>




</div>
</main>
<!--   Core JS Files   -->
<script src="/js/core/popper.min.js"></script>
<script src="/js/core/bootstrap.min.js"></script>
<script src="/js/plugins/perfect-scrollbar.min.js"></script>
<script src="/js/plugins/smooth-scrollbar.min.js"></script>

</x-guest-layout>

