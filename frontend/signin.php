<script src="js/signin.js">
    
</script>
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
    <title>Sign In Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body class="min-h-screen bg-slate-50 text-slate-900">
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto max-w-3xl px-4 py-6 space-y-4">
        
        <h1 class="text-2xl font-semibold tracking-tight "> 
        Sign In Page
        </h1>
        <a href="index.html"
          class="mt-4 rounded-md bg-slate-800 px-2 py-1 text-lg font-medium text-white hover:bg-slate-700"
          >Back
        </a>
        
      </div>
    </header>
    <main class="mx-auto max-w-3xl px-4 py-8">
      <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <form action="./api/auth/signin.php" method="post" class="bg-slate-20 rounded-lg shadow-xl p-6 space-y-4">
            <div>
              <label for="username" class="block text-lg font-semibold mb-">Username :</label>
              <input type="text" id="username" name="username" placeholder="  Username" class="bg-slate-200 rounded-md" required="required">           
            </div>
                    

            <div>
                <label for="password" class="block text-lg font-semibold mb-1">Password :</label>
                <input type="password" id="password" name="password" placeholder="  Password" class="bg-slate-200 rounded-md" required="required" onkeyup="check()">
              </div>

            <div>
                <input class="checkbox-label" type="checkbox" onclick="Show(0);"> Show Password
              </div>

            <div>
                <label for="confirm_password" class="block text-lg font-semibold mb-1">Confirm Password :</label>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="  Password" class="bg-slate-200 rounded-md" required="required" onkeyup="check()">
              </div>

              <div>
                <input class="checkbox-label" type="checkbox" onclick="Show(1);"> Show Password
              </div>

              <div>
                <label for="api_key" class="block text-lg font-semibold mb-1">API Key :</label>
                <input type="text" id="api_key" name="api_key" placeholder="  API Key" class="bg-slate-200 rounded-md" required="required">
              </div>
              <p id="error" class="error"></p>
              <p id="error2" class="error"></p>

            <input class="button-label-disable mt-4 rounded-md bg-slate-400 px-4 py-2 text-sm font-medium text-white" type="submit" name="submit" value="Sign In" id="submit" disabled>
            </form>
      </section>
    </main>
  </body>
</html>