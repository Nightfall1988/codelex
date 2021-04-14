<html>
<body class="bg-gray-200 mr-14 ml-14 content-center">
<link rel='stylesheet' href='public\css\style.css'>
<h1 class="m-4 text-3xl flex"> Civil Registry Items </h1>
<table style="width:90%" class="table object-center border-solid border-4 border-black-200">
  <tr class="table-row border-solid">
    <th>Name</th>
    <th>Age</th>
    <th>Code</th>
    <th>Description</th>
    <th>Address</th>
  </tr>
{% for person in post %}
<tr class='content-center mr-4 border-solid'>
<td class="table-cell border-solid border-2 border-black text-center">{{ person.name }}</td>
<td class="table-cell border-solid border-2 border-black text-center">{{ person.age }}</td>
<td class="table-cell border-solid border-2 border-black text-center">{{ person.code }}</td>
<td class="table-cell border-solid border-2 border-black text-center">{{ person.desc }}</td>
<td class="table-cell border-solid border-2 border-black text-center">{{ person.address }}</td>
</tr>
{% endfor %}
<?php 

?>
</table>
<br>
<p><b>Search registry by:</b></p>
<br>
<div class="flex  w-11/12">
<form action="searchperson" method="post">
    <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded" type="submit" name="searchParam" value="Name" />
</form>

<form action="searchperson" method="post">
    <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded" type="submit" name="searchParam" value="Age" />
</form>
<form action="searchperson" method="post">
    <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded" type="submit" name="searchParam" value="Address" />
</form>
<form action="searchperson" method="post">
    <input class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 mr-4 rounded" type="submit" name="searchParam" value="Code" />
</form>
<form method='post'>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-10" formaction="addperson" id='add'>Add New Person</button>
</form>
<form method='post'>
<button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded mr-10" formaction="dashboard" id='dashboard'>To Dashboard</button>
</form>
</div>

</body>
