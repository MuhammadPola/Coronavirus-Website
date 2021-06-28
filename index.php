<?php
include_once 'getData.php';
?>
<html lang="en">

<head>
    <title>COVID19</title>
    <!--==========  meta  tags  =================-->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Muhammad Pola">

    <!--======== bootstrap css ========-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!--========  internal style    ===========-->
    <style>
    .global p {
        font-size: x-large;
        font-weight: bolder;
        background-color: rgb(243, 241, 241);
        padding: 10px;
        width: 50%;
        margin: 0 auto;
    }

    .form-control:focus {
        box-shadow: none;
    }

    .table {
        overflow-x: auto;
    }
    </style>
</head>

<body>
    <!-- ===================
            navbar start
    =====================-->
    <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand d-flex align-items-center" href="index.php"><img src="icon/logo.svg" alt="logo"
                    width="30px"> COVID19</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarContent">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- ===================
            navbar end
    =====================-->


    <!-- ===================
        global information
    =====================-->
    <div class="row text-center mw-100 my-5 row-cols-1 row-cols-md-2 gy-3  global">
        <div class="col">
            <h2 class="text-muted"><img src="icon/Confirmed.svg" alt="" width="30px"> Coronavirus Cases:</h2>
            <p><?php echo $G_Confirmed;  ?></p>
        </div>
        <div class="col">
            <h2 class="text-danger"><img src="icon/death.svg" alt="" width="30px">Deaths:</h2>
            <p><?php echo $G_Deaths;  ?></p>
        </div>
        <div class="col">
            <h2 class="text-success"><img src="icon/vaccine.svg" alt="" width="30px">Recovered:</h2>
            <p><?php echo $G_Recovered;  ?> </p>
        </div>
        <div class="col">
            <h2 class="text-primary"><img src="icon/fever.svg" alt="" width="30px">Active:</h2>
            <p><?php echo $G_Active;  ?></p>
        </div>
    </div>


    <!-- ===================
        table of country
    =====================-->
    <hr>
    <div class="container my-5">
        <!--======= search input -->
        <div class="input-group my-3 w-50">
            <input type="search" placeholder="Search By country" class="form-control " onkeyup="search(this.value)">
            <div class="input-group-text">
                <img src="icon/loupe.svg" alt="" width="50px">
            </div>
        </div>

        <!-- ===========    table of of country ========= -->
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class='table-dark'>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Country</th>
                        <th scope="col">Confirmed</th>
                        <th scope="col">Deaths</th>
                        <th scope="col">Recovered</th>
                        <th scope="col">Active</th>
                    </tr>
                </thead>
                <tbody id="tbody">
                    <?php
                    $i = 0;
                    while ($i <= 189) {

                        $Country = $Countries[$i]->Country;
                        $Confirmed = $Countries[$i]->TotalConfirmed;
                        $Deaths = $Countries[$i]->TotalDeaths;
                        $Recovered = $Countries[$i]->TotalRecovered;
                        $Active = $Confirmed - ($Deaths + $Recovered);

                        $i++;
                        echo "<tr>";
                        echo "<th scope='row'>$i</th>";
                        echo "<td>$Country</td>";
                        echo "<td>$Confirmed</td>";
                        echo "<td>$Deaths</td>";
                        echo "<td>$Recovered</td>";
                        echo "<td>$Recovered</td>";
                        echo "</tr>";
                    } ?>
                </tbody>
            </table>
        </div>
    </div>


    <!--=================
            footer
    =====================-->
    <footer class=" bg-light d-flex align-items-center justify-content-center p-2" style="font-size: larger;">
        <div class="d-flex align-items-center mx-2">
            &#169 Muhammad Jwammer|
        </div>
        <div class="d-flex align-items-center">
            <span class="border-left">Follow me</span>
            <a href="https://github.com/MuhammadPola" class="p-1"><img src="icon/social_icons/github.svg" width="25px"></a>
            <a href="https://twitter.com/MuhammadPola4" class="p-1"><img src="icon/social_icons/twitter.svg" width="25px"></a>
            <a href="https://stackoverflow.com/users/11246618/muhammad-pola-jwammer" class="p-1"><img
                    src="icon/social_icons/stack-overflow.svg" width="25px"></a>
        </div>
    </footer>

    <!--======== bootstrap js ===========-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous">
    </script>

    <!-- ===========  search function    =============== -->
    <script>
    function search(key) {
        var filter, tr, i, td, txtValue;
        filter = key.toUpperCase();
        tbody = document.getElementById('tbody');
        tr = tbody.getElementsByTagName("tr");

        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[0];

            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }

        }
    }
    </script>
</body>

</html>