<?php
$host = 'localhost';
$username = 'root';
$password = 'Azicroy45';
$database = 'university';

$conn = new mysqli($host, $username, $password, $database);

if ($conn->connect_error) {
    die("Ошибка подключения к БД: " . $conn->connect_error);
}


$error = '';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    if (empty($username)) {
        $error .= '<p class="error">Введите СНИЛС.</p>';
    }

    // validate if password is empty
    if (empty($password)) {
        $error .= '<p class="error">Введите пароль.</p>';
    }

    $sql = "SELECT idTeachers AS  idTeachers, userPassword AS userPassword, FIO AS FIO FROM teachers WHERE idTeachers = $username";  
    $result = $conn->query($sql);
    if($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row ) {
            // Проверка правильности аутентификации
            if ($password === $row['userPassword']) {
                session_start();
        // Аутентификация успешна, создание сессии пользователя
        $_SESSION['username'] = $row['FIO'];
        header('Location: main.php'); // Замените "index.php" на URL требуемой страницы после успешного входа
        exit;
    } else {
        // Неправильные учетные данные, перенаправление на страницу ошибки
        $error .= '<p class="error">Неверный логин или пароль.</p>';
    }
        } 
        
    } 
}
    


// Отображение формы входа
?>



<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Вход</title>
		<link href="style1.css" rel="stylesheet" type="text/css">
		 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
           	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css">

    </head>
<body>
        <header>
            <div class="content-wrapper">
                <h1>КФУ</h1>
               </div>
        </header>
        <main>

       
        <div class="container">             
            <div class="row">
                <div class="col-md-12">
                <br>
                    <h2>Вход</h2>
                    <br>
                    <p>Введите ваш логин и пароль</p>
                    <form action="" method="POST">
                        <div class="form-group">
                            <label>Логин </label>
                            <input type="text" name="username" class="form-control" required />
                        </div>    
                        <div class="form-group">
                            <label>Пароль</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <input type="submit" id ="enter" name="submit" class="btn btn-primary" value="Войти">
                        </div>
                        <?php echo $error; ?>
                    </form>
                </div>
            </div>
        </div>
           </main>
        <footer>
            <div class="content-wrapper">
            </div>
        </footer>

    </body>
</html>