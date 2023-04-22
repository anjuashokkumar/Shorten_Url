@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h1 class="h3 mb-3"><strong>Analytics</strong> Dashboard</h1>

					<div class="row">
						<div class="col-xl-12 col-xxl-12 d-flex">
							<div class="w-100">
								<div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<div class="row">
													<div class="col mt-0">
														<h5 class="card-title">Total</h5>
													</div>

													<div class="col-auto">
														<div class="stat text-primary">
															<i class="align-middle" data-feather="bar-chart-2"></i>
														</div>
													</div>
												</div>
												<h1 class="mt-1 mb-3">{{$count}}</h1>
												<div class="mb-0">
													<span class="text-muted">URL Count</span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection
