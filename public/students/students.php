<?php 


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
                <section class="modal-card-body card">
                    <div class="card-image">
                        <figure class="image is-1by1">
                            <img src="https://i.kym-cdn.com/photos/images/original/001/384/545/7b9.jpg"
                                alt="Placeholder image">
                        </figure>
                    </div>
                    <div class="card-content">
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
                                            <th><abbr title="student">Student</abbr></th>
                                            <th><abbr title="Room">Gender</abbr></th>
                                            <th><abbr title="section">Section</abbr></th>
                                            <th><abbr title="uid">ID number</abbr></th>
                                            <th><abbr title="Room">Room</abbr></th>
                                            <th><abbr title="edit">Edit</abbr></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th data-label="Student">Kent Rato</th>
                                            <td>Male</td>
                                            <td data-label="Student">ST12P1</td>
                                            <td>8172353</td>
                                            <td>A1-301</td>
                                            <td>
                                                <button class="button is-success is-small is-right  is-fullwidth">
                                                    Edit
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

</html>