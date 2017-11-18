
function brisi(i) {
    
    var nick = document.getElementById("myTable").rows[i].cells.namedItem("uname").innerHTML;
    console.log(nick);
$sql = "Delete FROM korisnik where username=nick";
$result = mysqli_query($conn, $sql);
       

}

function edit(i) {
   // var nick = document.getElementById("editTable"+i).rows[i + 1].cells.namedItem("neki").innerHTML;
   // var nick = document.getElementById("myTable").rows[i + 1].cells.namedItem("neki"+i).innerHTML;
   // var tbl = document.getElementById("myTable");
    //var rCount = tbl.rows.length;
    //alert(tbl.rows[rCount-1].cells[0].children[0].value);
    var stari = document.getElementById("myTable").rows[i + 1].cells.namedItem("uname").innerHTML;
   // var nick=$("#neki"+i).val();
    var inew=$("#namenew"+i).val();
    var lnew=$("#lnamenew"+i).val();
    var ps = $("#password"+i).val();
    var ml = $("#mail"+i).val();
    //console.log(stari,inew,lnew,ps,mail);
    $.ajax({
        method: "post",
        url: "/updatepl",
        data:{unm:stari, fname:inew, lname:lnew,pas: ps,mail:ml},
    }).done(function (data) {
        console.log(data);
        window.location.assign('/igraci');

        //  $("#rj" ).append(data);

    }).fail(function () {
        alert("error");


    });
}


function dodajigraca() {
    var nick = $("#uname").val();
    var ime = $("#frname").val();
    var prez = $("#lsname").val();
    var ps = $("#password").val();
    var psc = $("#password_confirmation").val();
    var email = $("#email").val();
    /* var nick=document.getElementById('uname').value();
     var ime=document.getElementById('frname').value();
     var prez=document.getElementById('lsname').value();*/
    //console.log(ime);

    if (nick == '' || ime == '' || prez == '' || email == '' || ps == '' || psc == '') {
        alert("Please fill all fields...!!!!!!");
    } else if ((ps.length) < 8) {
        alert("Password should atleast 8 character in length...!!!!!!");
    } else if (!(ps).match(psc)) {
        alert("Your passwords don't match. Try again?");
    } else {
        $.ajax({
            method: "POST",
            url: "/dodajpl",
            data: {unm: nick, fname: ime, lname: prez,pas: ps},
        }).done(function () {
            //console.log(data),

            //window.location.reload();
            alert("uspjesna registracija");
            window.location.assign('/igraci');
        }).fail(function () {
            alert("pokusajte drugi username");

        });
    };
}

