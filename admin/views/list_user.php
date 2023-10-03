<?php
error_reporting(0);

require_once(__DIR__ . '/../../utils/config.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List Usersname</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <h2 class="text-center mb-3">List Username Members Account</h2>
    <?php
    if ($conn->connect_error) {
        die('Error connecting to Database Server: ' . $conn->connect_error);
    }

    $sql = "SELECT * FROM users WHERE role IN (1,2)";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "<table class = 'table table-responsive'>";
        echo "<tr>";
        echo "<th>UserName</th>";
        echo "<th>Email</th>";
        echo "<th>Created_At</th>";
        echo "<th>Updated_At</th>";
        echo "<th>Status</th>";
        echo "<th class='text-center'>Action</th>";
        echo "</tr>";

        foreach ($result as $key => $account) {
    ?>
            <tr>
                <td><?= $account['Username']; ?></td>
                <td><?= $account['Email']; ?></td>
                <td>
                    <script>
                        var createAt = new Date("<?= $account['Created_at']; ?>");
                        document.write(createAt.toLocaleString());
                    </script>
                </td>
                <td>
                    <script>
                        var updateAt = new Date("<?= $account['Updated_at']; ?>");
                        document.write(updateAt.toLocaleString());
                    </script>
                </td>
                <td>
                    <?php
                    if ($account['Role'] == 1) {
                        echo "member";
                    } elseif ($account['Role'] == 2) {
                        echo "mod";
                    } elseif ($account['Role'] == 0) {
                        echo "admin";
                    }
                    ?>
                </td>

                <td class="text-center">
                    <div class="d-contents md-2">
                        <a href="#" class="btn btn-primary">Edit</a>
                        <a href="<?= BASE_URL."admin/views/delete_user.php?UserID={$account['UserID']}" ?>" class="btn btn-danger btn-delete">Delete</a>
                    </div>
                </td>
            </tr>
    <?php
        }

        echo "</tbody>";
        echo "</table>";
    } else {
        echo "Không có dữ liệu thành viên với role là 1 hoặc 2.";
    }
    ?>
    <script>
        let lstBtnDelete = document.querySelectorAll('.btn-delete');
        lstBtnDelete.forEach((elm, index) => {
            elm.addEventListener('click', (e) => {
                e.preventDefault();
                let confirmDelete = confirm ('Bạn có muốn xoá người dùng này không?');
                if (confirmDelete){
                    window.location.href = elm.getAttribute('href');
                }
            })
        })
    </script>
</body>

</html>