<?php
session_start();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

include 'include/sessions.php';
include "classes/Database.php";
$database = new Database();
$database = $database->getConnection();

<<<<<<< HEAD
if (isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 60 * 30)) {
=======
if (isset($_SESSION['last_acted_on']) && (time() - $_SESSION['last_acted_on'] > 60 * 10)) {
>>>>>>> cf0da052f53dfbc13f5632682421592692375219
    session_unset();
    session_destroy();
    header('Location: logout.php');
} else {
    session_regenerate_id(true);
    $_SESSION['last_acted_on'] = time();
}

if (empty($_SESSION['username'])) {
    header('location: login.html');
} else {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Admin Portal</title>

        <!-- ================= Favicon ================== -->
        <!-- Standard -->
        <link rel="shortcut icon" href="http://placehold.it/64.png/000/fff">
        <!-- Retina iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="144x144" href="http://placehold.it/144.png/000/fff">
        <!-- Retina iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="114x114" href="http://placehold.it/114.png/000/fff">
        <!-- Standard iPad Touch Icon-->
        <link rel="apple-touch-icon" sizes="72x72" href="http://placehold.it/72.png/000/fff">
        <!-- Standard iPhone Touch Icon-->
        <link rel="apple-touch-icon" sizes="57x57" href="http://placehold.it/57.png/000/fff">

        <!-- Toastr -->
        <link href="css/lib/toastr/toastr.min.css" rel="stylesheet">
        <!-- Sweet Alert -->
        <link href="css/lib/sweetalert/sweetalert.css" rel="stylesheet">
        <!-- Range Slider -->
        <link href="css/lib/rangSlider/ion.rangeSlider.css" rel="stylesheet">
        <link href="css/lib/rangSlider/ion.rangeSlider.skinFlat.css" rel="stylesheet">
        <!-- Bar Rating -->
        <link href="css/lib/barRating/barRating.css" rel="stylesheet">
        <!-- Nestable -->
        <link href="css/lib/nestable/nestable.css" rel="stylesheet">
        <!-- JsGrid -->
        <link href="css/lib/jsgrid/jsgrid-theme.min.css" rel="stylesheet" />
        <link href="css/lib/jsgrid/jsgrid.min.css" type="text/css" rel="stylesheet" />
        <!-- Datatable -->
        <link href="css/lib/datatable/dataTables.bootstrap.min.css" rel="stylesheet" />
        <link href="css/lib/data-table/buttons.bootstrap.min.css" rel="stylesheet" />
        <!-- Calender 2 -->
        <link href="css/lib/calendar2/pignose.calendar.min.css" rel="stylesheet">
        <!-- Weather Icon -->
        <link href="css/lib/weather-icons.css" rel="stylesheet" />
        <!-- Owl Carousel -->
        <link href="css/lib/owl.carousel.min.css" rel="stylesheet" />
        <link href="css/lib/owl.theme.default.min.css" rel="stylesheet" />
        <!-- Select2 -->
        <link href="css/lib/select2/select2.min.css" rel="stylesheet">
        <!-- Chartist -->
        <link href="css/lib/chartist/chartist.min.css" rel="stylesheet">
        <!-- Calender -->
        <link href="css/lib/calendar/fullcalendar.css" rel="stylesheet" />

        <!-- Common -->
        <link href="css/lib/font-awesome.min.css" rel="stylesheet">
        <link href="css/lib/themify-icons.css" rel="stylesheet">
        <link href="css/lib/menubar/sidebar.css" rel="stylesheet">
        <link href="css/lib/bootstrap.min.css" rel="stylesheet">
        <link href="css/lib/helper.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
    </head>

    <body>

        <?php
        include "include/sidebar.php"; ?>
        <!-- /# sidebar -->

        <?php
        include "include/header.php"; ?>

        <div class="content-wrap">
            <div class="main">
                <div class="container-fluid">
                    <?php
                    include "include/breadcrumb.php"; ?>
                    <!-- /# row -->
                    <section id="main-content">
                        <div class="row">

                            <div class="col-lg-8">
                                <div class="card">
                                    <div class="card-title">
                                        <h4>Edit Categorty</h4>
                                    </div>
                                    <div class="card-body">
                                        <div class="basic-form">
                                            <form method="POST">
                                                <?php
                                                $cat_id = intval($_GET['cat_id']);
                                                $sql = "SELECT * FROM category WHERE id = :cat_id";
                                                $query = $database->prepare($sql);
                                                $query->bindParam(':cat_id', $cat_id, PDO::PARAM_STR);
                                                $query->execute();
                                                $results = $query->fetchAll(PDO::FETCH_OBJ);
                                                $cnt = 1;
                                                if ($query->rowCount() > 0) {
                                                    foreach ($results as $result) {
                                                ?>
                                                        <div class="form-group col-sm-8">
                                                            <input type="hidden" name="id" id="cat_id" value="<?php echo $cat_id ?>">
<<<<<<< HEAD
                                                            <label class="col-form-label">Category Name:</label>
=======
                                                            <label>Category Name:</label>
>>>>>>> cf0da052f53dfbc13f5632682421592692375219
                                                            <input type="text" class="form-control" name="category_name" id="category_name" value="<?php echo htmlentities($result->category_name); ?>" placeholder="Category Name">
                                                        </div>
                                                <?php }
                                                } ?>
                                                <button type="submit" name="up_cat" id="up_cat" class="btn btn-primary btn-rounded m-b-10">Update</button>
                                                <a href="category.php" class="btn btn-secondary btn-rounded m-b-10">Back</a>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /# column -->
                        </div>
                        <!-- /# row -->
                        <?php
                        include "include/footer.php";
                        ?>

                    </section>
                </div>
            </div>
        </div>

        <script>
            $("#year").text(new Date().getFullYear());
        </script>
        <!-- Common -->
        <script src="js/lib/jquery.min.js"></script>
        <script src="js/lib/jquery.nanoscroller.min.js"></script>
        <script src="js/lib/menubar/sidebar.js"></script>
        <script src="js/lib/preloader/pace.min.js"></script>
        <script src="js/lib/bootstrap.min.js"></script>
        <script src="js/scripts.js"></script>

        <script type="text/javascript">
            // Update Category
            $(document).ready(function($) {
                $("#up_cat").click(function(e) {

                    e.preventDefault();

                    //category name required
                    var category_name = $("#category_name").val();
                    if (category_name == "") {
                        alert("category_name is required");
                        $("input#category_name").focus();
                        return false;
                    }
                    var id = $("#cat_id").val();

                    $.ajax({
                        type: "POST",
                        url: "process.php",
                        data: {
                            action: "updateCategory",
                            category_name: $("#category_name").val(),
                            id: $("#cat_id").val(),

                        },
                        beforeSend: function() {
                            $("#up_cat").val("Processing...");
                        },
                        success: function(response) {
                            if (response == true) {
                                alert("Successfully Updated");
                                $(location).attr('href', 'category.php');

                            } else if (response == false) {
                                alert("Error, Incorrect Details" + response);
                                $("#up_cat").val("Update");
                            }
                        },
                    });
                });
                return false;
            });
        </script>
    </body>

    </html>
<?php } ?>