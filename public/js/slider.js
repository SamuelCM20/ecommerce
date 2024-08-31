document.addEventListener('DOMContentLoaded', function () {
    
    document.getElementById("back").addEventListener('click', function () { 
        console.log("hola")
    })
    let sliderInner = document.getElementById("slider--inner");
    let images = document.querySelectorAll("#slider--inner img");

    let index = 1;

    setInterval(function() {
        let percentage = index * -100;
        sliderInner.style.transform = `translateX(${percentage}%)`;
        index++;

        if (index > images.length - 1) {
            index = 0;
        }
    }, 5000);
});

