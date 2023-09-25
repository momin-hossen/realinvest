@extends('layouts.admin.app', [
    'title' => 'Add Payout Method',
    'buttons' => [['name' => 'View List', 'link' => route('admin.payout_methods.index'), 'icon' => 'bx bx-list-ul']],
])

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.payout_methods.store') }}" method="post" class="custom-reload-form">
                        @csrf

                        <div class="row">
                            <h5>{{ __('Add Payout Method') }}</h5>

                            <div class="col-sm-4 mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" id="name" class="form-control" name="name" placeholder="Payout name" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="min_limit" class="form-label">Minimum Limit</label>
                                <input type="number" id="min_limit" class="form-control" name="min_limit" placeholder="Minimum Limit" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="max_limit" class="form-label">Maximum Limit</label>
                                <input type="number" id="max_limit" class="form-control" name="max_limit" placeholder="Maximum Limit" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="delay" class="form-label">Delay</label>
                                <input type="number" id="delay" class="form-control" name="delay" placeholder="Delay" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="fixed_charge" class="form-label">Fixed Charge</label>
                                <input type="number" id="fixed_charge" class="form-control" name="fixed_charge" placeholder="Fixed Charge" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="percent_charge" class="form-label">Percent Charge</label>
                                <input type="number" id="percent_charge" class="form-control" name="percent_charge" placeholder="Percent Charge" required>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="data" class="form-label">Data</label>
                                <textarea name="data" id="data" placeholder="Data" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="col-6 mb-3">
                                <label for="instruction" class="form-label">Instruction</label>
                                <textarea name="instruction" id="instruction" placeholder="Instruction" rows="5" class="form-control" required></textarea>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <label for="status" class="form-label">Status</label>
                                <select name="status" id="status" class="form-control" required>
                                    <option value="1">@lang('Active')</option>
                                    <option value="0">@lang('Deactive')</option>
                                </select>
                            </div>
                            <div class="col-12 text-center mb-3">
                                <div class="preview-seo_image">{{-- preview-input_name && Don't add any class without this. --}}
                                    <label for="image" class="form-label text-start d-block">@lang('Image')</label>
                                    <label for="image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset('assets/img/icons/no-image.png') }}" alt="">
                                        <p>Please select an image.</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="image" name="image">
                                </div>
                            </div>
                            <div class="col-12 text-center mt-4">
                                <button type="reset" class="btn btn-sm btn-outline-danger mx-1"><i class='bx bx-reset'></i>
                                    Reset
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary ajax-btn mx-1"><i class='bx bx-save'></i>
                                    Save
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
