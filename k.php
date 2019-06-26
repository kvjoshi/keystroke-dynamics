<!doctype html>
<html lang="en">
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://api.jquery.com/resources/events.js"></script>
    <meta charset="utf-8">
    <title>keypress demo</title>
    <style>
        fieldset {
            margin-bottom: 1em;
        }
        input {
            display: block;
            margin-bottom: .25em;
        }
        #print-output {
            width: 100%;
        }
        .print-output-line {
            white-space: pre;
            padding: 5px;
            font-family: monaco, monospace;
            font-size: .7em;
        }
    </style>

</head>
<body>

<form>
    <fieldset>
        <label for="target">Type Something:</label>
        <input id="target" type="text">
    </fieldset>
</form>
<button id="other">
    Trigger the handler
</button>


<script>
    
    var xTriggered = 0;
    $( "#target" ).keypress(function( event ) {
        if ( event.which == 13 ) {
            event.preventDefault();
        }
        xTriggered++;
        var msg = "Handler for .keypress() called " + xTriggered + " time(s).";
        $.print( msg, "html" );
        $.print( event );
        for (i=0;i<=xTriggered;i++){
            eventtime[i]=event.timeStamp;

            $.print(eventtime,"html")
        }

    });

    $( "#other" ).click(function() {
        $( "#target" ).keypress();
    });
</script>

</body>
</html>
