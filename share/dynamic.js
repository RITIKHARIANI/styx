var holy = document.getElementById('sends');
var cow = document.getElementById('recr');

function progress(e) {
	pro = document.getElementById('progr');
	pro.style.display = 'block';
	for (var i = Number(0); i <= 100000; i++) {
		pro.value = i/1000;
	}
	pro.style.display = 'none';
	e.stopPropagation();
}

function getfile(e){
	var fname = prompt("Which file do you want?");
	var resfile = "./download.php?file=";
	if(fname == null||fname=="")
		alert("Cannot get empty file");
	else
	{
		resfile = resfile + fname;
		window.open(resfile,"_self");
	}
	e.stopPropagation()
}

function getpfile(e){
	var fileid = prompt("Enter the 6-Character ID you received: ");
	var resfile = "./download.php?fileid=";
	if(fileid == null || fileid=="" || fileid.length!=6)
		alert("Invalid ID");
	else
	{
		resfile = resfile + fileid;
		window.open(resfile, "_self");
	}
	e.stopPropagation();
}

function choosemethod(e){
	var privacy = window.confirm('Do you want to use the public share?');
	if(privacy)
		getfile(e);
	else
		getpfile(e);
}

holy.addEventListener('click',progress,false);
cow.addEventListener('click',choosemethod,false);