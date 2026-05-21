<?php
session_start();?>
<!DOCTYPE html>
  <html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Home</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="css/styles.css" />
  </head>
  <body class="min-h-screen bg-slate-50 text-slate-900">
<?php
if(isset($_SESSION["Logged"])){?>
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto max-w-3xl px-4 py-6 space-y-4">
        <h1 class="text-2xl font-semibold tracking-tight">Home</h1>
        <a href="./api/auth/logout.php?logout-submit=logout"
          class="mt-4 rounded-md bg-slate-800 px-2 py-1 text-lg font-medium text-white hover:bg-slate-700"
          >Log Out
        </a>
      </div>
    </header>
    <main class="mx-auto max-w-3xl px-4 py-8">
      <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
      </section>
    </main>
<?php
}else{?>
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto max-w-3xl px-4 py-6">
        <h1 class="text-2xl font-semibold tracking-tight">Not Logged In</h1>
      </div>
    </header>
    <main class="mx-auto max-w-3xl px-4 py-8">
      <div class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm space-x-4">
        <a
          href="login.php"
          class="mt-4 rounded-md bg-slate-800 px-4 py-2 text-2xl font-medium text-white hover:bg-slate-700"
        >Login
        </a>
        <a
          href="signin.php"
          class="mt-4 rounded-md bg-slate-800 px-4 py-2 text-2xl font-medium text-white hover:bg-slate-700 "
        >
        Sign  In
        </a>
      </div>
    </main>
    <?php
}?>
  </body>
</html>