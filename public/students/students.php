<?php
if (isset($_GET['get-table'])) {
    try {
        $stmt = $pdo->query('SELECT * FROM students_data');
        echo json_encode($stmt->fetchAll(PDO::FETCH_ASSOC));
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
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
                    <section class=" card">
                        <div class="card-image">
                            <figure class="image is-1by1">
                                <img src="https://i.kym-cdn.com/photos/images/original/001/384/545/7b9.jpg"
                                    alt="Placeholder image">
                            </figure>
                        </div>
                        <div class="card-content" id="overviewStudent" hidden>
                            <div class="media">
                                <div class="media-content">
                                    <p class="title is-4">Kintoyyy</p>
                                    <p class="subtitle is-6">@kintoyyy</p>
                                </div>
                            </div>

                            <div class="content">
                                <ul>
                                    <li>Section: ST12P1</li>
                                    <li>Adviser: Sir luchi</li>
                                    <li>Room: A1-301</li>
                                    <li>Class: PM</li>
                                </ul>
                            </div>


                        </div>


                        <form id="form" class="card-content" method="post" onsubmit="return false">

                            <p class="title">
                                Edit Student
                            </p>
                            <div>
                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="text" placeholder="Student Name" name="student_name"
                                            id="student_name">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-graduation-cap"></i>
                                        </span>
                                    </p>
                                </div>



                                <div class="field">
                                    <p class="control has-icons-left">
                                        <span class="select is-fullwidth " id="student_gender">
                                            <select name="student_gender" id="student_gender_select">
                                                <option value="" selected disabled>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </span>
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-venus-mars"></i>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="text" placeholder="Section" value=""
                                            name="student_section" id="student_section">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-chalkboard-user"></i>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="number" placeholder="Student ID" name="student_id"
                                            id="student_id">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-id-card"></i>
                                        </span>
                                    </p>
                                </div>

                                <div class="field is-grouped">
                                    <p class="control is-expanded  has-icons-left">
                                        <input id="apikey" class="input" type="number" placeholder="Card ID"
                                            name="student_card_id" id="student_card_id">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-id-badge"></i>
                                        </span>
                                    </p>

                                    <p class="control">
                                        <button id="keygen" class="button is-warning">
                                            <div class="icon">
                                                <i class="fa-solid fa-barcode"></i>
                                            </div>
                                            <span>Scan Card</span>
                                        </button>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="text" placeholder="Adviser" value=""
                                            name="student_adviser" id="student_adviser">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-person-chalkboard"></i>
                                        </span>
                                    </p>
                                </div>

                                <div class="field">
                                    <p class="control has-icons-left has-icons-right">
                                        <input class="input" type="text" placeholder="room" value="" name="student_room"
                                            id="student_room">
                                        <span class="icon is-small is-left">
                                            <i class="fa-solid fa-school"></i>
                                        </span>
                                    </p>
                                </div>


                                <input type="text" id="device_id" name="device_id" hidden>

                                <div class="field is-grouped ">

                                    <p class="control">
                                        <button class="button is-success is-fullwidth is-responsive"
                                            onclick="saveDevice()">
                                            <div class="icon">
                                                <i class="fa-solid fa-plus"></i>
                                            </div>
                                            <span>Save Student</span>
                                        </button>
                                    </p>

                                    <p class="control">
                                        <button class="button is-danger is-fullwidth"
                                            onclick="$('#form input').val(''); $('#device_mode_select').val('');">
                                            <div class="icon">
                                                <i class="fa-solid fa-trash"></i>
                                            </div>
                                            <span>Clear</span>
                                        </button>
                                    </p>

                                    <progress class="progress is-danger" max="100" style="display: none;">30%</progress>


                                </div>
                            </div>
                        </form>

                        <footer class="card-footer">
                            <a href="#" class="card-footer-item button is-danger">
                                <div class="icon is-small">
                                    <i class="fa-sharp fa-solid fa-question"></i>
                                </div>
                                <span>Absent</span>
                            </a>
                            <a href="#" class="card-footer-item button is-info">
                                <div class="icon is-small">
                                    <i class="fa-sharp fa-solid fa-clock"></i>
                                </div>
                                <span>Late</span>
                            </a>
                            <a href="#" class="card-footer-item button is-success">
                                <div class="icon is-small">
                                    <i class="fa-sharp fa-solid fa-user-graduate"></i>
                                </div>
                                <span>Present</span>
                            </a>
                        </footer>
                    </section>
                </div>
                <div class="column is-8-desktop">
                    <div class="card">
                        <div class="card-content">
                            <p class="title">
                                Students
                            </p>
                            <div class="table-container">
                                <div class="table-container">
                                    <table class="table is-fullwidth is-hoverable is-horizontal">
                                        <thead>
                                            <tr>
                                                <th>Student</th>
                                                <th>Gender</th>
                                                <th>Section</th>
                                                <th>ID number</th>
                                                <th>Room</th>
                                                <th>View</th>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th data-label="Student">Kent Rato</th>
                                                <td>Male</td>
                                                <td data-label="Student">ST12P1</td>
                                                <td>8172353</td>
                                                <td>A1-301</td>
                                                <td>
                                                    <button class="button is-success is-small"
                                                        onclick="editDevice(' + device.id + ')">
                                                        <div class="icon"><i class="fa-solid fa-eye"></i></div>
                                                    </button>
                                                </td>
                                            </tr>

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
    $(document).ready(function () {
        loadTable();
    });

    setInterval(function () {
        loadTable();
    }, 5000);

    function loadTable() {
        $.ajax({
            type: 'GET',
            data: 'get-table',
            success: function (response) {
                console.log(response)
                var result = JSON.parse(response);
                var tbody = $('#device-table tbody');
                tbody.empty();
                for (var i = 0; i < result.length; i++) {
                    var user = result[i];
                    var tr = $('<tr>');
                    tr.append($('<td>').text(user.student_name));
                    tr.append($('<td>').text(user.student_section));
                    tr.append($('<td>').text(user.student_gender));
                    tr.append($('<td>').text(user.student_id));
                    tr.append($('<td>').text(user.student_card_id));
                    tr.append($('<td>').text(convertTime(user.device_created)));
                    tr.append($('<td>').html('<button class="button is-success is-small" onclick="editDevice(' + user.id + ')"><div class="icon"><i class="fa-solid fa-pen"></i></div></button ><button class="button is-danger is-small" onclick="removeDevice(' + user.id + ')"><div class="icon"><i class="fa-solid fa-trash"></i></div></button >'));
                    tbody.append(tr);
                }
            }
        });
    }

</script>

</html>