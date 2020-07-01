<?php

function generate() {
    $count = 1;
    $type = 'a';

    $selectedNumber = array();

    for($i = 1; $i <= 64; $i++) {
        $arr = [
                "num" => $i,
                "type" => "white"
            ];

        if ($count == 1 || $count == 2 || $count == 5) $arr["type"] = "black";
            
        array_push($selectedNumber, $arr);

        if ($count == 6) $type = 'b';
        else if ($count == 0) $type = 'a';

        if ($type == 'a') $count++;
        else if ($type == 'b') $count--;
    }

    return $selectedNumber;
}

$arr_num = generate();

?>

<head>
    <style>
        tr {
            height: 50px;
        }

        td {
            width: 50px;
            text-align: center;
        }

        .type-black {
            background-color: black;
            color: white;
        }

        .type-white {
            background-color: white;
            color: black;
        }
    </style>
</head>

<body>
    <table>
        <?php foreach ($arr_num as $value) {
            if (($value['num'] - 1) % 8 == 0) { ?> <tr> <?php }

                if ($value['type'] == 'black') { ?>
                    <td class="type-black">
                        <?php echo $value['num'] ?>
                    </td>
                <?php }
                else if ($value['type'] == 'white') { ?>
                    <td class="type-white">
                        <?php echo $value['num'] ?>
                    </td>
                <?php }

            if ($value['num'] % 8 == 0) { ?> </tr> <?php }
        } ?>
    </table>
</body>

