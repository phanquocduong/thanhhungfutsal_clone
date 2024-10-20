var sliderArr = [
    'public/upload/sliders/slider1.webp',
    'public/upload/sliders/slider2.webp', 
    'public/upload/sliders/slider3.webp', 
    'public/upload/sliders/slider4.webp', 
    'public/upload/sliders/slider5.webp', 
    'public/upload/sliders/slider6.webp', 
    'public/upload/sliders/slider7.webp', 
    'public/upload/sliders/slider8.webp'
];
var vitri = 0;
function right() {
    vitri++;
    if (vitri == sliderArr.length) {
        vitri = 0;
    }
    document.querySelector('.slider__img').setAttribute('src', sliderArr[vitri]);
}
function left() {
    vitri--;
    if (vitri < 0) {
        vitri = sliderArr.length - 1;
    }
    document.querySelector('.slider__img').setAttribute('src', sliderArr[vitri]);
}
var sliderImg = document.querySelector('.slider__img');
if (sliderImg) {
    setInterval(right, 2000);
}
