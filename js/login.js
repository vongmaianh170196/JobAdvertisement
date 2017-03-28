$(".student").hide();

/*
 employer
 */



$(".employer .btn-student").click(function(){

    $("div .student").fadeIn();
    $(".employer").fadeOut();
});


/*
 STUDENT
 */

$(".student .btn-employer").click(function(){
    $("div .employer").fadeIn();
    $(".student").fadeOut();
});