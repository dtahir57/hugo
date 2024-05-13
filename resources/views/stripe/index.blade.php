<form action="{{ route('stripe.checkout') }}" method="POST">
    @csrf
    <button type="submit" class="">Checkout</button>
</form>