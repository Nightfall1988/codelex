<html>
<body class='bg-gray-200 mr-14 ml-14 content-center'>
<link rel='stylesheet' href='public\css\style.css'></link>
<div class='mr-14 ml-14 content-center rounded'>
    <p class='text-3xl flex'>Dashboard</p>
</div>
    <div class='bg-blue-300 mr-14 ml-14 content-center rounded mt-10'>
    {% for person in post %}
    <p> Hi {{ person.name }} !</p>
    {% endfor %}
    </div>
</body>
<html>