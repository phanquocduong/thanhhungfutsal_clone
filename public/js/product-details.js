var i = 0;
function down() {
    i++;
    if (i == imgArr.length) {
        i = 0;
    }
    document.querySelector('.main-image-item').setAttribute('src', 'public/upload/' + imgArr[i]);
}
function up() {
    i--;
    if (i < 0) {
        i = imgArr.length - 1;
    }
    document.querySelector('.main-image-item').setAttribute('src', 'public/upload/' + imgArr[i]);
}

function changeMainImage(x) {
    var imgElement = x.getAttribute('src');
    var mainImg = document.querySelector('.main-image-item');
    mainImg.setAttribute('src', imgElement);
}

function updateSelectedSize(size) {
    var elements = document.getElementsByClassName('selected_size');
    for (var i = 0; i < elements.length; i++) {
        elements[i].value = size;
    }
}

function decreaseQuantityInDetail() {
    var quantityValue = document.querySelector('.quantity-selection__action-edit').value ;
    if (quantityValue > 1) {
        quantityValue--;
        document.querySelector('.quantity-selection__action-edit').value = quantityValue;
        var selectedQuantityElements = document.getElementsByClassName('selected_quantity');
        for (var i = 0; i < selectedQuantityElements.length; i++) {
            selectedQuantityElements[i].value = quantityValue;
        }
    }
}

function increaseQuantityInDetail() {
    var quantityValue = document.querySelector('.quantity-selection__action-edit').value ;
    if (quantityValue >= 1) {
        quantityValue++;
        document.querySelector('.quantity-selection__action-edit').value = quantityValue;
        var selectedQuantityElements = document.getElementsByClassName('selected_quantity');
        for (var i = 0; i < selectedQuantityElements.length; i++) {
            selectedQuantityElements[i].value = quantityValue;
        }
    }
}