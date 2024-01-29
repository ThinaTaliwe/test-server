<!-- resources/views/logs/show.blade.php -->

<!DOCTYPE html>
<html>

<head>
    <title>HTML Tutorial</title>
    <style>
        .container {
            max-width: 960px;
            margin: 0 auto;
        }

        .left {
            float: left;
            position: relative;
            width: 50%;
            height: 100%;
        }

        .right {
            float: left;
            position: relative;
            width: 40%;
            margin-left: 5%;
            height: 100%;
        }

        #display {
            background: #2d2d2d;
            border: 10px solid #000000;
            border-radius: 5px;
            font-size: 2em;
            color: white;
            height: 100px;
            min-width: 200px;
            text-align: center;
            padding: 1em;
            display: table-cell;
            vertical-align: middle;
        }

        #drag-elements {
            display: block;
            background-color: #dfdfdf;
            border-radius: 5px;
            min-height: 50px;
            margin: 0 auto;
            padding: 2em;
        }

        #drag-elements>div {
            text-align: center;
            float: left;
            padding: 1em;
            margin: 0 1em 1em 0;
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            border-radius: 100px;
            border: 2px solid #ececec;
            background: #F7F7F7;
            transition: all .5s ease;
        }

        #drag-elements>div:active {
            -webkit-animation: wiggle 0.3s 0s infinite ease-in;
            animation: wiggle 0.3s 0s infinite ease-in;
            opacity: .6;
            border: 2px solid #000;
        }

        #drag-elements>div:hover {
            border: 2px solid gray;
            background-color: #e5e5e5;
        }

        #drop-target {
            border: 2px dashed #D9D9D9;
            border-radius: 5px;
            min-height: 50px;
            margin: 0 auto;
            margin-top: 10px;
            padding: 2em;
            display: block;
            text-align: center;
        }

        #drop-target>div {
            transition: all .5s;
            text-align: center;
            float: left;
            padding: 1em;
            margin: 0 1em 1em 0;
            box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3);
            border-radius: 5px;
            border: 2px solid skyblue;
            background: #F7F7F7;
            transition: all .5s ease;
        }

        #drop-target>div:active {
            -webkit-animation: wiggle 0.3s 0s infinite ease-in;
            animation: wiggle 0.3s 0s infinite ease-in;
            opacity: .6;
            border: 2px solid #000;
        }

        @-webkit-keyframes wiggle {
            0% {
                -webkit-transform: rotate(0deg);
            }

            25% {
                -webkit-transform: rotate(2deg);
            }

            75% {
                -webkit-transform: rotate(-2deg);
            }

            100% {
                -webkit-transform: rotate(0deg);
            }
        }

        @keyframes wiggle {
            0% {
                transform: rotate(-2deg);
            }

            25% {
                transform: rotate(2deg);
            }

            75% {
                transform: rotate(-2deg);
            }

            100% {
                transform: rotate(0deg);
            }
        }

        .gu-mirror {
            position: fixed !important;
            margin: 0 !important;
            z-index: 9999 !important;
            padding: 1em;
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
            opacity: 0.5;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
            filter: alpha(opacity=50);
        }

        .gu-mirror {
            opacity: 0.5;
            -ms-filter: "progid:DXImageTransform.Microsoft.Alpha(Opacity=50)";
            filter: alpha(opacity=50);
        }
    </style>

    <!-- Dragula CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dragula/3.7.2/dragula.min.css" />

    <!-- Dragula JS -->
    <script src="https://rawgit.com/bevacqua/dragula/master/dist/dragula.js"></script>
</head>

<body>

    <div class="container">
        <h1>Drag & Drop</h1>
        
        <div class="left">
            <div id="drag-elements">
                <div>Element 1</div>
                <div>Element 2</div>
                <div>Element 3</div>
            </div>

            <div id="drop-target">
            </div>
        </div>
        <div class="right">
            <div id="display">Display</div>
        </div>
    </div>

    

    <script>
        function $(id) {
            return document.getElementById(id);
        }

        dragula([$('drag-elements'), $('drop-target')], {
            revertOnSpill: true
        }).on('drop', function(el) {
            if ($('drop-target').children.length > 0) {
                $('display').innerHTML = $('drop-target').innerHTML;
            } else {
                $('display').innerHTML = "Display";
            }

        });
    </script>
</body>

</html>