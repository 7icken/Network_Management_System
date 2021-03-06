<!DOCTYPE html>
<html lang="en">

<head>
    <title>
        Confirm to acknowledge?
    </title>
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js">
    </script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js">
    </script>

    <script>
        $(function() {
            $("#dialog").dialog();
        });
    </script>

</head>

<body>

    <?php $alarmid=$_GET[ 'alarmid']; ?>

    <div id="dialog">
        <p>
            Do you confirm to acknowledge this alarm (alarmID
            <?php echo $alarmid; ?> )?
        </p>

        <button type="button" class="btn btn-success" onclick="confirm_acknowledgement()">
            Confirm
        </button>
        <button type="button" class="btn btn-danger" onclick="window.open('', '_self', ''); window.close();">
            Close
        </button>
        <br>
        <br>
        <div id="myDiv">
        </div>

    </div>
    <br>
    <br>


    <script>
        function confirm_acknowledgement() {

            var alarmID = <?php echo $alarmid; ?> ;
            var xmlhttp;
            if (window.XMLHttpRequest) { // code for IE7+, Firefox, Chrome, Opera, Safari
                xmlhttp = new XMLHttpRequest();
            } else { // code for IE6, IE5
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }
            xmlhttp.onreadystatechange = function() {
                if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {

                    document.getElementById("myDiv").innerHTML = xmlhttp.responseText;

                }
            };
            xmlhttp.open("GET", "acknowledge_alarm_function.php?q=" + alarmID, true);
            xmlhttp.send();
        }
    </script>

</body>

</html>