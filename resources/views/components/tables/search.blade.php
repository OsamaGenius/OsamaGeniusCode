<form class="d-flex mb-3">

    <div class="col text-start">
        <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="{{$add}}">
            <i class="fas fa-plus me-1"></i>{{ __('Add new') }}
        </button>
    </div>

    <div x-data="{
        show: false
    }" class="col text-end">

        <div class="d-flex flex-row-reverse text-end">
            <input type="search" x-cloak x-show="show===true" x-transition wire:model.live.debounce.300='search'
                class="form-control me-2 order-2" placeholder="Search links by their names">
            <a href="#" class="text-dark mt-2 order-1" x-transition x-on:click.prevent="show = !show">
                <i class="fas fa-search"></i>
            </a>
        </div>

    </div>

</form>

{{-- Showing social links in a table --}}
<div class="table-responsive shadow-md rounded-3 mb-3">
    <table class="table align-middle">
        <thead class="table-light">
            <caption class="text-center pt-3 mb-0 pb-0">{{ __('Social Links') }}</caption>
            <tr class="text-center">
                {{$thead}}
            </tr>
        </thead>
        <tbody class="table-group-divider text-center">
            {{$tbody}}
        </tbody>
        <tfoot>

        </tfoot>
    </table>
</div>
