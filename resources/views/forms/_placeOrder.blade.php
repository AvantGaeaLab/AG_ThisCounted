<style>
    .StripeElement {
        box-sizing: border-box;
        height: 40px;
        padding: 10px 12px;
        border: 1px solid transparent;
        border-radius: 4px;
        background-color: white;
        box-shadow: 0 1px 3px 0 #e6ebf1;
        -webkit-transition: box-shadow 150ms ease;
        transition: box-shadow 150ms ease;
    }
    .StripeElement--focus {
        box-shadow: 0 1px 3px 0 #cfd7df;
    }
    .StripeElement--invalid {
        border-color: #fa755a;
    }
    .StripeElement--webkit-autofill {
        background-color: #fefde5 !important;
    }
</style>
@guest
    <h5>you need to login or register to place order</h5>
        <a class="btn MainButt mx-2 mt-1" href="{{ route('login') }}">{{ __('Login') }}</a>
    @if (Route::has('register'))
        <a class="btn MainButt mt-sm-1 mt-1 " href="{{ route('register') }}">{{ __('Register') }}</a>
    @endif
@else
@if($deal->status == "Valid")
    @if(Auth::user()->hasVerifiedEmail())
        <form action="{{route('orders.store')}}" method="post" id="payment-form">
                    @csrf
                    @if($deal->price > 0)
                    <div>
                        <label for="card-element">
                            Credit or debit card
                        </label>
                        <div id="card-element">
                            <!-- A Stripe Element will be inserted here. -->
                        </div>

                        <!-- Used to display form errors. -->
                        <div id="card-errors" role="alert"></div>
                    </div>
                    @endif

                    @if($deal->price > 0)
                        <div id="Buy_button" style="visibility: hidden">
                    <label class="mt-3 quantity" for="quantity">Quantity:</label>
                    <input class="form-control mt-3" style="display: inline-block; width: 80px" type="number" id="quantity" name="quantity" min="1" max="50" value="1"><br>
                    <button class="btn btn-primary mt-2">Submit Payment ($<span class="amount" id="amount"></span>)</button>
                        </div>
                    @elseif($deal->price == 0)
                        <label class="mt-3 quantity" for="quantity">Quantity:</label>
                        <input class="form-control mt-3" style="display: inline-block; width: 80px" type="number" id="quantity" name="quantity" min="1" max="50" value="1"><br>
                        <button class="btn MainButt mt-2">Get the deal now</button>
                    @endif
                    <div class=".amount" id="#amount"></div>
                    <!-- hidden values -->
                    <input type="hidden" id="deal_id" name="deal_id" value="{{$deal->id}}">
                    <input type="hidden" id="status" name="status" value="{{$deal->status}}">
                    <input type="hidden" id="deal_title" name="deal_title" value="{{$deal->title}}">
                    <input type="hidden" class="price" name="price" id="price" value="{{ $deal->price}}">
                    <input type="hidden" id="total" name="total"  value="{{$deal->price}}">
                </form>
        @else
        <p class="font-monospace" style="color: #f15942; font-size: calc(100% + 0.7vw);">Please verify your email to make orders</p>
        <div >
        <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
            @csrf
            <p class="p-0 m-0 align-baseline">Check the spam emails or  </p>
            <button type="submit" class="btn btn-link p-0 m-0 align-baseline">{{ __(' click here to request another .') }}</button>
        </form>
            to <b> ({{Auth::user()->email}}) </b>
        </div>
        @endif
    @else
        <button type="submit" class="btn btn-danger mt-3" >The deal is invalid</button>
    @endif
    @endguest
<script type="text/javascript">


    $(document).ready(function(){

        update_amounts();
        $('#quantity').change(function() {
            update_amounts();
        });
    });


    function update_amounts()
    {
        var sum = 0.0;
        $('#payment-form').each(function() {
            var qty = $(this).find('#quantity').val();
            var price = $(this).find('.price').val();
            var amount = (qty*price)
            sum+=amount;
            $(this).find('.amount').text(''+amount);
        });
        //just update the total to sum
    }</script>

<script src="https://js.stripe.com/v3/"></script>
<script>
    window.onload = function() {
        var stripe = Stripe("{{config('services.stripe.key')}}");
        var elements = stripe.elements();
        var style = {
            base: {
                color: '#32325d',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
                fontSmoothing: 'antialiased',
                fontSize: '16px',
                '::placeholder': {
                    color: '#aab7c4'
                }
            },
            invalid: {
                color: '#fa755a',
                iconColor: '#fa755a'
            }
        };
        var card = elements.create('card', {
            style: style
        });
        card.mount('#card-element');
        document.getElementById("Buy_button").style.visibility = "visible";

        // Handle real-time validation errors from the card Element.
        card.addEventListener('change', function(event) {
            var displayError = document.getElementById('card-errors');
            if (event.error) {
                displayError.textContent = event.error.message;
            } else {
                displayError.textContent = '';
            }
        });
        // Handle form submission.
        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createToken(card).then(function(result) {
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    // Send the token to your server.
                    stripeTokenHandler(result.token);
                }
            });
        });
        function stripeTokenHandler(token) {
            // Insert the token ID into the form so it gets submitted to the server
            var form = document.getElementById('payment-form');
            var hiddenInput = document.createElement('input');
            hiddenInput.setAttribute('type', 'hidden');
            hiddenInput.setAttribute('name', 'stripeToken');
            hiddenInput.setAttribute('value', token.id);
            form.appendChild(hiddenInput);
            // Submit the form
            form.submit();
        }
    }
</script>





