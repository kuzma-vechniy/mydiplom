function deleteFromBasket(id){
    new_cookie = "products=";
    getCookie('products').split(',').forEach(function(element){
        console.log(new_cookie);
       if(element.split(':')[0] != id && element.split(':').length > 1) new_cookie += element + ',';
    });
    new_cookie.substring(0, new_cookie.length - 1);
    console.log(new_cookie);
    document.cookie = new_cookie;
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