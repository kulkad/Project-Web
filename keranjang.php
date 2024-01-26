<?php
session_start();
$koneksi = mysqli_connect("localhost", "root", "", "toko_elektronik");

if (isset($_POST["add"])) {
    if (isset($_SESSION["cart"])) {
        $item_array_id = array_column($_SESSION["cart"], "kode_laptop");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["cart"]);
            $item_array = array(
                "kode_laptop" => $_GET["id"],
                "nama_laptop" => $_POST["hidden_name"],
                "harga" => $_POST["hidden_price"],
            );
            $_SESSION["cart"][$count] = $item_array;

            echo '<script>alert("Produk berhasil dimasukan keranjang")</script>';
            echo '<script>window.location="keranjang.php"</script>';
        } else {
            echo '<script>alert("Produk sudah ada dikeranjang")</script>';
            echo '<script>window.location="keranjang.php"</script>';
        }
    } else {
        $item_array = array(
            "kode_laptop" => $_GET["id"],
            "nama_laptop" => $_POST["hidden_name"],
            "harga" => $_POST["hidden_price"],
        );
        $_SESSION["cart"][$count] = $item_array;

        echo '<script>alert("Produk berhasil dimasukan keranjang")</script>';
        echo '<script>window.location="keranjang.php"</script>';
    }
}
if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["cart"] as $keys => $value) {
            if ($value["kode_laptop"] == $_GET["id"]) {
                unset($_SESSION["cart"]["$keys"]);
                echo '<script>alert("Produk has been Removed")</script>';
                echo '<script>window.location="keranjang.php"</script>';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keranjang</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>

    <style>
        * {
            font-family: 'Titillium Web', sans-serif;
        }

        .produk {
            border: 1px solid #eaeaec;
            margin: -1px 19px 3px -1px;
            padding: 10px;
            text-align: center;
            background-color: #efefef;

        }

        table,
        th,
        tr {
            text-align: center;
        }

        .title2 {
            text-align: center;
            color: blue;
            background-color: #efefef;
            padding: 2%;
        }

        h2 {
            text-align: center;
            color: #66afe6;
            background-color: #efefef;
            padding: 2%;
        }

        table th {
            background-color: #efefef;
        }
    </style>
</head>

<body>

    <div class="container" style="width: 65%">
        <a href="index.php" class="btn btn-info">Lanjutkan Belanja</a>

        <div style="clear: both"></div>
        <h3 class="title2">Shop Details</h3>
        <div class="table table-responsive">
            <table class="table table-bordered">
                <tr>
                    <th width="30%">Nama Barang</th>
                    <th width="10%">Qty</th>
                    <th width="13%">Harga Barang</th>
                    <th width="10%">Total Harga</th>
                    <th width="17%">Aksi</th>
                </tr>

                <?php
                if (!empty($_SESSION["cart"])) {
                    $total = 0;
                    foreach ($_SESSION["cart"] as $key => $value) {
                ?>
                        <tr>
                            <td><?= $value["nama_laptop"] ?></td>
                            <td><?= $value["item-quantity"] ?></td>
                            <td>Rp
                                <?= $value["harga"] ?>
                            </td>
                            <td>
                                Rp
                                <?php echo number_format($value["item_quantity"] * $value["harga"], 2); ?>
                            </td>
                            <td>
                                <a href="keranjang.php?action=delete&id=<?php echo $value["kode_laptop"]; ?>"><span class="text-danger">Hapus</span></a>
                            </td>
                        </tr>
                    <?php
                        $total = $total + ($value["item_quantity"] + $value["harga"]);
                    }
                    ?>
                    <tr>
                        <td colspan="3" align="right">Grand Total</td>
                        <th align="right">Rp
                            <?php echo number_format($total, 2); ?>
                        </th>
                        <td></td>
                    </tr>
                <?php
                }
                ?>
            </table>



        </div>



    </div>
</body>

</html>