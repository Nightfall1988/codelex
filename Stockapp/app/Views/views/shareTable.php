<html>
<link rel='stylesheet' href='public\css\style.css'>
<h1 id='head'>My Investments</h1>
    <body>
        <div id='table'>
        <form method="POST">
            <table>
            <tr class="table-row border-solid">
                <th>Symbol</th>
                <th>Amount</th>
                <th>Highest price bought</th>
                <th>Money invested</th>
                <th>Current Price</th>
                <th>Difference</th>
            </tr>
            {% for item in post[0] %}
            <tr>
            <td>{{item.symbol}}</td>
            <td>{{item.amount}}</td>
            <td>{{item.priceBought}}</td>
            <td>{{item.currentInvestment}}</td>
            <td>{{item.currentPrice}}</td>
                {% if item.difference < 0 %}
                    <td><p style="color: red;">{{item.difference}}%</p></td>
                {% elseif item.difference > 0 %}
                    <td><p style="color: green;">{{item.difference}}%</p></td>
                {% elseif item.difference == 0 %}
                    <td><p style="color: black;">{{item.difference}}%</p></td>
                {% endif %}
            <input name="symbol" type="hidden" value="{{item.symbol}}"></input>
            <td><button formaction="sell">SELL ALL</button></td>
            </tr>
            {% endfor %}
            </table>
            <br>
            <div class='currentTableButtonDiv'>
                <button id='currentTableButton' formaction="myshares">SHOW TABLE</button>
            </div>
        </form>
        </div>
    </body>
<html>

