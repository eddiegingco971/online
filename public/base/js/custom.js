// var i = document.getElementById('increment');
// var q = document.getElementByName('quantity');
// var d = document.getElementById('decrement');

// i.addEventListener('click', calculate);
// function calculate(){
//     var q = documentById('quantity').innerHTML;
//     q++;
//     document.getElementById('quantity').innerHTML = q++;
// }
// d.addEventListener('click', calculate1);
// function calculate1(){
//     var q = documentById('quantity').innerHTML;
//     q--;
//     document.getElementById('quantity').innerHTML = q--;
// }

//initialising a variable name data

// var data = 1;

// //printing default value of data that is 0 in h2 tag
// document.getElementById("quantity").innerText = data;

// //creation of increment function
// function increment() {
//     data = data + 1;
//     document.getElementById("quantity").innerText = data;
// }
// //creation of decrement function
// function decrement() {
//     data = data - 1;
//     document.getElementById("quantity").innerText = data;
// }

$(document).ready(function() {
    $('.increment-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value < 10) {
            value++;
            $('.qty-input').val(value);
        }
    });
    $('.decrement-btn').click(function(e) {
        e.preventDefault();

        var inc_value = $('.qty-input').val();
        var value = parseInt(inc_value, 10);
        value = isNaN(value) ? 0 : value;
        if (value > 1) {
            value--;
            $('.qty-input').val(value);
        }
    });
});

