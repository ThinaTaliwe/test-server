<!-- resources/views/logs/show.blade.php -->

<!DOCTYPE html>
<html>

<head>
    {{-- <title>HTML Tutorial</title> --}}

    <!-- Dragula CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.0/normalize.css" />

    <!-- Dragula JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.js"></script>

    <style>
        @import url("https://fonts.googleapis.com/css?family=Arimo:400,700|Roboto+Slab:400,700");

        :root {
            font-size: calc(0.5vw + 1vh);
        }

        * {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        body {
            min-width: 420px;
        }

        h1,
        h4 {
            font-family: "Arimo", sans-serif;
            line-height: 1.3;
        }

        header h1 {
            font-size: 2.4rem;
            margin: 4rem auto;
        }

        span {
            font-size: 3rem;
        }

        p {
            font-family: "Roboto Slab", serif;
        }

        a,
        a:link,
        a:active,
        a:visited {
            color: #0066aa;
            text-decoration: none;
            border-bottom: #000013 0.16rem solid;
        }

        a:hover {
            color: #000013;
            border-bottom: #0066aa 0.16rem solid;
        }

        header,
        footer {
            width: 40rem;
            margin: 2rem auto;
            text-align: center;
        }

        .add-task-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            width: 20rem;
            height: 5.3rem;
            margin: auto;
            background: #a8a8a8;
            border: #000013 0.2rem solid;
            border-radius: 0.2rem;
            padding: 0.4rem;
        }

        .main-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
        }

        .columns {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start;
            margin: 1.6rem auto;
        }

        .column {
            width: 8.4rem;
            margin: 0 0.6rem;
            background: #a8a8a8;
            border: #000013 0.2rem solid;
            border-radius: 0.2rem;
        }

        .column-header {
            padding: 0.1rem;
            border-bottom: #000013 0.2rem solid;
        }

        .column-header h4 {
            text-align: center;
        }

        .to-do-column .column-header {
            background: #ff872f;
        }

        .doing-column .column-header {
            background: #13a4d9;
        }

        .done-column .column-header {
            background: #15d072;
        }

        .trash-column .column-header {
            background: #ff4444;
        }

        .task-list {
            min-height: 3rem;
        }

        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        li {
            list-style-type: none;
        }

        .column-button {
            text-align: center;
            padding: 0.1rem;
        }

        .button {
            font-family: "Arimo", sans-serif;
            font-weight: 700;
            border: #000013 0.14rem solid;
            border-radius: 0.2rem;
            color: #000013;
            padding: 0.6rem 1rem;
            margin-bottom: 0.3rem;
            cursor: pointer;
        }

        .delete-button {
            background-color: #ff4444;
            margin: 0.1rem auto 0.6rem auto;
        }

        .delete-button:hover {
            background-color: #fa7070;
        }

        .add-button {
            background-color: #ffcb1e;
            padding: 0 1rem;
            height: 2.8rem;
            width: 10rem;
            margin-top: 0.6rem;
        }

        .add-button:hover {
            background-color: #ffdd6e;
        }

        .task {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            vertical-align: middle;
            list-style-type: none;
            background: #fff;
            -webkit-transition: all 0.3s;
            transition: all 0.3s;
            margin: 0.4rem;
            height: 4rem;
            border: #000013 0.15rem solid;
            border-radius: 0.2rem;
            cursor: move;
            text-align: center;
            vertical-align: middle;
        }

        #taskText {
            background: #fff;
            border: #000013 0.15rem solid;
            border-radius: 0.2rem;
            text-align: center;
            font-family: "Roboto Slab", serif;
            height: 4rem;
            width: 7rem;
            margin: auto 0.8rem auto 0.1rem;
        }

        .task p {
            margin: auto;
        }

        /* Dragula CSS Release 3.2.0 from: https://github.com/bevacqua/dragula */

        .gu-mirror {
            position: fixed !important;
            margin: 0 !important;
            z-index: 9999 !important;
            opacity: 0.8;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=80)";
            filter: alpha(opacity=80);
        }

        .gu-hide {
            display: none !important;
        }

        .gu-unselectable {
            -webkit-user-select: none !important;
            -moz-user-select: none !important;
            -ms-user-select: none !important;
            user-select: none !important;
        }

        .gu-transit {
            opacity: 0.2;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=20)";
            filter: alpha(opacity=20);
        }
    </style>
</head>

<body>

    <header>
        <h1>Drag & Drop<br /><span></span></h1>
    </header>

    <div class="add-task-container">
        <input type="text" maxlength="12" id="taskText" placeholder="New Module..."
            onkeydown="if (event.keyCode == 13)
                        document.getElementById('add').click()">
        <button id="add" class="button add-button" onclick="addTask()">Add Module</button>
    </div>

    <div class="main-container">
        <ul class="columns">

            <li class="column to-do-column">
                <div class="column-header">
                    <h4>Components</h4>
                </div>
                <ul class="task-list" id="to-do">
                    <li class="task">
                        <p>User management</p>
                    </li>
                    <li class="task">
                        <p>Employee management</p>
                    </li>
                    <li class="task">
                        <p>Sales management</p>
                    </li>
                    <li class="task">
                        <p>Item management</p>
                    </li>
                </ul>
            </li>

            <li class="column doing-column">
                <div class="column-header">
                    <h4>Unmatched Values</h4>
                </div>
                <ul class="task-list" id="doing">
                    <li class="task">
                        <p>Value 1</p>
                    </li>
                    <li class="task">
                        <p>Value 2</p>
                    </li>
                    <li class="task">
                        <p>Value 3</p>
                    </li>
                </ul>
            </li>

            <li class="column done-column">
                <div class="column-header">
                    <h4>Missing Values</h4>
                </div>
                <ul class="task-list" id="done">
                    <li class="task">
                        <p>Value M1</p>
                    </li>
                    <li class="task">
                        <p>Value M2</p>
                    </li>
                </ul>
            </li>

            <li class="column trash-column">
                <div class="column-header">
                    <h4>Fixer</h4>
                </div>
                <ul class="task-list" id="trash">
                    <li class="task">
                        <p>value6</p>
                    </li>
                    <li class="task">
                        <p>Value5</p>
                    </li>

                </ul>
                <div class="column-button">
                    <button class="button delete-button" onclick="emptyTrash()">Fix/Clear</button>
                </div>
            </li>

        </ul>
    </div>

    <footer>
        {{-- <p>Built with <a href="https://github.com/bevacqua/dragula" target="_blank">Dragula</a> and Vanilla JS by <a
                href="http://nikkipantony.com" target="_blank">Nikki Pantony</a></p> --}}
    </footer>

    <script>
        /* Custom Dragula JS */
        dragula([
            document.getElementById("to-do"),
            document.getElementById("doing"),
            document.getElementById("done"),
            document.getElementById("trash")
        ]);
        removeOnSpill: false
            .on("drag", function(el) {
                el.className.replace("ex-moved", "");
            })
            .on("drop", function(el) {
                el.className += "ex-moved";
            })
            .on("over", function(el, container) {
                container.className += "ex-over";
            })
            .on("out", function(el, container) {
                container.className.replace("ex-over", "");
            });

        /* Vanilla JS to add a new task */
        function addTask() {
            /* Get task text from input */
            var inputTask = document.getElementById("taskText").value;
            /* Add task to the 'To Do' column */
            document.getElementById("to-do").innerHTML +=
                "<li class='task'><p>" + inputTask + "</p></li>";
            /* Clear task text from input after adding task */
            document.getElementById("taskText").value = "";
        }

        /* Vanilla JS to delete tasks in 'Trash' column */
        function emptyTrash() {
            /* Clear tasks from 'Trash' column */
            document.getElementById("trash").innerHTML = "";
        }
    </script>
</body>

</html>
