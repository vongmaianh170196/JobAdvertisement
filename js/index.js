//Job Type
$(".Job-Type-hide .1").hide();

$(".Job-Type-hide").append("<button>Show more</button>");

$(".Job-Type-hide button").click(function(){

    $(".Job-Type-hide .1").show("slow");
    $(this).remove();
});

// SKILLS
$(".SKILLS-hide .2").hide();

$(".SKILLS-hide").append("<button>Show more</button>");

$(".SKILLS-hide button").click(function(){

    $(".SKILLS-hide .2").show("slow");
    $(this).remove();
});

// LOCATION
$(".LOCATION-hide .3").hide();

$(".LOCATION-hide").append("<button>Show more</button>");

$(".LOCATION-hide button").click(function(){

    $(".LOCATION-hide .3").show("slow");
    $(this).remove();
});

// Languages
$(".LANGUAGES-hide .4").hide();

$(".LANGUAGES-hide").append("<button>Show more</button>");

$(".LANGUAGES-hide button").click(function(){

    $(".LANGUAGES-hide .4").show("slow");
    $(this).remove();
});


const myHeading = document.getElementById('side-nav');

myHeading.addEventListener('click', () => {
    myHeading.style.color = 'blue';
});