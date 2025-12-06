<x-layouts.panel>
    <x-slot:title>{{'Reset Password'}}</x-slot:title>
    
    <div class="holder w-100 h-full pt-5 position-absolute"></div>
    
    <div class="login rounded-3 s-400 p-3 mt-5 position-absolute">
        <h5 class="text-center">Request reset code</h5>
        <hr>
        <form>
            {{-- Send Verification Code --}}
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="Email@Provider.Domain">
              <label for="formId1">{{__('Email@Provider.Domain')}}</label>
              <em class="text-danger">Email is required</em>
            </div>
            <div class="text-end">
                <button class="btn btn-outline-success" title="Send Verification Code To Email">
                    <i class="fas fa-location-arrow"></i>
                    {{__('Send')}}
                </button>
            </div>
            {{-- Confirm Verification Code --}}
            <div class="form-floating mb-3">
              <input type="text" class="form-control" placeholder="Verification Code">
              <label for="formId1">{{__('Verification Code')}}</label>
              <em class="text-danger">Code is required</em>
            </div>
            <div class="text-end">
                <div class="btn-group">
                    <button class="btn btn-outline-danger" title="Resend Verification Code">
                        <i class="fas fa-refresh"></i>
                        {{__('Re-send')}}
                    </button>
                    <button class="btn btn-outline-success" title="Confirm Code To Reset Password">
                        <i class="fas fa-check-double"></i>
                        {{__('Confirm')}}
                    </button>
                </div>
            </div>
        </form>
    </div>

</x-layouts.panel>