<x-layouts.panel>
    <x-slot:title>{{'New Password'}}</x-slot:title>
    
    <div class="holder w-100 h-full pt-5 position-absolute"></div>
    
    <div class="login rounded-3 s-400 p-3 mt-5 position-absolute">
        <h5 class="text-center">Request reset code</h5>
        <hr>
        <form>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" placeholder="New Password">
              <label for="formId1">{{__('New Password')}}</label>
              <em class="text-danger">Password is required</em>
            </div>
            <div class="form-floating mb-3">
              <input type="password" class="form-control" placeholder="Confirm Password">
              <label for="formId1">{{__('Confirm Password')}}</label>
              <em class="text-danger">Confirmation password is required</em>
            </div>
            <div class="text-end">
                <button class="btn btn-outline-success">
                    <i class="fas fa-refresh"></i>
                    {{__('Reset')}}
                </button>
            </div>
        </form>
    </div>

</x-layouts.panel>