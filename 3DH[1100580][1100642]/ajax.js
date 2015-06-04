            
var xmlHttpObj = null;
var isPostBack = false;
var linkElem;
    
function CreateXmlHttpRequestObject()
{ 
       
    if (window.XMLHttpRequest) //IE 7 ou Firefox 2.0
    {
        xmlHttpObj = new XMLHttpRequest();
    }
    else if (window.ActiveXObject) //IE 5 e 6
    {
        xmlHttpObj=new ActiveXObject("Microsoft.XMLHTTP");
    }
    return xmlHttpObj;
}
            
function mostPopularTags(qtTags)
{   
    xmlHttpObj = CreateXmlHttpRequestObject();
    var url = "actions.php?method=mostPopularTags&qtTags=" + qtTags; //call do metodo a pagina servidora
    if(xmlHttpObj)
    {
        xmlHttpObj.open("GET",url,true);	xmlHttpObj.onreadystatechange = mostPopularTagsHandler;		xmlHttpObj.send(null);
    }
}
function mostPopularTagsHandler()
{
    if ( xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200)
    {
        var popTags = xmlHttpObj.responseText.split(","); //Tgs mais populares para array
        var select = document.getElementById("popTags"); //retrieve do select
        while(select.firstChild){ //limpa select
            select.removeChild(select.firstChild);
        }
        for(var i = 0; i < popTags.length - 1; i++){
            var novaOption = document.createElement("option");
            select.appendChild(novaOption);
            novaOption.textContent = popTags[i];
        }
    }
}


function getTopTracks(qtTracks){
    var index = document.getElementById("popTags").selectedIndex;
	if(index >=0){
		var selectedTag = document.getElementById("popTags").options[index].value;
		xmlHttpObj = CreateXmlHttpRequestObject();
		var url = "actions.php?method=topTracks" + "&tag="+ selectedTag +"&qtTracks=" + qtTracks; //call do metodo a pagina servidora
		if(xmlHttpObj)
		{
			xmlHttpObj.open("GET",url,true);	xmlHttpObj.onreadystatechange = getTopTracksHandler;		xmlHttpObj.send(null);
		}
	}
}


function getTopTracksHandler(){
	if ( xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200){
		var lines = xmlHttpObj.responseText.split("%");
		var table = document.getElementById("tabelaTracks");
		while(table.firstChild != null){
			table.removeChild(table.firstChild);
		}
		var th = document.createElement("th");
		th.innerHTML = "Nome das musicas";
		table.appendChild(th);
		for(var i = 0; i < lines.length - 1; i++){
			var tr = document.createElement("tr");
			table.appendChild(tr);
			var td = document.createElement("td");
			tr.appendChild(td);
			var nameLink = document.createElement("a");
			td.appendChild(nameLink);
			nameLink.setAttribute("href", lines[i].split("|")[1]);
			nameLink.setAttribute("id","link"+i);
			nameLink.setAttribute("onmouseover", "changeTooltipValue(this,i);");
			nameLink.innerHTML = lines[i].split("|")[0];
		}
		
	}
}

function changeTooltipValue(elem,i){
    linkElem = elem;
    var link = elem.getAttribute("href");
	var id = elem.getAttribute("id");
    var nomeMusica = document.getElementById(id).innerHTML;
	alert(' ');
    var string = link.split("/");
    var artista = string[4];
	for(var i = 0; i < artista.length;i++){
		artista = artista.replace("+","%20");
	}
	for(var j = 0; j < nomeMusica.length;j++){
		artista = artista.replace(" ","%20");
	}
	
    xmlHttpObj = CreateXmlHttpRequestObject();
    var url = "actions.php?method=trackInfo&track=" + nomeMusica + "&artist=" + artista;
    if(xmlHttpObj)
    {
        xmlHttpObj.open("GET",url,true);
        xmlHttpObj.onreadystatechange = tooltipHandler;
        xmlHttpObj.send(null);
    }
}

function tooltipHandler(){
    if ( xmlHttpObj.readyState == 4 && xmlHttpObj.status == 200){
        var resposta = xmlHttpObj.responseText;
        var tooltip = document.getElementById("tooltip");
        while(tooltip.firstChild != null){
            tooltip.removeChild(tooltip.firstChild);
        }
        var strings = resposta.split("#");
        

        var table = document.createElement("table");
        var th = document.createElement("th");
		th.innerHTML = strings[0];
		table.appendChild(th);
		

        var tr = document.createElement("tr");
		table.appendChild(tr);
		var artist = document.createElement("td");
        artist.innerHTML = strings[1];
		tr.appendChild(artist);

        var album = document.createElement("td");
        album.innerHTML = strings[2];
		tr.appendChild(album);
		
        var top = document.createElement("ol");
        var aux = strings[3].split("|");
        top.innerHTML = "<li>" + aux[0] + "</li><li>" + aux[1] + "</li><li>" + aux[2] + "</li>";
        tr.appendChild(top);
		
		var img = document.createElement("img");
        img.setAttribute("src", strings[4]);
        img.setAttribute("style", "float: right; width: auto; height: 80px;");
        tr.appendChild(img);
		
		var topTrack = document.createElement("td");
        topTrack.innerHTML = strings[5];
		tr.appendChild(topTrack);
		
        tooltip.add(linkElem, 'tooltip');
    }
}
