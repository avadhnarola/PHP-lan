<?php
include ('config.php');

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $jdate = $_POST['jdate'];
    $salary = $_POST['salary'];
    $dept_id = $_POST['dept_id'];
    $countries = $_POST['countries'];
    $data = implode(',', $countries);
    // echo $data;die();
    $query = "insert into staff(name,jdate,salary,dept_id,countries) values ('$name','$jdate','$salary','$dept_id','$data')";
    mysqli_query($conn, $query);
    header('Location:join-select.php');
}
$select = "select * from dept";
$res = mysqli_query($conn, $select);
//   $data = mysqli_fetch_all($res);
//   print_r($data);


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.0.1/dist/js/multi-select-tag.js"></script>


    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .form .inp {
            padding: 7px;
            margin-bottom: 5px;
            /* border-radius: 20px; */
            border: 1px solid white;
            display: flex;
            margin-left: 5px;
            width: 90%;
            margin: auto;

        }

        .form {
            margin-top: 20px;
            border: 2px gray solid;
        }

        .main {
            text-align: center;
            margin: auto;
            width: 30%;
            background-color: #72CEE3;

        }

        p {
            color: gray;
            text-align: left;
            text-transform: uppercase;
            font-weight: 600;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: 20px;
        }

        .form .btn {
            width: 40%;
            margin: auto;
            margin-bottom: 10px;
        }

        .form .btn:hover {
            background-color: rgb(0, 0, 0);
            transition: all ease-in-out 0.3s;
            color: rgb(255, 255, 255);
        }

        .rad {
            width: 50%;
        }

        #box {
            float: left;
            margin-left: 5px;
        }

        label {
            color: rgb(126, 124, 124);
            float: inline-start;
            margin-left: 5px;
        }

        #lang {
            padding: 3px;
            margin-right: 20px;
            margin-bottom: 20px;

        }

        .lng {
            margin-left: 20px;
        }

        input:active {
            border: 0;
            border-radius: none;
        }
    </style>
</head>

<body>


    <div class="main">
        <div class="form">
            <div>
                <h2 style="margin-top: 20px;">Staff Form</h2>
            </div>


            <form method="post">
                <p>Enter Name </p>
                <input type="text" name="name" class="inp"><br>
                <p>Enter Joining Date</p>
                <input type="date" name="jdate" class="inp"><br>
                <p>Enter Salary</p>
                <input type="number" name="salary" class="inp"><br>

                <label class="lng">Choose Department : </label>
                <select name="dept_id" id="lang">
                    <?php while ($row = mysqli_fetch_assoc($res)) { ?>
                        <option value="<?php echo $row['dept_id'] ?>" multiple><?php echo $row['dname'] ?></option>
                    <?php } ?>
                </select>
                <select name="countries[]" id="countries" multiple>
                    <option value="Afghanistan">Afghanistan</option>
                    <option value="Australia">Australia</option>
                    <option value="Germany">Germany</option>
                    <option value="Canada">Canada</option>
                    <option value="Russia">Russia</option>
                </select>
                <input type="submit" name="submit" class="btn inp">
            </form>
        </div>
    </div>
    <script>
        new MultiSelectTag('countries')  // id
    </script>
</body>

</html>