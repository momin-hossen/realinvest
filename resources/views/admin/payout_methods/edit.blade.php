@extends('layouts.admin.app', [
    'title' => 'Edit Payout',
    'buttons' => [['name' => 'View List', 'link' => route('admin.payout_methods.index'), 'icon' => 'bx bx-list-ul']],
])

@section('contents')
<form action="{{ route('admin.payout_methods.update', $payoutMethod->id) }}" method="post" class="custom-reload-form">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h5>{{ __('Add Payout Methods ') }}</h5>

                        <div class="col-sm-4 mb-3">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" id="name" class="form-control" name="name" value="{{ $payoutMethod->name }}" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="min_limit" class="form-label">Minimum Limit</label>
                            <input type="number" id="min_limit" class="form-control" name="min_limit"  value="{{ $payoutMethod->min_limit }}" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="max_limit" class="form-label">Maximum Limit</label>
                            <input type="number" id="max_limit" class="form-control" name="max_limit"  value="{{ $payoutMethod->max_limit }}" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="delay" class="form-label">Delay</label>
                            <input type="number" id="delay" class="form-control" name="delay"  value="{{ $payoutMethod->delay }}" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="fixed_charge" class="form-label">Fixed Charge</label>
                            <input type="number" id="fixed_charge" class="form-control" name="fixed_charge" value="{{ $payoutMethod->fixed_charge }}" required>
                        </div>
                        <div class="col-sm-4 mb-3">
                            <label for="percent_charge" class="form-label">Percent Charge</label>
                            <input type="number" id="percent_charge" class="form-control" name="percent_charge" value="{{ $payoutMethod->percent_charge }}" required>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="data" class="form-label">Data</label>
                            <textarea name="data" id="data" rows="5" class="form-control" required>{{ $payoutMethod->data }}</textarea>
                        </div>
                        <div class="col-6 mb-3">
                            <label for="instruction" class="form-label">Instruction</label>
                            <textarea name="instruction" id="instruction" rows="5" class="form-control" required>{{ $payoutMethod->instruction }}</textarea>
                        </div>
                        <div class="col-sm-12 mb-3">
                            <label for="status" class="form-label">Status</label>
                            <select name="status" id="status" class="form-control" required>
                                <option @selected($payoutMethod->status == '1') value="1">@lang('Active')</option>
                                <option @selected($payoutMethod->status == '0') value="0">@lang('Deactive')</option>
                            </select>
                        </div>
                        <div class="col-12 text-center mb-3">
                            <div class="image">
                                <label for="image" class="form-label text-start d-block">@lang(' image')</label>
                                <label for="image" class="image-preview">
                                    <img width="60px" height="60px" class="mt-3" src="{{ asset($payoutMethod->image ?? 'assets/img/icons/no-image.png') }}" alt="">
                                    <p>Please select an image.</p>
                                </label>
                                <input class="form-control d-none image-input" type="file" id="image" name="image">
                            </div>
                        </div>

                        <div class="col-12 text-center">
                            <button type="reset" class="btn btn-outline-danger mx-1"><i class='bx bx-reset'></i>
                                {{ __('Reset') }}
                            </button>
                            <button type="submit" class="btn btn-primary ajax-btn mx-1"><i class='bx bx-save'></i>
                                {{ __('Save') }}
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection
