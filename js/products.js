function downloadWord()
{

	var word = document.getElementById("wordArea");
	var title = window.frames["productIntro"].document.title;
	var href = "products/doc/word/" + title + ".doc";
	word.setAttribute("href", href);
	window.open(href, "", "", "");
}

function downloadPDF()
{

	var pdf = document.getElementById("wordArea");
	var title = window.frames["productIntro"].document.title;
	var href = "products/doc/pdf/" + title + ".pdf";
	pdf.setAttribute("href", href);
	window.open(href, "", "", "");
}