<html>
<link rel='stylesheet' href='public\css\style.css'>

<body>
{% for item in post %}
    <form action='confirmPurchase' method="get">
        <label for='amount'>How many {{item[1]}} would you like to buy?:</label>
        <input name='symbol' type="hidden" value="{{item[1]}}"></input>
        <p> Current Price {{item[0]}} </p>
        <input type='text' name='amount'></input>
        <button type="submit">BUY</button>
        </form>
        {% endfor %}

    </body>
<html>