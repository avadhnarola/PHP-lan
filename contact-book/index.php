<?php
include_once 'db.php';

session_start();
if (!isset($_SESSION['id'])) {
  header('location:login.php');
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contact Book</title>

  <link rel="stylesheet" href="CSS/allmin/all.min.css">
  <link rel="stylesheet" href="assets/style.css">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>
</head>

<body class="body">

  <div class="container-fluid" style="background-color: #007bff;">
    <nav class="navbar navbar-expand-lg">
      <div class="container">
        <a class="navbar-brand" href="#" style="display: flex; justify-content: center; align-items: center;">
          <i class="fa-regular fa-address-book" style="font-size: 2rem; margin-left: 10px; color: white;"></i>
          <h5 style="margin-bottom: 0; margin-left: 8px; color: white;">Contact Book</h5>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item">
              <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="contact.php">Add Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="viewContact.php">View Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="manageAccount.php">Manage Account</a>
            </li>
          </ul>
        </div>


        <form class="form-srch form1" method="get" class="srch">

          <input class="input-src" placeholder="Search . . ." type="text" name="search">

          <div class="btn-search">
            <button type="submit">
              <svg width="17" height="16" fill="none" xmlns="http://www.w3.org/2000/svg" role="img"
                aria-labelledby="search">
                <path d="M7.667 12.667A5.333 5.333 0 107.667 2a5.333 5.333 0 000 10.667zM14.334 14l-2.9-2.9"
                  stroke="currentColor" stroke-width="1.333" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
          </div>
        </form>

        <form class="d-flex" role="search">
          <a class="Btn" type="button" name="logout" href="logout.php">

            <div class="sign"><svg viewBox="0 0 512 512">
                <path
                  d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z">
                </path>
              </svg></div>

            <div class="text">Logout</div>
          </a>
        </form>
      </div>
    </nav>
  </div>
</body>

</html>