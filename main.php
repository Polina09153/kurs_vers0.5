<?php
// Старт сессии
session_start();

// Получаем значение глобальной переменной
$username = $_SESSION['username'];

?>


<!doctype html>
<html>
  <head>
    <meta charset="utf-8" />
    <title>Расписание</title>
  </head>
  <link rel="stylesheet" href="style.css"></linkrel>
  <script src=”code.js”></script>
  <body>   
  <h2><?php echo $username; ?></h2>
  

    <h2>Расписание ваших занятий</h2>
    <table class="iksweb">
      <tbody>
        <tr>
          <th></th>
          <th colspan="2">Понедельник</th>
          <th colspan="2">Вторник</th>
          <th colspan="2">Среда</th>
          <th colspan="2">Четверг</th>
          <th colspan="2">Пятница</th>
          <th colspan="2">Суббота</th>
        </tr>
        <tr>
          <td>Время\неделя</td>
          <td>нечет</td>
          <td>чет</td>
          <td>нечет</td>
          <td>чет</td>
          <td>нечет</td>
          <td>чет</td>
          <td>нечет</td>
          <td>чет</td>
          <td>нечет</td>
          <td>чет</td>
          <td>нечет</td>
          <td>чет</td>
        </tr>
        <tr>
          <td>8:30 - 10:00</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>10:10 - 11:40</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>12:10 - 13:40</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>13:50 - 15:20</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>15:50 - 17:20</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>17:30 - 19:00</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
        <tr>
          <td>19:10 - 20:40</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
    

    <button type="button" class="editButton">Редактировать</button>
    <div class="page_second"></div>

    <script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
    <script src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script>
      $(document).ready(function () {
      $.ajax({
          url: 'getGroups.php?action=getGroups',
          method: 'GET',
          dataType: 'json',
          success: function (data) {
            data.forEach(function (book) {
              var bookElement = `
                      <h3>${book.CountOfStudents}</h3>    
                      
                    `;

                    $('.page_second').append(bookElement);
                });
                
            }})
            
          });


  </script>
    
  </body>
</html>