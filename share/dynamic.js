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
holy.addEventListener('click',progress,false);
cow.addEventListener('click',getfile,false);