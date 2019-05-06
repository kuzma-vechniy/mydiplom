function addToBascket(id, price, count=1){
    document.getElementById('bascet').innerHTML = 
    (+document.getElementById('bascet').innerHTML + +price * +count);
    document.cookie = "products="+getCookie('products') + ',' + id + ':' + count;
}
function deleteProductFromCookie(id){
    new_cookie = "products=";
    getCookie('products').split(',').forEach(function(element){
       if(element.split(':')[0] != id && element.split(':').length > 1) new_cookie += element + ',';
    });
    new_cookie.substring(0, new_cookie.length - 1);
    document.cookie = new_cookie;
}

function deleteFromBasket(id){
    deleteProductFromCookie(id);
    location.reload();
}

function getCookie(n){
    var r = new RegExp("(.*?"+n+"=)(.*?)((;.*)|$)");
    var c = document.cookie;
    if (c.match( r )){
        return c.replace(r, "$2");
    } else {
        return "";
    }
}
function currentProductCount(params) {
    total = 0;
    getCookie('products').split(',').forEach(function(element){
        if(element.split(':')[0] == params) total += +element.split(':')[1];
    });
    return total;
}
function changeProductCount(product_id,price, val){
    deleting_count = currentProductCount(product_id)
    deleteProductFromCookie(product_id);
    document.getElementById('bascet').innerHTML = 
    (+document.getElementById('bascet').innerHTML - +price * +deleting_count)
    document.getElementById('amount-'+product_id).innerHTML = +price * +val
    addToBascket(product_id, price ,val)
    document.getElementById('total').innerHTML = document.getElementById('bascet').innerHTML
}