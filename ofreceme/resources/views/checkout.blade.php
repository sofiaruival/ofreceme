@extends("layouts.app")

@section("title")
	Checkout
@endsection

@section("content")
	<h1>Checkout</h1>
	<ul>
		@foreach ($finalofertas as $oferta)
			<li>
				<p>{{$oferta->descripcion}}</p>
			</li>
		@endforeach
	</ul>
	<p>
		Total: {{$total}}
	</p>
	<form method="post" action="/checkout">
		{{csrf_field()}}
		<button class="btn btn-success">BUY</button>
	</form>
@endsection
