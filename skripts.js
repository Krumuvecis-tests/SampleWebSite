var reizes = 0;

function funkcija3() {
	document.getElementById("demo").innerHTML = "PAVISAM CITS TEKSTS";
	reizes++;
	alert("piespiesta trešā poga (" + reizes + " " + reizesText(reizes) + ")");
}

function reizesText(_reizes) {
	if (_reizes == 1) return "reizi";
	else return "reizes";
}