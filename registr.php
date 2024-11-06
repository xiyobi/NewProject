<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>UzumMarket.uz</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>

<body>
    <div class="container">
        <form action="" method="post">
            <div class="mb-4">
                <label for="user_name" class="form-label">Ism</label>
                <input type="text" class="form-control" id="user_name" placeholder="example: Johongir" name="user_name"
                    required>
            </div>
            <div class="mt-3">
                <label for="email_adrres" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email_adrres" aria-describedby="emailHelp"
                    placeholder="email@gmail.com" required name="email_adrres">
                <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
            </div>
            <div class="mb-4">
                <label for="user_password" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password" placeholder="example: A1234" required
                    name="user_password">
            </div>
            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1" required>
                <label class="form-check-label" for="exampleCheck1">The end</label>
            </div>
            <button type="submit" class="btn btn-primary">Yuborish</button>

        </form>
        <form action="Second.php" method="post">
            <br>
            <button type="submit" class="btn btn-primary">Enter website</button>
            <br><br>
        </form>
    </div>


    <?php
        require('DB.php');
        $db = new DB;
        $pdo = $db->pdo;

        if(isset($_POST['email_adrres']) and isset($_POST['user_password']) and isset($_POST['user_name'])){
            $user_name = $_POST['user_name'];
            $email_adrres = $_POST['email_adrres'];
            $user_password = $_POST['user_password'];
            
            $stmt = $pdo->prepare("INSERT INTO frist_window( user_name, email_adrres, user_password ) VALUES (:user_name,:email_adrres, :user_password)");
            
            $stmt->bindParam(':user_name',$user_name);
            $stmt->bindParam(':email_adrres',$email_adrres);
            $stmt->bindParam(':user_password',$user_password);
            $stmt->execute();
            header("Location: registr.php");
            return; 
        }
        $RegisterPage = $pdo->query("Select *from frist_window")->fetchAll();
        
        $index = 1;
        
        ?>
    <div class="container">
        <table class="table table-bordered">
            <tr>
                <th scope="col">#</th>
                <th scope="col">user_name</th>
                <th scope="col">email_adrres</th>
                <th scope="col">user_password</th>
            </tr>
            <tbody>
                <?php foreach ($RegisterPage as $item){ ?>
                <tr>
                    <th score="row"><?php echo $index++; ?></th>
                    <td><?php echo $item["user_name"]; ?></td>
                    <td><?php echo $item["email_adrres"]; ?></td>
                    <td><?php echo $item["user_password"]; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>





    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>