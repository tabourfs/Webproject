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
    <script src="js/nextfolder.js"></script>
    <script src="js/previousfolder.js"></script>
    <header class="border-b border-slate-200 bg-white">
      <div class="mx-auto max-w-3xl px-4 py-6 space-y-4 grid-cols-2 relative">
        <h1 class="text-2xl font-semibold tracking-tight">Home</h1>
        <a href="./api/auth/logout.php?logout-submit=logout"
          class="absolte top-0 left-0 mt-4 rounded-md bg-slate-800 px-2 py-1 text-lg font-medium text-white hover:bg-slate-700"
          >Log Out
        </a>
      </div>
    </header>
    <main class="mx-auto max-w-3xl px-4 py-8">
      <section class="rounded-lg border border-slate-200 bg-white p-6 shadow-sm">
        <div class="grid grid-cols-5">
          <?php
          
          $mysqli = new mysqli("db", "root", "root", "nas");

          if($_SESSION["Folder"] == 0){
            $stmt = $mysqli->prepare("SELECT `name`, `folder`.`id` FROM `folder` INNER JOIN `user` ON `folder`.`user_id` = `user`.`id` LEFT JOIN `folder_folder` ON `folder_folder`.`child_folder_id` = `folder`.`id` WHERE `folder_folder`.`child_folder_id` IS NULL AND `user`.`id` = ?");
            $stmt->bind_param("s", $_SESSION["id"]);
            }
          else{
            echo '<div><button onclick="previousfolder()"><img src="/images/folder.png" alt="Folder Icon" style="width:80px;height:70px;">Previous</img></button></div>';
            $stmt = $mysqli->prepare("SELECT `name`, `folder`.`id` FROM `folder` INNER JOIN `user` ON `folder`.`user_id` = `user`.`id` INNER JOIN `folder_folder` ON `folder_folder`.`child_folder_id` = `folder`.`id` WHERE`folder_folder`.`parent_folder_id` = ? AND `user`.`id` = ?");
            $stmt->bind_param("ss", $_SESSION["Folder"], $_SESSION["id"]);
          }
          $stmt->execute();
          $result = $stmt->get_result();
          while($folder = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<div><button onclick="nextfolder('.$folder["id"].')"><img src="/images/folder.png" alt="Folder Icon" style="width:80px;height:70px;">'.$folder["name"].'</img></button></div>';
          }

          if($_SESSION["Folder"] == 0){
            $stmt = $mysqli->prepare("SELECT `name` FROM `file` INNER JOIN `user` ON `file`.`user_id` = `user`.`id` LEFT JOIN `folder_file`ON `folder_file`.`file_id` = `file`.`id`WHERE `folder_file`.`file_id` IS NULL AND `user`.`id` = ?");
            $stmt->bind_param("s", $_SESSION["id"]);
            }
          else{
            $stmt = $mysqli->prepare("SELECT `name` FROM `file` INNER JOIN `user` ON `file`.`user_id` = `user`.`id` INNER JOIN `folder_file` ON `folder_file`.`file_id` = `file`.`id` WHERE`folder_file`.`folder_id` = ? AND `user`.`id` = ?");
            $stmt->bind_param("ss", $_SESSION["Folder"], $_SESSION["id"]);
          }
          $stmt->execute();
          $result = $stmt->get_result();
          while($file = $result->fetch_array(MYSQLI_ASSOC)){
            echo '<div><img src="/images/file.png" alt="File Icon" style="width:60px;height:70px;">'.$file["name"].'</img></div>';
          }


            
            
          ?>
        </div>
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