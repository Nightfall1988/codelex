<html>
<link rel='stylesheet' href='public\css\style.css'>
<body>
    <form method="GET">
    <div id='table'>
    <table>
    <tr class="table-row border-solid">
                <th>Symbol</th>
                <th>Amount</th>
                <th>Highest price bought</th>
                <th>Money invested</th>
            </tr>
            {% for item in post %}
                <tr>
                    <td>{{item.symbol}}</td>
                    <td>{{item.amount}}</td>
                    <td>{{item.priceBought}}</td>
                    <td>{{item.currentInvestment}}</td>
                </tr>
            {% endfor %}
        </table>
        <br>
        <br>
    </div>
    <br>
    <div id='currentTableButtonDiv'>
    <button id='currentTableButton' formaction="myshares">SHOW TABLE</button>
    </div>
</form>
</body>
</html>