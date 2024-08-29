<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Contact with Sidebar</title>
    <link rel="stylesheet" href="assets/view.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Sidebar styling */
        body {
            font-family: Arial, sans-serif;
        }

        .sidebar {
            height: 100%;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #111;
            padding-top: 20px;
            transition: 0.3s;
        }

        .sidebar a {
            padding: 10px 15px;
            text-decoration: none;
            font-size: 18px;
            color: white;
            display: block;
            transition: 0.3s;
        }

        .sidebar a:hover {
            background-color: #575757;
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: margin-left 0.3s;
        }

        .sidebar-toggle-btn {
            position: absolute;
            top: 15px;
            left: 265px;
            font-size: 20px;
            cursor: pointer;
            color: #111;
        }

        .collapsed .sidebar {
            width: 0;
            overflow: hidden;
        }

        .collapsed .main-content {
            margin-left: 0;
        }

        .collapsed .sidebar-toggle-btn {
            left: 15px;
            color: white;
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <a href="viewContact.php"><i class="fas fa-home"></i> Home</a>
        <a href="contact.php"><i class="fas fa-plus-circle"></i> Add Contact</a>
        <a href="manageAccount.php"><i class="fas fa-cog"></i> Settings</a>
        <a href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
    </div>

    <!-- Sidebar Toggle Button -->
    <div class="sidebar-toggle-btn">
        <i class="fas fa-bars"></i>
    </div>

    <!-- Main Content -->
    <div class="main-content">
    


    <script>
        // JavaScript for toggling the sidebar
        document.querySelector('.sidebar-toggle-btn').addEventListener('click', function () {
            document.body.classList.toggle('collapsed');
        });
    </script>
</body>

</html>
