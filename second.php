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
        <form method="post">
            <div class="mb-4">
                <label for="user_name1" class="form-label">Ism</label>
                <input type="text" class="form-control" id="user_name1" placeholder="example: Johongir" required
                    name="user_name1">
            </div>
            <div class="mb-4">
                <label for="user_password1" class="form-label">Password</label>
                <input type="password" class="form-control" id="user_password1" placeholder="example: A1234"
                    name="user_password1" required>
            </div>
            <button type="submit" class="btn btn-primary">Access</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>
<?php 
$dns = "mysql:host=127.0.0.1;dbname=register";
$user = "root";
$password = "root";
$pdo = new PDO($dns, $user, $password);
$error_masage = 'Ism yoki passwordni hato kiritdiz';
if ($_SERVER['REQUEST_METHOD']==='POST'){

    $user_name = $_POST['user_name1'];
    $user_password = $_POST['user_password1'];
    if(!empty($user_name) && !empty($user_password)){
        $stmt = $pdo->prepare("Select *from frist_window Where user_name =:user_name and user_password = :user_password");
        $stmt->execute(['user_name'=>$user_name,'user_password'=>$user_password]);
        if ($stmt->rowCount()>0){
            header("Location: https://www.youtube.com/watch?v=PHwjxZwB-8Y ");
            exit();
        }else{
            $error_masage = "Foydalanuvchi topilmadi yoki password xato";
        }
    }
}


?>



</html>