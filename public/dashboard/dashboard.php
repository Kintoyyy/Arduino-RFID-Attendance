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
                    <div class="columns is-mobile">
                        <div class="column is-8-mobile">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-primary">10</p>
                                        <p class="subtitle">Present</p>
                                    </div>
                                    <div
                                        class="column is-4-mobile is-5-tablet is-3-desktop is-flex is-align-items-center">
                                        <span class="icon">
                                            <i
                                                class="fa-sharp fa-solid fa-3x has-text-primary-light fa-user-graduate"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-6-tablet">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-info">1</p>
                                        <p class="subtitle">Late</p>
                                    </div>
                                    <div class="column is-hidden-touch is-3 is-flex is-align-items-center">
                                        <span class="icon">
                                            <i class="fa-sharp fa-solid fa-3x has-text-info-light fa-clock"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="column">
                    <div class="columns is-mobile">
                        <div class="column is-5-tablet">
                            <div class="box">
                                <div class="columns is-mobile">
                                    <div class="column">
                                        <p class="title is-1 has-text-danger">1</p>
                                        <p class="subtitle">Absent</p>
                                    </div>
                                    <div class="column is-3-desktop is-flex is-align-items-center is-hidden-touch">
                                        <span class="icon">
                                            <i class="fa-sharp fa-solid fa-3x has-text-danger-light fa-question"></i>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="column is-8-mobile">
                            <div class="box">
                                <p class="title is-1">Math 3</p>
                                <p class="subtitle">3:00 - 3:40 PM</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="columns is-desktop">
                <div class="column is-7-desktop is-12-tablet">
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
                                                <th><abbr title="section">Section</abbr></th>
                                                <th><abbr title="uid">ID</abbr></th>
                                                <th><abbr title="edit">Edit</abbr></th>
                                        </thead>
                                        <tbody>
                                            <tr class="has-background-primary-light">
                                                <th data-label="Student">Kent Rato</th>
                                                <td data-label="Student">ST12P1</td>
                                                <td>8172353</td>
                                                <td>
                                                    <button
                                                        class="button is-primary is-small is-fullwidth js-modal-trigger"
                                                        data-target="modal-student">
                                                        <div class="icon is-small">
                                                            <i class="fa-sharp fa-solid fa-pen"></i>
                                                        </div>
                                                        <span>Edit</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="has-background-danger-light">
                                                <th data-label="Student">Kent Rato</th>
                                                <td data-label="Student">ST12P1</td>
                                                <td>8172353</td>
                                                <td>
                                                    <button
                                                        class="button is-primary is-small is-fullwidth js-modal-trigger"
                                                        data-target="modal-student">
                                                        <div class="icon is-small">
                                                            <i class="fa-sharp fa-solid fa-pen"></i>
                                                        </div>
                                                        <span>Edit</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="has-background-info-light">
                                                <th data-label="Student">Kent Rato</th>
                                                <td data-label="Student">ST12P1</td>
                                                <td>8172353</td>
                                                <td>
                                                    <button
                                                        class="button is-primary is-small is-fullwidth js-modal-trigger"
                                                        data-target="modal-student">
                                                        <div class="icon is-small">
                                                            <i class="fa-sharp fa-solid fa-pen"></i>
                                                        </div>
                                                        <span>Edit</span>
                                                    </button>
                                                </td>
                                            </tr>
                                            <tr class="">
                                                <th data-label="Student">Kent Rato</th>
                                                <td data-label="Student">ST12P1</td>
                                                <td>8172353</td>
                                                <td>
                                                    <button
                                                        class="button is-primary is-small is-fullwidth js-modal-trigger"
                                                        data-target="modal-student">
                                                        <div class="icon is-small">
                                                            <i class="fa-sharp fa-solid fa-pen"></i>
                                                        </div>
                                                        <span>Edit</span>
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
                <div class="column is-5-desktop is-12-tablet">
                    <div class="card">
                        <div class="card-content">
                            <p class="title">
                                Logs
                            </p>
                            <div class="table-container">
                                <table class="table is-fullwidth is-hoverable is-horizontal">
                                    <thead>
                                        <tr>
                                            <th><abbr title="time">Time</abbr></th>
                                            <th><abbr title="student">Student</abbr></th>
                                            <th><abbr title="section">Section</abbr></th>
                                            <th><abbr title="event">Event</abbr></th>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                        <tr>
                                            <td data-label="time">2:30 PM</td>
                                            <td data-label="student">Kent Rato</td>
                                            <td data-label="section">ST12P1</td>
                                            <td data-label="event">Arrived!</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="modal-student" class="modal">
        <div class="modal-background"></div>
        <div class="modal-card">
            <section class="modal-card-body card">
                <div class="card-image">
                    <figure class="image is-4by3">
                        <img src="https://i.kym-cdn.com/photos/images/original/001/384/545/7b9.jpg"
                            alt="Placeholder image">
                    </figure>
                </div>
                <div class="card-content">
                    <div class="media">
                        <!-- <div class="media-left">
                            <figure class="image is-48x48">
                                <img src="https://bulma.io/images/placeholders/96x96.png" alt="Placeholder image">
                            </figure>
                        </div> -->
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
    </div>
    <script>document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                const e = event || window.event;

                if (e.keyCode === 27) { // Escape key
                    closeAllModals();
                }
            });
        });</script>

</body>
<?php include "public/partials/html_footer.php"; ?>

</html>