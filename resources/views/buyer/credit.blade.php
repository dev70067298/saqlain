@extends('layout.buyer_app')

@section('content')
<div class="bg-white boxer container mt-3">
    <h3 class="h3 text-center">Buy Credits</h3>

</div>
<center><div>
@if(Session::has('success'))
<p class="offset-md-3 offset-lg-3 offset-sm-3 offset-xs-3 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-success') }}">
{{ Session::get('success') }} </p>
@endif
@if(Session::has('error'))
<p class="offset-md-3 offset-lg-3 offset-sm-3 offset-xs-3 col-lg-4 col-md-4 col-sm-4 col-xs-4 alert {{ Session::get('alert-class', 'alert-danger') }}">
    {{ Session::get('error') }}</p>
@endif
</div></center>
<div class="bg-white boxer container text-center mt-3 col-md-6 col-lg-6 offset-md-3 offset-lg-3 col-sm-12 col-xs-12">
    <h4 class="h4">Your Available Credits: {{$user->credit}}</h4> <br>
    <input type="text" id="credit" value="{{$user->credit}}" class="d-none">
        <h4 class="h4"> Select Package to Buy </h4><br>


        <div class="form-group">
            <select name="package" id="package" class="form-control fiber">
                <option selected disabled> Select Your Package </option>
                @foreach ($package as $row)
                    <option value="{{$row->id}}" id="{{$row->credit}}" class="{{$row->price}}"> {{$row->credit}} for ${{$row->price}} </option>
                @endforeach
            </select>
        </div><br>

        <h4 class="h4"> Your new Credits balance will be : <span id="balance"></span> </h4><br>
        <a href="#strip" data-toggle="modal" class="btn-theme" id="pay" disabled> Continue </a>

        <div class="modal" tabindex="-1" id="strip">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Buy Credits</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                    <script src="https://js.stripe.com/v3/"></script>

                        <form action="/strip" method="post" id="payment-form">
                            @csrf
                        <div class="form-row">
                            <label for="card-element">
                            Credit or debit card
                            </label>
                            <div id="card-element" class="form-control">
                            <!-- A Stripe Element will be inserted here. -->
                            </div>

                            <!-- Used to display form errors. -->
                            <div id="card-errors" role="alert"></div>
                        </div>

                        <center>  <button style="margin-bottom:10px;" id="last_pay" class="btn-theme mt-3">Pay</button> </center>

                        </form>
                </div>
                <div class="modal-footer">

                </div>
              </div>
            </div>
          </div>
    </div>




<script>
    $("#pay").off('click');
    $('.fiber').change(function()
    {
        $('#pay').removeAttr('disabled');
        var id = $(this).children(":selected").attr("id");
        var price = $(this).children(":selected").attr("class");
        var credit= $('#credit').val();
        var total= parseInt(id) + parseInt(credit);
        $('#balance').html(total);
        $('#last_pay').html('Pay $'+price);
        // var package=$(this).val();
    });

    // Create a Stripe client.
    var stripe = Stripe('pk_test_51HU1AWDBgTW6OaYYJuR64cXVuhGo6wB4cFtojDtvSBQ1RkFzP4QIgvtwytUmtWMsl2TmINhbTs5L2HzbXZiD0o3k00Iucgmk4j');

    // Create an instance of Elements.
    var elements = stripe.elements();

    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)
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

    // Create an instance of the card Element.
    var card = elements.create('card', {style: style});

    // Add an instance of the card Element into the `card-element` <div>.
    card.mount('#card-element');

    // Handle real-time validation errors from the card Element.
    card.on('change', function(event) {
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

    // Submit the form with the token ID.
    function stripeTokenHandler(token) {
    // Insert the token ID into the form so it gets submitted to the server
    var form = document.getElementById('payment-form');
    var hiddenInput = document.createElement('input');
    hiddenInput.setAttribute('type', 'hidden');
    hiddenInput.setAttribute('name', 'stripeToken');
    hiddenInput.setAttribute('value', token.id);
    form.appendChild(hiddenInput);
    // Submit the form

    var package = document.getElementById('package'),
    package = package.value;

    var hiddenInput1 = document.createElement('input');
    hiddenInput1.setAttribute('type', 'hidden');
    hiddenInput1.setAttribute('name', 'package');
    hiddenInput1.setAttribute('value', package);
    form.appendChild(hiddenInput1);

    form.submit();
    }

    </script>

@endsection
