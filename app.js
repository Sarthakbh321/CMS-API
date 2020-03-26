$(document).ready(function () {

    $("#submit").click(function (e) {
        e.preventDefault();

        var form = $("#form");
        var rfid = $("#rfid").val();
        var name = $("#name").val();
        var event = $("#event").val();
        var phone = $("#phone").val();
        var mail = $("#mail").val();
        var reg = $("#reg").val();


        var settings = {
            "url": "http://cms-sarthak2.herokuapp.com/det/",
            "method": "POST",
            "timeout": 0,
            "data": {
                "rfid": rfid,
                "name": name,
                "event_name": event,
                "phone_number": phone,
                "email": mail,
                "registration_number": reg
            } 
        };

        $.ajax(settings).done(function (response) {
            console.log(response);
            
        });
    })


});