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

                    <header class="card-header">
                        <p class="card-header-title">
                            Hallpass Destinations
                        </p>
                        <button class="card-header-icon" aria-label="more options" onclick="alert('true')">
                            <span class="icon">
                                <i class="fa-solid fa-plus"></i>
                            </span>
                        </button>
                    </header>

                    <div class="card-content">
                        <!-- 
                            <p class="title">
                                <span>Hallpass Destinations
                                </span>
                                <button class="button is-right">
                                        <i class="fa-solid fa-plus"></i>
                                    </button>
                            <div class="buttons has-addons is-right">
                                <button class="button">Yes</button>
                            </div>

                            </p> -->
                        <div class="table-container">
                            <div class="table-container">
                                <table class="table is-fullwidth is-hoverable is-horizontal">
                                    <thead>
                                        <tr>
                                            <th>Location</th>
                                            <th>Date Added</th>
                                            <th>Edit</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th>Comfort Room</th>
                                            <td></td>
                                            <td>
                                                <button
                                                    class="button is-success is-small js-modal-trigger is-right  is-fullwidth"
                                                    data-target="modal-student">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Canteen</th>
                                            <td></td>
                                            <td>
                                                <button
                                                    class="button is-success is-small js-modal-trigger is-right  is-fullwidth"
                                                    data-target="modal-student">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Faculty</th>
                                            <td></td>
                                            <td>
                                                <button
                                                    class="button is-success is-small js-modal-trigger is-right  is-fullwidth"
                                                    data-target="modal-student">
                                                    Edit
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Laboratory</th>
                                            <td></td>
                                            <td>
                                                <button
                                                    class="button is-success is-small js-modal-trigger is-right  is-fullwidth"
                                                    data-target="modal-student">
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