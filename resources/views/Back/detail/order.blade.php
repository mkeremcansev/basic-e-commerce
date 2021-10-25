@extends('Back.main')
@section('content')
<style>
.card {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-orient: vertical;
    -webkit-box-direction: normal;
    -ms-flex-direction: column;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 1px solid rgba(0, 0, 0, 0.1);
    border-radius: 0.10rem
}

.card-header:first-child {
    border-radius: calc(0.37rem - 1px) calc(0.37rem - 1px) 0 0
}

.card-header {
    padding: 0.75rem 1.25rem;
    margin-bottom: 0;
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1)
}

.track {
    position: relative;
    background-color: #ddd;
    height: 7px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    margin-bottom: 60px;
    margin-top: 50px
}

.track .step {
    -webkit-box-flex: 1;
    -ms-flex-positive: 1;
    flex-grow: 1;
    width: 25%;
    margin-top: -18px;
    text-align: center;
    position: relative
}

.track .step.active:before {
    background: #004dda
}

.track .step::before {
    height: 7px;
    position: absolute;
    content: "";
    width: 100%;
    left: 0;
    top: 18px
}

.track .step.active .icon {
    background: #004dda;
    color: #fff
}

.track .icon {
    display: inline-block;
    width: 40px;
    height: 40px;
    line-height: 40px;
    position: relative;
    border-radius: 100%;
    background: #ddd
}

.track .step.active .text {
    font-weight: 400;
    color: #000
}

.track .text {
    display: block;
    margin-top: 7px
}

.itemside {
    position: relative;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    width: 100%
}

.itemside .aside {
    position: relative;
    -ms-flex-negative: 0;
    flex-shrink: 0
}

.img-sm {
    width: 80px;
    height: 80px;
    padding: 7px
}

ul.row,
ul.row-sm {
    list-style: none;
    padding: 0
}

.itemside .info {
    padding-left: 15px;
    padding-right: 7px
}

.itemside .title {
    display: block;
    margin-bottom: 5px;
    color: #212529
}

p {
    margin-top: 0;
    margin-bottom: 1rem
}

.btn-warning {
    color: #ffffff;
    background-color: #004dda;
    border-color: #004dda;
    border-radius: 1px
}

.btn-warning:hover {
    color: #ffffff;
    background-color: #004dda;
    border-color: #004dda;
    border-radius: 1px
}
</style>
        <div class="page-wrapper">
            <div class="page-titles">
                <div class="d-flex align-items-center">
                    <h5 class="font-medium m-b-0">@lang('keywords.order-action')</h5>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="col s12 l12">
                        <div class="card">
                            <div class="card-content">
                                <form action="{{ route('Update.order', $order->id) }}" method="POST">
                                    @csrf
                                    <input type="hidden" value="{{ $order->id }}" name="order">
                                <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">perm_identity</i>
                                            <input disabled id="name" value="{{ $order->name." ".$order->surname }}" type="text">
                                            <label for="name">@lang('keywords.name') / @lang('keywords.surname')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input disabled id="name" value="{{ $order->adress }}" type="text">
                                            <label for="name">@lang('keywords.order-adress')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">title</i>
                                            <input disabled id="name" value="{{ $order->phone }}" type="text">
                                            <label for="name">@lang('keywords.phone-number')</label>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">payment</i>
                                            <input id="email" type="text" value="{{ $order->email }}" disabled>
                                            <label for="email">@lang('keywords.email')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <i class="material-icons prefix">update</i>
                                            <input id="email" type="text" value="{{ $order->created_at->diffForHumans() }}" disabled>
                                            <label for="email">@lang('keywords.date')</label>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                        <i class="material-icons prefix">description</i>
                                        <select name="status">
                                            <option value="" disabled selected hidden>@lang('keywords.authority')</option>
                                            <option @if ($order->status == 1) selected @endif value="1">@lang('keywords.order-okey')</option>
                                            <option @if ($order->status == 2) selected @endif value="2">@lang('keywords.wait-ready')</option>
                                            <option @if ($order->status == 3) selected @endif value="3">@lang('keywords.cargo')</option>
                                            <option @if ($order->status == 4) selected @endif value="4">@lang('keywords.order-user-okey')</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="input-field col s12">
                                            <a href="{{ route('Delete.user', $order->id) }}" class="btn red waves-effect waves-light right marginLeft">@lang('keywords.delete')</a>
                                            <button class="btn cyan waves-effect waves-light right" type="submit">@lang('keywords.save')</button>
                                        </div>
                                    </div>
                                    </form>
                            </div>
                        </div>
                <article class="card">
					<div class="card-body">
						<h5 style="padding: 3%; color:black;">@lang('keywords.order-number') {{ $order->id }}</h5><br>
						<ul class="row">
							@foreach ($order->getOrders as $orderItems)
							<li class="col-md-4">
								<figure class="itemside mb-3">
									<div class="aside"><img src="{{ asset(firstImage($orderItems->getProductData->images)) }}" class="img-sm border"></div>
									<figcaption class="info align-self-center">
										<a target="_blank" href="{{ route('Front.single', [$orderItems->getProductData->getCategory->slug, $orderItems->getProductData->slug]) }}">
											<p class="title">{{ $orderItems->quantity }}x {{ $orderItems->getProductData->title }} </a><br> {{ $orderItems->size." - ".$orderItems->color }} <br> <span class="text-muted">{{ $orderItems->quantity*$orderItems->price }} ₺</span>
									</figcaption>
								</figure>
							</li>
							@endforeach
						</ul>
						<h5 style="font-weight: bold; float: right; padding: 3%; color:black;" class="text-right"> @lang('keywords.total') : {{ $order->total }} ₺</h5>
					</div>
				</article>
                    </div>
                </div>
               
            </div>
        </div>
@endsection