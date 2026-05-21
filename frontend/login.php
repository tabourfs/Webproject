<script src="js/login.js"></script>
<?php

ini_set('display_errors', 1);

ini_set('display_startup_errors', 1);

error_reporting(E_ALL);

if (isset($_SESSION['Logged'])) {

    header("refresh:1; url=index.html");

    echo "Error, Already Logged In";

    exit();

}?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto max-w-3xl px-4 py-6 space-y-4">
        
        <h1 class="text-2xl font-semibold tracking-tight "> 
        Login Page
        </h1>
        <a href="index.html"
          class="mt-4 rounded-md bg-slate-800 px-2 py-1 text-lg font-medium text-white hover:bg-slate-700"
          >Back
        </a>
        
      </div>
    </header>
    <main class="mx-auto max-w-3xl px-4 py-8">
      <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form action="./api/auth/login.php" method="post">
            <div>
              <label for="username" class="block text-lg font-semibold mb-1">Username :</label>
              <input type="text" id="username" name="username" placeholder="  Username" class="bg-slate-200 rounded-md required">
            </div>
            <div>
              <label for="password" class="block text-lg font-semibold mb-1">Password :</label>
              <input type="password" id="password" name="password" placeholder="  Password" class="bg-slate-200 rounded-md required">
            </div>
            <div>
                <input class="checkbox-label" type="checkbox" onclick="Show();"> Show Password
              </div>
            <p id="error" class="error"></p>
            <button
             type="submit"
              class="mt-4 rounded-md bg-slate-800 px-4 py-2 text-sm font-medium text-white hover:bg-slate-700"
              >Send
            </button>
            </form>
      </section>
    </main>
  </body>
</html>