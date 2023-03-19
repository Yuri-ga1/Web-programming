<!DOCTYPE html>
<html lang='ru'>

<head>
    <style>
        body{
            margin: 0px;
            padding: 0px;
        }
        html,
        body,
        .align{
            height: 100%;
        }
        .align{
           margin-left: 20%;
           margin-right: 25%;
           border-left: 2px solid plum;
           border-right: 2px solid plum;
           background-color: aliceblue;
        }
        .form{
            padding-top: 20%;
            text-align: center;
        }
      .admin{
        margin-left: 92%;
        padding-top: 2%;
      }
    </style>
</head>

<body>
    <div class="align">
      <div class="admin">
        <form action="admin.php" method="post">
          <button type="submit">Admin</button>
        </form>
  		</div>
      
        <div class="form">
            <form action="php.php" method="post">
                <p><input name="FirstName" type="text" placeholder="First name"/></p>

                <p><input name="LastName" type="text" placeholder="Last name"/></p>

                <p><input name="email" type="email" placeholder="email"/></p>

              	<p><input name="phone" type="tel" placeholder="Phone number"/></p>

              	<p>Conference topics</p>
              
                <p><input name="conference" type="radio" value="business">Business</input>
                    <input name="conference" type="radio" value="technology">Technology</input>
                    <input name="conference" type="radio" value="adv">Advertising and marketing</input>
                </p>
  
  							<p>Payment method</p>
                <p><input type="radio" name="paymentMethod" value="WebMoney">WebMoney</input>
                    <input type="radio" name="paymentMethod" value="Yandex">Яндекс.Деньги</input>
                    <input type="radio" name="paymentMethod" value="PayPal">PayPal</input>
                    <input type="radio" name="paymentMethod" value="CreditCard">Credit card</input>
                </p>

                <p>Do you want to be notified when the meeting starts?</p>
								<p>
                  <input name="mail" type="radio" checked value="Yes">Yes</input>
									<input name="mail" type="radio" value="No">No</input>
								</p>
                <button type="submit">Send</button>
                <button type="reset">Clear</button>
            </form>
        </div>
    </div>
</body>

</html>
