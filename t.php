
<div id="resultat">

</div>

<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

<script>
    $( document ).ready(function() {
        console.log( "ready!" );
        var text= "message ok";
        alert(text);


        var u = "root" ;
        var app = "ws";
        var h = "8d6272926df6486deaf4951e9e44f516";
        var op = "pv";
        var from = "VAS";
        var to = 22548098953;
        var msg = "test edo send sms";

        var mydata ={u:u,app:app,h:h,op:op,from:from,to:to,msg:msg};


        console.log(mydata);
        $.ajax({

            url: 'http://vtsms.appvas.com/index.php',
            data: mydata,
            type: 'GET',
            crossDomain: true,
            dataType: 'jsonp',
            jsonp:'Callback',
            contentType:'application/jsonp',

            success:  function(response){
                console.log(response);
                alert(response);
                $("#resultat").html(response);
        
            },
                            
            error: function(response){
                alert(response);
                // $("#resultat").html("response");
            }
            //beforeSend: setHeader()
        });

    });

</script>