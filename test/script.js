

let questionNo;
let currentQus = 0;
let totalQus = 5;
let correctAns = 0;
let userId;

$("#regButton").click(function() {
    // do something
    let flag=0;
    let fullname = $("#fullname").val();
    let email = $("#email").val();
    let phone = $("#phone").val();

    if(fullname.length < 3) {
        alert("Please enter your full name");
        flag++;
        return false;
    }

    let emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
    if(!emailReg.test(email) || email.length < 1) {
        alert("Please enter a valid email address");
        flag++;
        return false;
    }

    let phoneReg = /^[0-9]{10}$/;
    if(!phoneReg.test(phone)) {
        alert("Please enter a valid phone number");
        flag++;
        return false;
    }

    if(flag == 0) {

        $("#loader").show();

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {
                action: "register",
                fullname: fullname,
                email: email,
                phone: phone
            },
            success: function(data) {

                $("#loader").hide(3000);

                if(data > 0 ){

                    $("#fullname").val('');
                    $("#email").val('');
                    $("#phone").val('');                    

                    userId = data;

                    $("#logo_block").removeClass("full-block");
                    $("#regForm").hide();
                    $("#quiz").show();
                    $("#title").show();

                    getQusNo();

                } else{
                    alert("Something went wrong please try again");
                }

                
            }
        });
    } else{
        alert("Please fill all the fields");
    }

});

function getQusNo() {
    // do something

    $("#loader").show();

    $("#cQus").html(currentQus+1);
    $("#maxQus").html(totalQus);

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {action: 'load_qus', total_qus: totalQus},
        success: function(data) {
            // do something
            questionNo = JSON.parse(data);
            console.log(questionNo);

            loadQus();
        }

    });

}

function loadQus() {
    // do something

    console.log(questionNo[currentQus]);

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {action: 'get_qus', qus_no: questionNo[currentQus]},
        success: function(data) {
            // do something
            data = JSON.parse(data);
            console.log(data);

            $('#e3_qus').html(data.qus);
            $("#cQus").html(currentQus+1);

            $("#loader").hide();
            
        }
    });
}

$("#e3Submit").click(function() {
    // do something
    $("#loader").show();

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {action: 'submit_qus', qus_no: questionNo[currentQus], ans: $('#e3_ans').val()},
        success: function(data) {
            // do something
            $("#e3_ans").val("");
            console.log(data);
            currentQus++;

            if(data>0) {
                correctAns++;
            }

            if (currentQus < totalQus) {
                loadQus();
            } else {
                // do something
                showResult()
            }

            $("#loader").hide();
        }
    });
});

function showResult() {
    // do something

    $("#loader").show();

    $.ajax({
        url: 'ajax.php',
        type: 'POST',
        data: {action: 'show_result', score: correctAns, user_id: userId},
        success: function(data) {
            // do something
            console.log(data);
            if(data > 0) {
                $("#e3Score").html(correctAns);
                $("#quiz").hide();
                $("#result").show();
            } else {
                alert("Something went wrong please try again");
            }

            $("#loader").hide();
        }
    });

}

const toastLiveExample = document.getElementById('liveToast');

function toast(msg) {
    // do something
    const toast = new bootstrap.Toast(toastLiveExample)
    toast.show()
}

//toast("Hello, world! This is a toast message.");