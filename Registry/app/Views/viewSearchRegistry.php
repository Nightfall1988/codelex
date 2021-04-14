<link rel='stylesheet' href='public\css\style.css'>
    <body class='bg-gray-200 mr-14 ml-14 content-center'>    
        <div class="mt-10 bg-blue-300 rounded text-center text-2xl">
        <label>
            <div id='search' class="content-around">
            <form action='results' method='POST'>
            <label for="param" class="ml-20">Search by {{post}}: </label>
            <br>
            <input type='hidden' name='searchParam' value={{post}}></input>
                <input type='text' name='param' class="px-3 py-3 ml-10 mt-5 relative bg-white bg-white rounded text-sm border-0 shadow outline-none focus:outline-none focus:ring w-4/5"></input>
            </div>
            <br>
        </div>
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded m-10" type="submit">SEARCH</button>
            </form>
    <br>
    </body>
