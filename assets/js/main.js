$(document).ready(function(){
    $("body").on("click", ".post-pagination", function(e){
        e.preventDefault();

        let page = $(this).data("page");

        $.ajax({
            url: "models/postovi/dohvatiPaginaciju.php",
            method: "POST",
            dataType: "json",
            data: {
                strana: page-1
            },
            success: function(data){
                console.log(data);
                ispisPostova(data.postovi);
                printPagination(data.brojPostova);
            },
            error: function(error){
                console.log(error);
            }
        })
        
    });

    $("#pretraga").keyup(function(){
        let naziv = $(this).val();

        $.ajax({
            url: "models/postovi/pretraga.php",
            method: "POST",
            data: {
                naziv: naziv
            },
            dataType: 'json',
            success: function(podaci){
                console.log(podaci);
                ispisPostova(podaci);
            },
            error: function(greska){
                console.log(greska);
            }
        })
    });

    $("#sortiranje").click(function(){
        let sort = $(this).val();

        $.ajax({
            url: "models/postovi/sortiranje.php",
            method: "POST",
            data: {
                sort: sort
            },
            dataType: 'json',
            success: function(podaci){
                console.log(podaci);
                ispisPostova(podaci);
            },
            error: function(greska){
                console.log(greska);
            }
        })
    });

    $("#datum").click(function(){
        let datum = $(this).val();

        $.ajax({
            url: "models/postovi/filtriranjePoDatumu.php",
            method: "POST",
            data: {
                datum: datum
            },
            dataType: 'json',
            success: function(podaci){
                console.log(podaci);
                ispisPostova(podaci);
            },
            error: function(greska){
                console.log(greska);
            }
        })
    });
});

function ispisPostova(postovi){
    let html = "";
    
    for(let p of postovi){
    fit = "";
    deloviTeksta = p.tekstPosta.split(" ");
    if(deloviTeksta.length<25){
        for(j=0; j<2; j++){
            fit = fit+deloviTeksta[j]+" ";
        }
        fit = fit+"...<a href='?page=getone&id="+p.idPosta+"'>pročitaj više</a>";
    }else{
        for(j=0; j<25; j++){
            fit = fit+deloviTeksta[j]+" ";
        }
    fit = fit+"...<a href='?page=getone&id="+p.idPosta+"'>pročitaj više</a>";}
    html += `<div class="card my-3">
    <img class="card-img-top" src="${p.hrefSlike}" alt="${p.altSlike}">
    <div class="card-body">
        <a href="?page=getone&id=${p.idPosta}"><h5 class="card-title">${p.naslovPosta}</h5></a>
        <p class="card-text">`;
    html+=`${fit}`;

        html +=`</p><p class="card-text"><small class="text-muted">${formatDate(p.datPosta)}</small></p>
        </div>
        </div>`;
    }
    $("#postovi").html(html);
}

function formatDate(datum){
    let datumNovi = new Date(datum);
    return datumNovi.getDate() + "." + (datumNovi.getMonth() + 1) + "." + datumNovi.getFullYear() + " . ";
}

function printPagination(brojPostova){
    let html = "";
    for(i = 1; i <= brojPostova; i++){
        html += `<li class="page-item">
        <a class="page-link post-pagination" href="#" data-page="${i}">${i}</a>
      </li>`;
    }
    $("#pagination").html(html);
}