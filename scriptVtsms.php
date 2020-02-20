<?php
    include 'config.php';

    //$date = date("YY-mm-dd");

    $req = "SELECT expediteur,numero,message,smsdestinataire.statut as statutdestinataire,sms.id as idsms,smsdestinataire.smsid as idsmsdestinataire FROM smsdestinataire,sms WHERE sms.id=smsdestinataire.smsid AND smsdestinataire.statut= 0";

    $select = mysql_query($req) or die(mysql_error());


    if(mysql_num_rows($select)>0){

        while ($l=mysql_fetch_array($select)) {     
            
            $expediteur = $l['expediteur'];
            $numero = $l['numero'];
            $message = $l['message'];
            $idsmsdestinataire = $l['idsmsdestinataire'];
            //$idmessage = $l['smsdestinataire.id'];

            echo $expediteur."</br>";
            echo $numero."</br>";
            echo $message."</br>";
            echo $idsmsdestinataire;

        
?>
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
        var to = "<?php echo $numero ; ?>";
        var msg = "<?php echo $message ; ?>";


        var mydata ={u:u,app:app,h:h,op:op,from:from,to:to,msg:msg};
        

        // http://vtsms.appvas.com/index.php?u=root&app=ws&h=8d6272926df6486deaf4951e9e44f516&op=pv&from=VAS&to=22549517916&msg=test

        console.log(mydata);

        $.ajax({

            url: 'http://vtsms.appvas.com/index.php',
            data: mydata,
            type: 'POST',
            crossDomain: true,
            dataType: 'jsonp',
            jsonp:'Callback',
            contentType:'application/jsonp',

            success:  function(response){
                console.log(response);
                alert(response);
                $("#resultat").html(response);

                <?php

                    $update="UPDATE smsdestinataire SET	statut=1,accuse=1 WHERE id=".$idsmsdestinataire;

                    $exe=mysql_query($update) or die(mysql_error());

                    if($exe){
                        echo "Modification OK";
                    }else{
                        echo "Modification non OK";
                    }

                ?>


            },
                            
            error: function(response){
                alert(response);

            }

        });

        

    });

</script>



<?php                
        }  

    }else{
       echo "Aucun message !";
    }

?>







<?php
