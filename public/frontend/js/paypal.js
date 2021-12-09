function paypalButtons() { 
    paypal_sdk.Buttons({
        style: {
                  color:  'blue',
                  shape:  'pill',
                  label:  'pay',
                  height: 40
              },
      // Set up the transaction
      createOrder: function(data, actions) {
            return actions.order.create({
              application_context: {
              brand_name : 'Laravel Book Store Demo Paypal App',
              user_action : 'PAY_NOW',
            },
              purchase_units: [{
                  amount: {
                      value: '88.44'
                  }
              }]
          });
      },
    
      // Finalize the transaction
      onApprove: function(data, actions) {
          return actions.order.capture().then(function(orderData) {
              // Successful capture! For demo purposes:
              console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
              var transaction = orderData.purchase_units[0].payments.captures[0];
              alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');
    
              // Replace the above to show a success message within this page, e.g.
              // const element = document.getElementById('paypal-button-container');
              // element.innerHTML = '';
              // element.innerHTML = '<h3>Thank you for your payment!</h3>';
              // Or go to another URL:  actions.redirect('thank_you.html');
          });
      }
    }).render('#paypal-button-container');
 }