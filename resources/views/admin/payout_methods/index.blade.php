@extends('layouts.admin.app', [
    'title' => 'Payout Method',
    'buttons' => [['name' => 'Add new', 'link' => route('admin.payout_methods.create'), 'icon' => 'bx bx-plus-circle']],
])

@section('contents')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row justify-content-between">
                        <div class="col-sm-6">
                            <h5>Payout Method List</h5>
                        </div>
                        <div class="col-md-4 text-end">
                            <form action="" method="get">
                                <div class="input-group">
                                    <input type="text" name="search" class="form-control" placeholder="Search..." aria-describedby="button-addon2" value="{{ request('search') }}">
                                    <button class="btn btn-primary" type="submit" id="button-addon2"><i class='bx bx-search-alt-2'></i></button>
                                  </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>{{ __('Name') }}</th>
                                <th>{{ __('Image') }}</th>
                                <th>{{ __('Minimum Limit') }}</th>
                                <th>{{ __('Maximum Limit') }}</th>
                                <th>{{ __('Delay') }}</th>
                                <th>{{ __('Fixed Charge') }}</th>
                                <th>{{ __('Percent Charge') }}</th>
                                <th>{{ __('Date') }}</th>
                                <th>{{ __('Instruction') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th>{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            @foreach ($payout_methods as $payout)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $payout->name }}</td>
                                    <td>
                                        <img width="35" height="35" class="rounded-circle" src="{{ asset($payout->image ?? '') }}">
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-label-{{ $plan->invest_type ? 'primary':'danger' }}">{{ $plan->invest_type ? 'Percentage':'Fixed' }}</span>
                                    </td>
                                    <td>
                                        <span class="badge rounded-pill bg-label-{{ $plan->capital_back ? 'primary':'danger' }}">{{ $plan->capital_back ? 'Yes':'No' }}</span>
                                    </td>
                                    <td>{{ $plan->min_invest }}</td>
                                    <td>{{ $plan->max_invest }}</td>
                                    <td>{{ $plan->max_invest_amount }}</td>
                                    <td>
                                        <span class="badge rounded-pill bg-label-{{ $plan->is_period ? 'primary':'danger' }}">{{ $plan->is_period ? 'Yes':'No' }}</span>
                                    </td>
                                    <td>{{ $plan->profit_range }}</td>
                                    <td>{{ $plan->loss_range }}</td>
                                    <td>{{ $plan->location }}</td>
                                    <td>{{ $plan->address }}</td>
                                    <td>{{ $plan->description }}</td>
                                    <td>
                                        {{-- <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow"
                                                data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="{{ route('admin.projects_plans.edit', $plan->id) }}">
                                                    <i class="bx bx-edit-alt me-1"></i>
                                                    {{ __('Edit') }}
                                                </a>
                                                <a class="dropdown-item delete-confirm" data-method="DELETE"
                                                    href="{{ route('admin.projects_plans.destroy', $plan->id) }}">
                                                    <i class="bx bx-trash me-1"></i>
                                                    {{ __('Delete') }}
                                                </a>
                                            </div>
                                        </div> --}}
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="row mx-2 mt-2">
                    <div class="col-sm-12">
                        {{ $payout_methods->links('vendor.pagination.bootstrap-5') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
