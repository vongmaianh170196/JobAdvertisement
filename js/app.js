document.getElementById("date").innerHTML = Date();
// document.getElementById("btnSubmit").addEventListener("click", function () {
//     $.ajax({url: "demo_test.txt",
//         method: POST,
//         data:{
//         // skillList: #skills
//         },
//         success: function(result){
//         $("#div1").html(result);
//     }});
// });

$(document).on('click','#btnSubmit', function addSkills () {


    var skills = {
        mail: $('#subcr').val(),
    }
    console.log(skills);
    $.post("skills.php", skills, function (data) {

        // $('.mailInThisList').html(data)
        // $('#subcr').val('');
    });
});