//tangkap ELement
const keyword = document.querySelector('.keyword');
const container = document.querySelector('.container');
const tombol = document.querySelector('.tombol');

tombol.style.display = 'none';

keyword.addEventListener('keyup', function () {
    // console.log('ok');
    const xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function () {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
        
    }
    xhr.open('get', 'ajax/ajax.php?keyword=' + keyword.value);
        xhr.send();
})

// masukan event


//panggil ajax


//cek kondisi xhr status & xhr ready state