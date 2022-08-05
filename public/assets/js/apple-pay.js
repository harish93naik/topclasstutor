
document.addEventListener('DOMContentLoaded',async()=>{

  const stripe = Stripe('pk_test_51JJxjTSA5lh0TiF10CXCdHmvCSZg7RfO2WhcqGbckaNWfi6U6JJBuKKo9LZcceugXcCMEKIuSZBxj3wYwtPV8Seg00VLK40Ne2');

  const  paymentRequest = stripe.paymentRequest({
  country: 'US',
  currency: 'usd',
  total: {
    label: 'Demo total',
    amount: 1099,
  },
  requestPayerName: true,
  requestPayerEmail: true,
});
  const elements = stripe.elements();
const prButton = elements.create('paymentRequestButton', {
  paymentRequest: paymentRequest,
});
// Check the availability of the Payment Request API first.
paymentRequest.canMakePayment().then(function(result) {
  if (result) {
    prButton.mount('#payment-request-button');
  } else {
    document.getElementById('payment-request-button').style.display = 'none';
  }
});

paymentRequest.on('paymentmethod',async(e)=>{

    //create a payment intent on the server
    const {clientSecret}= await fetch('/create-payment-intent',{
      method: 'POST',
      headers: {
        'Content-Type': 'application/json',
      },
      body: JSON.stringify({
        paymentMethodType: 'card',
        currency: 'usd',
      }),

    }).then(r=>r,json());
    addMessage('Client secret returned');
    const {error,paymentIntent} = await stripe.confirmCardPayment(clientSecret,{
      payment_method: e.paymentMethod.id,
    },{handleActions:false
    }
  )
    if(error){
      e.complete('fail');
      e.addMessage('Payment Failed');
      return;
    }
    e.complete('success');
    addMessage(`Sucess:${paymentIntent.id}`);
    if(paymentIntent.status === 'requires_action'){
      stripe.confirmCardPayment(clientSecret);
    }
});
});





