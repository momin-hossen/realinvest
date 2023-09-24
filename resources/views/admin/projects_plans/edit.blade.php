@extends('layouts.admin.app', [
    'title' => 'Edit Plan',
    'buttons' => [['name' => 'View List', 'link' => route('admin.projects_plans.index'), 'icon' => 'bx bx-list-ul']],
])

@section('contents')
<form action="{{ route('admin.projects_plans.update', $projectsPlan->id) }}" method="post" class="custom-reload-form">
    @csrf
    @method('put')
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <h5>{{ __('Add Project Plan') }}</h5>

                            <div class="col-12 text-center mb-3">
                                <div class="gallery_image">
                                    <label for="gallery_image" class="form-label text-start d-block">@lang('gallery image')</label>
                                    <label for="gallery_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset($projectsPlan->gallery_image ?? 'assets/img/icons/no-image.png') }}" alt="">
                                        <p>Please select an image.</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="gallery_image" name="gallery_image">
                                </div>
                            </div>
                            <div class="col-6 text-center mb-3">
                                <div class="thumbnail_image">
                                    <label for="thumbnail_image" class="form-label text-start d-block">@lang('thumbnail image')</label>
                                    <label for="thumbnail_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset($projectsPlan->thumbnail_image ?? 'assets/img/icons/no-image.png') }}" alt="">
                                        <p>Please select an image.</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="thumbnail_image" name="thumbnail_image">
                                </div>
                            </div>
                            <div class="col-6 text-center mb-3">
                                <div class="preview_image">
                                    <label for="preview_image" class="form-label text-start d-block">@lang('preview_image')</label>
                                    <label for="preview_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset($projectsPlan->preview_image ?? 'assets/img/icons/no-image.png') }}" alt="">
                                        <p>Please select an image.</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="preview_image" name="preview_image">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" name="title" value="{{ $projectsPlan->title }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="invest_type" class="form-label">Invest Type</label>
                                <select name="invest_type" id="invest_type" class="form-control" required>
                                    <option @selected($projectsPlan->invest_type == '1') value="1">@lang('Percentage')</option>
                                    <option @selected($projectsPlan->invest_type == '0') value="0">@lang('Fixed')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="min_invest" class="form-label">Minimum Invest</label>
                                <input type="number" id="min_invest" class="form-control" name="min_invest" value="{{ $projectsPlan->min_invest }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="max_invest" class="form-label">Maximum Invest</label>
                                <input type="number" id="max_invest" class="form-control" name="max_invest" value="{{ $projectsPlan->max_invest }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="max_invest_amount" class="form-label">Maximum Investment Amount</label>
                                <input type="number" id="max_invest_amount" class="form-control" name="max_invest_amount"  value="{{ $projectsPlan->max_invest_amount }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="capital_back" class="form-label">Capital Back</label>
                                <select name="capital_back" id="capital_back" class="form-control" required>
                                    <option @selected($projectsPlan->capital_back == '1') value="1">@lang('Yes')</option>
                                    <option @selected($projectsPlan->capital_back == '0') value="0">@lang('No')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="is_period" class="form-label">Is Period</label>
                                <select name="is_period" id="is_period" class="form-control" required>
                                    <option @selected($projectsPlan->is_period == '1') value="1">@lang('Yes')</option>
                                    <option @selected($projectsPlan->is_period == '0') value="0">@lang('No')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="profit_range" class="form-label">Profit Range</label>
                                <input type="text" id="profit_range" class="form-control" name="profit_range" value="{{ $projectsPlan->profit_range }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="loss_range" class="form-label">Loss Range</label>
                                <input type="text" id="loss_range" class="form-control" name="loss_range" value="{{ $projectsPlan->loss_range }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" id="location" class="form-control" name="location" value="{{ $projectsPlan->location }}" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" class="form-control" name="address" value="{{ $projectsPlan->address }}" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" rows="5" class="form-control" required>{{ $projectsPlan->description }}</textarea>
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
