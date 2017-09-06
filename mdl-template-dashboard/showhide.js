gridstaff
gridstaffrekordet
gridpaxrekordet
gridpersonnel

function showHideListaStaff(obj)
{
    var div = document.getElementById(obj);
    var divx = document.getElementById('gridpaxrekordet');
    var divy = document.getElementById('gridstaffrekordet');
    var divz = document.getElementById('gridpersonnel');
    divx.style.display = "none";
    divy.style.display = "none";
    divz.style.display = "none";
    div.style.display="";
}

function showHideRegjistriStaff(obj)
{
    var div = document.getElementById(obj);
    var divx = document.getElementById('gridpaxrekordet');
    var divy = document.getElementById('gridstaff');
    var divz = document.getElementById('gridpersonnel');
    divx.style.display = "none";
    divy.style.display = "none";
    divz.style.display = "none";
    div.style.display="";
}
