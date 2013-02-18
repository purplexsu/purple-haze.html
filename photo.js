document.write('<script type="text/javascript" src="../../common.js"></script>');

function responseHandler (response) {
	var result = eval("(" + response + ")");
}

function errorHandler(error) {
}

function associateArticle() {
	var connection = new Connection();
	connection.get('article.json', responseHandler, errorHandler);
}

function pageCompleted() {
	enableArrowKey();
}

window.onload = pageCompleted;