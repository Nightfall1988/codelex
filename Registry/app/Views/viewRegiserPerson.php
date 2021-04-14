<html>
<link rel='stylesheet' href='public\css\style.css'>
<body class='bg-gray-200 mr-14 ml-14 content-center'>
<h1 class='text-center text-3xl mt-10 mb-10 text-xl' > Add a Person to Registry </h1>
<div>
<form method="POST" action='displayregister'>
    <div class='bg-blue-300 mr-14 ml-14 content-center rounded'>
    <div>
        <div id='name' class='text-center text-xl'>
        <label for="name" class="mt-20">Name: </label>
        <br>
            <input type='text' name='name' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
        </div>
        <div id='code' class='text-center text-xl'>
        <label for="code">Personal Code: </label>
        <br>
            <input type='text' name='code' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
        </div>    
        <div id='age' class='text-center text-xl'>
        <label for="age">Age: </label>
        <br>
            <input type='text' name='age' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
        </div>
        <div id='description' class='text-center text-xl'>
        <label for="description">Description: </label>
        <br>
            <input type='text' name='description' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
        </div class='text-center'>
        <div id='address' class='text-center text-xl'>
        <label for="address">Address: </label>
        <br>
            <input type='text' name='address' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
        </div>
    </div>
    <br>
    <button class="bg-blue-600 hover:bg-blue-800 text-white font-bold py-2 px-4 rounded ml-10 mt-10 w-2/5" type="submit">SUBMIT</button>

</form>
</div>
<div class='text-center'>
</div>
</body>
<?php 

?>