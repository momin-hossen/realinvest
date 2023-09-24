@extends('layouts.admin.app', [
    'title' => 'Add project plan',
    'buttons' => [['name' => 'View List', 'link' => route('admin.projects_plans.index'), 'icon' => 'bx bx-list-ul']],
])

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('admin.projects_plans.store') }}" method="post" class="custom-reload-form">
                        @csrf

                        <div class="row">
                            <h5>{{ __('Add Project Plan') }}</h5>

                            <div class="col-12 text-center mb-3">
                                <div class="gallery_image">
                                    <label for="gallery_image" class="form-label text-start d-block">@lang('Gallery Image')</label>
                                    <label for="gallery_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset('assets/img/icons/no-image.png') }}" alt="">
                                        <p>{{ __('Please select an image.') }}</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="gallery_image" name="gallery_image">
                                </div>
                            </div>
                            <div class="col-6 text-center mb-3">
                                <div class="thumbnail_image">
                                    <label for="thumbnail_image" class="form-label text-start d-block">@lang('Thumbnail Image')</label>
                                    <label for="thumbnail_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset('assets/img/icons/no-image.png') }}" alt="">
                                        <p>{{ __('Please select an image.') }}</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="thumbnail_image" name="thumbnail_image">
                                </div>
                            </div>
                            <div class="col-6 text-center mb-3">
                                <div class="preview_image">
                                    <label for="preview_image" class="form-label text-start d-block">@lang('Preview Image')</label>
                                    <label for="preview_image" class="image-preview">
                                        <img width="60px" height="60px" class="mt-3" src="{{ asset('assets/img/icons/no-image.png') }}" alt="">
                                        <p>{{ __('Please select an image.') }}</p>
                                    </label>
                                    <input class="form-control d-none image-input" type="file" id="preview_image" name="preview_image">
                                </div>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" id="title" class="form-control" name="title" placeholder="Project Title" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="invest_type" class="form-label">Invest Type</label>
                                <select name="invest_type" id="invest_type" class="form-control" required>
                                    <option value="1">@lang('Percentage')</option>
                                    <option value="0">@lang('Fixed')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="min_invest" class="form-label">Minimum Invest</label>
                                <input type="number" id="min_invest" class="form-control" name="min_invest" placeholder="Minimum Invest" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="max_invest" class="form-label">Maximum Invest</label>
                                <input type="number" id="max_invest" class="form-control" name="max_invest" placeholder="Maximum Invest" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="max_invest_amount" class="form-label">Maximum Investment Amount</label>
                                <input type="number" id="max_invest_amount" class="form-control" name="max_invest_amount" placeholder="Maximum Investment Amount" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="capital_back" class="form-label">Capital Back</label>
                                <select name="capital_back" id="capital_back" class="form-control" required>
                                    <option value="1">@lang('Yes')</option>
                                    <option value="0">@lang('No')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="is_period" class="form-label">Is Period</label>
                                <select name="is_period" id="is_period" class="form-control" required>
                                    <option value="1">@lang('Yes')</option>
                                    <option value="0">@lang('No')</option>
                                </select>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="profit_range" class="form-label">Profit Range</label>
                                <input type="text" id="profit_range" class="form-control" name="profit_range" placeholder="Profit Range" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="loss_range" class="form-label">Loss Range</label>
                                <input type="text" id="loss_range" class="form-control" name="loss_range" placeholder="Loss Range" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="location" class="form-label">Location</label>
                                <input type="text" id="location" class="form-control" name="location" placeholder="Only embed url accepted" required>
                            </div>
                            <div class="col-sm-4 mb-3">
                                <label for="address" class="form-label">Address</label>
                                <input type="text" id="address" class="form-control" name="address" placeholder="Address" required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea name="description" id="description" placeholder="Description" rows="5" class="form-control" required></textarea>
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
