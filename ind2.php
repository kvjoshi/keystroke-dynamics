<?php
$con = mysqli_connect("localhost","root","","keystroke") or die("Database Connection Failed");
$fetch = "SELECT * FROM `key record` WHERE `user_id`=5";
$fetch_query=mysqli_query($con,$fetch) or die('Fetch Fail');
$view=mysqli_fetch_assoc($fetch_query);
$secondsDifference = $view['difference1'];
$totalt = $view['keytime1'];
?>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<label>
    <h2>Please retype</h2>
    <textarea id="in2"></textarea>
</label>
<input type="button" name="finish"  value="finish" id="finish" />
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


    var totalt2 = 0;


    $('#in2').keydown(function (e) {
        durations.push($.now());
    }).keyup(function (e) {
        var current = durations;
        current.push($.now());
        durations = [];
        var timeElapsed2 = current[current.length - 1] - current[0];
        totalt2 = totalt2 + timeElapsed2;

        //console.log([
        // ['time elapsed:', display(timeElapsed2)].join(' '),['time total:', display(totalt2)].join(' ')
        //  ].join(' --- '));
        // for-> key press time ,
        // ['keys duration:', duration(current).map(display)].join(' ')
    });


    var ftime2=0;
    var ctime2=0;
    var cftime2=0;
    var date21=0;
    var date22=0;



    $('#in2').click(function(event){


        ftime2 = event.timeStamp;
        date21 = ftime2.toFixed();
        //console.log(date21);
        //console.log("ftime2");
    });




    var secondsDifference2;

    $('#finish').click(function(event){


        ctime2 = event.timeStamp;
        date22 = ctime2.toFixed();
        //console.log(date22);
        //console.log("ctime2");
        cftime2 = date22-date21;
        //console.log(cftime2);


        function cf(timestamp1, timestamp2) {
            var difference = timestamp1 - timestamp2;
            secondsDifference2 = Math.floor(difference/1000);
            console.log("Total Key Press time 2 :");
            console.log(secondsDifference2);
            return secondsDifference2;
        }
        var secondsDifference1 = "<?php echo $secondsDifference ?>";
        var totalt = "<?php echo $totalt ?>";
        cf(date22,date21);
        check(secondsDifference1,secondsDifference2);
        check2(totalt,totalt2);
        var dataString = 'secondsDifference2=' + secondsDifference2 + '&totalt2=' + totalt2 + '&sim1=' + cal2 + '&sim2=' + cal22  + '&inid=' + inid;
        $.ajax({
            type: "POST",
            url: "data2.php",
            data: dataString,
            cache: false,
            success: function(result) {
                // alert(result);

            }
        });

    });
    var diff;
    var cal1;
    var cal2;
    function check(time1,time2)
    {

        if(time1 > time2)
        {
            diff = time1-time2;
            cal1=time2*100;
            cal2=cal1/time1;
            console.log("Similarity :",cal2,"%");
        }
        else{
            diff= time2-time1;
            cal1=time1*100;
            cal2=cal1/time2;
            console.log("Similarity :",cal2,"%");
        }
    }

    var diff2;
    var cal121;
    var cal22;
    function check2(totalt,totalt2)
    {

        if(totalt > totalt2)
        {
            diff2 = totalt-totalt2;
            cal121=totalt2*100;
            cal22=cal121/totalt;
            console.log("Key Similarity :",cal22,"%");
        }
        else{
            diff2= totalt2-totalt;
            cal121=totalt*100;
            cal22=cal121/totalt2;
            console.log("Key Similarity :",cal22,"%");
        }
    }

</script>
