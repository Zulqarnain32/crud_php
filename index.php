<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Students</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <div class="p-10">
        <button class="text-white bg-blue-500 px-3 py-1 cursor-pointer my-3">Add Student</button>
        <table class="w-full text-sm text-left">
            <thead>
                <tr>
                    <th scope="col" class="px-3 py-3 font-medium ">
                        ID
                    </th>
                    <th scope="col" class="px-3 py-3 font-medium">
                        Name
                    </th>
                    <th scope="col" class="px-3 py-3 font-medium">
                        Email
                    </th>
                    <th scope="col" class="px-3 py-3 font-medium">
                        Roll No
                    </th>
                    <th scope="col" class="px-3 py-3 font-medium">
                        City
                    </th>
                    <th scope="col" class="px-3 py-3 font-medium">
                        Action
                    </th>

                </tr>
            </thead>
            <tbody>
                <?php
                $servername = "localhost";
                $username = "root";
                $passowrd = "";
                $database = "university";
                //connection
                $conn = new mysqli($servername, $username, $passowrd, $database);

                //   check connection
                if ($conn->connect_error) {
                    die("connection failed " . $conn->connect_error);
                }

                //   read row from database 
                $sql = "SELECT * fROM students";
                $result = $conn->query($sql);

                if (!$result) {
                    die("invalid query" . $conn->error);
                }
                while ($row = $result->fetch_assoc()) {
                    echo "<tr class='border'>
                            <td class='p-3'>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[rollno]</td>
                            <td>$row[city]</td>
                            <td>
                              <a href='' class='bg-yellow-400 px-3 py-1 rounded-md cursor-pointer text-white'>Edit</a>
                              <a href='' class='bg-red-400 px-3 py-1 rounded-md cursor-pointer text-white'>Delete</a>
                            </td>
                    </tr>";
                }

                ?>
                <!-- <tr class = "border">
                        <td class = "p-3">1</td>
                        <td>zulqarnain</td>
                        <td>zulqarnain@gmail.com</td>
                        <td>101</td>
                        <td>Lahore</td>
                        <td>
                            <a href="" class = "bg-yellow-400 px-3 py-1 rounded-md cursor-pointer text-white">Edit</a>
                            <a href="" class = "bg-red-400 px-3 py-1 rounded-md cursor-pointer text-white">Delete</a>
                        </td>
                    </tr> -->

            </tbody>
        </table>

    </div>


</body>

</html>