<?php
if (isset($_GET['test'])) {
    $stmt = $pdo->query('SELECT * FROM students_logs');
    $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $json = json_encode($users);
    echo $json;
    die;
}

?>
<!DOCTYPE html>
<html>
<?php include "public/partials/html_headers.php"; ?>
<?php include "public/partials/html_navbar_top.php"; ?>

<body>
    <?php include "public/partials/html_hero_header.php"; ?>
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column">
                    <div class="card">
                        <div class="tabs is-centered">
                            <ul>
                                <li>
                                    <a>
                                        <span class="icon is-small"><i class="fa-solid fa-address-book"></i></span>
                                        <span>Attendance Logs</span>
                                    </a>
                                </li>
                                <li class="is-active">
                                    <a>
                                        <span class="icon is-small"><i class="fa-solid fa-list-ul"></i></span>
                                        <span>Device Logs</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="card-content">
                            <p class="title">
                                Device Logs
                                <button class="button is-outlined">Export</button>
                            </p>
                            <div class="table-container">
                                <div class="table-container">
                                    <table class="table is-fullwidth is-hoverable is-horizontal" id="user-table">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th>Section</th>
                                                <th>Device</th>
                                                <th>Room</th>
                                                <th>Time In</th>
                                                <th>Time Out</th>
                                                <th>Event</th>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php include "public/partials/html_footer.php"; ?>

<script>
    // Load the table on page load
    $(document).ready(function () {
        loadTable();
    });

    // Refresh the table every 5 seconds
    setInterval(function () {
        loadTable();
    }, 5000);

    // Load the table from the server and display it in the HTML
    function loadTable() {
        $.ajax({
            type: 'GET',
            data: "test",
            success: function (response) {
                var users = JSON.parse(response);
                var tbody = $('#user-table tbody');
                tbody.empty();
                for (var i = 0; i < users.length; i++) {
                    var user = users[i];
                    var tr = $('<tr>');
                    tr.append($('<td>').text(user.student_name));
                    tr.append($('<td>').text(user.student_section));
                    tr.append($('<td>').text(user.device_name));
                    tr.append($('<td>').text(user.device_room));
                    tr.append($('<td>').text(user.student_time_in));
                    tr.append($('<td>').text(user.student_time_out));
                    tr.append($('<td>').text(user.last_destination));
                    tbody.append(tr);
                }
            }
        });
    }
</script>

</html>