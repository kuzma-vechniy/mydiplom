class SliderItem {
    constructor(src, href) {
        this.src = src;
        this.href = href;
    }
}
let images = [
    new SliderItem("css/img/slider/slide1.png", "http://localhost/?page=product&product_id=2"),
    new SliderItem("css/img/slider/computer.png", "http://localhost/?page=product&product_id=3"),
    new SliderItem("css/img/slider/slide1.png", "http://localhost/?page=product&product_id=4")
];
let btnLeft = document.getElementById('left');
let btnRight = document.getElementById('right');
let currentIndex = 0;
setImage(images[0]);
// document.getElementById('right').onclick = scrolRight()
// document.getElementById('left').onclick = scrolLeft()
function scrolRight() {
    currentIndex ++;
    if(currentIndex >= images.length) {
        currentIndex = 0;
    }
    setImage(images[currentIndex]);
}

function scrolLeft() {
    currentIndex --;
    if(currentIndex == -1) {
        currentIndex = images.length-1;
    }
    setImage(images[currentIndex]);
}

function setImage(galleryItem) {
    document.getElementById('image').src = galleryItem.src;
    document.getElementById('href').href = galleryItem.href;
}
