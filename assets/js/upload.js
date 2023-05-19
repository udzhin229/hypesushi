// fetch('assets/js/products.json')
//   .then(response => response.json())
//   .then(data => {
//     const choose = document.querySelectorAll('button.chose');
//     choose.forEach(button => {
//         button.addEventListener('click', () => {
//             const val = button.value;
//             console.log(val);
//             const sushi = data.filter(item => item.category === val);
//             const grid = document.getElementById('grid-container');
//             grid.innerHTML = '';
//             sushi.forEach(item => {
//                 const product = `
//                 <div class='sushi-block'>
//                     <img src="${item.img}" alt="${item.title}">
//                     <div class='sushi-title'>${item.title}</div>
//                     <div class='sushi-text'>${item.text}</div>
//                     <div class='sushi-price'>${item.price}</div>
//                 </div>
//             `;
//             grid.innerHTML += product;
//             });
//             const productCount = grid.querySelectorAll('.sushi-block').length;
//             const btn = document.getElementById('show');
//             if (productCount <= 6) {
//                 btn.style.display = "none";
//             }
//             else {
//                 btn.style.display = "block";
//                 btn.addEventListener('click', () => {
//                     const hiddenProducts = document.querySelectorAll('.menu .grid-container .sushi-block:nth-child(n+7)');
//                     hiddenProducts.forEach(product => {
//                         product.style.display = 'block';
//                     });
//                 });
//             }
//         });
//     });
// });
var cart = {};
$('document').ready(function(){
    loadGoods();
    $('#choose_all').on('click', 'button', function(){
        var $this = $(this),
            category = $(this).data('category');
        $('#choose_all button').removeClass('active');
        $this.addClass('active');
        loadGoods(category);
    });
    checkCart();
    showMiniCart();
    showGoods();
});
function loadGoods(category) {
    $.getJSON('assets/js/products.json', function (data) {
        var out = '';
        for (var key in data) {
            if (!category || data[key].category === category) {
                out+='<div class="sushi-block">';
                out+='<img src="'+data[key].img+'" loading="lazy" alt="hype-sushi">';
                out+='<div class="sushi-title">'+data[key].title+'</div>';
                out+='<div class="sushi-text">'+data[key].text+'</div>';
                out+='<div class="sushi-down">';
                out+='<div class="sushi-down-all">';
                out+='<div class="sushi-price">'+data[key].price+' грн,</div>';
                out+='<div class="sushi-weight">'+data[key].weight+'</div>';
                out+='</div>';
                out+='<div class="sushi-buttons">';
                out+='<button onclick="animateEl()" data-art="'+key+'" class="sushi-button sushi-add">+</button>';
                out+='</div>';
                out+='</div>';
                out+='</div>';
            }
        }
        $('#grid-container').html(out);
        $('button.sushi-add').on('click', addToCart);
        // if ($('.sushi-block').length > 6) {
        //     $('#show').show();
        // }
        // else {
        //     $('#show').hide();
        // }
    });
}
function addToCart () {
    var articul =$(this).attr('data-art');
    if (cart[articul] != undefined) {
        cart[articul]++;
    }
    else {
        cart[articul] = 1;
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    showMiniCart();
}
function remToCart () {
    var articul =$(this).attr('data-art');
    if (cart[articul] > 1) {
        cart[articul]--;
    }
    else {
        delete cart[articul];
    }
    localStorage.setItem('cart', JSON.stringify(cart));
    showMiniCart();
}
function checkCart() {
    if (localStorage.getItem('cart') != null) {
        cart = JSON.parse(localStorage.getItem('cart'));
    }
}
function showMiniCart() {
    $.getJSON('assets/js/products.json', function (data) {
        var goods = data;
        var totalprice = 0;
        var out = '';
        for (var w in cart) {
            out+='<div class="element-o">';
            out+='<img src="'+goods[w].img+'" loadin="lazy" alt="hype-sushi">';
            out+='<div class="el-title-all">';
            out+='<div class="el-title">'+goods[w].title+'</div>';
            out+='<div class="el-weight">'+goods[w].weight+'</div>';
            out+='</div>';
            out+='<div class="el-all">';
            out+='<div class="el-bord">';
            out+='<button data-art="'+w+'" class="el-rem">-</button>'
            out+='<div class="el-total">'+cart[w]+'</div>';
            out+='<button data-art="'+w+'" class="el-add">+</button>'
            out+='</div>';
            out+='<div class="el-price">'+cart[w]*goods[w].price+' грн</div>';
            out+='</div>';
            out+='</div>';
            out+='<hr>';
            totalprice += cart[w] * data[w].price;
        }
        $('#elements-order').html(out);
        $('#totalprice').html(totalprice + ' грн');
        $('button.el-add').on('click', addToCart);
        $('button.el-rem').on('click', remToCart);
    });
}
// function showGoods() {
//     $("#show").click(function(){
//         $(".menu .grid-container .sushi-block:nth-child(n+7)").css("display", "flex");
//         $('#show').toggle();
//       });    
// }
function animateEl() {
    $("#cart-menu").toggleClass("show");
    $("#overflow").toggleClass("show");
    var element = document.getElementById('icon-cart');
    element.classList.add('animate');
    element.addEventListener('animationend', function() {
      element.classList.remove('animate');
    });
  }