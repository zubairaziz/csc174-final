function getFileName() {
	currentURL = window.location.href;
	fileNameIndex = currentURL.lastIndexOf("/") + 1;
	currentFileName = currentURL.substr(fileNameIndex);
	return currentFileName;
}

thisFile = getFileName();

if (thisFile == "") {
	thisFile = "index.php";
}

// if (thisFile == "index.php") {
// 	$(document).ready(function () {
// 		$('#navbar').hide();
// 		$('#footer').hide();
// 	});
// }

$(document).ready(function () {
	$('ul.nav a[href="' + thisFile + '"]').addClass('active');
	$('ul.nav a').filter(function () {
		return this.href == thisFile;
	}).addClass('active');
});