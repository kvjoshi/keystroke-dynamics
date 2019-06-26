<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<form method="post">
<label>
    <h2>Please input something to test!</h2>

    <textarea id="in"></textarea>
</label>
<input type="button" name="next"  value="next" id="next" />


</form>

<script type="text/javascript">
    var inid=5;
    function duration(timestamps) {
        var last = timestamps.pop();
        var durations = [];
        while (timestamps.length) {
            durations.push(last - (last = timestamps.pop()));
        }
        return durations.reverse();
    }

    function display(mills) {
        if (mills > 1000)
            return (mills / 1000) + ' s';
        return mills + ' ms';
    }

    var durations = [];
    var ftime;
    var ctime;
    var totalt = 0;


    $('#in').keydown(function (e) {
        durations.push($.now());
    }).keyup(function (e) {
        var current = durations;
        current.push($.now());
        durations = [];
        var timeElapsed = current[current.length - 1] - current[0];
        totalt = totalt + timeElapsed;

        /* console.log([
             ['time elapsed:', display(timeElapsed)].join(' '),['time total:', display(totalt)].join(' ')
         ].join(' --- '));*/
        // for-> key press time ,
        // ['keys duration:', duration(current).map(display)].join(' ')
    });

    var ftime=0;

    var date1=0;
    var date2=0;

    $('#in').click(function(event){


        ftime = event.timeStamp;
        date1 = ftime.toFixed();
        //console.log(date1);
        //console.log("ftime");
    });
    var ctime =0;
    var cftime=0;

    $('#next').click(function(event){


        ctime = event.timeStamp;
        date2 = ctime.toFixed();


        cftime = date2-date1;

        var secondsDifference1;
        function cf(timestamp1, timestamp2) {
            var difference = timestamp1 - timestamp2;
            secondsDifference1 = Math.floor(difference/1000);
            console.log("Total key press Time :");
            console.log(secondsDifference1);
            return secondsDifference1;
        }

        cf(date2,date1);
        var dataString = 'secondsDifference1=' + secondsDifference1 + '&totalt=' + totalt + '&inid=' + inid;
        $.ajax({
            type: "POST",
            url: "data.php",
            data: dataString,
            cache: false,
            success: function(result) {
                window.location = "ind2.php";

            }
        });
    });




</script>
</html>
