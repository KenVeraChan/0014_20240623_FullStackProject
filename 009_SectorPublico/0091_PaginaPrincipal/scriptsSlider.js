/************************************************************************/
/********* 1) SLIDER DE LAS FOTOGRAFÍAS DESCARGADAS DE LA BBDD **********/
/************************************************************************/

let nextBtn = document.querySelector("#next");
let prevBtn = document.querySelector("#prev");
let slides = document.querySelectorAll(".slide");
let changeSlide = 0;

nextBtn.addEventListener("click", function() {
    slides.forEach(function (slide, index) {
    if (slide.classList.contains("show") === true) {
      changeSlide = index + 1;
      slide.classList.remove("show");
    }
  });
  if (changeSlide < slides.length) {
    slides[changeSlide].classList.add("show");
    }
  else {
      changeSlide = 0;
      slides[changeSlide].classList.add("show");
    }
});
prevBtn.addEventListener('click', function () {
    slides.forEach(function (slide, index) {
        if (slide.classList.contains("show") === true) {
            changeSlide = index - 1;
            slide.classList.remove("show");
        }  
    });
    if (changeSlide < slides.length && changeSlide > -1) {
        slides[changeSlide].classList.add("show");
    }
    else {
        changeSlide = slides.length - 1;
        slides[changeSlide].classList.add("show");
    }
});