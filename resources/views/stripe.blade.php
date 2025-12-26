<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Stripe Payment </title>
</head>

<body>
    <div class="container col-md-4">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Make Payment</h4>
            </div>
            <div class="card-body">
                <div class="p-3 bg-light bg-opacity-10">
                    <h6 class="card-title mb-3">
                        Order Summary
                    </h6>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>Subtotal</span><span>$190</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>Shipping</span><span>$20</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>Cuppon(Code:NEWYEAR)</span><span class="text-danger">$10</span>
                    </div>
                    <div class="d-flex justify-content-between mb-1 small">
                        <span>Total</span><strong class="text-dark">$200</strong>
                    </div>
                    <form action="{{route('stripe.payment')}}" method="post" id="stripe-form">
                        @csrf 
                        <input type="hidden" name="stripeToken" id="stripe-token">
                        <input type="hidden" name="price" value="200">
                        <div id="card-element" class="form-control" ></div>
                        <button type="button" class="btn btn-primary w-100 mt-2" onclick="createToken()">Submit</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
    <script src="https://js.stripe.com/clover/stripe.js"></script>
    <script>
        var stripe = Stripe("{{env('STRIPE_KEY')}}");
        var elements = stripe.elements();
        var cardElement = elements.create('card');
        cardElement.mount('#card-element');

        function createToken() {

            stripe.createToken(cardElement).then(function(result) {
                document.getElementById('stripe-token').value=result.token.id;
                document.getElementById('stripe-form').submit();
                // console.log(result.token.id);
               
                // Handle result.error or result.token
            });
        }
    </script>
</body>

</html>