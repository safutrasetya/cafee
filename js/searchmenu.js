//Elemen

var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

//addEventListener
keyword.addEventListener('keyup', function(){
  console.log(keyword.value);

  //object AJAX
  var xhr = new XMLHttpRequest();

  //cek kesiapan AJAX
  xhr.onreadystatechange = function(){
    if(xhr.readyState == 4 && xhr.status == 200 ){
      container.innerHTML=xhr.responseText;
    }
  }
  //eksekusi ajax
  xhr.open('GET', 'menus.php?keyword='+ keyword.value,true);
  xhr.send();
});
