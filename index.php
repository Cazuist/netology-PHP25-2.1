<?php
    
    $dataList = file_get_contents("phones.json");

    if (json_decode($dataList)) {
        $decode = json_decode($dataList, true);
    }
    
    function getAddress($data) {
        return implode(', ', $data['address']);
    }

    function getPhones($data) {        
        return implode(',<br>', $data['phoneNumber']);       
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Телефонная книжка</title>
  <link rel="stylesheet" href="css/styles.css">  
</head>
<body>    

    <div class="wrapper">
        <table>
            <caption>Информация об абонентах</caption>
            
            <thead>
                <tr>
                    <td class="num">№ п/п</td>
                    <td class="firstName">Имя</td>
                    <td class="lastName">Фамилия</td>
                    <td class="address">Адрес</td>
                    <td class="phoneNumber">Телефоны</td>
                </tr>
            </thead>

            <? foreach ($decode as $person) : ?>
            
            <tr class="table-body">
                <td></td>
                <td><?= $person['firstName'] ?></td>
                <td><?= $person['lastName'] ?></td>
                <td><?= getAddress($person) ?></td>
                <td><?= getPhones($person) ?></td>
            </tr>

            <? endforeach ?>
        </table>
    </div>            

</body>
</html>