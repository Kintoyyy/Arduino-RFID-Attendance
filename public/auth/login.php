<?php
if (isset($_SESSION['loggedIn'])) {
    header('Location: /admin');
    exit();
}

if (isset($_POST['action'])) {
    if ($_POST['action'] == 'login') {
        if ($_POST['username'] == 'admin' && $_POST['password'] == '123') {
            $_SESSION['loggedIn'] = "true";
            $_SESSION['username'] = $_POST['username'];
            header("Refresh:0;");
            echo "fjfobef";
        }
        die();
    }
}

?>
<!DOCTYPE html>
<html>
<?php include "public/partials/html_headers.php"; ?>


<body>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-half is-offset-one-quarter">
                    <div class="card">
                        <div class="card-image">
                            <figure class="image is-flex is-justify-content-center">
                                <img src="assets/img/Login.svg" style="width: 400px;">
                            </figure>
                        </div>
                        <div class="has-text-centered has-text-weight-bold">
                            <span class="title">Login RFID Attendance Checker</span>
                        </div>

                        <form id="form" class="card-content" onsubmit="return false">

                            <div class="field">
                                <label class="label">Username</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="text" placeholder="Username" name="username"
                                        id="username" autocomplete="username" required>
                                    <span class="icon is-small is-left">
                                        <i class="fas fa-user"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <!-- <i class="fa-solid fa-exclamation"></i> -->
                                    </span>
                                </div>
                                <!-- <p class="help is-danger">Not found!</p> -->
                            </div>

                            <div class="field">
                                <label class="label">Password</label>
                                <div class="control has-icons-left has-icons-right">
                                    <input class="input" type="password" placeholder="Password" name="password"
                                        id="password" autocomplete="current-password" required>
                                    <span class="icon is-small is-left">
                                        <i class="fa-solid fa-lock"></i>
                                    </span>
                                    <span class="icon is-small is-right">
                                        <i class="fa-solid fa-exclamation"></i>
                                    </span>
                                </div>
                                <!-- <p class="help is-danger">Incorrect Password</p> -->
                            </div>

                            <input type="text" name="action" value="login" hidden>

                            <div class="field">
                                <button class="button is-success is-fullwidth" id="submit" type="submit">
                                    <span class="icon">
                                        <i class="fa-solid fa-right-to-bracket"></i>
                                    </span>
                                    <span>Login</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $('#submit').click(function () {
            var obj = {};
            $.each($('#form').serializeArray(), function (_, val) {
                obj[val.name] = val.value;
            });
            console.log(obj)
            $.ajax({
                type: 'post',
                data: obj,
                beforeSend: function () {
                    $('#spinner').show();
                },
                success: function (response) {
                    var obj = JSON.parse(response)
                    console.log("yawa")
                    // obj.redirect ? location.href = obj.redirect : ""
                    $('#spinner').hide();
                    setTimeout(() => {
                        window.location.href = "/admin";
                    }, 500);
                }
            });

            setTimeout(() => {
                window.location.href = "/admin";
            }, 500);
        });
    </script>

</body>
<?php include "public/partials/html_footer.php"; ?>

</html>